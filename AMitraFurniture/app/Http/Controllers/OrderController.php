<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/keranjang')->with('error', 'Keranjang kosong');
        }

        $items = Product::whereIn('id', array_keys($cart))->get();
        return view('orders.checkout', compact('items', 'cart'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string',
            'metode_pembayaran' => 'required|in:transfer,cod'
        ]);

        $cart = session()->get('cart', []);
        $total = 0;

        $order = Order::create([
            'user_id' => Auth::id(),
            'alamat' => $validated['alamat'],
            'nomor_telepon' => $validated['nomor_telepon'],
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'status' => 'pending'
        ]);

        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            $subtotal = $product->price * $item['quantity'];
            $total += $subtotal;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $product->price
            ]);
        }

        $order->update(['total' => $total]);
        session()->forget('cart');

        return redirect("/pesanan/{$order->id}")->with('success', 'Pesanan berhasil dibuat');
    }

    public function index()
    {
        $orders = Auth::user()->orders()->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('orders.show', compact('order'));
    }
}