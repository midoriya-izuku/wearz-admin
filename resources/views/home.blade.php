@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center actions-row1">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 action-container">
            <div class="actions">
                <div class="action-title" id="order-action">
                    <div class="action-image"></div>
                </div>
                <a href="/orders" class="action-link">Go to Orders</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 action-container">
            <div class="actions">
                <div class="action-title" id="product-action">
                    <div class="action-image"></div>
                </div>
                <a href="/products" class="action-link">Go to Products</a>
            </div> 
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 action-container">
            <div class="actions">
                <div class="action-title" id="customer-action">
                    <div class="action-image"></div>
                </div>
                <a href="/customers" class="action-link">Go to Customers</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 action-container">
            <div class="actions">
                <div class="action-title" id="brand-action">
                    <div class="action-image"></div>
                </div>
                <a href="/brands" class="action-link">Go to Brands</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 action-container">
            <div class="actions">
                <div class="action-title" id="product-type-action">
                    <div class="action-image"></div>
                </div>
                <a href="/productTypes" class="action-link">Go to Product Types</a>
            </div>
        </div>
    </div>
</div>
@endsection
