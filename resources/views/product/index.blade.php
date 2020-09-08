@extends('layouts.app')  
@push('styles')
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
      <h1 id="page-title">Products</h1>
      <div class="row">
        <div id="add-product-container">
          <a href="/products/create" id="add-product-link">
            <svg viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>
            <span>Add Product</span>
          </a>
        </div>
        <div class="col-12 table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
          <table class="table table-bordered" >
            <thead>
              <tr>
                <th scope="col">Product Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Sizes</th>
                <th scope="col">Product Color</th>
                <th scope="col">Product Price</th>
                <th scope="col" colspan="2">Product Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                   <td>{{$product->id}}</td>
                   <td>{{$product->name}}</td>
                   <td>
                       <img class="product-image" src={{$product->image}} alt={{$product->name}}>
                   </td>
                   <td>{{$product->size}}</td>
                   <td>{{$product->color}}</td>
                   <td>{{$product->price}}</td>
                   <td><a href="/products/{{$product->id}}" class="text-primary">View</a></td>
                   <td><a href="/products/{{$product->id}}/edit" class="text-secondary">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
          
          {{$products->links()}}
        </div>
        
      </div>
       
    </div> 
@endsection