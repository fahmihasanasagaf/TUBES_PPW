<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        // Get order statistics
        $ordersYesterday = Order::where('user_id', $user->id)
            ->whereDate('created_at', Carbon::yesterday())
            ->with('orderItems.product')
            ->latest()
            ->get();
            
        $ordersPaid = Order::where('user_id', $user->id)
            ->where('payment_status', 'paid')
            ->with('orderItems.product')
            ->latest()
            ->get();
            
        $ordersUnpaid = Order::where('user_id', $user->id)
            ->where('payment_status', 'pending')
            ->with('orderItems.product')
            ->latest()
            ->get();
            
        $ordersProcessing = Order::where('user_id', $user->id)
            ->where('status', 'processing')
            ->with('orderItems.product')
            ->latest()
            ->get();
            
        $ordersShipping = Order::where('user_id', $user->id)
            ->where('status', 'shipped')
            ->with('orderItems.product')
            ->latest()
            ->get();
        
        return view('dashboard.profile', compact(
            'user', 
            'ordersYesterday', 
            'ordersPaid', 
            'ordersUnpaid', 
            'ordersProcessing', 
            'ordersShipping'
        ));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id()
        ]);

        Auth::user()->update($validated);
        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
}