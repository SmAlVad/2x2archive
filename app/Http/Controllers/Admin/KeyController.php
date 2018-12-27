<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Key;
use App\Models\Rate;
use App\Models\User;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:key-list');
        $this->middleware('permission:key-create', ['only' => ['create','store']]);
        $this->middleware('permission:key-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:key-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.key.index', [
            'keys' => Key::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.key.create', [
            'rates' => Rate::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $key = new Key();

        $randomInt = $key->generateKey();

        while ($key->keyExist($randomInt)) {
            $randomInt = $key->generateKey();
        }

        $key->key           = $randomInt;
        $key->rate_id       = $request->rate_id;
        $key->user_id       = $request->user_id;
        $key->created_by    = $request->user()->name;

        $key->save();

        return redirect()
            ->route('admin.key.index')
            ->with('success', "Новый ключ {$randomInt} успешно добавлен");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $key = Key::find($id);

        $key->delete();

        return redirect()
            ->route('admin.key.index')
            ->with('success', 'Ключ успешно удален');
    }
}
