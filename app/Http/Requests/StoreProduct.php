<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'product_name' => 'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u|min:5|max:100',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug'=>'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u|min:5|max:100',
            'small_desc'=>'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u|min:5|max:100',
            'desc'=>'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u|min:5|max:100',
            'original_price'=>'required|integer|min:0',
            'selling_price'=>'required|integer|min:0',
            'qty'=>'required|integer|min:0',
            'tax'=>'required|integer|min:0',
        ];
    }


    public function messages()
    {
        return [

        ];
    }
}
