<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
</head>
<body>
    <!-- Header/Navbar -->
    <nav @class(['navbar', 'navbar-expand-lg', 'app-header', 'sticky-top'])>
        <div @class(['container'])>
            <a @class(['navbar-brand', 'fw-bold']) href="{{ route('home') }}">A Mitra Furniture</a>
            <button @class(['navbar-toggler']) type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span @class(['navbar-toggler-icon'])></span>
            </button>
            <div @class(['collapse', 'navbar-collapse']) id="navbarNav">
                <ul @class(['navbar-nav', 'ms-auto'])>
                    <li @class(['nav-item'])>
                        <a @class(['nav-link']) href="{{ route('home') }}">Home</a>
                    </li>
                    <li @class(['nav-item'])>
                        <a @class(['nav-link']) href="{{ route('cart.index') }}">Keranjang</a>
                    </li>
                    <li @class(['nav-item'])>
                        <a @class(['nav-link', 'active']) href="{{ route('orders.index') }}">Pesanan</a>
                    </li>
                    <li @class(['nav-item', 'dropdown'])>
                        <a @class(['nav-link', 'dropdown-toggle']) href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul @class(['dropdown-menu'])>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" @class(['dropdown-item'])>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div @class(['screen', 'active']) style="margin-bottom: 80px;">
        <div @class(['container', 'py-4'])>
            <h2 @class(['mb-4'])>
                <i @class(['fas', 'fa-box'])></i> Pesanan Saya
            </h2>

            {{-- Alert Messages --}}
            @if(session('success'))
                <div @class(['alert', 'alert-success', 'alert-dismissible', 'fade', 'show'])>
                    {{ session('success') }}
                    <button type="button" @class(['btn-close']) data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div @class(['alert', 'alert-danger', 'alert-dismissible', 'fade', 'show'])>
                    {{ session('error') }}
                    <button type="button" @class(['btn-close']) data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($orders->isEmpty())
                <div @class(['text-center', 'py-5'])>
                    <i @class(['fas', 'fa-box-open', 'fa-5x', 'text-muted', 'mb-3'])></i>
                    <h4>Belum Ada Pesanan</h4>
                    <p @class(['text-muted'])>Anda belum memiliki pesanan.</p>
                    <a href="{{ route('home') }}" @class(['btn', 'btn-primary', 'mt-3'])>
                        <i @class(['fas', 'fa-shopping-bag'])></i> Belanja Sekarang
                    </a>
                </div>
            @else
                @foreach($orders as $order)
                    <div @class(['card', 'mb-3'])>
                        <div @class(['card-body'])>
                            <div @class(['row'])>
                                <div @class(['col-md-8'])>
                                    <div @class(['d-flex', 'justify-content-between', 'align-items-start', 'mb-2'])>
                                        <div>
                                            <h6 @class(['mb-1'])>Order #{{ $order->id }}</h6>
                                            <small @class(['text-muted'])>
                                                <i @class(['fas', 'fa-calendar'])></i> 
                                                {{ $order->created_at->format('d M Y, H:i') }}
                                            </small>
                                        </div>
                                        <span class="badge 
                                            @if($order->status == 'pending') bg-warning
                                            @elseif($order->status == 'diproses') bg-info
                                            @elseif($order->status == 'dikirim') bg-primary
                                            @elseif($order->status == 'selesai') bg-success
                                            @else bg-danger
                                            @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </div>

                                    <div @class(['mb-2'])>
                                        <small @class(['text-muted'])>
                                            <i @class(['fas', 'fa-map-marker-alt'])></i> {{ Str::limit($order->alamat, 50) }}
                                        </small>
                                    </div>

                                    <div @class(['mb-2'])>
                                        <small @class(['text-muted'])>
                                            <i @class(['fas', 'fa-credit-card'])></i> 
                                            {{ $order->metode_pembayaran == 'transfer' ? 'Transfer Bank' : 'COD' }}
                                        </small>
                                    </div>

                                    <div @class(['fw-bold', 'text-primary'])>
                                        Total: Rp {{ number_format($order->total, 0, ',', '.') }}
                                    </div>
                                </div>

                                <div @class(['col-md-4', 'text-md-end', 'mt-3', 'mt-md-0'])>
                                    <a href="{{ route('orders.show', $order->id) }}" @class(['btn', 'btn-outline-primary', 'btn-sm'])>
                                        <i @class(['fas', 'fa-eye'])></i> Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Pagination --}}
                <div @class(['d-flex', 'justify-content-center', 'mt-4'])>
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav @class(['bottom-nav', 'fixed-bottom', 'bg-white', 'border-top'])>
        <div @class(['container'])>
            <div @class(['row', 'text-center'])>
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
                <div @class(['col-3', 'bottom-nav-item', 'active'])>
                    <a href="{{ route('orders.index') }}" @class(['text-decoration-none', 'text-dark'])>
                        <i @class(['fas', 'fa-box'])></i>
                        <div @class(['small'])>Pesanan</div>
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
    <script src="{{ asset('resources/js/script.js') }}"></script>
</body>
</html>