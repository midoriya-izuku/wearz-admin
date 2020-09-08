@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/order.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <h1>Order Details</h1>
        <hr>

        <div id="customer-details">
            <span class="section-title">Customer Details</span>
            <span> <b>Name</b>: {{$order->customer->name}} </span>
            <span> <b>Email</b>: {{$order->customer->email}}</span>
        </div>

        <div id="order-details">
            <span class="section-title">Order Details</span>
            <div id="order-summary">
                <div id="shipping-details">
                    <p><b>Shipping Address</b>: {{$order->shippingAddress->address_line_1."\n".$order->shippingAddress->address_line_2."\n".$order->shippingAddress->landmark." ".$order->shippingAddress->state." ".$order->shippingAddress->zip_code}}</p>
                    <span><b>Phone</b>:{{$order->shippingAddress->phone}}</span>        
                </div>
                <div id="order-info">
                    <span><b>Total Items Ordered</b>: {{count($order->products)}}</span>
                    <span><b>Total Cost</b>: ₹{{totalCost($order->products)}}</span>
                    <span><b>Order Date:</b>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</span>
                </div>
            </div>
        </div>
        <div id="ordered-products-details">
            <span class="section-title">Ordered Products</span>
            @foreach ($order->products as $product)
                <div class="product">
                    <div class="product-image">
                        <img src={{$product->image}} alt={{$product->name}}>
                    </div>
                    <div class="product-details">
                        <span><b>Name</b>: {{$product->name}}</span>
                        <span><b>Size</b>: {{$product->pivot->size}}</span>
                        <span><b>Price</b>: ₹{{$product->pivot->price}}</span>
                        <span><b>Quantity</b>:{{$product->pivot->quantity}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@php
    function totalCost($products){
        $total = 0;
        foreach($products as $product){
            $total = $product->pivot->quantity*$product->pivot->price + $total;
        }
        return $total;
    }
@endphp