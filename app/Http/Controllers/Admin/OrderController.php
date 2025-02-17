<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function list()
    {
        $orders = Order::all();
        //dd($orders);
        return view('admin.manage.order.list', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.manage.order.detail', compact('order'));
    }
    public function approveOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = '1'; // Approved
        $order->save();

        return redirect()->route('admin.order.list')->with('success', 'Đơn hàng đã được duyệt.');
    }

    public function rejectOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = '2'; // Rejected
        $order->save();

        return redirect()->route('admin.order.list')->with('success', 'Đã từ chối đơn hàng.');
    }
}
