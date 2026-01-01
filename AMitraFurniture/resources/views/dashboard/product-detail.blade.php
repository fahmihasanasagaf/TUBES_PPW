<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Detail Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('CSS/product-detail.css') }}">
</head>
<body>
    <div class="container">
        <div class="product-detail-header">
            <button class="btn-back" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i>
            </button>
        </div>

        <div class="container py-3">
            <div id="product-detail-container">
                <!-- Product Image -->
                <div class="product-image mb-4">
                    <img src="{{ asset($product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="img-fluid rounded"
                         style="max-height: 400px; object-fit: cover; width: 100%;">
                </div>

                <!-- Product Info -->
                <div class="product-info">
                    <h2 class="mb-3">{{ $product->name }}</h2>
                    
                    <div class="price mb-3">
                        <h3 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                    </div>

                    @if($product->stock > 0)
                        <p class="text-success mb-3">
                            <i class="fas fa-check-circle"></i> Stok tersedia ({{ $product->stock }})
                        </p>
                    @else
                        <p class="text-danger mb-3">
                            <i class="fas fa-times-circle"></i> Stok habis
                        </p>
                    @endif

                    <div class="description mb-4">
                        <h5>Deskripsi Produk</h5>
                        <p>{{ $product->description }}</p>
                    </div>

                    @if($product->category)
                    <div class="category mb-3">
                        <span class="badge bg-secondary">{{ $product->category }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        @if($relatedProducts->count() > 0)
        <div class="container related-products">
            <h5 class="mb-3">Produk Sejenis</h5>
            <div class="row" id="related-products-container">
                @foreach($relatedProducts as $related)
                <div class="col-6 col-md-3 mb-3">
                    <div class="card h-100">
                        <img src="{{ asset($related->image) }}" 
                             class="card-img-top" 
                             alt="{{ $related->name }}"
                             style="height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title">{{ Str::limit($related->name, 30) }}</h6>
                            <p class="card-text text-primary fw-bold">
                                Rp {{ number_format($related->price, 0, ',', '.') }}
                            </p>
                            <a href="{{ route('products.detail', $related->id) }}" class="btn btn-sm btn-outline-primary w-100">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="action-buttons">
            <button class="add-to-cart-btn" onclick="addToCart({{ $product->id }})">
                <i class="fas fa-shopping-cart"></i> Keranjang
            </button>
            <a href="{{ route('checkout.direct', $product->id) }}" class="buy-now-btn" style="text-decoration: none; display: inline-block; text-align: center;">
                BELI SEKARANG
            </a>
        </div>

        <!-- Success Modal -->
        <div class="modal-overlay" id="success-modal" style="display: none;">
            <div class="modal-content">
                <button class="close-modal" onclick="closeModal()" style="position: absolute; top: 10px; right: 15px; background: none; border: none; font-size: 24px; cursor: pointer;">&times;</button>
                <div class="text-center">
                    <div style="font-size: 60px; color: #4caf50; margin-bottom: 20px;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4>Berhasil Ditambahkan!</h4>
                    <p id="modal-message" class="text-muted">{{ $product->name }} telah ditambahkan ke keranjang</p>
                    <div style="display: flex; gap: 10px; margin-top: 20px;">
                        <button class="btn btn-secondary w-100" onclick="closeModal()">Lanjut Belanja</button>
                        <button class="btn btn-primary w-100" onclick="goToCart()">Lihat Keranjang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addToCart(productId) {
            // Kirim request ke server untuk menambahkan produk ke cart
            fetch(`/cart/add/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                credentials: 'same-origin', // PENTING: Kirim cookies session
                body: JSON.stringify({
                    quantity: 1
                })
            })
            .then(response => {
                if (!response.ok) {
                    // Jika tidak terautentikasi, redirect ke login
                    if (response.status === 401 || response.status === 419) {
                        alert('Anda harus login terlebih dahulu!');
                        window.location.href = '/login';
                        return;
                    }
                    throw new Error('Gagal menambahkan produk');
                }
                return response.json();
            })
            .then(data => {
                if (data && data.success) {
                    // Tampilkan modal sukses
                    document.getElementById('success-modal').style.display = 'flex';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal menambahkan produk ke keranjang. ' + error.message);
            });
        }

        function buyNow(productId) {
            // Redirect ke checkout atau halaman pembelian
            window.location.href = '/checkout/' + productId;
        }

        function closeModal() {
            document.getElementById('success-modal').style.display = 'none';
        }

        function goToCart() {
            window.location.href = '/cart';
        }
    </script>
</body>
</html>