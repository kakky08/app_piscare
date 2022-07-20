<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialStoreRequest extends FormRequest
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
            'store_postId' => 'required',
            'store_material' => 'required|string|max:30',
            'store_material_quantity' => 'required|max:30',
        ];
    }

    public function attributes()
    {
        return [
            'store_material' => '材料の名前',
            'store_material_quantity' => '材料の分量'
        ];
    }
}
