<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Basket;

class ExchangeRequest extends FormRequest
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
            'beneficiarie_id' => 'required|max:255',
            'basket_id' => 'required', 'exists:baskets,id',
        ];
    }
    public function messages()
    {
        return [
        'beneficiarie_id.required' => 'يرجي إدخال إسم المستفيد',
        'basket_id.required' => 'يرجي إختيار السلة ',
        ];
    }

    
}
