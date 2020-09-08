@extends('layouts.app')  
@push('styles')
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
      <h1 id="page-title">Orders</h1>
      <div class="row">
        <div class="col-12 table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
          <table class="table table-bordered" >
            <thead>
              <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Products Ordered</th>
                <th scope="col">Shipping Address</th>
                <th scope="col">Order Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                   <td>{{$order->id}}</td>
                   <td>{{$order->customer->name}}</td>
                   <td>{{count($order->products)}}</td>
                   <td>{{$order->shippingAddress->address_line_1."\n".$order->shippingAddress->address_line_2."\n".$order->shippingAddress->landmark." ".$order->shippingAddress->state." ".$order->shippingAddress->zip_code}}</td>
                  <td><a href="/orders/{{$order->id}}" class="text-primary">View</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{$orders->links()}}
        </div>
        
      </div>
       
    </div> 
@endsection