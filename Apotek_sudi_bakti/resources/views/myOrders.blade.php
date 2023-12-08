@extends('layouts.boots')

@section('content')
<div class="container mt-5">
    <h2>My Orders</h2>
    @foreach($orders as $order)
        <div class="card mb-3">
            <div class="card-header">
                Order ID: {{ $order->id }} - Status: {{ $order->status }}
            </div>
            <div class="card-body">
                @foreach($order->orderItems as $item)
                    <p>{{ $item->product->name }} - Quantity: {{ $item->quantity }} - Price: ${{ $item->price }}</p>
                @endforeach
                <p class="font-weight-bold">Total Price: ${{ $order->total_amount }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
