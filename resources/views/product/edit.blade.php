@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <h1 id="page-title">Edit Product</h1>
        <form action="/products/{{$product->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div id="editable-product-image" class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                    <img src={{$product->image}} alt={{$product->name}} id="uploaded-image">
                    <label for="image-to-upload" id="lbl-image-to-upload">
                        <svg width="1.0625em" height="1em" viewBox="0 0 17 16" class="bi bi-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.002 2h-12a1 1 0 0 0-1 1v9l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15.002 9.5V3a1 1 0 0 0-1-1zm-12-1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm4 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                        <div>Click to add product image</div>
                    </label>  
                    <input type="file" id="image-to-upload" name="productImage" style="display: none;" onchange="readURL(this);">
                    
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value={{$product->name}} required>
                    </div>
                    <div class="form-group">
                        <label for="sizes">Sizes</label>
                        <input type="text" class="form-control" name="sizes" id="sizes" aria-describedby="emailHelp" placeholder="Eg:10,5.5,6" value={{$product->size}} required>
                        <small id="sizesHelp" class="form-text text-muted">Enter sizes seperated by "," (Eg:10,5.5,6).</small>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value={{$product->price}}>
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" name="color" id="color" value={{$product->color}} required>
                    </div>
                    <div class="form-group">
                        <label for="brandSelect">Brand</label>
                        <select class="form-control" id="brandSelect" name="brand">
                            @foreach ($brands as $brand)
                                <option value={{$brand->id}} 
                                {{-- if product brand matches this brand mark this as selected --}}
                                @if ($brand->id == $product->brand->id)
                                {{"selected"}}
                                @endif>{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="typeSelect">Type</label>
                        <select class="form-control" id="typeSelect" name="type">
                            @foreach ($productTypes as $productType)
                            <option value={{$productType->id}}
                                 {{-- if product type matches this type mark this as selected --}}
                                 @if ($productType->id == $product->type->id)
                                 {{"selected"}}
                                 @endif
                                >{{$productType->name}}</option>
                                
                            @endforeach
                        </select>
                    </div>  
                    <button type="submit" title="Submit" class="btn btn-primary">Update Product</button>
                    <button type="reset" title="Reset" class="btn btn-secondary">Clear Form</button>          
                </div>
            </div>
        </form>
    </div>
@endsection
