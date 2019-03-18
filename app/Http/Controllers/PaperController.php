<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;

/**
 * Контроллер изданий
 *
 * Class PaperController
 * @package App\Http\Controllers
 */
class PaperController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $project_id = 1;
        $year       = 2014;
        $month      = 1;

        return view('paper.index', compact('project_id','year','month'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $project_id = $request->get('project');
        $year       = $request->get('year');
        $month      = $request->get('month');

        $pdfs = Pdf::where('project_id', $project_id)
            ->where('year', $year)
            ->where('month', $month)
            ->orderBy('day')
            ->get();

        return view('paper.index', compact('pdfs', 'project_id','year','month'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $pdf = Pdf::find($id);

        return view('paper.show', compact('pdf'));
    }
}
