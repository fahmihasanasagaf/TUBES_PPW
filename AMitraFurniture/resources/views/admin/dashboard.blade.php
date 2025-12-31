@extends('admin.layout.app')

@section('content')
<div class="card-box mb-4">
    <h4 class="fw-bold">Dashboard Owner</h4>
    <small>A Mitra Furniture Store</small>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card-box">
            <small>Total Penjualan</small>
            <h3>Rp 45.500.000</h3>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box">
            <small>Pesanan Baru</small>
            <h3>24</h3>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box">
            <small>Produk Terjual</small>
            <h3>156</h3>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box">
            <small>Pelanggan Aktif</small>
            <h3>1.200</h3>
        </div>
    </div>
</div>
@endsection
