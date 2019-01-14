<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;

class PaymentMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.payment-methods.index', [
            'paymentMethods' => PaymentMethod::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment-methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required',
            'name'      => 'required',
            'rk-label'  => 'required',
            'rk-alias'  => 'required'
        ]);

        $rkLabel    = $request->get('rk-label');
        $rkAlias    = $request->get('rk-alias');
        $time       = time();

        $extension          = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore    = "{$rkLabel}_{$rkAlias}_{$time}.{$extension}";
        $request->file('image')->storeAs('public/payment-methods', $fileNameToStore);

        $pM             = new PaymentMethod();
        $pM->name       = $request->get('name');
        $pM->rk_label   = $rkLabel;
        $pM->rk_alias   = $rkAlias;
        $pM->image      = $fileNameToStore;
        $pM->on_off     = $request->get('on-off');
        $pM->save();

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Новый способ оплаты успешно добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymentMethod = PaymentMethod::find($id);

        return view('admin.payment-methods.edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required',
            'rk-label'  => 'required',
            'rk-alias'  => 'required',
        ]);

        $rkLabel = $request->get('rk-label');
        $rkAlias = $request->get('rk-alias');

        if ($request->hasFile('image')) {
            $time               = time();
            $extension          = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore    = "{$rkLabel}_{$rkAlias}_{$time}.{$extension}";
            $request->file('image')->storeAs('public/payment-methods', $fileNameToStore);
        }

        $pM             = PaymentMethod::find($id);
        $pM->name       = $request->get('name');
        $pM->rk_label   = $rkLabel;
        $pM->rk_alias   = $rkAlias;
        if ($request->hasFile('image')) {
            $pM->image = $fileNameToStore;
        }
        $pM->on_off     = $request->get('on-off');
        $pM->save();

        return redirect()
            ->route('admin.payment-methods.index')
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
        $rate = PaymentMethod::find($id);

        $rate->delete();

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Способ оплаты успешно удален');
    }

    /**
     * Изменяет поле занчение поля On_Off
     *
     * @return \Illuminate\Http\Response
     */
    public function activeOn(Request $request)
    {
        $id = $request->get('id');
        $paymentMethod = PaymentMethod::find($id);

        $paymentMethod->on_off = 1;
        $paymentMethod->save();

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Способ оплаты активирован');
    }

    /**
     * Изменяет поле занчение поля On_Off
     *
     * @return \Illuminate\Http\Response
     */
    public function activeOff(Request $request)
    {
        $id = $request->get('id');
        $paymentMethod = PaymentMethod::find($id);

        $paymentMethod->on_off = 0;
        $paymentMethod->save();

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Способ оплаты отключен');
    }
}
