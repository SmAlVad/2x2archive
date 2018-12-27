<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Csfd;

/**
 * Class CsfdController
 * @package App\Http\Controllers\Admin
 */
class CsfdController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.csfd.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        $counter    = 0;
        $filePath   = $request->file('json')->getRealPath();
        $json       = file_get_contents($filePath);
        $data       = json_decode($json);

        foreach ($data as $item) {

            $csfd = new Csfd();

            $csfd->csfd_id = $item->csfd_id;
            $csfd->region = $item->region;
            $csfd->city = $item->city;
            $csfd->cat1 = $item->cat1;
            $csfd->cat2 = $item->cat2;
            $csfd->cat3 = $item->cat3;
            $csfd->title = $item->title;
            $csfd->body = $item->body;
            $csfd->tags = $item->tags;
            $csfd->price = $item->price;
            $csfd->tel = $item->tel;
            $csfd->email = $item->email;
            $csfd->name = $item->name;
            $csfd->date_start = $item->date_start;
            $csfd->date_end = $item->date_end;
            $csfd->image = $item->image;
            $csfd->params = ($item->params) ? $csfd->makeStrParams($item->params) : '';

            $csfd->save();
            $counter++;
        }

        return view('admin.csfd.index',[
            'count' => $counter
        ]);
    }
}
