<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'customer_name' => 'required|string|max:25',
        'customer_email' => 'required|string|email|max:30',
        'street' => 'required|string|max:255',
        'city' =>'required|string|max:25',
        'customer_phone' => 'required|string|max:14',
        'postcode' => 'required|string|max:5',
        ];
    }
}
