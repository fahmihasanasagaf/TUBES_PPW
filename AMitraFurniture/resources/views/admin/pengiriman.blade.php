@extends('admin.layout.app')

@section('content')

<div class="card-box mb-4">
    <strong>Ringkasan Pengiriman</strong>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card-box text-center bg-light">
            <b>1</b><br>Menunggu Pengiriman
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-box text-center bg-warning">
            <b>1</b><br>Sedang Dikirim
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-box text-center bg-success text-white">
            <b>18</b><br>Pesanan Selesai
        </div>
    </div>
</div>

<div class="card-box">
    <strong>Budi</strong><br>
    1x Lemari Retro<br>
    <small>10 menit yang lalu</small>
    <span class="badge bg-warning float-end">Dalam Pengiriman</span>
    <div class="fw-bold mt-2">Rp 1.350.000</div>
</div>

@endsection
