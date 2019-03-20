<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Rate;
use App\Models\Csfd;
use App\Models\Pdf;
use Illuminate\Support\Facades\Cache;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        ini_set('memory_limit', '6G');

        // Кэшируем общее количество обьявлений
        if (Cache::has('countOfAllAdverts')) {
            $countOfAllAdvert = Cache::get('countOfAllAdverts');
        } else {
            $countOfAllAdvert = Csfd::get()->count();

            $time = now()->addDay();

            Cache::put('countOfAllAdverts', $countOfAllAdvert, $time);
        }

        // Кэшируем общее количество PDF газет
        if (Cache::has('countOfAllPdfs')) {
            $countOfAllPdfs = Cache::get('countOfAllPdfs');
        } else {
            $countOfAllPdfs = Pdf::get()->count();

            $time = now()->addDay();

            Cache::put('countOfAllPdfs', $countOfAllPdfs, $time);
        }

        return view('index', [
            'rates'             => Rate::all(),
            'paymentMethods'    => PaymentMethod::where('on_off', 1)->get(),
            'countOfAllAdvert'  => $countOfAllAdvert,
            'countOfAllPdfs'    => $countOfAllPdfs
        ]);
    }
}
