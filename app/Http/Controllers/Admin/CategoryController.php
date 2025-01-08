<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::withCount('products')->get();
        return view('admin.category.list', compact('categories'));
    }

    public function addCategory()
    {
        return view('admin.category.add');
    }

    public function postAddCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $existingCategory = Category::where('category_name', $request->category_name)->first();

        if ($existingCategory) {
            return redirect()->route('admin.category.list')->with('error', 'Danh mục "' . $request->category_name . '" đã tồn tại.');
        }

        $category = Category::create($request->all());

        return redirect()->route('admin.category.list')->with('success', 'Danh mục "' . $category->category_name . '" đã thêm thành công.');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function postEditCategory(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);

        $existingCategory = Category::where('category_name', $request->category_name)
            ->where('id', '!=', $id)
            ->first();

        if ($existingCategory) {
            return redirect()->route('admin.category.list')
                ->with('error', 'Danh mục "' . $request->category_name . '" đã tồn tại.');
        }

        if ($category->category_name == $request->category_name) {
            return redirect()->route('admin.category.list')
                ->with('error', 'Bạn vừa nhập lại tên danh mục cũ là "' . $request->category_name . '".');
        }

        $category->update($request->all());

        return redirect()->route('admin.category.list')
            ->with('success', 'Danh mục "' . $category->category_name . '" đã chỉnh sửa thành công.');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.list')->with('success', 'Đã xóa danh mục "' . $category->category_name . '" thành công.');
    }
}