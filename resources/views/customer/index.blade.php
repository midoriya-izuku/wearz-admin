@extends('layouts.app')  

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12 table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
          <table class="table table-bordered" >
            <thead>
              <tr>
                <th scope="col">Customer Id</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Customer Email</th>
                <th scope="col">Default Address</th>
                <th scope="col">Joined On</th>
                <th scope="col">Customer Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                   <td>{{$customer->id}}</td>
                   <td>{{$customer->name}}</td>
                   <td>{{$customer->email}}</td>
                   <td>{{$customer->defaultAddress->address_line_1."\n".$customer->defaultAddress->address_line_2."\n".$customer->defaultAddress->landmark." ".$customer->defaultAddress->state." ".$customer->defaultAddress->zip_code}}</td>
                   <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d/m/Y')}}</td>
                   <td>
                    <form method="post" action="/customers/{{$customer->id}}"> 
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                   </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{$customers->links()}}
        </div>
        
      </div>
       
    </div> 
@endsection