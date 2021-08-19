<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Basket;

class BasketRequest extends FormRequest
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
            'quantity' => 'required|int|min:0',
            'price' => 'required|numeric|min:0',
            'status' => 'required:' . Basket::STATUS_ACTIVE . ',' . Basket::STATUS_DRAFT,
            'source' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
        'name.required' => 'يجب إدخال الإسم',
        'quantity.required' => 'يجب إدخال الكمية ',
        'price.required' => 'يجب إدخال السعر ',
        'status.required' => 'يجب إدخال حالة الصرف',
        'source.required' => 'يجب إدخال مصدر السلة',
        ];
    }
}
