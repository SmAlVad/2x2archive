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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PaymentMethod::create($request->all());

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
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required',
            'robokassa' => 'required',
        ]);

        $paymentMethod = PaymentMethod::find($id);

        $paymentMethod->name        = $request->get('name');
        $paymentMethod->robokassa   = $request->get('robokassa');
        $paymentMethod->image       = $request->get('image');
        $paymentMethod->on_off      = $request->get('on_off');
        $paymentMethod->save();

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
    public function activeOn()
    {
        $id             = $_POST['id'];
        $paymentMethod  = PaymentMethod::find($id);

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
    public function activeOff()
    {
        $id             = $_POST['id'];
        $paymentMethod  = PaymentMethod::find($id);

        $paymentMethod->on_off = 0;
        $paymentMethod->save();

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Способ оплаты отключен');
    }

    /**
     * Загружает фаил с изображением логотипа способа плотежа
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadImage(Request $request)
    {
       $path = $request->file('image')->store('payment-methods', 'public');

       return view('admin.payment-methods.create', compact('path'));
    }
}
