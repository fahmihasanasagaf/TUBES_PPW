<div class="sidebar">
    <h6 class="mb-4 fw-bold">Dashboard Owner</h6>

    <a href="{{ route('admin.dashboard') }}" class="active">📊 Ringkasan</a>
    <a href="#">🛒 Pesanan</a>
    <a href="#">📦 Produk</a>
    <a href="#">🚚 Pengiriman</a>

    <hr>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger w-100">Logout</button>
    </form>
</div>
