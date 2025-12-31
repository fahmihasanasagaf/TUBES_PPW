@extends('admin.layout.app')

@section('content')

<div class="card-box mb-4 d-flex justify-content-between">
    <strong>Manajemen Produk</strong>
    <button class="btn btn-primary">+ Tambah</button>
</div>

<div class="card-box mb-3 d-flex justify-content-between">
    <div>
        <strong>Lemari Retro</strong><br>
        <small>SKU: LMR-001</small><br>
        Harga: <b>Rp 1.350.000</b><br>
        <span class="badge bg-success">Stok: 15</span>
    </div>
    <div>
        ✏️ 🗑️
    </div>
</div>

<div class="card-box d-flex justify-content-between">
    <div>
        <strong>Ranjang Susun Tingkat</strong><br>
        <small>SKU: RJG-001</small><br>
        Harga: <b>Rp 7.550.000</b><br>
        <span class="badge bg-success">Stok: 10</span>
    </div>
    <div>
        ✏️ 🗑️
    </div>
</div>

@endsection
