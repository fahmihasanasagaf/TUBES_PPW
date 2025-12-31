<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category }} - A Mitra Furniture</title>
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
                            <a class="nav-link" href="{{ route('cart.index') }}">Keranjang</a>
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
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div id="category-screen" class="screen active" style="margin-bottom: 80px;">
        <div class="container py-4">
            {{-- Header dengan tombol back --}}
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('home') }}" class="btn btn-back me-3">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h2 class="mb-0" id="category-title">
                    @if($category == 'Kursi')
                        <i class="fas fa-chair text-primary"></i>
                    @elseif($category == 'Sofa')
                        <i class="fas fa-couch text-primary"></i>
                    @elseif($category == 'Meja')
                        <i class="fas fa-table text-primary"></i>
                    @elseif($category == 'Lemari')
                        <i class="fas fa-door-open text-primary"></i>
                    @endif
                    {{ $category }}
                </h2>
            </div>

            {{-- Info jumlah produk --}}
            <p class="text-muted mb-3">{{ $products->total() }} produk ditemukan</p>

            {{-- Alert Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Quick Category Links --}}
            <div class="row mb-4">
                <div class="col-3 text-center">
                    <a href="{{ route('category.show', 'Kursi') }}" class="text-decoration-none {{ $category == 'Kursi' ? 'text-primary' : 'text-dark' }}">
                        <div class="category-icon {{ $category == 'Kursi' ? 'border-primary' : '' }}">
                            <i class="fas fa-chair fa-lg"></i>
                        </div>
                        <small class="d-block mt-2">Kursi</small>
                    </a>
                </div>
                <div class="col-3 text-center">
                    <a href="{{ route('category.show', 'Sofa') }}" class="text-decoration-none {{ $category == 'Sofa' ? 'text-primary' : 'text-dark' }}">
                        <div class="category-icon {{ $category == 'Sofa' ? 'border-primary' : '' }}">
                            <i class="fas fa-couch fa-lg"></i>
                        </div>
                        <small class="d-block mt-2">Sofa</small>
                    </a>
                </div>
                <div class="col-3 text-center">
                    <a href="{{ route('category.show', 'Meja') }}" class="text-decoration-none {{ $category == 'Meja' ? 'text-primary' : 'text-dark' }}">
                        <div class="category-icon {{ $category == 'Meja' ? 'border-primary' : '' }}">
                            <i class="fas fa-table fa-lg"></i>
                        </div>
                        <small class="d-block mt-2">Meja</small>
                    </a>
                </div>
                <div class="col-3 text-center">
                    <a href="{{ route('category.show', 'Lemari') }}" class="text-decoration-none {{ $category == 'Lemari' ? 'text-primary' : 'text-dark' }}">
                        <div class="category-icon {{ $category == 'Lemari' ? 'border-primary' : '' }}">
                            <i class="fas fa-door-open fa-lg"></i>
                        </div>
                        <small class="d-block mt-2">Lemari</small>
                    </a>
                </div>
            </div>
            
            {{-- Products Grid --}}
            @if($products->isEmpty())
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle fa-2x mb-2"></i>
                    <p class="mb-0">Belum ada produk dalam kategori {{ $category }}.</p>
                </div>
            @else
                <div class="row" id="category-products">
                    @foreach($products as $product)
                        <div class="col-6 col-md-3 mb-4">
                            <div class="card h-100">
                                {{-- Tampilkan Gambar --}}
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" 
                                         class="card-img-top" 
                                         alt="{{ $product->name }}"
                                         style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="https://via.placeholder.com/200?text=No+Image" 
                                         class="card-img-top" 
                                         alt="No Image"
                                         style="height: 200px; object-fit: cover;">
                                @endif
                                
                                <div class="card-body">
                                    <h6 class="card-title">{{ $product->name }}</h6>
                                    <p class="text-muted small">{{ $product->category }}</p>
                                    <p class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    
                                    @auth
                                        <form action="{{ route('cart.add', $product) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                                <i class="fas fa-cart-plus"></i> Tambah
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-secondary btn-sm w-100">
                                            Login untuk Beli
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
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
                <div class="col-3 bottom-nav-item">
                    <a href="{{ auth()->check() ? route('cart.index') : route('login') }}" class="text-decoration-none text-dark">
                        <i class="fas fa-shopping-cart"></i>
                        <div class="small">Cart</div>
                    </a>
                </div>
                <div class="col-3 bottom-nav-item">
                    <a href="{{ auth()->check() ? route('orders.index') : route('login') }}" class="text-decoration-none text-dark">
                        <i class="fas fa-box"></i>
                        <div class="small">Pesanan</div>
                    </a>
                </div>
                <div class="col-3 bottom-nav-item">
                    <a href="{{ auth()->check() ? '#' : route('login') }}" class="text-decoration-none text-dark">
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