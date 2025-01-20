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
        $products = Product::with('categories', 'images')->get();
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
            'product_images.*' => 'image',
            'product_images' => 'max:3',
        ], [
            'categories.required' => 'Vui lòng chọn ít nhất một danh mục.',
            'categories.max' => 'Bạn chỉ được chọn tối đa 3 danh mục.',
            'product_images.*.image' => 'Tệp phải là hình ảnh.',
            'product_images.max' => 'Chỉ được tải lên tối đa 3 hình ảnh.',
        ]);

        // Tạo sản phẩm mới và lưu thông tin sản phẩm
        $product = Product::create($request->except('categories', 'product_images'));

        // Gán các danh mục đã chọn cho sản phẩm
        $product->categories()->sync($request->categories);

        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $file) {
                // Lưu file vào thư mục storage
                $path[] = $file->store('uploads/products', 'public');
                // Lưu thông tin vào database

            }
            $product->images()->create(['images' => json_encode($path)]);
        }


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
            'product_images.*' => 'image',
            'product_images' => 'max:3',
        ], [
            'categories.required' => 'Vui lòng chọn ít nhất một danh mục.',
            'categories.max' => 'Bạn chỉ được chọn tối đa 3 danh mục.',
            'product_images.*.image' => 'Tệp phải là hình ảnh.',
            'product_images.max' => 'Chỉ được tải lên tối đa 3 hình ảnh.',
        ]);

        $product = Product::findOrFail($id);

        $product->update($request->except('categories', 'product_images'));

        $product->categories()->sync($request->categories);

        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $file) {
                // Lưu file vào thư mục storage
                $path[] = $file->store('uploads/products', 'public');
                // Lưu thông tin vào database
            }
            $product->images()->create(['images' => json_encode($path)]);
        }

        return redirect()->route('admin.product.list')->with('success', 'Sản phẩm "' . $product->product_name . '" đã cập nhật thành công.');
    }


    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.list')->with('success', 'Đã xóa sản phẩm "' . $product->product_name . '" thành công.');
    }


    // HOÀN THIỆN LẠI EDIT HÌNH ẢNH
    // public function deleteImage($id)
    // {
    //     $image = ProductImage::findOrFail($id);
    //     $image->delete();

    //     return redirect()->back()->with('success', 'Đã xóa hình ảnh thành công.');
    // }

    public function viewDetails($id)
    {
        $product = Product::findOrFail($id); // Lấy thông tin sản phẩm
        return view('user.product.view-details', compact('product'));
    }
}
