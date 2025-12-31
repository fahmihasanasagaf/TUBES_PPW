<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - A Mitra Furniture</title>
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
                        <a class="nav-link active" href="profile.html">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="profile-screen" class="screen active">
        <div class="container py-4">
            <h2 class="mb-4">Pengguna</h2>
            
            <!-- Pesanan Saya -->
            <div class="profile-item">
                <h5 class="mb-3">Pesanan Saya</h5>
                <div class="row text-center">
                    <div class="col-3">
                        <a href="order-history.html?filter=unpaid" class="text-decoration-none text-dark">
                            <div class="order-status-icon">
                                <i class="fas fa-money-bill-wave text-primary"></i>
                            </div>
                            <small>Belum Bayar</small>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="order-history.html?filter=packed" class="text-decoration-none text-dark">
                            <div class="order-status-icon">
                                <i class="fas fa-box text-primary"></i>
                            </div>
                            <small>Dikemas</small>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="order-history.html?filter=shipped" class="text-decoration-none text-dark">
                            <div class="order-status-icon">
                                <i class="fas fa-shipping-fast text-primary"></i>
                            </div>
                            <small>Dikirim</small>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="order-history.html?filter=rated" class="text-decoration-none text-dark">
                            <div class="order-status-icon">
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <small>Diberi Penilaian</small>
                        </a>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="order-history.html" class="text-primary fw-bold">Lihat Riwayat Pesanan</a>
                </div>
            </div>
            
            <!-- Aktivitas Saya -->
            <div class="profile-item">
                <h5 class="mb-3">Aktivitas Saya</h5>
                <div class="d-flex justify-content-between align-items-center py-2 clickable" onclick="window.location.href='buy-again.html'">
                    <span>Beli Lagi</span>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2 clickable" onclick="window.location.href='favorites.html'">
                    <span>Favorit Saya</span>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            
            <!-- Bantuan -->
            <div class="profile-item">
                <h5 class="mb-3">Bantuan</h5>
                <div class="d-flex justify-content-between align-items-center py-2 clickable" onclick="window.location.href='customer-service.html'">
                    <span>Customer Service</span>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            
            <!-- Ubah Profil -->
            <div class="profile-item">
                <h5 class="mb-3">Ubah Profil</h5>
                <div class="d-flex justify-content-between align-items-center py-2 clickable" data-bs-toggle="modal" data-bs-target="#editProfileModal" data-field="name">
                    <span id="profile-name">Nama fahmi</span>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2 clickable" data-bs-toggle="modal" data-bs-target="#editProfileModal" data-field="phone">
                    <span id="profile-phone">No.Handphone ******91</span>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2 clickable" data-bs-toggle="modal" data-bs-target="#editProfileModal" data-field="email">
                    <span id="profile-email">Email s****2@gmail.com</span>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            
            <!-- Simpan Button -->
            <div class="mt-4">
                <button class="btn btn-simpan w-100 py-3">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalTitle">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" id="editFieldLabel">Field</label>
                        <input type="text" class="form-control" id="editFieldInput">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
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