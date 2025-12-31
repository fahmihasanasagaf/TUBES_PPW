<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi - A Mitra Furniture</title>
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

    <div id="verify-screen" class="screen active">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center mb-4">
                        <i class="fas fa-chair fa-4x mb-3" style="color: #429ff7;"></i>
                        <h2>Verifikasi kode</h2>
                        <p>Silakan masukkan kode yang baru saja kami kirim ke email</p>
                    </div>
                    
                    <div class="mb-4">
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <input type="text" class="form-control text-center verification-input" maxlength="1">
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control text-center verification-input" maxlength="1">
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control text-center verification-input" maxlength="1">
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control text-center verification-input" maxlength="1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mb-4">
                        <p>Tidak menerima OTP?</p>
                        <a href="#" class="text-link fw-bold">Kirim ulang</a>
                    </div>
                    
                    <button class="btn btn-login w-100" onclick="verifyCode()">Verifikasi</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>