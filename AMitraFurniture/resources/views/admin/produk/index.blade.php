@extends('admin.layout.app')

@section('content')
<h4 class="mb-3">Produk</h4>

<a href="{{ route('admin.produk.create') }}" class="btn btn-primary mb-3">
    + Tambah Produk
</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>Rp {{ number_format($product->price) }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            <a href="{{ route('admin.produk.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.produk.destroy', $product) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
