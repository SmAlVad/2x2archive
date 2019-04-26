<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentBillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'recipient' => 'required',
            'inn'       => 'required|digits:10',
            'kpp'       => 'digits:9',
            'bank'      => 'required',
            'account'   => 'required|digits:20',
            'bik'       => 'required|digits:9',
            'ks'        => 'required|digits:20',
            'address'   => 'required',
            'phone'     => 'required|max:19',
        ];
    }
}
