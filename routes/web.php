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
// -----------------------------------------------------------------------------------------------------------------
Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    // return back();
    return redirect()->back();
})->name('localeization');
// -----------------------------------------------------------------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
})->name('home');
// -----------------------------------------------------------------------------------------------------------------
Route::any('/f', function () {

    //////////////////////////////////////////////////////////    
    // $h = new App\HijriDate();
    // return $h->get_date(12 - 01 - 2020);
    // return $h->get_date(12 - 01 - 2025);
    // return $h->get_date(time());
    // return strtotime($h->get_date());
    // return strtotime(date('Y'));
    // echo  time() . '<br>';
    // return strtotime('13-01-2020 10:57:03PM');
    // return now();
    // return time();
    //////////////////////////////////////////////////////////    

    if (false) {
        Artisan::call('migrate:fresh');
        Artisan::call('cache:clear');
        makeUser('admin');
        makeUser('fahd');
        makeUser('hanadi');
        return firstInsertion();
    }


    // return Artisan::call('migrate:fresh');
    // return Artisan::call('cache:clear');
    // return makeUser('admin');
    // return makeUser('fahd');
    // return makeUser('hanadi');
    // factory(\App\Person::class, 100)->create();
    # الفاكتوري يحتاج إعادة بعد تعديل حقول الجدول
    // factory(\App\Plot::class, 100)->create();

    // return firstInsertion();
    return ' whaaaat !!!';

    ########################################################################################################################
    // dd(scandir('D:/privet'));
    // $directory = '//100.0.0.6/Finished-Projects';
    // $scanned_directory = array_diff(scandir($directory), array('..', '.'));
    // return $scanned_directory;

    // foreach ($scanned_directory as $key => $value) {
    //     // $po = stristr($value, ' - ');

    //     $position = stripos($value, '-');
    //     $sub = substr($value, 0, $position);
    //     // is_int ( mixed $var )
    //     if (!ctype_digit($sub)) {
    //         // if (is_numeric($sub)) {
    //         echo $sub;
    //     }
    //     echo '<br />';
    //     // echo $po;
    // }
    // return $scanned_directory;
    // return (glob('*'));

    // $dirs = array_filter(glob('*'), 'is_dir');
    // print_r($dirs);
    // return $scanned_directory;

    // chdir
    // chroot
    // closedir
    // dir
    // getcwd
    // opendir
    // readdir
    // rewinddir
    // scandir
    // return App\Http\Controllers\ProjectController::test();
});
// -----------------------------------------------------------------------------------------------------------------
function firstInsertion()
{
    if (!auth()->user()->id) {
        return 'must be logged in';
    }
    $feed_back = [];
    // -------------------------------------------------------------------
    if (App\Http\Controllers\CountryController::firstInsertion()) {
        array_push($feed_back, ['Countries' => true]);
    } else {
        array_push($feed_back, ['Countries' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\MunicipalityBranchController::firstInsertion()) {
        array_push($feed_back, ['MunicipalityBranchs' => true]);
    } else {
        array_push($feed_back, ['MunicipalityBranchs' => false]);
    }
    // -------------------------------------------------------------------
    // return $feed_back;

    if ($feed_back[1]['MunicipalityBranchs']) {
        if (App\Http\Controllers\DistrictController::firstInsertion()) {
            array_push($feed_back, ['Districts' => true]);
        } else {
            array_push($feed_back, ['Districts' => false]);
        }
    } else {
        array_push($feed_back, ['Districts' => 'No:::MunicipalityBranchs']);
    }
    // -------------------------------------------------------------------
    if ($feed_back[1]['MunicipalityBranchs'] && $feed_back[2]['Districts']) {
        if (App\Http\Controllers\NeighborController::firstInsertion()) {
            array_push($feed_back, ['Neighbors' => true]);
        } else {
            array_push($feed_back, ['Neighbors' => false]);
        }
    } else {
        array_push($feed_back, ['Neighbors' => 'No:::MunicipalityBranchs or Districts']);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\PlanController::firstInsertion()) {
        array_push($feed_back, ['Plans' => true]);
    } else {
        array_push($feed_back, ['Plans' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\StreetController::firstInsertion()) {
        array_push($feed_back, ['streets' => true]);
    } else {
        array_push($feed_back, ['streets' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\AllowedUsageController::firstInsertion()) {
        array_push($feed_back, ['allowedUsages' => true]);
    } else {
        array_push($feed_back, ['allowedUsages' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\AllowedBuildingRatioController::firstInsertion()) {
        array_push($feed_back, ['AllowedBuildingRatios' => true]);
    } else {
        array_push($feed_back, ['AllowedBuildingRatios' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\AllowedBuildingHeightController::firstInsertion()) {
        array_push($feed_back, ['AllowedBuildingHeights' => true]);
        array_push($feed_back, ['records = ' => App\AllowedBuildingHeight::all()->count()]);
    } else {
        array_push($feed_back, ['AllowedBuildingHeights' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\OwnerTypeController::firstInsertion()) {
        array_push($feed_back, ['OwnerTypes' => true]);
    } else {
        array_push($feed_back, ['OwnerTypes' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\MajorController::firstInsertion()) {
        array_push($feed_back, ['Majors' => true]);
    } else {
        array_push($feed_back, ['Majors' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\GradeRankController::firstInsertion()) {
        array_push($feed_back, ['GradeRanks' => true]);
    } else {
        array_push($feed_back, ['GradeRanks' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\SceMembershipTypeController::firstInsertion()) {
        array_push($feed_back, ['SceMembershipTypes' => true]);
    } else {
        array_push($feed_back, ['SceMembershipTypes' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\BankController::firstInsertion()) {
        array_push($feed_back, ['Banks' => true]);
    } else {
        array_push($feed_back, ['Banks' => false]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\UserTypeController::firstInsertion()) {
        array_push($feed_back, ['UserTypes' => true]);
    } else {
        array_push($feed_back, ['UserTypes' => false]);
    }

    return $feed_back;
}
// -----------------------------------------------------------------------------------------------------------------
Route::any('/person/check', 'PersonController@check')->name('person.check');
Route::any('/customer/check', 'CustomerController@check')->name('customer.check');
Route::any('/employee/check', 'EmployeeController@check')->name('employee.check');
Route::any('/project/check', 'ProjectController@check')->name('project.check');
Route::any('/plot/check', 'PlotController@check')->name('plot.check');
Route::any('/contract/check', 'ContractController@check')->name('contract.check');
Route::any('/task/check', 'TaskController@check')->name('task.check');
Route::any('/country/check', 'CountryController@check')->name('country.check');
// -----------------------------------------------------------------------------------------------------------------
Route::any('/user/userRegister', 'Auth\RegisterController@check')->name('register.check');
// Route::any('/user/userRegister', 'Auth\RegisterController@userRegister')->name('userRegister');
Route::any('/user/userLogin', 'Auth\LoginController@check')->name('login.check');
// Route::any('/user/userLogin', 'Auth\LoginController@userLogin')->name('userLogin');
// Route::any('/user/personStore', 'Auth\RegisterController@personStore')->name('personStore');
// -----------------------------------------------------------------------------------------------------------------
Route::resources([

    // new
    'user' => 'UserController',
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
    'country' => 'CountryController',
    'country' => 'CountryController',
    'saudiCity' => 'SaudiCityController',
    'district' => 'DistrictController',
    'neighbor' => 'NeighborController',
    'plan' => 'PlanController',
    'street' => 'StreetController',
    'municipalityBranch' => 'MunicipalityBranchController',
    'allowedBuildingRatio' => 'AllowedBuildingRatioController',
    'allowedBuildingHeight' => 'AllowedBuildingHeightController',
    'ownerType' => 'OwnerTypeController',
    'userType' => 'UserTypeController',
    'bank' => 'BankController',
    'sceMembershipType' => 'SceMembershipTypeController',
    'gradeRank' => 'GradeRankController',
    'major' => 'MajorController',

]);
// -----------------------------------------------------------------------------------------------------------------
Auth::routes();
// -----------------------------------------------------------------------------------------------------------------
Route::get('/home', 'HomeController@index')->name('home');
// -----------------------------------------------------------------------------------------------------------------
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
// -----------------------------------------------------------------------------------------------------------------
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
// -----------------------------------------------------------------------------------------------------------------
function makeUser($user)
{
    $fahd = [
        'national_id' => '2001846613',
        'created_by_id' => '1',
        'created_by_name' => 'admin',
        'is_employee' => true,
        'is_customer' => true,
        'ar_name1' => 'فهد',
        'ar_name5' => "بخش",
        'en_name1' => 'Fahd',
        'en_name5' => 'Bakhsh',
        'mobile' => '0500858415',
        'phone' => '0148650000',
        'phone_extension' => '103',
        'email' => 'al-fahd@windowslive.com'
    ];
    $fahdUser = [
        'user_name' => 'fff',
        'password' => Hash::make('1'),
        'is_manager' => true,
        'user_type_id' => '100',
        'user_type_name' => 'Admin',
        'user_level' => '100',
        'job_level' => '100',
    ];
    // ===========================================
    $admin = [
        'national_id' => '1000000000',
        'created_by_id' => '1',
        'created_by_name' => 'admin',
        'is_employee' => true,
        'is_customer' => true,
        'ar_name1' => 'المدير',
        'ar_name5' => '-',
        'en_name1' => 'admin',
        'en_name5' => '-',
        'mobile' => '0500000000',
        'phone' => '0148650000',
        'phone_extension' => '103',
        'email' => 'admin@hakeemarch.com'
    ];
    $adminUser = [
        'user_name' => 'admin',
        'password' => Hash::make('1'),
        'user_type_id' => '100',
        'user_type_name' => 'Admin',
        'is_admin' => true,
        'is_manager' => true,
        'user_level' => '100',
        'job_level' => '100',
    ];

    // ===========================================
    $hanadi = [
        'national_id' => '1077844478',
        'created_by_id' => '1',
        'created_by_name' => 'admin',
        'is_employee' => true,
        'is_customer' => true,
        'ar_name1' => 'المدير',
        'ar_name5' => '-',
        'en_name1' => 'admin',
        'en_name5' => '-',
        'mobile' => '0500000000',
        'phone' => '0148650000',
        'phone_extension' => '133',
        'email' => '1412hano@gmail.com'
    ];
    $hanadiUser = [
        'user_name' => 'hhh',
        'password' => Hash::make('1'),
        'user_type_id' => '100',
        'user_type_name' => 'Admin',
        'is_admin' => true,
        'is_manager' => true,
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
    } elseif ($user == 'hanadi') {
        $the_person = $hanadi;
        $the_user = $hanadiUser;
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
    return $person;
    // return redirect('/');
    // return 'user created';
}
// -----------------------------------------------------------------------------------------------------------------
