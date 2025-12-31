<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        return view('products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }

    /**
     * Show product detail page
     */
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        
        // Ambil produk sejenis (kategori yang sama, exclude produk ini)
        $relatedProducts = Product::where('category', $product->category)
                                  ->where('id', '!=', $product->id)
                                  ->limit(4)
                                  ->get();
        
        return view('dashboard.product-detail', compact('product', 'relatedProducts'));
    }
    
   public function checkout($id)
{
    $product = Product::findOrFail($id);

    return view('dashboard.checkout', compact('product'));
}

}