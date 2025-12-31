<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    <style>
        .product-card-link {
            text-decoration: none;
            color: inherit;
            display: block;
            transition: transform 0.2s;
        }
        .product-card-link:hover {
            transform: translateY(-5px);
        }
        .card {
            transition: box-shadow 0.2s;
        }
        .card:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
    </style>
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
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
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

    <div id="home-screen" class="screen active" style="margin-bottom: 80px;">
        <div class="container py-4">
            
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

            <!-- Search Bar -->
            <div class="mb-4">
                <form action="{{ route('home') }}" method="GET">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" name="search" placeholder="Cari furniture..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>

            <!-- Category Icons -->
            <div class="row mb-4">
                <div class="col-3 text-center">
                    <a href="{{ route('category.show', 'Kursi') }}" class="text-decoration-none text-dark">
                        <div class="category-icon">
                            <i class="fas fa-chair fa-lg"></i>
                        </div>
                        <small class="d-block mt-2">Kursi</small>
                    </a>
                </div>
                <div class="col-3 text-center">
                    <a href="{{ route('category.show', 'Sofa') }}" class="text-decoration-none text-dark">
                        <div class="category-icon">
                            <i class="fas fa-couch fa-lg"></i>
                        </div>
                        <small class="d-block mt-2">Sofa</small>
                    </a>
                </div>
                <div class="col-3 text-center">
                    <a href="{{ route('category.show', 'Meja') }}" class="text-decoration-none text-dark">
                        <div class="category-icon">
                            <i class="fas fa-table fa-lg"></i>
                        </div>
                        <small class="d-block mt-2">Meja</small>
                    </a>
                </div>
                <div class="col-3 text-center">
                    <a href="{{ route('category.show', 'Lemari') }}" class="text-decoration-none text-dark">
                        <div class="category-icon">
                            <i class="fas fa-door-open fa-lg"></i>
                        </div>
                        <small class="d-block mt-2">Lemari</small>
                    </a>
                </div>
            </div>

            <!-- Promo Banners -->
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <div class="promo-card bg-primary text-white p-4 rounded">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="fw-bold">BIG SALE</h5>
                                <p class="mb-2">UP TO 50%</p>
                            </div>
                            <div class="col-4 text-end">
                                <i class="fas fa-chair fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="promo-card bg-success text-white p-4 rounded">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="fw-bold">NEW PRODUCT</h5>
                                <p class="mb-2">Discount 20% for the first transaction</p>
                            </div>
                            <div class="col-4 text-end">
                                <i class="fas fa-couch fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <h4 class="mb-3">
                @if(request('category'))
                    Produk {{ request('category') }}
                @elseif(request('search'))
                    Hasil Pencarian: "{{ request('search') }}"
                @else
                    Semua Produk
                @endif
            </h4>

            @if($products->isEmpty())
                <div class="alert alert-info">
                    Produk tidak ditemukan.
                </div>
            @else
                <div class="row" id="products-grid">
                    @foreach($products as $product)
                        <div class="col-6 col-md-3 mb-4">
                            <div class="card h-100">
                                {{-- Link ke detail produk pada gambar --}}
                                <a href="{{ route('products.detail', $product->id) }}" class="product-card-link">
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
                                </a>
                                
                                <div class="card-body">
                                    {{-- Link ke detail produk pada title --}}
                                    <a href="{{ route('products.detail', $product->id) }}" class="text-decoration-none text-dark">
                                        <h6 class="card-title">{{ $product->name }}</h6>
                                    </a>
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
                @if(method_exists($products, 'links'))
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav fixed-bottom bg-white border-top">
        <div class="container">
            <div class="row text-center">
                <div class="col-3 bottom-nav-item active">
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