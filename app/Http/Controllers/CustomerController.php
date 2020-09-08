<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::paginate(10);
        return view('customer.index')->with('customers',$customers);
    }

    public function destroy($customerId){
        Customer::destroy($customerId);
        return redirect('/customers');
    
    }
}
