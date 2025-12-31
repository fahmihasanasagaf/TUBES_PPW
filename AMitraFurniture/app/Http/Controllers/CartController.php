<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display the cart page (INDEX METHOD - INI YANG KURANG!)
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $cartItems = [];
        $total = 0;

        // Load product details untuk setiap item di cart
        foreach ($cart as $productId => $details) {
            $product = Product::find($productId);
            
            if ($product) {
                $cartItems[] = [
                    'id' => $productId,
                    'product' => $product,
                    'quantity' => $details['quantity'],
                    'subtotal' => $product->price * $details['quantity']
                ];
                
                $total += $product->price * $details['quantity'];
            }
        }

        return view('dashboard.cart', compact('cartItems', 'total'));
    }

    /**
     * Add product to cart
     */
    public function add(Product $product, Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'nullable|integer|min:1'
        ]);

        $quantity = $validated['quantity'] ?? 1;
        $cart = session()->get('cart', []);
        $productId = $product->id;

        if (isset($cart[$productId])) {
            // Jika produk sudah ada, tambah quantity
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Jika produk belum ada, tambahkan baru
            $cart[$productId] = [
                'quantity' => $quantity,
                'added_at' => now()
            ];
        }

        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * View cart (alias untuk index - untuk backward compatibility)
     */
    public function view()
    {
        return $this->index();
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $validated['quantity'];
            session()->put('cart', $cart);
            
            return redirect()->back()->with('success', 'Keranjang berhasil diupdate!');
        }

        return redirect()->back()->with('error', 'Produk tidak ditemukan di keranjang.');
    }

    /**
     * Remove item from cart
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            
            return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
        }

        return redirect()->back()->with('error', 'Produk tidak ditemukan di keranjang.');
    }

    /**
     * Destroy/delete cart item (alias untuk remove)
     */
    public function destroy($id)
    {
        return $this->remove($id);
    }

    /**
     * Clear all cart items
     */
    public function clear()
    {
        session()->forget('cart');
        
        return redirect()->back()->with('success', 'Keranjang berhasil dikosongkan!');
    }

    /**
     * Get cart item count (untuk badge di navbar)
     */
    public function count()
    {
        $cart = session()->get('cart', []);
        $count = 0;
        
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        
        return response()->json(['count' => $count]);
    }
}