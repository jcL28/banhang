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

    public function deliveringOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = '3'; // Delivering
        $order->save();

        return redirect()->route('admin.order.list')->with('success', 'Đơn hàng đang được giao.');
    }

    public function deliveredOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = '4'; // Delivered
        $order->save();

        return redirect()->route('admin.order.list')->with('success', 'Đơn hàng đã được giao.');
    }

    public function paidOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = '5'; // Paid
        $order->save();

        return redirect()->route('admin.order.list')->with('success', 'Đơn hàng này đã được thanh toán.');
    }

    public function showOrderTrackingForm()
    {
        return view('user.order-tracking');
    }

    public function trackOrder(){

    }
}
