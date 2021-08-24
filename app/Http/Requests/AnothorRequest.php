<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Basket;

class AnothorRequest extends FormRequest
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
            'name' => 'required|max:255',
            'id_number' => 'required', 'exists:beneficiaries,id',
            'address' => 'required',
            //'quantity' => 'required',
            'basket_id' => 'required', 'exists:baskets,id',
        ];
    }
    public function messages()
    {
        return [
        'name.required' => 'يرجي إدخال إسم المستفيد',
        'id_number.required' => 'يرجي إدخال رقم الهوية  ',
        'address.required' => 'يرجي إدخال عنوان المستفيد ',
        //'name.required' => 'يرجي إدخال إسم المستفيد',
        'basket_id.required' => 'يرجي إختيار السلة ',
        ];
    }

    
}
