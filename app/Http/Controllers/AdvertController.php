<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Csfd;
use App\Models\Category;

class AdvertController extends Controller
{
    public function index()
    {
        return view('advert.index', [
            'cats' => Category::where('parent_id', 0)->get()
        ]);
    }

    public function page(Request $request)
    {
        $section = Category::where('id', $request->section_id)->first();
        $type = Category::where('id', $request->type_id)->first();
        $subsections = Category::where('parent_id', $request->type_id)->get();

        $adverts = Csfd::where('cat1', $request->section_id)->where('cat2', $request->type_id)->paginate(15);

        return view('advert.page', [
            'section' => $section,
            'type' => $type,
            'subsections' => $subsections,
            'selected_subsection' => 0,
            'adverts' => $adverts
        ]);
    }

    public function search(Request $request, $section_id, $type_id)
    {
        $section = Category::where('id', $section_id)->first();
        $type = Category::where('id', $type_id)->first();

        $subsection = $request->input('subsection');

        $adverts = Csfd::where('cat1', $section_id)
            ->where('cat2', $type_id)
            ->where('cat3', $subsection)
            ->paginate(15);

        $subsections = Category::where('parent_id', $type_id)->get();

        return view('advert.page', [
            'section' => $section,
            'type' => $type,
            'subsections' => $subsections,
            'selected_subsection' => $subsection,
            'adverts' => $adverts
        ]);
    }
}
