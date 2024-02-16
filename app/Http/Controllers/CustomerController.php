<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function index(){
        $customerList = Customer::orderBy('id','Desc')->get();
        return view('customers.index',compact('customerList'));
    }

    public function create(){
        return view('customers.create');
    }

    public function store(Request $request){
        $input = $request->all();
        $customer = new Customer();
        $customer->name = $input['name'];
        $customer->phone = $input['phone'] ?? null;
        $customer->email = $input['email'] ?? null;
        $customer->address = $input['address'] ?? null;
        $customer->save();

        return redirect()->route('customer.list');
    }

    public function edit($id){
        
        $customerDetails = Customer::find($id);
        return view('customers.edit',compact('customerDetails'));
    }

    public function update(Request $request){

        $customer = Customer::find($request->customer_id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->route('customer.list');
    }
    

    public function destroy($id){
        Customer::find($id)->delete();
        return redirect()->route('customer.list');
    }
}
