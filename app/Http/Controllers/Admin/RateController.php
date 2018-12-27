<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rates.index', [
           'rates' => Rate::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Rate::create($request->all());

        return redirect()
            ->route('admin.rate.index')
            ->with('success', 'Новый тариф успешно добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rate = Rate::find($id);

        return view('admin.rates.edit', compact('rate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
            'time'  => 'required',
            'price' => 'required',
        ]);

        $rate = Rate::find($id);

        $rate->name     = $request->get('name');
        $rate->time     = $request->get('time');
        $rate->price    = $request->get('price');
        $rate->save();

        return redirect()
            ->route('admin.rate.index')
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
        $rate = Rate::find($id);

        $rate->delete();

        return redirect()
            ->route('admin.rate.index')
            ->with('success', 'Тариф успешно удален');
    }
}
