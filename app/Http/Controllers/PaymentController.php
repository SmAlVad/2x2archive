<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\PaymentMethod;
use App\Models\Account;
use App\Models\Requisite;
use App\Models\Order;
use App\Models\Key;
use App\Http\Requests\PaymentBillRequest;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index', [
            'rates'             => Rate::all(),
            'paymentMethods'    => PaymentMethod::where('on_off', 1)->get()
        ]);
    }

    /**
     * Подтверждение плотежа. Последний шаг перед отправкой в РОБОКАССУ
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirm(Request $request){

        $rate           = Rate::find($request->get('rate'));
        $paymentMethod  = $request->get('payment-alias');
        $url            = Account::getUrl();

        $order = new Order();
        $order->rate_id = $rate->id;
        $order->user_id = $request->user()->id;
        $order->key_id  = 0;
        $order->is_paid = 0;
        $order->save();

        $params = Account::getParams(
            (int)$request->user()->id,
            (string)$request->user()->email,
            (int)$order->id,
            (int)$rate->id,
            (string)$rate->name,
            (int)$rate->price,
            (string)$paymentMethod
        );

        if ($paymentMethod === 'bill') {
            return view('payment.bill', compact('rate', 'paymentMethod'));
        } else {
            return view('payment.confirm', compact('params', 'url'));
        }
    }

    /**
     * Обрабатывает ответ от РК
     *
     * @param Request $request
     */
    public function result(Request $request)
    {
        // регистрационная информация (пароль #2)
        $mrh_pass2  = env('ROBOKASSA_PASS2');

        // чтение параметров
        $out_summ   = $request->get('OutSum');          // сумма заказа
        $inv_id     = $request->get('InvId');           // номер заказа
        $shp_item   = $request->get('Shp_item');        // тип товара
        $crc        = $request->get('SignatureValue');  // подпись

        $crc = strtoupper($crc);

        $my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_item=$shp_item"));

        // проверка корректности подписи
        if ($my_crc !=$crc)
        {
            echo "Bad sign\n";
            exit();
        }

        $order = Order::find($inv_id);

        $key = new Key();
        $randomInt = $key->generateKey();

        while ($key->keyExist($randomInt)) {
            $randomInt = $key->generateKey();
        }

        $key->key           = $randomInt;
        $key->rate_id       = $shp_item;
        $key->user_id       = $order->user->id;
        $key->active        = 0;
        $key->created_by    = $order->user->name;
        $key->save();

        $order->is_paid     = 1;
        $order->key_id      = $key->id;
        $order->save();
    }

    /**
     * Успешный ответ от РК. Редирект на домашнюю страницу пользователя
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function success(Request $request)
    {
        // регистрационная информация (пароль #1)
        $mrh_pass1  = env('ROBOKASSA_PASS1');

        // чтение параметров
        $out_summ   = $request->get('OutSum');
        $inv_id     = $request->get('InvId');
        $shp_item   = $request->get('Shp_item');
        $crc        = $request->get('SignatureValue');

        $crc        = strtoupper($crc);

        $my_crc     = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item"));

        // проверка корректности подписи
        if ($my_crc != $crc)
        {
            echo "Bad sign\n";
            exit();
        }

        $order      = Order::find($inv_id);

        $userId     = $order->user->id;

        $accounts   = Account::where('user_id', $userId)->orderBy('id','DESK')->get();
        $keys       = Key::where('user_id', $userId)->where('active', 0)->get();

        return view('home', compact('accounts','keys'));

    }

    /**
     * Отказ от оплаты
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function fail(Request $request)
    {
        $inv_id = $request->get('InvId');

        return redirect()->route('home')
            ->with('success', "Вы отказались от оплаты. Заказ# $inv_id");
    }

    /**
     * Выставление счета
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function bill(PaymentBillRequest $request)
    {

        $requisite = new Requisite();
        $requisite->user_id      = $request->user()->id;
        $requisite->recipient    = $request->get('recipient');
        $requisite->inn          = $request->get('inn');
        $requisite->kpp          = $request->get('kpp');
        $requisite->bank         = $request->get('bank');
        $requisite->account      = $request->get('account');
        $requisite->bik          = $request->get('bik');
        $requisite->ks           = $request->get('ks');
        $requisite->address      = $request->get('address');
        $requisite->phone        = $request->get('phone');
        $requisite->save();

        $account = new Account();
        $account->number        = $account->generate_number();
        $account->requisite_id  = $requisite->id;
        $account->user_id       = $request->user()->id;
        $account->rate_id       = $request->get('rate');
        $account->is_paid       = 0;
        $account->save();


        return redirect()->route('home')
            ->with('success', "Успешно");
    }
}
