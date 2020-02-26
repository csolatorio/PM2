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
    	return view('customer.create');
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
}
