<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['number', 'requisite_id', 'user_id', 'rate_id', 'is_paid', 'is_cancelled'];

    public function rate()
    {
        return $this->belongsTo('\App\Models\Rate');
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function requisite()
    {
        return $this->belongsTo('\App\Models\Requisite');
    }

    public function act()
    {
        return $this->hasOne('App\Models\Act');
    }

    /**
     * Генерирует номер для счета
     *
     * @return int|mixed
     */
    public function generate_number()
    {
        $lastItem = \DB::table('accounts')
            ->latest()
            ->first();

        $lastYear = date('Y', strtotime($lastItem->created_at));
        $nowYear = date('Y');

        if ($lastYear < $nowYear) {
            return 1;
        } else {
            return $lastItem->number + 1;
        }
    }

    /**
     * Возвращает url Робокассы
     *
     * @return string
     */
    public static function getUrl() : string
    {
        return env('ROBOKASSA_URL', 'https://merchant.roboxchange.com/Index.aspx');
    }

    /**
     * Возвращает массив параметров для отправки в Робокассу
     *
     * @param int $user_id Пользователь
     * @param string $user_email Почта
     * @param int $account_id
     * @param int $rate_id
     * @param string $name Имя обьекта покупки
     * @param int $sum Сумма
     * @param string $payment_alias Псевданим способа оплаты
     * @return array
     */
    public static function getParams(int $user_id,
                                     string $user_email,
                                     int $account_id,
                                     int $rate_id,
                                     string $name,
                                     int $sum,
                                     string $payment_alias) : array
    {
        $login = env('ROBOKASSA_LOGIN', 'gazeta.2x2.su');
        $pass1 = env('ROBOKASSA_PASS1', 'qvC4VMA6MFlD72t2dTJS');

        $receipt = [
            'sno'   => env('SNO', 'osn'),
            'items' => [
                [
                    'name'      => $name,
                    'quantity'  => 1,
                    'sum'       => $sum,
                    'tax'       => 'none'
                ]
            ]
        ];

        $receipt = urlencode(json_encode($receipt));

        return [
            'MrchLogin'         => $login,
            'OutSum'            => $sum,
            'InvId'             => $account_id,
            'Desc'              => "Описание",
            'SignatureValue'    => md5("$login:$sum:$account_id:$receipt:$pass1:Shp_item=$rate_id:Shp_user=$user_id"),
            'IncCurrLabel'      => $payment_alias,
            'Culture'           => 'ru',
            'Shp_item'          => $rate_id,
            'Shp_user'          => $user_id,
            'Receipt'           => $receipt,
            'Email'             => $user_email
        ];
    }

    /**
     * Возвращает сумму прописью
     *
     * @param $num
     * @return string
     */
    public static function sum_propis($num)
    {
        $nul = 'ноль';

        $ten = array(
            array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
            array('', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
        );

        $a20 = array('десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать');

        $tens = array(2 => 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто');

        $hundred = array('', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот');

        $unit = array(// Units
            array('копейка', 'копейки', 'копеек', 1),
            array('рубль', 'рубля', 'рублей', 0),
            array('тысяча', 'тысячи', 'тысяч', 1),
            array('миллион', 'миллиона', 'миллионов', 0),
            array('миллиард', 'милиарда', 'миллиардов', 0),
        );

        list($rub, $kop) = explode('.', str_replace(",", ".", sprintf("%015.2f", floatval($num))));

        $out = array();

        if (intval($rub) > 0) {
            foreach (str_split($rub, 3) as $uk => $v) { // by 3 symbols
                if (!intval($v))
                    continue;
                $uk = sizeof($unit) - $uk - 1; // unit key
                $gender = $unit[$uk][3];
                list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));
                // mega-logic
                $out[] = $hundred[$i1]; # 1xx-9xx
                if ($i2 > 1)
                    $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3];# 20-99
                else
                    $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3];# 10-19 | 1-9
                // units without rub & kop
                if ($uk > 1)
                    $out[] = self::morph($v, $unit[$uk][0], $unit[$uk][1], $unit[$uk][2]);
            } //foreach
        } else
            $out[] = $nul;
        $out[] = self::morph(intval($rub), $unit[1][0], $unit[1][1], $unit[1][2]); // rub
        $out[] = $kop . ' ' . self::morph($kop, $unit[0][0], $unit[0][1], $unit[0][2]); // kop
        return trim(preg_replace('/ {2,}/', ' ', join(' ', $out)));
    }

    /**
     * Склоняем словоформу
     *
     * @param $n
     * @param $f1
     * @param $f2
     * @param $f5
     * @return mixed
     */
    public static function morph($n, $f1, $f2, $f5)
    {
        $n = abs(intval($n)) % 100;

        if ($n > 10 && $n < 20)
            return $f5;

        $n = $n % 10;

        if ($n > 1 && $n < 5)
            return $f2;

        if ($n == 1)
            return $f1;

        return $f5;
    }

    /**
     * Склонения числительных
     *
     * @param $digit - числительное
     * @param $expr - ['книга', 'книги', 'книг']
     * @param bool $onlyword - возвращать словоформу или вместе с числом
     * @return string
     */
    public static function declension($digit, $expr, $onlyword = false)
    {
        if (!is_array($expr))
            $expr = array_filter(explode(' ', $expr));

        if (empty($expr[2]))
            $expr[2] = $expr[1];

        $i = preg_replace('/[^0-9]+/s', '', $digit) % 100;

        if ($onlyword)
            $digit = '';

        if ($i >= 5 && $i <= 20)
            $res = $digit . ' ' . $expr[2];

        else {
            $i%=10;

            if ($i == 1)
                $res = $digit . ' ' . $expr[0];

            elseif ($i >= 2 && $i <= 4)
                $res = $digit . ' ' . $expr[1];

            else
                $res = $digit . ' ' . $expr[2];
        }

        return trim($res);
    }
}
