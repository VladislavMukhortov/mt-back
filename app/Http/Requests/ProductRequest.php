<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|alpha|min:2|max:20',
            'description' => 'nullable|alpha|min:3|max:500',
            'price' => 'required|numeric',
            'items_left' => 'required|numeric',
            'category_id' => 'required|numeric',
        ];
    }
}
