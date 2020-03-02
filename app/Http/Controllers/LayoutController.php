<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function calendar(){
    	return view('layouts.calendar');
    }
    public function index()
    {
        return view('layouts.index');
    }
}
