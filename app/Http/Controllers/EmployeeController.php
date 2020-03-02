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
        'id'=>'required',
        'emp_name'=>'required',
        'emp_address'=>'required',
        'emp_phone'=>'required'
      ]);
      \App\Employee::create($data);
      return redirect('/employees');
    }
    public function edit(\App\Employee $employee){
      // dd($employees);
        $employee = \App\Employee::all();
        return view('employee.edit', compact('employee'));
    }
    public function update(Request $request, \App\Employee $employee){
      // dd($request->emp_address);

      $data = request()->validate([
        'id'=>'required',
        'emp_name'=>'required',
        'emp_address'=>'required',
        'emp_phone'=>'required'
      ]);

      $employee->update($data);
      
      return redirect('/employees');

    }
    public function show(\App\Employee $employee){
      // dd($employee);
      return view('employee.show', compact('employee'));
    }
  
}
