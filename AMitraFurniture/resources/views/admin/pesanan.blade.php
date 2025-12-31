@extends('admin.layout.app')

@section('content')

<div class="card-box mb-4">
    <h4 class="fw-bold">Pesanan</h4>
    <input class="form-control mt-3" placeholder="Cari Pesanan">
</div>

<div class="card-box mb-3">
    <strong>Budi</strong><br>
    1x Lemari Retro<br>
    <small>10 menit yang lalu</small>
    <span class="badge bg-warning float-end">Dalam Pengiriman</span>
    <div class="fw-bold mt-2">Rp 1.350.000</div>
</div>

<div class="card-box mb-3">
    <strong>Rudi</strong><br>
    1x Ranjang Susun<br>
    <small>20 menit yang lalu</small>
    <span class="badge bg-danger float-end">Belum Bayar</span>
    <div class="fw-bold mt-2">Rp 7.550.000</div>
</div>

<div class="card-box">
    <strong>Sono</strong><br>
    1x Sofa Santai<br>
    <small>2 jam yang lalu</small>
    <span class="badge bg-success float-end">Selesai</span>
    <div class="fw-bold mt-2">Rp 5.550.000</div>
</div>

@endsection
