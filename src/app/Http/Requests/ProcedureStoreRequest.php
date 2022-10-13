<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcedureStoreRequest extends FormRequest
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
            'post_id' => 'required',
            'file' => 'required|image|max:1024|dimensions:max_width=2000',
            'procedure' => 'required|max:300'
        ];
    }

    public function attributes()
    {
        return [
            'file' => '画像',
            'procedure' => '手順の説明'
        ];
    }
}
