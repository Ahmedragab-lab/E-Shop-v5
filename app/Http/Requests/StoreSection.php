<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSection extends FormRequest
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
            'section_name' => 'required|regex:/^[0-9-أ-ي-pL\s\-]+$/u|min:5|max:100',
            // 'section_name_en' => 'required|regex:/^[A-Za-z0-9-pL\s\-]+$/u|min:5|max:100',
            'slug'=>'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u|min:5|max:100',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc'=>'required|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u|min:5|max:100',
        ];
    }


    public function messages()
    {
        return [

        ];
    }
}
