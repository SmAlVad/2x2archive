<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index', [
            'rates'            => Rate::all(),
        ]);
    }

    public function confirm(Request $request){
        return view();
    }
}
