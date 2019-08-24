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



Route::any('/person/check', 'PersonController@check')->name('person.check');
Route::any('/customer/check', 'CustomerController@check')->name('customer.check');
Route::any('/employee/check', 'EmployeeController@check')->name('employee.check');
Route::any('/project/check', 'ProjectController@check')->name('project.check');
Route::any('/plot/check', 'PlotController@check')->name('plot.check');
Route::any('/user/userRegister', 'Auth\RegisterController@userRegister')->name('userRegister');
Route::any('/user/userLogin', 'Auth\LoginController@userLogin')->name('userLogin');
Route::any('/user/personStore', 'Auth\RegisterController@personStore')->name('personStore');

Route::resources([
    'person' => 'PersonController',
    // 'personDoc' => 'PersonDocController',
    'customer' => 'CustomerController',
    'employee' => 'EmployeeController',
    'plot' => 'PlotController',
    // 'plotDoc'=>'PlotDocController',
    'project' => 'ProjectController',
    'projectDoc' => 'ProjectDocController',
    'task' => 'TaskController',
    'contract' => 'ContractController',

    'receiptIn' => 'ReceiptInController',
    'receiptOut' => 'ReceiptOutController',
    'receiptDiscount' => 'ReceiptDiscountController',
    'invoice' => 'InvoiceController',
    'invoiceRe' => 'InvoiceReController',
   
 
    // 'major' => 'MajorController',
    // 'contact' => 'ContactController',
    // 'banking' => 'BankingController',
    // 'addresse' => 'AddressController',
  
    // 'contractfields' => 'ContractfieldController',
    
    // 'bills' => 'BillController',
    // 'paymentin' => 'PaymentinController',
    // 'paymentout' => 'PaymentoutController',
    
    // 'imports' => 'ImportController',
    // 'exports' => 'ExportController',
    // 'letters' => 'LetterController',
    // 'lettertypes' => 'LettertypeController',

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
