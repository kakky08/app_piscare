<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcedureUpdateRequest extends FormRequest
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
            'update_file' => 'image|mimes:jpg,png|max:1024|dimensions:max_width=1000',
            'update_procedure' => 'required|max:300'
        ];
    }

    public function attributes()
    {
        return [
            'update_file' => '画像',
            'update_procedure' => '手順の説明'
        ];
    }
}
