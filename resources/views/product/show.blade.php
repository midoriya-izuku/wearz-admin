@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <h1 id="page-title">Product Details</h1>
        <div id="product-details">
            <div id="product-image">
                <img src={{$product->image}} alt={{$product->name}}/>
            </div>
            <div id="product-info">
                <span><b>Name</b>:{{$product->name}}</span>
                <span><b>Sizes Available</b>: {{$product->size}}</span>
                <span><b>Color</b>: {{$product->color}}</span>
                <span><b>Price</b>: {{$product->price}}</span>
                <span><b>Brand</b>: {{$product->brand->name}}</span>
                <span><b>Type</b>: {{$product->type->name}}</span>
            </div>
        </div>
    </div>
@endsection