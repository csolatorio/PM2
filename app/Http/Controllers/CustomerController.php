<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){
    	$customers = \App\Customer::all();
    	return view('customer.index', compact('customers'));
    }

    public function create(){
        $customers = \App\Customer::all();
    	return view('customer.create', compact('customers'));
    }

    public function store(Request $request){
    	// dd($request->truck);
    	$data = request()->validate([
        'cus_truck'=>'required',
        'cus_vanqty'=>'required',
        'cus_vannumber'=>'required',
        'cus_name'=>'required',
        'cus_destination'=>'required',
        'cus_description'=>'required',
        'cus_amount'=>'required'
      ]);
      \App\Customer::create($data);
      return redirect('/customers');
    }
    public function edit()
    {
        $customer = \App\Customer::all();
        return view('customer.edit', compact('customer'));
    }
    public function update(Request $request, Customer $customer)
    {
        $customer ->update([
         'cus_truck'=>$request->cus_truck,
        'cus_vanqty'=>$request->cus_vanqty,
        'cus_vannumber'=>$request->cus_vannumber,
        'cus_name'=>$request->cus_name,
        'cus_destination'=>$request->cus_destination,
        'cus_description'=>$request->cus_description,
        'cus_amount'=>$request->cus_amount
        ]);
        return view('customer.edit', compact('customer'));
    }
}
