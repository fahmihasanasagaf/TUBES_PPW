<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    /* ==============================
       HALAMAN CHECKOUT
    ============================== */
    public function checkout()
    {
        return view('checkout');
    }

    /* ==============================
       PROSES PEMBAYARAN
    ============================== */
    public function pay(Request $request, $id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($id);

        // Buat order
        $order = Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'order_code' => 'ORD-' . time(),
            'total_price' => $product->price,
            'payment_method' => 'midtrans',
            'payment_status' => 'pending',
            'status' => 'pending',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $order->order_code,
                'gross_amount' => (int) $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $order->update([
            'snap_token' => $snapToken
        ]);

        return response()->json([
            'snap_token' => $snapToken,
            'order_id' => $order->id
        ]);
    }

    /* ==============================
       CALLBACK MIDTRANS
    ============================== */
    public function callback(Request $request)
    {
        $serverKey = config('services.midtrans.server_key');

        $signature = hash(
            "sha512",
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($signature !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $order = Order::where('order_code', $request->order_id)->first();

        if ($order) {
            if ($request->transaction_status == 'settlement') {
                $order->update([
                    'payment_status' => 'paid',
                    'status' => 'paid'
                ]);
            }
        }

        return response()->json(['status' => 'success']);
    }

    /* ==============================
       HALAMAN BERHASIL
    ============================== */
    public function paymentSuccess($order)
    {
        $order = Order::findOrFail($order);
        return view('payment-success', compact('order'));
    }

    /* ==============================
       LIST ORDER USER
    ============================== */
    public function index()
{
    $orders = Order::where('user_id', Auth::id())->latest()->get();
    return view('dashboard.order-history', compact('orders'));
}


    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
