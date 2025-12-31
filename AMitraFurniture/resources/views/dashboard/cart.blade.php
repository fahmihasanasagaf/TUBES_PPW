<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg app-header sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">A Mitra Furniture</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('cart.index') }}">Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.index') }}">Pesanan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div id="cart-screen" class="screen active" style="margin-bottom: 80px;">
        <div class="container py-4">
            <h2 class="mb-4">
                <i class="fas fa-shopping-cart"></i> Keranjang Saya
            </h2>

            {{-- Alert Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(empty($cartItems))
                <!-- Keranjang Kosong -->
                <div class="text-center py-5">
                    <i class="fas fa-shopping-cart fa-5x text-muted mb-3"></i>
                    <h4>Keranjang Anda Kosong</h4>
                    <p class="text-muted">Belum ada produk yang ditambahkan ke keranjang.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-shopping-bag"></i> Belanja Sekarang
                    </a>
                </div>
            @else
                <!-- Cart Items -->
                <div id="cart-items">
                    @foreach($cartItems as $item)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 col-md-2">
                                        @if($item['product']->image)
                                            <img src="{{ asset($item['product']->image) }}" 
                                                 class="img-fluid rounded" 
                                                 alt="{{ $item['product']->name }}"
                                                 style="height: 80px; object-fit: cover;">
                                        @else
                                            <img src="https://via.placeholder.com/80?text=No+Image" 
                                                 class="img-fluid rounded" 
                                                 alt="No Image">
                                        @endif
                                    </div>
                                    <div class="col-9 col-md-4">
                                        <h6 class="mb-1">{{ $item['product']->name }}</h6>
                                        <small class="text-muted">{{ $item['product']->category }}</small>
                                        <div class="mt-1">
                                            <span class="text-primary fw-bold">
                                                Rp {{ number_format($item['product']->price, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3 mt-2 mt-md-0">
                                        <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            @method('PATCH')
                                            <label class="me-2 small">Qty:</label>
                                            <input type="number" 
                                                   name="quantity" 
                                                   value="{{ $item['quantity'] }}" 
                                                   min="1" 
                                                   max="99"
                                                   class="form-control form-control-sm me-2" 
                                                   style="width: 60px;">
                                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-6 col-md-3 mt-2 mt-md-0 text-end">
                                        <div class="fw-bold text-primary mb-2">
                                            Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                                        </div>
                                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk dari keranjang?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Checkout Section -->
                <div class="checkout-section mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5 class="mb-0">
                                        Total: 
                                        <span id="cart-total" class="text-primary">
                                            Rp {{ number_format($total, 0, ',', '.') }}
                                        </span>
                                    </h5>
                                    <small class="text-muted">
                                        {{ count($cartItems) }} item{{ count($cartItems) > 1 ? 's' : '' }} dalam keranjang
                                    </small>
                                </div>
                                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                    <a href="{{ route('home') }}" class="btn btn-outline-secondary me-2">
                                        <i class="fas fa-arrow-left"></i> Lanjut Belanja
                                    </a>
                                    <a href="{{ route('orders.checkout') }}" class="btn btn-primary">
                                        <i class="fas fa-shopping-bag"></i> Checkout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav fixed-bottom bg-white border-top">
        <div class="container">
            <div class="row text-center">
                <div class="col-3 bottom-nav-item">
                    <a href="{{ route('home') }}" class="text-decoration-none text-dark">
                        <i class="fas fa-home"></i>
                        <div class="small">Home</div>
                    </a>
                </div>
                <div class="col-3 bottom-nav-item active">
                    <a href="{{ route('cart.index') }}" class="text-decoration-none text-dark">
                        <i class="fas fa-shopping-cart"></i>
                        <div class="small">Cart</div>
                    </a>
                </div>
                <div class="col-3 bottom-nav-item">
                    <a href="{{ route('orders.index') }}" class="text-decoration-none text-dark">
                        <i class="fas fa-box"></i>
                        <div class="small">Pesanan</div>
                    </a>
                </div>
                <div class="col-3 bottom-nav-item">
                    <a href="#" class="text-decoration-none text-dark">
                        <i class="fas fa-user"></i>
                        <div class="small">Profile</div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('resources/js/script.js') }}"></script>
</body>
</html>