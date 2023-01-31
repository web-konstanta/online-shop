<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'phone_number' => 'required|min:10',
            'message' => ''
        ];
    }

    public function messages()
    {
        return [
            'phone_number.required' => 'Номер телефона должен быть обязательно заполнен',
            'phone_number.min:10' => 'Введите номер телефона корректно'
        ];
    }
}
