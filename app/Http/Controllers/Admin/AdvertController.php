<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Csfd;

/**
 * Class AdvertController
 * @package App\Http\Controllers\Admin
 */
class AdvertController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.adverts.index',[
            'adverts' => Csfd::paginate(10)
        ]);
    }
}
