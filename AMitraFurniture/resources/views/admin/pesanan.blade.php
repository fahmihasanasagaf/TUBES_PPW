@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Daftar Pesanan</h5>
                    <span class="badge bg-light text-dark">{{ $orders->total() }} Pesanan</span>
                </div>
                
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($orders->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Kode Order</th>
                                    <th>Customer</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status Pesanan</th>
                                    <th>Status Pembayaran</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td><strong>{{ $order->order_code }}</strong></td>
                                    <td>
                                        <div><strong>{{ $order->user->name }}</strong></div>
                                        <small class="text-muted">{{ $order->user->email }}</small>
                                    </td>
                                    <td>
                                        @if($order->orderItems && $order->orderItems->count() > 0)
                                            <div class="small">
                                                @foreach($order->orderItems->take(2) as $item)
                                                    <div>{{ $item->quantity }}x {{ $item->product->name }}</div>
                                                @endforeach
                                                @if($order->orderItems->count() > 2)
                                                    <div class="text-muted">+{{ $order->orderItems->count() - 2 }} lainnya</div>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td><strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong></td>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="badge bg-warning text-dark"><i class="fas fa-clock"></i> Pending</span>
                                        @elseif($order->status == 'processing')
                                            <span class="badge bg-info"><i class="fas fa-cog"></i> Processing</span>
                                        @elseif($order->status == 'shipped')
                                            <span class="badge bg-primary"><i class="fas fa-shipping-fast"></i> Dikirim</span>
                                        @elseif($order->status == 'delivered')
                                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> Selesai</span>
                                        @elseif($order->status == 'cancelled')
                                            <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Dibatalkan</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->payment_status == 'pending')
                                            <span class="badge bg-warning text-dark">Belum Bayar</span>
                                        @elseif($order->payment_status == 'paid')
                                            <span class="badge bg-success">Sudah Bayar</span>
                                        @elseif($order->payment_status == 'failed')
                                            <span class="badge bg-danger">Gagal</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>{{ $order->created_at->format('d/m/Y') }}</div>
                                        <small class="text-muted">{{ $order->created_at->format('H:i') }}</small>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pesanan.edit', $order) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $orders->links() }}
                    </div>
                    @else
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle fa-2x mb-2"></i>
                        <p class="mb-0">Belum ada pesanan</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
