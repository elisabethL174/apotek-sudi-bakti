{{-- resources/views/products/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>{{ $product->price }}</p>
    @if($product->image)
    <img src="{{ asset('storage/'.$product->image) }}" width="200px">
    @endif
    <a href="{{ route('products.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
