<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::with('categories')->get();
        return view('admin.product.list', compact('products'));
    }

    public function addProduct()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.product.add', compact('categories', 'products'));
    }

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

        return redirect()->route('admin.product.list')->with('success', 'Đã thêm sản phẩm "' . $product->product_name . '" thành công.');
    }


    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }


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

        return redirect()->route('admin.product.list')->with('success', 'Sản phẩm "' . $product->product_name . '" đã cập nhật thành công.');
    }


    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.list')->with('success', 'Đã xóa sản phẩm "' . $product->product_name . '" thành công.');
    }
}
