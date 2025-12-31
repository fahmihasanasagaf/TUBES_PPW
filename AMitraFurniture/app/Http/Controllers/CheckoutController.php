<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function pay(Request $request)
    {
        // ✅ Validasi
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // ✅ Ambil produk
        $product = Product::findOrFail($request->product_id);

        // ✅ Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // ✅ User (jika login)
        $user = Auth::user();

        // ✅ Buat Order di database
        $order = Order::create([
            'user_id' => $user?->id,
            'product_id' => $product->id,
            'order_code' => 'ORDER-' . time(),
            'total_price' => $product->price,
            'status' => 'pending',
        ]);

        // ✅ Parameter Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->order_code,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $user->name ?? 'Guest',
                'email' => $user->email ?? 'guest@mail.com',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'order_id' => $order->order_code,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat pembayaran',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
