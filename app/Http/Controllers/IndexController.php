<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\PaymentMethod;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'rates'            => Rate::all(),
            'paymentMethods'   => PaymentMethod::all()->where('on_off', '=', 1)
        ]);
    }
}
