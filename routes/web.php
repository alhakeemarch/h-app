<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Person;
use App\Auth\RegisterController;


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

Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    // return back();
    return redirect()->back();
})->name('localeization');

Route::get('/', function () {
    return view('welcome');
});



Route::any('/Person/check', 'PersonController@check')->name('person.check');
Route::any('/Customer/check', 'CustomerController@check')->name('customer.check');
Route::any('/Employee/check', 'EmployeeController@check')->name('employee.check');
Route::any('/Project/check', 'ProjectController@check')->name('project.check');
Route::any('/Plot/check', 'PlotController@check')->name('plot.check');
Route::any('/user/userRegister', 'Auth\RegisterController@userRegister')->name('userRegister');
Route::any('/user/userLogin', 'Auth\LoginController@userLogin')->name('userLogin');
Route::any('/user/personStore', 'Auth\RegisterController@personStore')->name('personStore');

Route::resources([

    // new
    'Person' => 'PersonController',
    'PersonDoc' => 'PersonDocController',

    'Customer' => 'CustomerController',
    'Employee' => 'EmployeeController',
    
    'Major' => 'MajorController',
    'Contact' => 'ContactController',
    'Address' => 'AddressController',

    'Project' => 'ProjectController',
    'ProjectDoc' => 'ProjectDocController',
    'Task' => 'TaskController',
    'Contract' => 'ContractController',
    'Contractfield' => 'ContractfieldController',
    
    'Plot' => 'PlotController',
    'PlotDoc'=>'PlotDocController',
    
    'Invoice' => 'InvoiceController',
    'InvoiceDetail' => 'InvoiceDetailController',
    'InvoiceReturn' => 'InvoiceReturnController',
    'InvoiceReturnDetail' => 'InvoiceReturnDetailController',

    'ReceiptIn' => 'ReceiptInController',
    'ReceiptOut' => 'ReceiptOutController',
    'ReceiptDiscount' => 'ReceiptDiscountController',
    'Account' => 'AccountController',
    
    
    
    'Imports' => 'ImportController',
    'Exports' => 'ExportController',
    'Letters' => 'LetterController',
    'Lettertypes' => 'LettertypeController',
   
]);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
























Route::get('/test', function () {
    if (\Auth::check()) {
        if ((auth()->user()->user_level) >= 10) {
            return view('test');
        } else {
            return "you are not allowed to goo..";
        }
    } else {
        return redirect('/login');
    }
});
Route::get('/test2', function () {
    // return now();
    return Person::all();
    // dd(Person::all());
    dd(\App\Person::all());
    dd(\Auth::check());
    dd(Auth::guest());
    if (!Auth::guest()) {
        return Auth::user();
    } else {
        return "you are guest";
    }
});
