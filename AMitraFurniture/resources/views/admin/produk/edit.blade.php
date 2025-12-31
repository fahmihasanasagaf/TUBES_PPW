@extends('admin.layout.app')

@section('content')
<h4>Edit Produk</h4>

<form method="POST" action="{{ route('admin.produk.update', $product) }}">
    @csrf @method('PUT')

    <input class="form-control mb-2" name="name" value="{{ $product->name }}">
    <input class="form-control mb-2" name="price" value="{{ $product->price }}">
    <input class="form-control mb-2" name="stock" value="{{ $product->stock }}">

    <button class="btn btn-success">Update</button>
</form>
@endsection
