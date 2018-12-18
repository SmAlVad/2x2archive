<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Csfd;

class AdvertController extends Controller
{
    public function index()
    {
        return view('admin.adverts.index',[
            'adverts' => Csfd::paginate(10)
        ]);
    }
}
