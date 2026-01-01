@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-shipping-fast me-2"></i>Ringkasan Pengiriman</h5>
                </div>
                
                <div class="card-body">
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="card text-center bg-light">
                                <div class="card-body">
                                    <h2 class="text-warning">{{ $waitingShipment }}</h2>
                                    <p class="mb-0"><i class="fas fa-clock"></i> Menunggu Pengiriman</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center bg-info text-white">
                                <div class="card-body">
                                    <h2>{{ $shipping }}</h2>
                                    <p class="mb-0"><i class="fas fa-truck"></i> Sedang Dikirim</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center bg-success text-white">
                                <div class="card-body">
                                    <h2>{{ $delivered }}</h2>
                                    <p class="mb-0"><i class="fas fa-check-circle"></i> Pesanan Selesai</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($recentOrders->count() > 0)
                        <h6 class="mb-3">Aktivitas Pengiriman Terbaru</h6>
                        @foreach($recentOrders as $order)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1">{{ $order->user->name }}</h6>
                                            <div class="text-muted small mb-2">
                                                @if($order->orderItems && $order->orderItems->count() > 0)
                                                    @foreach($order->orderItems as $item)
                                                        <div>{{ $item->quantity }}x {{ $item->product->name }}</div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <small class="text-muted">
                                                <i class="far fa-clock"></i> {{ $order->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                        <div class="text-end">
                                            @if($order->status == 'processing')
                                                <span class="badge bg-warning text-dark">Menunggu Dikirim</span>
                                            @elseif($order->status == 'shipped')
                                                <span class="badge bg-info">Dalam Pengiriman</span>
                                            @elseif($order->status == 'delivered')
                                                <span class="badge bg-success">Selesai</span>
                                            @endif
                                            <div class="fw-bold mt-2">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
                                            <a href="{{ route('admin.pesanan.edit', $order) }}" class="btn btn-sm btn-outline-primary mt-2">
                                                <i class="fas fa-edit"></i> Ubah Status
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle fa-2x mb-2"></i>
                            <p class="mb-0">Belum ada aktivitas pengiriman</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
