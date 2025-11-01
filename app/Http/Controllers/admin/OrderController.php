<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('user')->latest();

        if ($request->has('status') && $request->status != 'all') {
            $orders->where('status', $request->status);
        }

        if ($request->filled('q')) {
            $orders->where('order_number', 'like', "%{$request->q}%");
        }

        $orders = $orders->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'items'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('admin.orders.index')->with('success', 'سفارش با موفقیت حذف شد.');
    }
}

