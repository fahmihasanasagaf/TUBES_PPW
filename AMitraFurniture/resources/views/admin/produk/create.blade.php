@extends('admin.layout.app')

@section('content')
<h4>Tambah Produk</h4>

<form method="POST" action="{{ route('admin.produk.store') }}">
    @csrf

    <input class="form-control mb-2" name="name" placeholder="Nama Produk">
    <input class="form-control mb-2" name="price" placeholder="Harga">
    <input class="form-control mb-2" name="stock" placeholder="Stok">

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
