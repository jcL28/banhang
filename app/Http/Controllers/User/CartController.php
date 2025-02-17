<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        // session()->flush();
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['price'] * $item['quantity'];
        }, 0);

        return view('user.cart', compact('cart', 'total'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);  // Tìm sản phẩm trong cơ sở dữ liệu

        if (!$product) {
            return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại.');
        }

        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Thêm sản phẩm vào giỏ hàng

            $cart[$id] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => 1,
                'image' => $product->images ? json_decode($product->images->images, true)[0] : null,
            ];
        }
        // Lưu lại giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->route('home')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    public function remove(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        // return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }

    public function updateCart(Request $request)
    {
        session()->put('checkout', $request->quantities);
        return redirect()->route('checkout.show');
    }
}
