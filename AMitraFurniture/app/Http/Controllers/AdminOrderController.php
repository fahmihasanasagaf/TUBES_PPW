<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of orders
     */
    public function index()
    {
        $orders = Order::with(['user', 'orderItems.product'])->latest()->paginate(15);
        return view('admin.pesanan', compact('orders'));
    }

    /**
     * Show form to edit order status
     */
    public function edit(Order $order)
    {
        return view('admin.pesanan-edit', compact('order'));
    }

    /**
     * Update order status
     */
    public function update(Request $request, Order $order)
    {

        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            'payment_status' => 'required|in:pending,paid,failed',
        ]);


        $order->update([
            'status' => $validated['status'],
            'payment_status' => $validated['payment_status'],
        ]);

        return redirect()->route('admin.pesanan.index')
            ->with('success', 'Status pesanan berhasil diperbarui');
    }

    /**
     * Display shipping overview
     */
    public function shipping()
    {
        $waitingShipment = Order::where('status', 'processing')
            ->where('payment_status', 'paid')
            ->count();
        
        $shipping = Order::where('status', 'shipped')->count();
        
        $delivered = Order::where('status', 'delivered')->count();
        
        $recentOrders = Order::with(['user', 'orderItems.product'])
            ->whereIn('status', ['processing', 'shipped', 'delivered'])
            ->latest()
            ->take(10)
            ->get();
        
        return view('admin.pengiriman', compact('waitingShipment', 'shipping', 'delivered', 'recentOrders'));
    }
}
