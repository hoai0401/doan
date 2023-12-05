<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:products', 'max:100'],
            'price' => ['required', 'numeric', 'integer', 'min:0'],
            'category' => ['required', 'exists:categories,id'],
            'description' => ['required'],
            'stock_quantity' => ['required', 'numeric', 'integer', 'min:0'],
            'image' => ['required', 'mimes:jpg,png,bmp'],
        ];
    }
}
