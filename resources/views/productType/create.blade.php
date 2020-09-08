@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/productType.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container" id="new-product-type-container">
        <h1 id="page-title">Add Brand</h1>
        <form action="/productTypes" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="row">
                <div id="new-productType-image" class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                    <img src="" alt="" id="uploaded-image">
                    <label for="image-to-upload" id="lbl-image-to-upload">
                        <svg width="1.0625em" height="1em" viewBox="0 0 17 16" class="bi bi-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.002 2h-12a1 1 0 0 0-1 1v9l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15.002 9.5V3a1 1 0 0 0-1-1zm-12-1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm4 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                        <div>Click to add product type image</div>
                    </label>  
                    <input type="file" id="image-to-upload" name="productTypeImage" style="display: none;" onchange="readURL(this);">
                    
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"  required>
                    </div> 
                    <button type="submit" title="Submit" class="btn btn-primary">Add Product Type</button>
                </div>
            </div>
        </form>
    </div>
@endsection
