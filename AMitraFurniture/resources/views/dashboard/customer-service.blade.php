<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Service - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg app-header sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="home.html">A Mitra Furniture</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.html">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.html">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="customer-service-screen" class="screen active">
        <div class="container py-4">
            <h2 class="mb-4">Customer Service</h2>
            
            <!-- Chat Bubble -->
            <div class="d-flex align-items-start mb-4">
                <div class="customer-service-avatar me-3">
                    <i class="fas fa-headset text-white"></i>
                </div>
                <div class="customer-service-message">
                    <h6 class="fw-bold">Customer Service</h6>
                    <p class="mb-0">Halo, ada yang bisa saya bantu?</p>
                </div>
            </div>
            
            <!-- Problem Selection -->
            <div class="profile-item mb-4">
                <h6 class="fw-bold mb-3">Pilih jenis kendala:</h6>
                <select class="form-select" id="problem-select">
                    <option value="" selected>Kendala apa yang kamu alami..</option>
                    <option value="payment">Masalah pembayaran</option>
                    <option value="shipping">Masalah pengiriman</option>
                    <option value="damaged">Produk rusak</option>
                    <option value="mismatch">Pesanan tidak sesuai</option>
                    <option value="cancellation">Pembatalan pesanan</option>
                    <option value="other">Lainnya</option>
                </select>
            </div>
            
            <!-- Message Input -->
            <div class="profile-item mb-4">
                <h6 class="fw-bold mb-3">Jelaskan kendala Anda:</h6>
                <textarea class="form-control" id="customer-message" rows="4" placeholder="Tuliskan detail kendala yang Anda alami..."></textarea>
                <button class="btn btn-primary-custom w-100 mt-3" onclick="sendCustomerMessage()">Kirim Pesan</button>
            </div>
            
            <!-- Contact Information -->
            <div class="profile-item">
                <h6 class="fw-bold mb-3">Kontak Lainnya:</h6>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-phone text-primary me-3"></i>
                    <span>Telepon: 1500-123</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-envelope text-primary me-3"></i>
                    <span>Email: support@furnitureapp.com</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-clock text-primary me-3"></i>
                    <span>Jam Operasional: 08.00-17.00</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-3 bottom-nav-item">
                    <a href="home.html" class="text-decoration-none text-dark">
                        <i class="fas fa-home"></i>
                        <div class="small">Home</div>
                    </a>
                </div>
                <div class="col-3 bottom-nav-item">
                    <a href="cart.html" class="text-decoration-none text-dark">
                        <i class="fas fa-shopping-cart"></i>
                        <div class="small">Cart</div>
                    </a>
                </div>
                <div class="col-3 bottom-nav-item">
                    <a href="notification.html" class="text-decoration-none text-dark">
                        <i class="fas fa-bell"></i>
                        <div class="small">Notifikasi</div>
                    </a>
                </div>
                <div class="col-3 bottom-nav-item active">
                    <a href="profile.html" class="text-decoration-none text-dark">
                        <i class="fas fa-user"></i>
                        <div class="small">Profile</div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>