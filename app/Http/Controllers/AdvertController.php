<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Csfd;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

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
            'show_explain'          => true,
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
        $subtype        = $request->input('subtype');

        $date_start     = $request->input('date-start');
        $date_end       = $request->input('date-end');

        $start_price = $request->input('start-price');

        $variables = [];


        if ($request->input('end-price')) {

/*            ALTER TABLE `csfds` CHANGE `price` `price` INT(191) NOT NULL COMMENT 'Цена';*/

            $end_price = $request->input('end-price');

            $adverts = Csfd::where('cat1', $section_id)
                ->where('cat2', $type_id)
                ->where('cat3', $subtype)
                ->whereBetween('date_start', [$date_start, $date_end])
                ->where('price', '>=', $start_price)
                ->where('price', '<', $end_price)
                ->get();

            $variables += [ 'end_price' => $end_price ];

        } else {

            $adverts = Csfd::where('cat1', $section_id)
                ->where('cat2', $type_id)
                ->where('cat3', $subtype)
                ->whereBetween('date_start', [$date_start, $date_end])
                ->where('price', '>=', $start_price)
                ->get();

        }


        $section        = Category::find($section_id);
        $type           = Category::find($type_id);
        $subtypes       = Category::where('parent_id', $type_id)->get();

        $variables += [
            'section'               => $section,
            'type'                  => $type,
            'subtypes'              => $subtypes,
            'selected_subtype'      => $subtype,
            'adverts'               => $adverts,

            'date_start'            => $date_start,
            'date_end'              => $date_end,
            'start_price'           => $start_price
        ];

        return view('advert.page', $variables);
    }
}
