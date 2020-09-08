@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/brand.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <h1 id="page-title">Brands</h1>
    <div class="row">
      <div id="add-brand-container">
        <a href="/brands/create" id="add-brand-link">
            <svg viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
              </svg><span>Add Brand</span></a>
      </div>
      <div class="col-12 table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="table table-bordered" >
          <thead>
            <tr>
              <th scope="col">Brand Id</th>
              <th scope="col">Brand Name</th>
              <th scope="col">Brand Logo</th>
              <th scope="col">Brand Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($brands as $brand)
              <tr>
                 <td>{{$brand->id}}</td>
                 <td>{{$brand->name}}</td>
                 <td>
                     <img class="brand-image" src={{$brand->image}} alt={{$brand->name}}>
                 </td>
                 <td><a href="/brands/{{$brand->id}}/edit" class="text-secondary">Edit</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        
        {{$brands->links()}}
      </div>
      
    </div>
     
  </div> 
@endsection