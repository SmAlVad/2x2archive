<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pdf
 * @package App\Models
 */
class Pdf extends Model
{
    protected $fillable = ['project_id', 'year', 'month', 'number', 'created_by'];

    public function project()
    {
        return $this->belongsTo('\App\Models\Project', 'project_id', 'id');
    }

    /**
     * Год выхода газет, в 2020 не забудь добавить 2020 год!
     *
     * @return array
     */
    public static function getReleaseYear()
    {
        return [
            '2014',
            '2015',
            '2016',
            '2017',
            '2018',
            '2019',
        ];
    }

    /**
     * Возвращает список месяцев
     *
     * @return array
     */
    public static function getReleaseMonth()
    {
        return [
            '1' => 'Январь',
            '2' => 'Февраль',
            '3' => 'Март',
            '4' => 'Апрель',
            '5' => 'Май',
            '6' => 'Июнь',
            '7' => 'Июль',
            '8' => 'Август',
            '9' => 'Сентябрь',
            '10' => 'Октябрь',
            '11' => 'Ноябрь',
            '12' => 'Декабрь',
        ];
    }

    /**
     * Возвращает строковое значение месяца
     *
     * @param $int
     * @return mixed|string
     */
    public static function getStringMonth($int)
    {
        $months = [
            '1' => 'Январь',
            '2' => 'Февраль',
            '3' => 'Март',
            '4' => 'Апрель',
            '5' => 'Май',
            '6' => 'Июнь',
            '7' => 'Июль',
            '8' => 'Август',
            '9' => 'Сентябрь',
            '10' => 'Октябрь',
            '11' => 'Ноябрь',
            '12' => 'Декабрь',
        ];

        $result = '';

        foreach ($months as $k => $v) {
            if ($k == $int) {
                $result = $v;
            }
        }

        return $result;
    }

    /**
     * Форматирует дату в гггг-мм-дд для input type=date
     *
     * @param $year
     * @param $month
     * @param $day
     * @return string
     */
    public static function getFormattedDate($year, $month, $day)
    {
        $result = "" . $year;

        ($month < 10) ? $result .= "-0{$month}" : $result .= "-{$month}";
        ($day < 10) ? $result .= "-0{$day}" : $result .= "-{$day}";

        return $result;
    }
}
