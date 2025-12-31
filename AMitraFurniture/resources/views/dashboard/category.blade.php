<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header/Navbar -->
    <nav @class(['navbar', 'navbar-expand-lg', 'app-header', 'sticky-top'])>
        <div @class(['container'])>
            <a @class(['navbar-brand', 'fw-bold']) href="home.html">A Mitra Furniture</a>
            <button @class(['navbar-toggler']) type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span @class(['navbar-toggler-icon'])></span>
            </button>
            <div @class(['collapse', 'navbar-collapse']) id="navbarNav">
                <ul @class(['navbar-nav', 'ms-auto'])>
                    <li @class(['nav-item'])>
                        <a @class(['nav-link']) href="home.html">Home</a>
                    </li>
                    <li @class(['nav-item'])>
                        <a @class(['nav-link']) href="cart.html">Keranjang</a>
                    </li>
                    <li @class(['nav-item'])>
                        <a @class(['nav-link']) href="profile.html">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="category-screen" @class(['screen', 'active'])>
        <div @class(['container', 'py-4'])>
            <div @class(['d-flex', 'align-items-center', 'mb-4'])>
                <a href="home.html" @class(['btn', 'btn-back', 'me-3'])>
                    <i @class(['fas', 'fa-arrow-left'])></i>
                </a>
                <h2 @class(['mb-0']) id="category-title">Kategori</h2>
            </div>
            
            <div @class(['row']) id="category-products">
                <!-- Category products will be loaded here by JavaScript -->
            </div>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav @class(['bottom-nav', 'fixed-bottom'])>
        <div @class(['container'])>
            <div @class(['row'])>
                <div @class(['col-3', 'bottom-nav-item'])>
                    <a href="home.html" @class(['text-decoration-none', 'text-dark'])>
                        <i @class(['fas', 'fa-home'])></i>
                        <div @class(['small'])>Home</div>
                    </a>
                </div>
                <div @class(['col-3', 'bottom-nav-item'])>
                    <a href="cart.html" @class(['text-decoration-none', 'text-dark'])>
                        <i @class(['fas', 'fa-shopping-cart'])></i>
                        <div @class(['small'])>Cart</div>
                    </a>
                </div>
                <div @class(['col-3', 'bottom-nav-item'])>
                    <a href="notification.html" @class(['text-decoration-none', 'text-dark'])>
                        <i @class(['fas', 'fa-bell'])></i>
                        <div @class(['small'])>Notifikasi</div>
                    </a>
                </div>
                <div @class(['col-3', 'bottom-nav-item', 'active'])>
                    <a href="profile.html" @class(['text-decoration-none', 'text-dark'])>
                        <i @class(['fas', 'fa-user'])></i>
                        <div @class(['small'])>Profile</div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>