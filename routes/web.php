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
})->name('home');


Route::any('/f', function () {
    // // // inserts all available nationalities to db
    // return App\Nationality::all()->count();
    // return (App\Http\Controllers\NationalityController::firstInsertion()) ? App\Nationality::all() : 'some thing is worng';

    // // // inserts all available Municipality Branchs to db
    // return (App\Http\Controllers\MunicipalityBranchController::firstInsertion()) ? App\MunicipalityBranch::all() : 'some thing is worng';


    // Artisan::call('migrate:fresh');
    // Artisan::call('cache:clear');
    // return makeUser('admin');
    // return makeUser('fahd');
    // factory(\App\Person::class, 100)->create();
    factory(\App\Plot::class, 10)->create();
});






Route::any('/person/check', 'PersonController@check')->name('person.check');
Route::any('/customer/check', 'CustomerController@check')->name('customer.check');
Route::any('/employee/check', 'EmployeeController@check')->name('employee.check');
Route::any('/project/check', 'ProjectController@check')->name('project.check');
Route::any('/plot/check', 'PlotController@check')->name('plot.check');
Route::any('/contract/check', 'ContractController@check')->name('contract.check');
Route::any('/task/check', 'TaskController@check')->name('task.check');
Route::any('/user/userRegister', 'Auth\RegisterController@userRegister')->name('userRegister');
Route::any('/user/userLogin', 'Auth\LoginController@userLogin')->name('userLogin');
Route::any('/user/personStore', 'Auth\RegisterController@personStore')->name('personStore');

Route::resources([

    // new
    'person' => 'PersonController',
    'personDoc' => 'PersonDocController',

    'customer' => 'CustomerController',
    'employee' => 'EmployeeController',

    'major' => 'MajorController',
    'contact' => 'ContactController',
    'address' => 'AddressController',

    'project' => 'ProjectController',
    'projectDoc' => 'ProjectDocController',
    'task' => 'TaskController',
    'contract' => 'ContractController',
    'contractfield' => 'ContractfieldController',

    'plot' => 'PlotController',
    'plotDoc' => 'PlotDocController',

    'invoice' => 'InvoiceController',
    'invoiceDetail' => 'InvoiceDetailController',
    'invoiceReturn' => 'InvoiceReturnController',
    'invoiceReturnDetail' => 'InvoiceReturnDetailController',

    'receiptIn' => 'ReceiptInController',
    'receiptOut' => 'ReceiptOutController',
    'receiptDiscount' => 'ReceiptDiscountController',
    'account' => 'AccountController',

    'import' => 'ImportController',
    'export' => 'ExportController',
    'letter' => 'LetterController',
    'lettertype' => 'LettertypeController',

    //  جداول لحفظ الداتا
    'nationality' => 'NationalityController',
    'country' => 'CountryController',
    'saudiCity' => 'SaudiCityController',
    'district' => 'DistrictController',
    'plan' => 'PlanController',
    'municipalityBranch' => 'MunicipalityBranchController',

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




function makeUser($user)
{
    $fahd = [
        'national_id' => '2001846613',
        'is_employee' => '1',
        'is_customer' => '1',
        'ar_name1' => 'فهد',
        'ar_name5' => "بخش",
        'en_name1' => 'Fahd',
        'en_name5' => 'Bakhsh',
        'mobile' => '0500858415',
        'phone' => '0148650000',
        'phone_extension' => '102',
        'email' => 'al-fahd@windowslive.com'
    ];
    $fahdUser = [
        'user_name' => 'fff',
        'password' => Hash::make('1'),
        'user_type_id' => '100',
        'user_type_name' => 'Admin',
        'user_level' => '100',
        'job_level' => '100',
    ];
    // ===========================================
    $admin = [
        'national_id' => '1000000000',
        'is_employee' => '1',
        'is_customer' => '1',
        'ar_name1' => 'المدير',
        'ar_name5' => '-',
        'en_name1' => 'admin',
        'en_name5' => '-',
        'mobile' => '0500000000',
        'phone' => '0148650000',
        'phone_extension' => '102',
        'email' => 'admin@hakeemarch.com'
    ];
    $adminUser = [
        'user_name' => 'admin',
        'password' => Hash::make('1'),
        'user_type_id' => '100',
        'user_type_name' => 'Admin',
        'user_level' => '100',
        'job_level' => '100',
    ];


    $the_person = [];
    $the_user = [];

    if ($user == 'fahd') {
        $the_person = $fahd;
        $the_user = $fahdUser;
    } elseif ($user == 'admin') {
        $the_person = $admin;
        $the_user = $adminUser;
    } elseif ($user == '') {
        // 
    } elseif ($user == '') {
        // 
    } else {
        //
    }

    $fromPerson = [
        'name' => $the_person['ar_name1'] . ' - ' . $the_person['en_name1'],
        'national_id' => $the_person['national_id'],
        'email' => $the_person['email'],
    ];

    Person::create($the_person);

    $person = Person::where('national_id', $the_person['national_id'])->first();

    $person->user()->create(array_merge($fromPerson, $the_user));
    return redirect('/home');
}
