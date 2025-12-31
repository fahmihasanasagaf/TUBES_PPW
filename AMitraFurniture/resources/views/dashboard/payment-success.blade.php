<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
</head>
<body>
    <!-- Header/Navbar -->
    <nav @class(['navbar', 'navbar-expand-lg', 'app-header', 'sticky-top'])>
        <div @class(['container'])>
            <a @class(['navbar-brand', 'fw-bold']) href="{{ route('home') }}">A Mitra Furniture</a>
        </div>
    </nav>

    <div @class(['container', 'py-4'])>
        <div @class(['text-center', 'py-5'])>
            <div @class(['success-icon', 'mb-4'])>
                <div @class(['success-icon-inner'])>
                    <i @class(['fas', 'fa-check'])></i>
                </div>
            </div>
            
            <h4 @class(['mb-4'])>Terimakasih atas pembelian anda</h4>
            <p @class(['text-muted', 'mb-4'])>Pesanan Anda sedang diproses dan akan segera dikirim</p>
            
            @if(isset($order))
            <div @class(['alert', 'alert-info', 'mb-4'])>
                <p @class(['mb-2'])><strong>Nomor Pesanan:</strong> #{{ $order->id }}</p>
                <p @class(['mb-2'])><strong>Total Pembayaran:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                <p @class(['mb-0'])><strong>Metode Pembayaran:</strong> {{ ucfirst($order->payment_method) }}</p>
                @if($order->bank)
                    <p @class(['mb-0'])><strong>Bank:</strong> {{ strtoupper($order->bank) }}</p>
                @elseif($order->ewallet)
                    <p @class(['mb-0'])><strong>E-Wallet:</strong> {{ strtoupper($order->ewallet) }}</p>
                @endif
            </div>
            @endif

            <div @class(['checkout-section', 'text-start', 'mb-4'])>
                <h6 @class(['mb-3'])><i @class(['fas', 'fa-info-circle', 'me-2'])></i>Informasi Pembayaran</h6>
                @if(isset($order) && $order->payment_method === 'transfer' && $order->bank)
                    <p @class(['mb-2'])>Silakan lakukan transfer ke rekening berikut:</p>
                    <div @class(['alert', 'alert-warning'])>
                        <p @class(['mb-1'])><strong>Bank:</strong> {{ strtoupper($order->bank) }}</p>
                        <p @class(['mb-1'])><strong>Nomor Rekening:</strong> 
                            @if($order->bank === 'mandiri')
                                1370013456789
                            @elseif($order->bank === 'bni')
                                0123456789
                            @elseif($order->bank === 'bri')
                                001201234567890
                            @endif
                        </p>
                        <p @class(['mb-0'])><strong>Atas Nama:</strong> A Mitra Furniture</p>
                    </div>
                @elseif(isset($order) && $order->payment_method === 'ewallet' && $order->ewallet)
                    <p @class(['mb-2'])>Silakan lakukan pembayaran ke nomor {{ strtoupper($order->ewallet) }} berikut:</p>
                    <div @class(['alert', 'alert-warning'])>
                        <p @class(['mb-1'])><strong>Nomor {{ strtoupper($order->ewallet) }}:</strong> 081234567890</p>
                        <p @class(['mb-0'])><strong>Atas Nama:</strong> A Mitra Furniture</p>
                    </div>
                @elseif(isset($order) && $order->payment_method === 'cod')
                    <div @class(['alert', 'alert-success'])>
                        <p @class(['mb-0'])><i @class(['fas', 'fa-check-circle', 'me-2'])></i>Pembayaran akan dilakukan saat barang diterima (COD)</p>
                    </div>
                @endif
                
                <p @class(['text-muted', 'small', 'mb-0'])>
                    <i @class(['fas', 'fa-clock', 'me-2'])></i>Pesanan akan diproses setelah pembayaran dikonfirmasi
                </p>
            </div>
            
            <a href="{{ route('orders.index') }}" @class(['btn', 'btn-primary-custom', 'w-100', 'py-3', 'mb-3'])>
                <i @class(['fas', 'fa-receipt', 'me-2'])></i>Lihat Pesanan
            </a>
            <a href="{{ route('home') }}" @class(['btn', 'btn-outline-primary', 'w-100', 'py-3'])>
                <i @class(['fas', 'fa-shopping-bag', 'me-2'])></i>Kembali Berbelanja
            </a>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav @class(['bottom-nav', 'fixed-bottom'])>
        <div @class(['container'])>
            <div @class(['row'])>
                <div @class(['col-3', 'bottom-nav-item'])>
                    <a href="{{ route('home') }}" @class(['text-decoration-none', 'text-dark'])>
                        <i @class(['fas', 'fa-home'])></i>
                        <div @class(['small'])>Home</div>
                    </a>
                </div>
                <div @class(['col-3', 'bottom-nav-item'])>
                    <a href="{{ route('cart.index') }}" @class(['text-decoration-none', 'text-dark'])>
                        <i @class(['fas', 'fa-shopping-cart'])></i>
                        <div @class(['small'])>Cart</div>
                    </a>
                </div>
                <div @class(['col-3', 'bottom-nav-item'])>
                    <a href="#" @class(['text-decoration-none', 'text-dark'])>
                        <i @class(['fas', 'fa-bell'])></i>
                        <div @class(['small'])>Notifikasi</div>
                    </a>
                </div>
                <div @class(['col-3', 'bottom-nav-item'])>
                    <a href="{{ route('profile.show') }}" @class(['text-decoration-none', 'text-dark'])>
                        <i @class(['fas', 'fa-user'])></i>
                        <div @class(['small'])>Profile</div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>