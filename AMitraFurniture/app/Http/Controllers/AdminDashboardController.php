<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total penjualan (hanya yang sudah dibayar)
        $totalRevenue = Order::where('payment_status', 'paid')->sum('total_price');
        
        // Pesanan baru hari ini
        $newOrdersToday = Order::whereDate('created_at', today())->count();
        
        // Total pesanan
        $totalOrders = Order::count();
        
        // Total produk
        $totalProducts = Product::count();
        
        // Total pelanggan
        $totalCustomers = User::where('is_admin', 0)->count();
        
        // Pesanan pending
        $pendingOrders = Order::where('payment_status', 'pending')->count();
        
        // Produk stok rendah (< 10)
        $lowStockProducts = Product::where('stock', '<', 10)->count();
        
        // Pesanan terbaru (5 terakhir)
        $recentOrders = Order::with(['user', 'orderItems.product'])
            ->latest()
            ->take(5)
            ->get();
        
        // Produk terlaris (berdasarkan jumlah order)
        $topProducts = Product::withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->take(5)
            ->get()
            ->filter(function($product) {
                return $product->orders_count > 0;
            });
        
        // Statistik bulanan (6 bulan terakhir)
        $monthlyStats = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyStats[] = [
                'month' => $date->format('M'),
                'orders' => Order::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'revenue' => Order::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->where('payment_status', 'paid')
                    ->sum('total_price')
            ];
        }
        
        return view('admin.dashboard', compact(
            'totalRevenue',
            'newOrdersToday',
            'totalOrders',
            'totalProducts',
            'totalCustomers',
            'pendingOrders',
            'lowStockProducts',
            'recentOrders',
            'topProducts',
            'monthlyStats'
        ));
    }
}
