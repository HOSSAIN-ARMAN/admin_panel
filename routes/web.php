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

Route::get('/welcome', function () {
    return view('welcome');
});


Route::View('/', 'bladeFile.home');
//use short-cut to view blade file Route::View(urlName:'contact', fileLocation:'bladeFile.testContact')
Route::View('about', 'bladeFile.about')->middleware('test');



//Route::get('contact', 'ContactFormController@create');
//Route::post('contact', 'ContactFormController@store');

Route::get('contact', 'ContactFormController@create')->name('contact.create');
Route::post('contact', 'ContactFormController@store')->name('contact.store');


//Route::View('contact', 'bladeFile.contact');

//way one sent data to view file this way

//Route::get('/customer', function (){
//    $customer = [
//        'name',
//        'Number',
//        'Contact'
//    ];
//   return view('bladeFile.customer.customer', [
//       'customers' => $customer
//   ]);
//});

//Route::patch('customers/{customer}', function (\App\Customer $customer){
//    $data = request()->validate([
//        'name' => 'required',
//        'email' => 'required|email',
//    ]);
//    $customer->update($data);
//
//    return redirect('customer/'.$customer->id);
//});

//Route::get('customers/{customer}/edit', function (\App\Customer $customer){
//    $companies = \App\Company::all();
//    return view('bladeFile.customer.edit', compact('customer', 'companies'));
//});



//you can use single route like this

//Route::get('customers', 'CustomerController@index');
//Route::get('customers/create', 'CustomerController@create')->name('customers.create');
//Route::post('customers/store', 'CustomerController@store')->name('customers.store');
////Route::get('customers/{customer}', 'CustomerController@show')->name('customers.show')->middleware('can:view, customer');
//Route::get('customers/{customer}', 'CustomerController@show')->name('customers.show');
//Route::get('customers/{customer}/edit', 'CustomerController@edit');
//Route::patch('customers/{customer}', 'CustomerController@update')->name('customers.update');
//Route::delete('customers/{customer}', 'CustomerController@destroy');

//i am using route resourse

Route::resource('customers', 'CustomerController')->middleware('auth');

//Route::resource('customers', 'CustomerController');




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
