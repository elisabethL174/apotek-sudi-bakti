@extends('layouts.boots')

@section('content')
    <div class="container">
        <h2>My Cart</h2>
        <div class="row">
            @foreach($cartItems as $item)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/'.$item->product->image) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <p class="card-text">${{ $item->product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            <h3 style="color: white">Total Price: ${{ $cartItems->sum(function($item) { return $item->product->price; }) }}</h3>
        </div>
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Checkout</button>
        </form>

    </div>
@endsection
