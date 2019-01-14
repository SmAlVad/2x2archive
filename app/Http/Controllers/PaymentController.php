<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\PaymentMethod;
use App\Models\Account;
use App\Models\Requisite;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index', [
            'rates'             => Rate::all(),
            'paymentMethods'    => PaymentMethod::where('on_off', 1)->get()
        ]);
    }

    public function confirm(Request $request){

        $rate           = Rate::find($request->get('rate'));
        $paymentMethod  = $request->get('payment-alias');
        $url            = Account::getUrl();

        $params = Account::getParams(
            (int)$request->user()->id,
            (string)$request->user()->email,
            1,
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

    public function bill(Request $request)
    {
        $this->validate($request, [
            'recipient' => 'required',
            'inn'       => 'required|digits:10',
            'kpp'       => 'digits:9',
            'bank'      => 'required',
            'account'   => 'required|digits:20',
            'bik'       => 'required|digits:9',
            'ks'        => 'required|digits:20',
            'address'   => 'required',
            'phone'     => 'required|max:19',
        ]);

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
        $account->number = $account->generate_number();
        $account->requisite_id = $requisite->id;
        $account->user_id = $request->user()->id;
        $account->rate_id = $request->get('rate');
        $account->is_paid = 0;
        $account->save();


        return redirect(route('index'));
    }
}
