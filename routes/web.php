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

    if (true) {
        Artisan::call('migrate:fresh');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        makeUser('admin');
        makeUser('fahd');
        makeUser('hanadi');
        // return 'done....!';
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
    $start_time = hrtime();
    $feed_back = [];
    $inserted_records = 0;
    // -------------------------------------------------------------------
    if (App\Http\Controllers\CountryController::firstInsertion()) {
        array_push($feed_back, ['Countries' => true]);
        array_push($feed_back, ['Countries records = ' => App\Country::all()->count()]);
        $inserted_records = $inserted_records + App\Country::all()->count();
    } else {
        array_push($feed_back, ['Countries' => false]);
        array_push($feed_back, ['Countries records = ' => App\Country::all()->count()]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\MunicipalityBranchController::firstInsertion()) {
        array_push($feed_back, ['MunicipalityBranchs' => true]);
        array_push($feed_back, ['MunicipalityBranchs records = ' => App\MunicipalityBranch::all()->count()]);
    } else {
        array_push($feed_back, ['MunicipalityBranchs' => false]);
        array_push($feed_back, ['MunicipalityBranchs records = ' => App\MunicipalityBranch::all()->count()]);
    }
    // -------------------------------------------------------------------

    if ($feed_back[2]['MunicipalityBranchs']) {
        if (App\Http\Controllers\DistrictController::firstInsertion()) {
            array_push($feed_back, ['Districts' => true]);
            array_push($feed_back, ['Districts records = ' => App\District::all()->count()]);
        } else {
            array_push($feed_back, ['Districts' => false]);
            array_push($feed_back, ['Districts records = ' => App\District::all()->count()]);
        }
    } else {
        array_push($feed_back, ['Districts' => 'No:::MunicipalityBranchs']);
        array_push($feed_back, ['Districts records = ' => App\District::all()->count(),]);
    }
    // -------------------------------------------------------------------

    if ($feed_back[2]['MunicipalityBranchs'] && $feed_back[4]['Districts']) {
        if (App\Http\Controllers\NeighborController::firstInsertion()) {
            array_push($feed_back, ['Neighbors' => true]);
            array_push($feed_back, ['Neighbors records = ' => App\Neighbor::all()->count()]);
        } else {
            array_push($feed_back, ['Neighbors' => false]);
            array_push($feed_back, ['Neighbors records = ' => App\Neighbor::all()->count()]);
        }
    } else {
        array_push($feed_back, ['Neighbors' => 'No:::MunicipalityBranchs or Districts']);
        array_push($feed_back, ['Neighbors records = ' => App\Neighbor::all()->count()]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\PlanController::firstInsertion()) {
        array_push($feed_back, ['Plans' => true]);
        array_push($feed_back, ['Plans records = ' => App\Plan::all()->count()]);
    } else {
        array_push($feed_back, ['Plans' => false]);
        array_push($feed_back, ['Plans records = ' => App\Plan::all()->count()]);
    }
    // -------------------------------------------------------------------
    // if (App\Http\Controllers\StreetController::firstInsertion() || false) {
    //     array_push($feed_back, ['streets' => true]);
    //     array_push($feed_back, ['Streets records = ' => App\Street::all()->count(),]);
    // } else {
    //     array_push($feed_back, ['streets' => false]);
    //     array_push($feed_back, ['Streets records = ' => App\Street::all()->count(),]);
    // }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\AllowedUsageController::firstInsertion()) {
        array_push($feed_back, ['allowedUsages' => true]);
        array_push($feed_back, ['AllowedUsages records = ' => App\AllowedUsage::all()->count(),]);
    } else {
        array_push($feed_back, ['allowedUsages' => false]);
        array_push($feed_back, ['AllowedUsages records = ' => App\AllowedUsage::all()->count(),]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\AllowedBuildingRatioController::firstInsertion()) {
        array_push($feed_back, ['AllowedBuildingRatios' => true]);
        array_push($feed_back, ['AllowedBuildingRatios records = ' => App\AllowedBuildingRatio::all()->count(),]);
    } else {
        array_push($feed_back, ['AllowedBuildingRatios' => false]);
        array_push($feed_back, ['AllowedBuildingRatios records = ' => App\AllowedBuildingRatio::all()->count(),]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\AllowedBuildingHeightController::firstInsertion()) {
        array_push($feed_back, ['AllowedBuildingHeights' => true]);
        array_push($feed_back, ['AllowedBuildingHeights records = ' => App\AllowedBuildingHeight::all()->count(),]);
    } else {
        array_push($feed_back, ['AllowedBuildingHeights' => false]);
        array_push($feed_back, ['AllowedBuildingHeights records = ' => App\AllowedBuildingHeight::all()->count(),]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\OwnerTypeController::firstInsertion()) {
        array_push($feed_back, ['OwnerTypes' => true]);
        array_push($feed_back, ['OwnerTypes records = ' => App\OwnerType::all()->count(),]);
    } else {
        array_push($feed_back, ['OwnerTypes' => false]);
        array_push($feed_back, ['OwnerTypes records = ' => App\OwnerType::all()->count(),]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\MajorController::firstInsertion()) {
        array_push($feed_back, ['Majors' => true]);
        array_push($feed_back, ['Majors records = ' => App\Major::all()->count(),]);
    } else {
        array_push($feed_back, ['Majors' => false]);
        array_push($feed_back, ['Majors records = ' => App\Major::all()->count(),]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\GradeRankController::firstInsertion()) {
        array_push($feed_back, ['GradeRanks' => true]);
        array_push($feed_back, ['GradeRanks records = ' => App\GradeRank::all()->count(),]);
    } else {
        array_push($feed_back, ['GradeRanks' => false]);
        array_push($feed_back, ['GradeRanks records = ' => App\GradeRank::all()->count(),]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\SceMembershipTypeController::firstInsertion()) {
        array_push($feed_back, ['SceMembershipTypes' => true]);
        array_push($feed_back, ['SceMembershipTypes records = ' => App\SceMembershipType::all()->count(),]);
    } else {
        array_push($feed_back, ['SceMembershipTypes' => false]);
        array_push($feed_back, ['SceMembershipTypes records = ' => App\SceMembershipType::all()->count(),]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\BankController::firstInsertion()) {
        array_push($feed_back, ['Banks' => true]);
        array_push($feed_back, ['Banks records = ' => App\Bank::all()->count(),]);
    } else {
        array_push($feed_back, ['Banks' => false]);
        array_push($feed_back, ['Banks records = ' => App\Bank::all()->count(),]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\UserTypeController::firstInsertion()) {
        array_push($feed_back, ['UserTypes' => true]);
        array_push($feed_back, ['UserTypes records = ' => App\UserType::all()->count(),]);
    } else {
        array_push($feed_back, ['UserTypes' => false]);
        array_push($feed_back, ['UserTypes records = ' => App\UserType::all()->count(),]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\SaudiCityController::firstInsertion()) {
        array_push($feed_back, ['Saudi_Cities' => true]);
        array_push($feed_back, ['Saudi_Cities records = ' => App\SaudiCity::all()->count(),]);
    } else {
        array_push($feed_back, ['Saudi_Cities' => false]);
        array_push($feed_back, ['Saudi_Cities records = ' => App\SaudiCity::all()->count(),]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\EmployeeController::firstInsertion()) {
        array_push($feed_back, ['Employees' => true]);
        array_push($feed_back, ['Employees records = ' => App\Person::all()->where('is_employee')->count()]);
    } else {
        array_push($feed_back, ['Employees' => false]);
        array_push($feed_back, ['Employees records = ' => App\Person::all()->where('is_employee')->count()]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\OfficeDataController::firstInsertion()) {
        array_push($feed_back, ['OfficeDatas' => true]);
        array_push($feed_back, ['OfficeDatas records = ' => App\OfficeData::all()->count()]);
    } else {
        array_push($feed_back, ['OfficeDatas' => false]);
        array_push($feed_back, ['OfficeDatas records = ' => App\OfficeData::all()->count()]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\ProjectStatusController::firstInsertion()) {
        array_push($feed_back, ['projectStatus' => true]);
        array_push($feed_back, ['projectStatus records = ' => App\ProjectStatus::all()->count()]);
    } else {
        array_push($feed_back, ['projectStatus' => false]);
        array_push($feed_back, ['projectStatus records = ' => App\ProjectStatus::all()->count()]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\ContractTypeController::firstInsertion()) {
        array_push($feed_back, ['contractTypes' => true]);
        array_push($feed_back, ['contractTypes records = ' => App\ContractType::all()->count()]);
    } else {
        array_push($feed_back, ['contractTypes' => false]);
        array_push($feed_back, ['contractTypes records = ' => App\ContractType::all()->count()]);
    }
    // -------------------------------------------------------------------
    if (App\Http\Controllers\SoilLaboratoryController::firstInsertion()) {
        array_push($feed_back, ['soilLaboratories' => true]);
        array_push($feed_back, ['soilLaboratories records = ' => App\SoilLaboratory::all()->count()]);
    } else {
        array_push($feed_back, ['soilLaboratories' => false]);
        array_push($feed_back, ['soilLaboratories records = ' => App\SoilLaboratory::all()->count()]);
    }


    // -------------------------------------------------------------------
    // return hrtime();
    $end_time = hrtime();
    $insertion_time = $end_time[0] - $start_time[0];
    $total_records = 0;
    foreach ($feed_back as $key => $arr) {
        foreach ($arr as $key => $value) {
            if (is_int($value)) {
                $total_records = $total_records + $value;
            }
        }
    }
    array_push($feed_back, ['strart time = ' => $start_time[0]]);
    array_push($feed_back, ['end time = ' => $end_time[0]]);
    array_push($feed_back, ['insertion time = ' => $insertion_time . '(seconds)']);
    array_push($feed_back, ['total_records = ' => (int) $total_records]);
    if ($insertion_time > 60) {
        $minutes = floor((int) $insertion_time / 60);
        $seconds = floor((int) $insertion_time % 60);
        array_push($feed_back, ['insertion times = ' => [
            'minutes =' => $minutes,
            'seconds =' => $seconds,
        ]]);
    }
    // -------------------------------------------------------------------
    return $feed_back;
}
// -----------------------------------------------------------------------------------------------------------------
Route::any('/person/check', 'PersonController@check')->name('person.check');
Route::any('/customer/check', 'CustomerController@check')->name('customer.check');
Route::any('/employee/check', 'EmployeeController@check')->name('employee.check');
Route::any('/project/check', 'ProjectController@check')->name('project.check');
Route::any('/project/showUplodeView', 'ProjectController@showUplodeView')->name('project.showUplodeView');
Route::any('/project/uploadFile', 'ProjectController@uploadFile')->name('project.uploadFile');
Route::any('/plot/check', 'PlotController@check')->name('plot.check');
Route::any('/contract/check', 'ContractController@check')->name('contract.check');
Route::any('/task/check', 'TaskController@check')->name('task.check');
Route::any('/country/check', 'CountryController@check')->name('country.check');
Route::any('/street/check', 'StreetController@check')->name('street.check');
// -----------------------------------------------------------------------------------------------------------------
Route::any('/street/search', 'StreetController@search')->name('street.search');
// -----------------------------------------------------------------------------------------------------------------
Route::any('/user/userRegister', 'Auth\RegisterController@check')->name('register.check');
Route::any('/user/configuration', 'UserController@configuration')->name('user.configuration');
Route::any('/user/changepassword', 'UserController@changePassword')->name('change.password');
Route::any('/user/userLogin', 'Auth\LoginController@check')->name('login.check');
// Route::any('/user/userLogin', 'Auth\LoginController@userLogin')->name('userLogin');
// Route::any('/user/personStore', 'Auth\RegisterController@personStore')->name('personStore');
// -----------------------------------------------------------------------------------------------------------------
Route::group(['prefix' => 'project'], function () {
    Route::any('search', 'ProjectController@search')->name('project.search');
    Route::any('new_project', 'ProjectController@new_project')->name('project.new_project');
    Route::any('contracts', 'ProjectController@contracts')->name('project.contracts');
});
// -----------------------------------------------------------------------------------------------------------------
Route::group(['prefix' => 'projectDoc'], function () {
    Route::any('search', 'ProjectDocController@search')->name('projectDoc.search');
    Route::any('tafweed', 'ProjectDocController@tafweed')->name('projectDoc.tafweed');
    Route::any('tafweed_masaha', 'ProjectDocController@tafweed_masaha')->name('projectDoc.tafweed_masaha');
    Route::any('t_makhater', 'ProjectDocController@t_makhater')->name('projectDoc.t_makhater');
    Route::any('t_soor', 'ProjectDocController@t_soor')->name('projectDoc.t_soor');
    Route::any('t_meyaah', 'ProjectDocController@t_meyaah')->name('projectDoc.t_meyaah');
    Route::any('report_empty_land', 'ProjectDocController@report_empty_land')->name('projectDoc.report_empty_land');
    Route::any('str_notes_cover', 'ProjectDocController@str_notes_cover')->name('projectDoc.str_notes_cover');
});
// -----------------------------------------------------------------------------------------------------------------
Route::group(['prefix' => 'contract'], function () {
    Route::any('design_contract', 'ContractController@design_contract')->name('contract.design_contract');
});
// -----------------------------------------------------------------------------------------------------------------
Route::group(['prefix' => 'file_folder'], function () {
    Route::any('uploadFile', 'FileAndFolderController@uploadFile')->name('file_folder.uploadFile');
    Route::any('runningProjects', 'FileAndFolderController@runningProjects')->name('file_folder.runningProjects');
    Route::any('finshedProjects', 'FileAndFolderController@finshedProjects')->name('file_folder.finshedProjects');
    Route::any('zaidProjects', 'FileAndFolderController@zaidProjects')->name('file_folder.zaidProjects');
    Route::any('earchive', 'FileAndFolderController@earchive')->name('file_folder.earchive');
    Route::any('Safety', 'FileAndFolderController@Safety')->name('file_folder.Safety');
    Route::any('central_area', 'FileAndFolderController@central_area')->name('file_folder.central_area');
    Route::any('all_projects', 'FileAndFolderController@all_projects')->name('file_folder.all_projects');
    Route::any('forlder_files', 'FileAndFolderController@forlder_files')->name('file_folder.forlder_files');
    Route::any('download_file', 'FileAndFolderController@download_file')->name('file_folder.download_file');
    Route::any('showUplodeView', 'FileAndFolderController@showUplodeView')->name('file_folder.showUplodeView');
    // Route::any('search', 'FileAndFolderController@search')->name('file_folder.search');
    Route::any('delete_file', 'FileAndFolderController@delete_file')->name('file_folder.delete_file');
    Route::any('emps_dir', 'FileAndFolderController@emps_dir')->name('file_folder.emps_dir');
    Route::any('show_emp_dir', 'FileAndFolderController@show_emp_dir')->name('file_folder.show_emp_dir');
});
// -----------------------------------------------------------------------------------------------------------------
Route::resources([

    // -- شخص أو جهة
    'user' => 'UserController',
    'person' => 'PersonController',
    'personDoc' => 'PersonDocController',

    'customer' => 'CustomerController',
    'employee' => 'EmployeeController',
    'company' => 'CompanyController',
    'organization' => 'OrganizationController',
    'endowments' => 'EndowmentsController',

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
    'officeData' => 'OfficeDataController',
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
    'allowedUsage' => 'AllowedUsageController',
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
        'email' => 'admin@hakeemarch.com',
        'employment_no' => '1001',
    ];
    $adminUser = [
        'user_name' => 'admin',
        'pass_char' => '1',
        'password' => Hash::make('1'),
        'user_type_id' => '100',
        'user_type_name' => 'Admin',
        'is_admin' => true,
        'is_manager' => true,
        'user_level' => '100',
        'job_level' => '100',
    ];
    // ===========================================
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
        'email' => 'al-fahd@windowslive.com',
        'employment_no' => '1002',
    ];
    $fahdUser = [
        'user_name' => 'fff',
        'password' => Hash::make('1'),
        'pass_char' => '1',
        'is_manager' => true,
        'user_type_id' => '100',
        'user_type_name' => 'Admin',
        'user_level' => '100',
        'job_level' => '100',
    ];
    // ===========================================
    $hanadi = [
        'national_id' => '1077844478',
        'created_by_id' => '1',
        'created_by_name' => 'admin',
        'is_employee' => true,
        'is_customer' => false,
        'ar_name1' => 'هنادي',
        'ar_name5' => 'هارون',
        'en_name1' => 'Hanadi',
        'en_name5' => 'Haroon',
        'mobile' => '0535551215',
        'phone' => '0148650000',
        'phone_extension' => '133',
        'email' => '1412hano@gmail.com',
        'employment_no' => '1003',
    ];
    $hanadiUser = [
        'user_name' => 'hanadi',
        'password' => Hash::make('123456'),
        'pass_char' => '123456',
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
