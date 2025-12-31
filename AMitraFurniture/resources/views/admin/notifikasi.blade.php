@extends('admin.layout.app')

@section('content')

<h4 class="fw-bold mb-4">Notifikasi</h4>

<div class="card-box mb-3 d-flex justify-content-between">
    <div>
        <strong>Stok Menipis</strong><br>
        Produk "Lemari Retro" stok tinggal 8 unit
        <br><small>10:30 AM - 15/01/2024</small>
    </div>
    ⚠️
</div>

<div class="card-box d-flex justify-content-between">
    <div>
        <strong>Pesanan Baru</strong><br>
        Produk "Lemari Retro" dari Budi
        <br><small>10:32 AM - 15/01/2024</small>
    </div>
    🛒
</div>

@endsection
