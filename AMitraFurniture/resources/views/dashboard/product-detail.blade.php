<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/product-detail.css">
</head>
<body>
  <div class="container">
        <div class="product-detail-header">
            <button class="btn-back">
                <i class="fas fa-arrow-left"></i>
            </button>
        </div>

    <div class="container py-3">
        <div id="product-detail-container">
            <!-- Detail produk akan dimuat di sini oleh JavaScript -->
        </div>
    </div>

    <!-- Related Products Section -->
    <div class="container related-products">
        <h5 class="mb-3">Produk Sejenis</h5>
        <div class="row" id="related-products-container">
            <!-- Related products akan dimuat di sini -->
        </div>
    </div>

    <div class="action-buttons">
        <button class="add-to-cart-btn">
            <i class="fas fa-shopping-cart"></i> Keranjang
        </button>
        <button class="buy-now-btn">
            BELI SEKARANG
        </button>
    </div>

    <!-- Success Modal -->
    <div class="modal-overlay" id="success-modal">
        <div class="modal-content">
            <div class="text-center">
                <div style="font-size: 60px; color: #4caf50; margin-bottom: 20px;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h4>Berhasil Ditambahkan!</h4>
                <p id="modal-message" class="text-muted"></p>
                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button class="btn btn-secondary w-100" onclick="closeModal()">Lanjut Belanja</button>
                    <button class="btn btn-primary w-100" onclick="goToCart()">Lihat Keranjang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="JS/detail product.js"></script>
</body>
</html>