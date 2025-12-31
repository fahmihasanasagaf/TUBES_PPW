<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg app-header sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">A Mitra Furniture</a>
        </div>
    </nav>

    <div id="register-screen" class="screen active">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center mb-4">
                        <i class="fas fa-chair fa-4x mb-3" style="color: #429ff7;"></i>
                        <h2>Daftar</h2>
                        <p>Buat akun baru untuk mulai berbelanja</p>
                    </div>
                    
                    <form id="register-form">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" placeholder="Example@gmail.com" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kata sandi</label>
                            <input type="password" class="form-control" placeholder="Buat kata sandi" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" placeholder="Ulangi kata sandi" required>
                        </div>
                        
                        <button type="submit" class="btn btn-login w-100 mb-4">Daftar</button>
                        
                        <div class="text-center">
                            <p>
                                Sudah punya akun? 
                                <a href="login.html" class="text-link">Masuk</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>