<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){
    	$customers = \App\Customer::all();

        $grandTotal = 0;

        foreach ($customers as $customer) {
         $grandTotal += $customer->cus_amount;
            }

    	return view('customer.index', compact('customers', 'grandTotal'));

    }

    public function create(){
    	return view('customer.create');
    }

    public function store(Request $request){
    	// dd($request->all());
    	$data = request()->validate([
        'cus_truck'=>'required',
        'cus_vanqty'=>'required',
        'cus_vannumber'=>'required',
        'cus_name'=>'required',
        'cus_destination'=>'required',
        'cus_description'=>'required',
        'cus_amount'=>'required'
      ]);
        // dd($data);

      \App\Customer::create($data);
      return redirect('/customers');
    }

    public function edit(\App\Customer $customer)
    {
        $customer = \App\Customer::all();
        return view('customer.edit', compact('customer'));
    }
    
    public function update(Request $request, \App\Customer $customer)
    {
       $data = request()->validate([
        'id'=>'required',
        'cus_truck'=>'required',
        'cus_vanqty'=>'required',
        'cus_vannumber'=>'required',
        'cus_name'=>'required',
        'cus_destination'=>'required',
        'cus_description'=>'required',
        'cus_amount'=>'required'
      ]);

        $customers->update($data);


      return redirect('/customers');
    }
    public function show(\App\Customer $customer){
        // dd($customer->id);
      return view('customer.show', compact('customer'));
    }

    public function export() 
    {
        dd('export');
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }
}
