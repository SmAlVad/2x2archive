<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Csfd;
use App\Models\Category;

/**
 * Class AdvertController
 * @package App\Http\Controllers
 */
class AdvertController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('advert.index', [
            'cats' => Category::where('parent_id', 0)->get()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page(Request $request, $section_id, $type_id)
    {

        $section        = Category::find($section_id);
        $type           = Category::find($type_id);
        $subtypes       = Category::where('parent_id', $type_id)->get();

        return view('advert.page', [
            'section'               => $section,
            'type'                  => $type,
            'subtypes'              => $subtypes,
            'selected_subtype'      => 0,
        ]);
    }

    /**
     * @param Request $request
     * @param $section_id
     * @param $type_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, $section_id, $type_id)
    {
        // Подтип
        $subtype    = $request->input('subtype') ?? 0;

        $date_start    = $request->input('date-start');
        $date_end    = $request->input('date-end');

        $start_price = ($request->input('start-price')) ? $request->input('start-price') : 0;
        $end_price = $request->input('end-price');


        $adverts = Csfd::where('cat1', $section_id)
            ->where('date_start', '>=', $date_start)
            ->where('date_end', '<=', $date_end)
            ->where('price', '>=', $start_price)
            ->where('cat2', $type_id)
            ->where('cat3', $subtype)
            ->paginate(10);

        $adverts->appends(

            [
                'subtype' => $subtype,
                'date-start' => $date_start,
                'date-end' => $date_end,
                'start_price' => $start_price,
            ]

        );

        $section        = Category::find($section_id);
        $type           = Category::find($type_id);
        $subtypes       = Category::where('parent_id', $type_id)->get();

        return view('advert.page', [
            'section'               => $section,
            'type'                  => $type,
            'subtypes'              => $subtypes,
            'selected_subtype'      => $subtype,
            'adverts'               => $adverts,

            'date_start' => $date_start,
            'date_end' => $date_end,
            'start_price' => $start_price,
        ]);
    }
}
