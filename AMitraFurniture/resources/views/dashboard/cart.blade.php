<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - A Mitra Furniture</title>
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
                        <a @class(['nav-link', 'active']) href="cart.html">Keranjang</a>
                    </li>
                    <li @class(['nav-item'])>
                        <a @class(['nav-link']) href="profile.html">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="cart-screen" @class(['screen', 'active'])>
        <div @class(['container', 'py-4'])>
            <h2 @class(['mb-4'])>Keranjang Saya</h2>
            
            <div @class(['mb-3'])>
                <div @class(['form-check'])>
                    <input @class(['form-check-input']) type="checkbox" id="select-all">
                    <label @class(['form-check-label']) for="select-all">Semua</label>
                </div>
            </div>
            
            <div id="cart-items">
                <!-- Cart items will be loaded here by JavaScript -->
            </div>
            
            <div @class(['checkout-section', 'mt-4'])>
                <div @class(['d-flex', 'justify-content-between', 'align-items-center'])>
                    <div>
                        <h5>Total: <span id="cart-total">Rp 0</span></h5>
                    </div>
                    <a href="checkout.html" @class(['btn', 'btn-primary-custom'])>Checkout</a>
                </div>
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
                <div @class(['col-3', 'bottom-nav-item', 'active'])>
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
                <div @class(['col-3', 'bottom-nav-item'])>
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