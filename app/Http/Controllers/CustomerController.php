<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerController extends Controller
{
    //
    public function index(Request $request){


        if ($request->all()) {


            $customers = \App\Customer::where('plate_num', 'like', '%' . $request->plate_num . '%')->get();
            // dd($customers);
        }else{

            $customers = \App\Customer::all();
        }
        
    	// 

        

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
        'plate_num'=>'required',
        'cus_truck'=>'required',
        'cus_vanqty'=>'required',
        'cus_vannumber'=>'required',
        'cus_name'=>'required',
        'cus_destination'=>'required',
        'cus_description'=>'required',
        'cus_amount'=>'required',
        'hours'=>'nullable'
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
        // dd($request->all());

        // $date1 = Carbon::parse("2020-01-01 08:00:00");
        // $date2 = Carbon::parse("2020-01-01 10:00:00");

        // $diffInHours_ = $date1->diffInHours($date2);

        // if ($diffInHours_ <= $request->hours) {
        //     return 'On Time';
        // }
        // else {
        //     return 'Delayed';
        // }


        // dd($diffInHours_);

        // dd($request->all());
       $data = request()->validate([
        'cus_truck'=>'required',
        'cus_vanqty'=>'required',
        'cus_vannumber'=>'required',
        'cus_name'=>'required',
        'cus_destination'=>'required',
        'cus_description'=>'required',
        'cus_amount'=>'required',
        'hours'=>'nullable'
      ]);

        $customer->update($data);


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
