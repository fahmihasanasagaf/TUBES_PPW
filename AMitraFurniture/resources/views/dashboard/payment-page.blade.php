<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    {{-- Midtrans Snap Script --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg app-header sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">A Mitra Furniture</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-4">
                    <i class="fas fa-credit-card fa-4x mb-3" style="color: #429ff7;"></i>
                    <h2>Pembayaran</h2>
                    <p class="text-muted">Klik tombol di bawah untuk melanjutkan pembayaran</p>
                </div>
                
                {{-- Order Details --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-receipt me-2"></i>Detail Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <strong>Kode Order:</strong>
                            </div>
                            <div class="col-6 text-end">
                                {{ $order->order_code }}
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-6">
                                <strong>Status Pesanan:</strong>
                            </div>
                            <div class="col-6 text-end">
                                @if($order->status === 'processing')
                                    <span class="badge bg-info"><i class="fas fa-cog fa-spin me-1"></i>Sedang Dibuat</span>
                                @elseif($order->status === 'pending')
                                    <span class="badge bg-warning">Menunggu</span>
                                @elseif($order->status === 'completed')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-6">
                                <strong>Status Pembayaran:</strong>
                            </div>
                            <div class="col-6 text-end">
                                @if($order->payment_status === 'pending')
                                    <span class="badge bg-warning">Belum Dibayar</span>
                                @elseif($order->payment_status === 'paid')
                                    <span class="badge bg-success">Lunas</span>
                                @elseif($order->payment_status === 'failed')
                                    <span class="badge bg-danger">Gagal</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($order->payment_status) }}</span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        {{-- Order Items --}}
                        <h6 class="mb-3"><i class="fas fa-shopping-bag me-2"></i>Produk yang Dibeli:</h6>
                        @if($order->orderItems && $order->orderItems->count() > 0)
                            @foreach($order->orderItems as $item)
                                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                    <div>
                                        <strong>{{ $item->product->name }}</strong>
                                        <p class="text-muted mb-0">Qty: {{ $item->quantity }}</p>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-0">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                        <p class="text-muted mb-0">
                                            <small>Subtotal: Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</small>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- Fallback untuk old order structure --}}
                            @if($order->product)
                                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                    <div>
                                        <strong>{{ $order->product->name }}</strong>
                                        <p class="text-muted mb-0">Qty: {{ $order->quantity ?? 1 }}</p>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-0">Rp {{ number_format($order->product->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endif
                        @endif

                        <hr>

                        {{-- Alamat Pengiriman --}}
                        <div class="mb-3">
                            <h6><i class="fas fa-map-marker-alt me-2"></i>Alamat Pengiriman:</h6>
                            <p class="mb-1">{{ $order->alamat ?? '-' }}</p>
                            <p class="mb-0"><i class="fas fa-phone me-2"></i>{{ $order->nomor_telepon ?? '-' }}</p>
                        </div>

                        <hr>

                        {{-- Total --}}
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Total Pembayaran:</h5>
                            <h4 class="text-primary mb-0">Rp {{ number_format($order->total_price, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
                
                {{-- Payment Button --}}
                <div class="text-center">
                    <button id="pay-button" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-credit-card me-2"></i>Bayar Sekarang
                    </button>
                    <p class="text-muted mt-3 mb-0">
                        <small><i class="fas fa-lock me-1"></i>Pembayaran aman dengan Midtrans</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script type="text/javascript">
        // Debug: Check if snap is loaded
        console.log('Snap loaded:', typeof snap !== 'undefined');
        console.log('Client Key:', '{{ config('midtrans.client_key') }}');
        console.log('Snap Token:', '{{ $order->snap_token }}');
        
        document.getElementById('pay-button').onclick = function(){
            var snapToken = '{{ $order->snap_token }}';
            
            // MOCK MODE: Jika token dimulai dengan MOCK-, simulasikan pembayaran
            if (snapToken.startsWith('MOCK-')) {
                console.log('MOCK MODE: Simulating payment...');
                
                if (confirm('MODE DEMO: Midtrans credentials belum valid.\n\nSimulasikan pembayaran berhasil?')) {
                    // Redirect ke halaman sukses
                    window.location.href = '/orders';
                    return;
                }
                
                alert('Untuk menggunakan Midtrans real:\n\n' +
                      '1. Buka https://dashboard.midtrans.com/\n' +
                      '2. Login dan SWITCH ke mode SANDBOX\n' +
                      '3. Copy credentials yang dimulai dengan SB-\n' +
                      '4. Update file .env\n' +
                      '5. Run: php artisan config:clear');
                return;
            }
            
            // Check if snap is available
            if (typeof snap === 'undefined') {
                alert('Midtrans Snap belum ter-load. Silakan refresh halaman.');
                console.error('Snap is not loaded!');
                return;
            }
            
            // Check if token exists
            if (!snapToken) {
                alert('Token pembayaran tidak ditemukan. Silakan hubungi customer service.');
                console.error('Snap token is empty!');
                return;
            }
            
            console.log('Initiating payment with token:', snapToken);
            
            // Tampilkan Midtrans Snap
            snap.pay(snapToken, {
                onSuccess: function(result){
                    console.log('Payment success:', result);
                    window.location.href = '{{ route("payment.success", $order->id) }}';
                },
                onPending: function(result){
                    console.log('Payment pending:', result);
                    window.location.href = '{{ route("orders.index") }}';
                },
                onError: function(result){
                    console.log('Payment error:', result);
                    alert('Pembayaran gagal! Silakan coba lagi.');
                },
                onClose: function(){
                    console.log('Customer closed the popup without finishing the payment');
                    alert('Anda menutup halaman pembayaran. Anda dapat melanjutkan pembayaran dari halaman riwayat pesanan.');
                }
            });
        };
    </script>
</body>
</html>
