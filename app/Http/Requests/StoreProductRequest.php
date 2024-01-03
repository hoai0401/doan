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
            'image' => ['required', 'image'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên sản phẩm.',
            'name.unique' => 'Tên sản phẩm đã tồn tại.',
            'name.max' => 'Tên sản phẩm không được vượt quá 100 ký tự.',
            'price.required' => 'Giá sản phẩm là trường bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.integer' => 'Giá sản phẩm phải là số nguyên.',
            'price.min' => 'Giá sản phẩm không được nhỏ hơn 0.',
            'category.required' => 'Chưa có danh mục sản phẩm.',
            'category.exists' => 'Danh mục sản phẩm không hợp lệ.',
            'description.required' => 'Chưa có mô tả sản phẩm.',
            'stock_quantity.required' => 'Chưa có số lượng sản phẩm.',
            'stock_quantity.numeric' => 'Số lượng tồn kho phải là một số.',
            'stock_quantity.integer' => 'Số lượng tồn kho phải là số nguyên.',
            'stock_quantity.min' => 'Số lượng tồn kho không được nhỏ hơn 0.',
            'image.required' => 'Chưa có hình ảnh sản phẩm.',
            'image.image' => 'Tệp tin phải là một hình ảnh.',
        ];
    }

}
