<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pdf;
use App\Models\Project;
use Illuminate\Support\Carbon;

class PdfController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pdf-list');
        $this->middleware('permission:pdf-create', ['only' => ['create','store']]);
        $this->middleware('permission:pdf-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pdf-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pdfs.index', [
            'pdfs' => Pdf::orderBy('id','DESK')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects       = Project::orderBy('sort', 'DESK')->pluck('name', 'id')->all();
        $releaseYears   = Pdf::getReleaseYear();
        $releaseMonth   = Pdf::getReleaseMonth();

        return view('admin.pdfs.create', compact('projects','releaseYears','releaseMonth'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file'   => 'required',
            'number' => 'required',
            'date'   => 'required'
        ]);

        $date       = Carbon::parse($request->get('date'));

        $project    = $request->get('project_id');
        $year       = $date->year;
        $month      = $date->month;
        $day        = $date->day;
        $number     = $request->get('number');
        $time       = time();

        $fileNameToStore = "{$project}_{$year}_{$month}_{$day}_{$number}_{$time}.pdf";
        $request->file('file')->storeAs('public/pdf', $fileNameToStore);

        $pdf = new Pdf();
        $pdf->project_id    = $project;
        $pdf->file_name     = $fileNameToStore;
        $pdf->year          = $year;
        $pdf->month         = $month;
        $pdf->day           = $day;
        $pdf->number        = $number;
        $pdf->created_by    = $request->user()->name;

        $pdf->save();

        return redirect()
            ->route('admin.pdf.index')
            ->with('success', 'Фаил успешно добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pdf            = Pdf::find($id);
        $projects       = Project::pluck('name', 'id')->all();

        $date = Pdf::getFormattedDate($pdf->year, $pdf->month, $pdf->day);

        return view('admin.pdfs.edit', compact('pdf','projects','date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @throws
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'number' => 'required',
            'date'   => 'required'
        ]);

        $project_id = $request->get('project_id');

        $date       = Carbon::parse($request->get('date'));

        $year       = $date->year;
        $month      = $date->month;
        $day        = $date->day;
        $number     = $request->get('number');
        $time       = time();

        if ($request->hasFile('file')) {
            $fileNameToStore = "{$project_id}_{$year}_{$month}_{$day}_{$number}_{$time}.pdf";
            $request->file('file')->storeAs('public/pdf', $fileNameToStore);
        }

        $pdf = Pdf::find($id);

        $pdf->project_id    = $project_id;
        if ($request->hasFile('file')) {
            $pdf->file_name = $fileNameToStore;
        }
        $pdf->year          = $year;
        $pdf->month         = $month;
        $pdf->day           = $day;
        $pdf->number        = $number;
        $pdf->created_by    = $request->user()->name;

        $pdf->save();

        return redirect()
            ->route('admin.pdf.index')
            ->with('success', 'Данные успешно обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rate = Pdf::find($id);

        $rate->delete();

        return redirect()
            ->route('admin.pdf.index')
            ->with('success', 'Успешно удалено');
    }
}
