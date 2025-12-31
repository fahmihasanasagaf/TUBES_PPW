<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href={{asset('css/style.css')}}>  
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg app-header sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">A Mitra Furniture</a>
        </div>
    </nav>

    <div id="login-screen" class="screen active">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center mb-4">
                        <i class="fas fa-chair fa-4x mb-3" style="color: #429ff7;"></i>
                        <h2>Login</h2>
                        <p>Hallo! Selamat datang kembali..</p>
                    </div>
                    
                    <form id="login-form">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" placeholder="Example@gmail.com" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kata sandi</label>
                            <input type="password" class="form-control" placeholder="Masukkan kata sandi" required>
                        </div>
                        
                        <div class="mb-3 text-end">
                            <a href="#" class="text-link">Lupa sandi</a>
                        </div>
                        
                        <button type="submit" class="btn btn-login w-100 mb-4" onclick="window.location.href='home.html'">Login</button>
                        
                        <div class="text-center mb-3">
                            <p>Atau masuk dengan</p>
                        </div>
                        
                        <div class="row justify-content-center mb-4">
                            <div class="col-auto">
                                <div class="social-login" onclick="socialLogin('google')">

                                    <i class="fab fa-google"></i>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="social-login" onclick="socialLogin('whatsapp')">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <p>
                                Belum punya akun? 
                                <a href="register.html" class="text-link">Daftar</a>
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