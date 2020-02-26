<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
	public function index(){
		 $employees = \App\Employee::all();
    	return view('employee.index', compact('employees'));
	} 
	public function create(){
    	return view('employee.create');
    }

    public function store(Request $request){
    	// dd($request->truck);
    	$data = request()->validate([
        'emp_id'=>'required',
        'emp_name'=>'required',
        'emp_address'=>'required',
        'emp_phone'=>'required'
      ]);
      \App\Employee::create($data);
      return redirect('/employees');
    }
  
}
