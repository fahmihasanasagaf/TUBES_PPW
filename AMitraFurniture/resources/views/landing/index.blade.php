<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="welcome-screen" class="screen active">
        <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
            <div class="text-center">
                <i class="fas fa-chair fa-5x mb-4" style="color: #429ff7;"></i>
                <h2 class="mb-4">Aplikasi jual beli furniture terlengkap dan terbaik di Indonesia</h2>
                
                <div class="row justify-content-center mb-5">
                    <div class="col-auto">
                        <div class="welcome-card" onmouseover="hoverCard(this)" onmouseout="unhoverCard(this)">
                            <img src="assets/images/Kursi.png" alt="Kursi" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="welcome-card" onmouseover="hoverCard(this)" onmouseout="unhoverCard(this)">
                            <img src="assets/images/Lemari.png" alt="Lemari" class="img-fluid">
                        </div>
                    </div>
                </div>
                
                <a href="login.html" class="btn btn-welcome mb-3">Mulai</a>
                <p>
                    Sudah punya akun? 
                    <a href="login.html" class="text-link">Masuk</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>