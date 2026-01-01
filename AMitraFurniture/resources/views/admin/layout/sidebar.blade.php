<div class="sidebar">
    <h6 class="mb-4 fw-bold">Dashboard Owner</h6>

    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-chart-line me-2"></i>Ringkasan
    </a>
    <a href="{{ route('admin.pesanan.index') }}" class="{{ request()->routeIs('admin.pesanan.*') ? 'active' : '' }}">
        <i class="fas fa-shopping-cart me-2"></i>Pesanan
    </a>
    <a href="{{ route('admin.produk.index') }}" class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
        <i class="fas fa-box me-2"></i>Produk
    </a>
    <a href="{{ route('admin.pengiriman') }}" class="{{ request()->routeIs('admin.pengiriman') ? 'active' : '' }}">
        <i class="fas fa-shipping-fast me-2"></i>Pengiriman
    </a>

    <hr>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger w-100">
            <i class="fas fa-sign-out-alt me-2"></i>Logout
        </button>
    </form>
</div>
