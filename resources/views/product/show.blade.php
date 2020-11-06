@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <h1 id="page-title">Product Details</h1>
        <div id="product-details">
            <div id="product-image">
                <picture>
                    <source media="(max-width:0px)" srcset={{str_replace(".jpg", "-view-xs.jpg", $product->image)}}>
                    <source media="(min-width:600px)" srcset={{str_replace(".jpg", "-view-sm.jpg", $product->image)}}>
                    <source media="(min-width:900px)" srcset={{str_replace(".jpg", "-view-md.jpg", $product->image)}}>
                    <source media="(min-width:1280px)" srcset={{str_replace(".jpg", "-view-lg.jpg", $product->image)}}>
                    <source media="(min-width:1920px)" srcset={{str_replace(".jpg", "-view-xl.jpg", $product->image)}}>
                    <img src={{$product->image}} alt={{$product->name}}/>
                  </picture>
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