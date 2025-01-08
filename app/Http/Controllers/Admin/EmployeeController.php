<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function list()
    {
        $products = Product::with('categories')->get();
        return view('admin.employee.product.list', compact('products'));
    }

    // Thêm sản phẩm mới
    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.employee.product.add', compact('categories'));
    }

    // Xử lý thêm sản phẩm
    public function postAddProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_color' => 'required|string|max:255',
            'product_size' => 'required|string|max:255',
            'product_description' => 'required|string',
            'categories' => 'required|array|max:3',
        ], [
            'categories.required' => 'Vui lòng chọn ít nhất một danh mục.',
            'categories.max' => 'Bạn chỉ được chọn tối đa 3 danh mục.',
        ]);

        // Tạo sản phẩm mới và lưu thông tin sản phẩm
        $product = Product::create($request->except('categories'));

        // Gán các danh mục đã chọn cho sản phẩm
        $product->categories()->sync($request->categories);

        return redirect()->route('admin.employee.product.list')->with('success', 'Đã thêm sản phẩm "' . $product->product_name . '" thành công.');
    }

    // Chỉnh sửa sản phẩm
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.employee.product.edit', compact('product', 'categories'));
    }

    // Cập nhật thông tin sản phẩm
    public function postEditProduct(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_color' => 'required|string|max:255',
            'product_size' => 'required|string|max:255',
            'product_description' => 'required|string',
            'categories' => 'required|array|max:3',
        ], [
            'categories.required' => 'Vui lòng chọn ít nhất một danh mục.',
            'categories.max' => 'Bạn chỉ được chọn tối đa 3 danh mục.',
        ]);

        $product = Product::findOrFail($id);

        $product->update($request->except('categories'));

        $product->categories()->sync($request->categories);

        return redirect()->route('admin.employee.product.list')->with('success', 'Sản phẩm "' . $product->product_name . '" đã cập nhật thành công.');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin..employee.product.list')->with('success', 'Đã xóa sản phẩm "' . $product->product_name . '" thành công.');
    }
}
