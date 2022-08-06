<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainImageRequest extends FormRequest
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
            'file' => 'required|image|mimes:jpg,png|max:1024|dimensions:max_width=1000',
        ];
    }

    public function attributes()
    {
        return [
            'file' => '画像'
        ];
    }
}
