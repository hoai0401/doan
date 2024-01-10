<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = Category::all();
        return view('admin_category.category-index', ['categories' => $categories]);
    }


    public function create()
    {
        return view('admin_category.category-create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index')->with('success', 'Loại sản phẩm đã được thêm thành công.');
    }

    public function edit(Category $category)
    {
        return view('admin_category.category-edit', ['category' => $category]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        if ($request->has('description')) {
            $category->description = $request->description;
        }

        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Loại sản phẩm đã được cập nhật thành công.');
    }
    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Loại sản phẩm đã được xóa thành công.');
    }
}
