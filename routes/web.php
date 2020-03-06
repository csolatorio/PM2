<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
// ['register' => false]

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', function (Request $request){
	Auth::guard()->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
});
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/create', 'CustomerController@create');
Route::post('/customers', 'CustomerController@store');
Route::patch('/customers/{customer}', 'CustomerController@update');
Route::get('/customers/{customer}', 'CustomerController@show');

Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/create', 'EmployeeController@create');
Route::post('/employees', 'EmployeeController@store');
// Route::get('/employees/{employee}', 'EmployeeController@edit');
Route::patch('/employees/{employee}', 'EmployeeController@update');
Route::get('/employees/{employee}', 'EmployeeController@show');


Route::get('/index', 'LayoutController@index');
Route::get('/calendar', 'LayoutController@calendar');

Route::get('/trucks', 'TruckController@index');