<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        $cart = session()->get('checkout', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['price'] * $item['quantity'];
        }, 0);

        return view('user.checkout', compact('total'));
    }

    public function processCheckout(Request $request)
    {
        $checkoutItems = session()->get('checkout');
        $request->merge([
            'total_price' => array_reduce($checkoutItems, function ($sum, $item) {
                return $sum + $item['price'] * $item['quantity'];
            }, 0),
            'user_name' => $request->name,
            'user_email' => $request->email,
            'user_address' => $request->address,
            'user_id' => Auth::id(),
            'status' => '0', // Pending
        ]);
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255',
            'user_address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'total_price' => 'required|numeric',
        ]);
        $orderData = $request->except(['_token', 'name', 'email', 'address', 'phone']);
        $order = Order::create($orderData);

        $cartItems = session()->get('cart');

        foreach ($cartItems as $key => $item) {
               OrderItem::create([

                'order_id' => $order->id,
                'product_id' => $key,
                'product_name' => $item['name'],
                'quantity' => $checkoutItems[$key]['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Cảm ơn bạn đã mua hàng! Đơn hàng của bạn đã được tạo.');
    }
}
