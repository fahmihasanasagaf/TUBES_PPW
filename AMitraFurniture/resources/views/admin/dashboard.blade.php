@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h3 class="fw-bold"><i class="fas fa-chart-line me-2"></i>Dashboard Owner</h3>
            <p class="text-muted">A Mitra Furniture Store - {{ now()->format('l, d F Y') }}</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block mb-1">Total Penjualan</small>
                            <h4 class="fw-bold mb-0">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h4>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block mb-1">Pesanan Hari Ini</small>
                            <h4 class="fw-bold mb-0">{{ $newOrdersToday }}</h4>
                            <small class="text-muted">Total: {{ $totalOrders }}</small>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-shopping-cart fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block mb-1">Total Produk</small>
                            <h4 class="fw-bold mb-0">{{ $totalProducts }}</h4>
                            @if($lowStockProducts > 0)
                                <small class="text-warning"><i class="fas fa-exclamation-triangle"></i> {{ $lowStockProducts }} stok rendah</small>
                            @endif
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-box fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block mb-1">Total Pelanggan</small>
                            <h4 class="fw-bold mb-0">{{ number_format($totalCustomers) }}</h4>
                            @if($pendingOrders > 0)
                                <small class="text-danger"><i class="fas fa-clock"></i> {{ $pendingOrders }} pending</small>
                            @endif
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts & Tables Row -->
    <div class="row g-3 mb-4">
        <!-- Sales Chart -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0 fw-bold"><i class="fas fa-chart-bar me-2"></i>Statistik Penjualan (6 Bulan Terakhir)</h6>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height="80"></canvas>
                </div>
            </div>
        </div>

        <!-- Top Products -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0 fw-bold"><i class="fas fa-trophy me-2"></i>Produk Terlaris</h6>
                </div>
                <div class="card-body">
                    @if($topProducts->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($topProducts as $index => $product)
                                <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-primary rounded-pill me-2">{{ $index + 1 }}</span>
                                        <div>
                                            <div class="fw-bold">{{ Str::limit($product->name, 20) }}</div>
                                            <small class="text-muted">{{ $product->orders_count }} terjual</small>
                                        </div>
                                    </div>
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" class="rounded" 
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-muted py-3">
                            <i class="fas fa-box-open fa-2x mb-2"></i>
                            <p class="mb-0">Belum ada penjualan</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold"><i class="fas fa-list me-2"></i>Pesanan Terbaru</h6>
                    <a href="{{ route('admin.pesanan.index') }}" class="btn btn-sm btn-outline-primary">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body">
                    @if($recentOrders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Kode Order</th>
                                        <th>Customer</th>
                                        <th>Produk</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentOrders as $order)
                                        <tr>
                                            <td><strong>{{ $order->order_code }}</strong></td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>
                                                @if($order->orderItems->count() > 0)
                                                    {{ Str::limit($order->orderItems->first()->product->name, 30) }}
                                                    @if($order->orderItems->count() > 1)
                                                        <small class="text-muted">+{{ $order->orderItems->count() - 1 }} lainnya</small>
                                                    @endif
                                                @endif
                                            </td>
                                            <td><strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong></td>
                                            <td>
                                                @if($order->payment_status == 'paid')
                                                    <span class="badge bg-success">Dibayar</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @endif
                                            </td>
                                            <td><small>{{ $order->created_at->diffForHumans() }}</small></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                            <p class="mb-0">Belum ada pesanan</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_column($monthlyStats, 'month')) !!},
            datasets: [
                {
                    label: 'Pesanan',
                    data: {!! json_encode(array_column($monthlyStats, 'orders')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    yAxisID: 'y'
                },
                {
                    label: 'Pendapatan (Juta Rp)',
                    data: {!! json_encode(array_map(function($val) { return $val / 1000000; }, array_column($monthlyStats, 'revenue'))) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    type: 'line',
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Jumlah Pesanan'
                    }
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Pendapatan (Juta Rp)'
                    },
                    grid: {
                        drawOnChartArea: false,
                    },
                }
            }
        }
    });
</script>

@endsection
