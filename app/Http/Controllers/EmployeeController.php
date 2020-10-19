<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Country;
use App\GradeRank;
use App\Major;
use Illuminate\Http\Request;
use App\Person;
use App\SceMembershipType;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends PersonController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->authorizeResource(Person::class, 'person'); // مشكلة لا يسمح بالعرض في SHOW
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Person $person)
    {
        $this->authorize('viewAny', $person);
        $employees = $person->all()->where('is_employee', true)->reverse();
        return view('employee.index')->with('employees', $employees);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Person $employee)
    {

        $countries = Country::all();
        $banks = Bank::all();
        $majors = Major::all();
        $gread_ranks = GradeRank::all();
        $SCE_membership_types  = SceMembershipType::all();
        // return $countries;
        $national_id = $request->input('national_id');
        return view('employee.create', [
            'national_id' => $national_id,
            'countries' => $countries,
            'employee' => $employee,
            'banks' => $banks,
            'majors' => $majors,
            'gread_ranks' => $gread_ranks,
            'SCE_membership_types' => $SCE_membership_types,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = collect($this->validatePerson($request));
        $nationality = Country::where('code_2chracters', $validatedData['nationality_code'])->first();
        if ($nationality) {
            $validatedData->put('nationality_ar', $nationality->ar_name);
            $validatedData->put('nationality_en', $nationality->en_name);
        }
        $validatedData->put('is_employee', true);
        $validatedData->put('is_customer', false);
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->user_name;
        if (!$created_by_id and !$created_by_name) {
            return abort(403);
        }
        $validatedData->put('created_by_id', $created_by_id);
        $validatedData->put('created_by_name', $created_by_name);
        // return $validatedData;
        $person = Person::create($validatedData->all());
        $person->save();
        return redirect()->action('EmployeeController@index');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Person $employee)
    {
        $this->authorize('viewAny', Person::class);
        if ($employee->is_employee) {
            return view('employee.show')->with('employee', $employee);
        }
        if ($employee->is_customer) {
            return view('errors.notExpected')->withErrors(['This (ID) is a Customer, You can show his details in Customers Page,
             for more info contact System Administrator.']);
        }
        return view('errors.notExpected')->withErrors(['This (ID) is already registered (!! not employee or customer),
        contact System Administrator for more details.']);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $employee)
    {
        $formsData = array_merge($this->formsData(), [
            'employee' => $employee,
        ]);
        return view('employee.edit')->with($formsData);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $employee)
    {
        if (!$employee->is_employee) {
            return abort(403);
        }

        $validatedData = collect($this->validatePerson($request));
        $nationality = Country::where('code_2chracters', $validatedData['code_2chracters'])->first();
        if ($nationality) {
            $validatedData->put('nationality_ar', $nationality->ar_name);
            $validatedData->put('nationality_en', $nationality->en_name);
        }
        $validatedData->put('is_employee', true);
        // -------------------
        $last_edit_by_id = auth()->user()->id;
        $last_edit_by_name = auth()->user()->user_name;
        if (!$last_edit_by_id and !$last_edit_by_name) {
            return abort(403);
        }
        $validatedData->put('last_edit_by_id', $last_edit_by_id);
        $validatedData->put('last_edit_by_name', $last_edit_by_name);
        // -------------------
        $employee->update($validatedData->all());
        $employee->save();
        return redirect()->action('EmployeeController@show', $employee->id);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $employee)
    {
        $employee->delete();
        return redirect()->action('EmployeeController@index');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function check(Request $request, Person $person)
    {
        if ($request->method() === "GET") {
            return view('employee.check');
        }
        $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        ]);
        $found_person = $person->isexist($request->national_id)->first();
        if ($found_person) {
            return redirect()->action('EmployeeController@show',  $found_person->id);
        } else {
            return redirect()->action('EmployeeController@create', $request);
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function firstInsertion()
    {
        $employees = array(
            // --------------------------------------------------
            [
                'national_id' => '1000676971',
                'ar_name1' => 'عبدالرزاق',
                'ar_name2' => 'عبدالمطلب',
                'ar_name3' => 'صالح',
                'ar_name5' => 'حكيم',
                'en_name1' => 'Abdulrazaq',
                'en_name5' => 'Hakim',
                'nationality_code' => 'SA',
                'nationality_ar' => 'المملكة العربية السعودية',
                'nationality_en' => 'Saudi Arabia',
                'mobile' => '0540404040',
                'email' => 'athakim@hotmail.com',
                'phone' => '0148650000',
                'phone_extension' => '200',
                'is_employee' => true,
                'is_customer' => true,
                'job_title' => '',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1000000001',
                'ar_name1' => 'تجربة',
                'ar_name5' => '-1',
                'en_name1' => 'test',
                'en_name5' => '-1',
                'mobile' => '0500000000',
                'email' => 'test1@hakeemarch.com',
                'phone' => '0148650000',
                'phone_extension' => '000',
                'is_employee' => true,
                'job_title' => '',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1000000002',
                'ar_name1' => 'تجربة',
                'ar_name5' => '-2',
                'en_name1' => 'test',
                'en_name5' => '-2',
                'mobile' => '0500000000',
                'email' => 'test2@hakeemarch.com',
                'phone' => '0148650000',
                'phone_extension' => '000',
                'is_employee' => true,
                'job_title' => '',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1000000003',
                'ar_name1' => 'تجربة',
                'ar_name5' => '-3',
                'en_name1' => 'test',
                'en_name5' => '-3',
                'mobile' => '0500000000',
                'email' => 'test3@hakeemarch.com',
                'phone' => '0148650000',
                'phone_extension' => '000',
                'is_employee' => true,
                'job_title' => '',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1000000004',
                'ar_name1' => 'تجربة',
                'ar_name5' => '-4',
                'en_name1' => 'test',
                'en_name5' => '-4',
                'mobile' => '0500000000',
                'email' => 'test4@hakeemarch.com',
                'phone' => '0148650000',
                'phone_extension' => '000',
                'is_employee' => true,
                'job_title' => '',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2000000005',
                'ar_name1' => 'تجربة',
                'ar_name5' => '-5',
                'en_name1' => 'test',
                'en_name5' => '-5',
                'mobile' => '0500000000',
                'email' => 'test5@hakeemarch.com',
                'phone' => '0148650000',
                'phone_extension' => '000',
                'is_employee' => true,
                'job_title' => '',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2000000006',
                'ar_name1' => 'تجربة',
                'ar_name5' => '-6',
                'en_name1' => 'test',
                'en_name5' => '-6',
                'mobile' => '0500000000',
                'email' => 'test6@hakeemarch.com',
                'phone' => '0148650000',
                'phone_extension' => '000',
                'is_employee' => true,
                'job_title' => '',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2000000007',
                'ar_name1' => 'تجربة',
                'ar_name5' => '-7',
                'en_name1' => 'test',
                'en_name5' => '-7',
                'mobile' => '0500000000',
                'email' => 'test7@hakeemarch.com',
                'phone' => '0148650000',
                'phone_extension' => '000',
                'is_employee' => true,
                'job_title' => '',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2000000008',
                'ar_name1' => 'تجربة',
                'ar_name5' => '-8',
                'en_name1' => 'test',
                'en_name5' => '-8',
                'mobile' => '0500000000',
                'email' => 'test8@hakeemarch.com',
                'phone' => '0148650000',
                'phone_extension' => '000',
                'is_employee' => true,
                'job_title' => '',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1089293235',
                'ar_name1' => 'ايمان',
                'ar_name5' => 'بدوي',
                'en_name1' => 'Eman',
                'en_name5' => 'Badawi',
                'mobile' => '0593693637',
                'email' => 'eman.ahmad.badawi@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '101',
                'is_employee' => true,
                'job_title' => 'موظفة إستقبال وسكرتارية',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2252531898',
                'ar_name1' => 'حمدي',
                'ar_name5' => 'السيد',
                'en_name1' => 'Hamdy',
                'en_name5' => 'Elsayed',
                'mobile' => '0544504859',
                'email' => 'hamdyelbna2005@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '102',
                'is_employee' => true,
                'job_title' => 'محاسب',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2475020141',
                'ar_name1' => 'حسام',
                'ar_name5' => 'محمد',
                'en_name1' => 'Hosam',
                'en_name5' => 'Mahammad',
                'mobile' => '0563578863',
                'email' => 'hossamalsyed93@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '100.0.0.99',
                'is_employee' => true,
                'job_title' => 'محاسب',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2001846613',
                'ar_name1' => 'فهد',
                'ar_name5' => 'بخش',
                'en_name1' => 'Fahad',
                'en_name5' => 'Bakhsh',
                'mobile' => '0500858415',
                'email' => 'al-fahd@windowslive.com',
                'phone' => '0148650000',
                'phone_extension' => '103',
                'is_employee' => true,
                'job_title' => 'تقنية معلومات',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2232574422',
                'ar_name1' => 'عبدالعاطي',
                'ar_name2' => 'عبدالحميد',
                'ar_name5' => 'عبدالعاطي',
                'en_name1' => 'Abd Elaty',
                'en_name5' => 'Abd Elaty',
                'mobile' => '0548272623',
                'email' => 'abdelaty_aly@yahoo.com',
                'phone' => '0148650000',
                'phone_extension' => '104',
                'is_employee' => true,
                'job_title' => 'مدير التصميم',
                'job_level' => 5,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2049114958',
                'ar_name1' => 'احمد',
                'ar_name5' => 'بكران',
                'en_name1' => 'Ahmed',
                'en_name5' => 'Bakran',
                'mobile' => '0549173530',
                'email' => 'eng.ahmedb882013@hotmail.com',
                'phone' => '0148650000',
                'phone_extension' => '105',
                'is_employee' => true,
                'job_title' => 'مهندس معماري',
                'job_level' => 5,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2247329408',
                'ar_name1' => 'ايهم',
                'ar_name5' => 'قاسم',
                'en_name1' => 'Aeham',
                'en_name5' => 'Kasem',
                'mobile' => '0543240777',
                'email' => 'ayhamhk77@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '106',
                'is_employee' => true,
                'job_title' => 'مدير قسم السلامة',
                'job_level' => 5,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2341451017',
                'ar_name1' => 'نعمان',
                'ar_name5' => 'شريف',
                'en_name1' => 'Numan',
                'en_name5' => 'Sharif',
                'mobile' => '0537641880',
                'email' => 'numansharif378@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '107',
                'is_employee' => true,
                'job_title' => 'رسام معماري',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2168121131',
                'ar_name1' => 'عاطف',
                'ar_name5' => 'الشربيني',
                'en_name1' => 'Atif',
                'en_name5' => 'Alshirbini',
                'mobile' => '0582640777',
                'email' => 'atef_sherbeeny@hotmail.com',
                'phone' => '0148650000',
                'phone_extension' => '109',
                'is_employee' => true,
                'job_title' => 'رسام معماري',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2104043340',
                'ar_name1' => 'محمد',
                'ar_name5' => 'أظهر',
                'en_name1' => 'Mohammed',
                'en_name5' => 'Azhar',
                'mobile' => '0509935183',
                'email' => 'syedazhar118@yahoo.com',
                'phone' => '0148650000',
                'phone_extension' => '111',
                'is_employee' => true,
                'job_title' => 'رسام معماري',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2181479805',
                'ar_name1' => 'حنفي',
                'ar_name5' => 'مهني',
                'en_name1' => 'Hanafi',
                'en_name5' => 'Mahany',
                'mobile' => '0556140778',
                'email' => 'hanafy1972@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '112',
                'is_employee' => true,
                'job_title' => 'رسام معماري',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2034388112',
                'ar_name1' => 'مجدي',
                'ar_name5' => 'كامل',
                'en_name1' => 'Majdi',
                'en_name5' => 'Kamel',
                'mobile' => '0509728231',
                'email' => 'send_rella89@yahoo.com',
                'phone' => '0148650000',
                'phone_extension' => '113',
                'is_employee' => false,
                'job_title' => 'مهندس مدني',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2299165486',
                'ar_name1' => 'سميع الدين',
                'ar_name5' => 'احمد',
                'en_name1' => 'SamiUddin',
                'en_name5' => 'Ahmed',
                'mobile' => '0597332791',
                'email' => 'sami_a_u@yahoo.com',
                'phone' => '0148650000',
                'phone_extension' => '119',
                'is_employee' => true,
                'job_title' => 'رسام معماري',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2110900574',
                'ar_name1' => 'احمد',
                'ar_name5' => 'البحيري',
                'en_name1' => 'Ahamad',
                'en_name5' => 'Albehari',
                'mobile' => '0503565425',
                'email' => 'ahmadfaridbehery@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '120',
                'is_employee' => true,
                'job_title' => 'مهندس معماري',
                'job_level' => 5,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2428342998',
                'ar_name1' => 'اسلام',
                'ar_name5' => 'محمد',
                'en_name1' => 'Islam',
                'en_name5' => 'Mohamed',
                'mobile' => '0592780987',
                'email' => 'architect_eslam@hotmail.com',
                'phone' => '0148650000',
                'phone_extension' => '121',
                'is_employee' => true,
                'job_title' => 'مهندس معماري',
                'job_level' => 5,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2114967744',
                'ar_name1' => 'ياسر',
                'ar_name5' => 'احمد',
                'en_name1' => 'Yasir',
                'en_name5' => 'Ahmed',
                'mobile' => '0556341920',
                'email' => 'asdbyasd@yahoo.com',
                'phone' => '0148650000',
                'phone_extension' => '122',
                'is_employee' => true,
                'job_title' => 'سكرتير المدير العام',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2335460305',
                'ar_name1' => 'عبدالله',
                'ar_name5' => 'سليمان',
                'en_name1' => 'Abdalla',
                'en_name5' => 'Soliman',
                'mobile' => '0598950305',
                'email' => 'abdallahfahmy202@yahoo.com',
                'phone' => '0148650000',
                'phone_extension' => '123',
                'is_employee' => true,
                'job_title' => 'مهندس مدني',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2262922434',
                'ar_name1' => 'افتخار',
                'ar_name5' => 'حسين',
                'en_name1' => 'Iftequar',
                'en_name5' => 'Hussain',
                'mobile' => '0551302339',
                'email' => 'iftequarhuss@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '124',
                'is_employee' => true,
                'job_title' => 'مهندس ميكانيكا',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1081562868',
                'ar_name1' => 'عبدالله',
                'ar_name5' => 'عويضه',
                'en_name1' => 'Abdullah',
                'en_name5' => 'Owaidh',
                'mobile' => '0547125704',
                'email' => 'abdullah-owidah99@hotmail.com',
                'phone' => '0148650000',
                'phone_extension' => '125',
                'is_employee' => true,
                'job_title' => 'مهندس ميكانيكا',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2235784085',
                'ar_name1' => 'هاني',
                'ar_name5' => 'علي',
                'en_name1' => 'Hani',
                'en_name5' => 'Ali',
                'mobile' => '05301197756',
                'email' => 'hmousa74@yahoo.com',
                'phone' => '0148650000',
                'phone_extension' => '126',
                'is_employee' => true,
                'job_title' => 'مهندس كهرباء',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1077416475',
                'ar_name1' => 'علي',
                'ar_name5' => 'النخلي',
                'en_name1' => 'ALI',
                'en_name5' => 'ALNAKHLI',
                'mobile' => '0552720037',
                'email' => 'ali.ibrahim.aln@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '127',
                'is_employee' => false,
                'job_title' => 'مهندس كهرباء',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2106863042',
                'ar_name1' => 'ايمن',
                'ar_name5' => 'رجب',
                'en_name1' => 'Ayman',
                'en_name5' => 'Rajab',
                'mobile' => '0597162340',
                'email' => 'aymanragab100100@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '128',
                'is_employee' => true,
                'job_title' => 'مهندس مدني',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2445000975',
                'ar_name1' => 'محمود',
                'ar_name5' => 'غنيم',
                'en_name1' => 'Mahmoud',
                'en_name5' => 'Ghonim',
                'mobile' => '0591717245',
                'email' => 'ghoneammahmoud0@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '129',
                'is_employee' => true,
                'job_title' => 'مساح',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1077844478',
                'ar_name1' => 'هنادي',
                'ar_name5' => 'هارون',
                'en_name1' => 'Hanadi',
                'en_name5' => 'Haroon',
                'mobile' => '0535551215',
                'email' => '1412hano@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '133',
                'is_employee' => true,
                'job_title' => 'تقنية معلومات',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1091137875',
                'ar_name1' => 'امنية',
                'ar_name5' => 'الدرغام',
                'en_name1' => 'Omnia',
                'en_name5' => 'Aldirgham',
                'mobile' => '0546686552',
                'email' => 'd.omnia1@hotmail.com',
                'phone' => '0148650000',
                'phone_extension' => '134',
                'is_employee' => true,
                'job_title' => 'مهندسة ديكور',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1107942664',
                'ar_name1' => 'ريناد',
                'ar_name5' => 'الحسيني',
                'en_name1' => 'Renad',
                'en_name5' => 'Alhosini',
                'mobile' => '0580068858',
                'email' => 'architectrenad@gmail.com',
                'phone' => '0148650000',
                'phone_extension' => '134',
                'is_employee' => true,
                'job_title' => 'مهندسة معمارية',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1076608981',
                'ar_name1' => 'لمى',
                'ar_name5' => 'ادريس',
                'en_name1' => 'Lama',
                'en_name5' => 'Idris',
                'mobile' => '0565300352',
                'email' => 'lama.a.idris@hotmail.com',
                'phone' => '0148650000',
                'phone_extension' => '150',
                'is_employee' => true,
                'job_title' => 'سكرتيرة ادارية',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '2099159010',
                'ar_name1' => 'محمد',
                'ar_name5' => 'زايد',
                'en_name1' => 'Mohammed',
                'en_name5' => 'Zayed',
                'mobile' => '056302820',
                'email' => 'boodymoza@yahoo.com',
                'phone' => '0148650000',
                'phone_extension' => '152',
                'is_employee' => true,
                'job_title' => 'معقب',
                'job_level' => 0,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1054651656',
                'ar_name1' => 'محمد',
                'ar_name5' => 'حكيم',
                'en_name1' => 'Mohammad',
                'en_name5' => 'Hakim',
                'mobile' => '0533120202',
                'email' => 'hakim.m1987@hotmail.com',
                'phone' => '0148650000',
                'phone_extension' => '154',
                'is_employee' => true,
                'job_title' => 'مدير قسم الديكور',
                'job_level' => 5,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            [
                'national_id' => '1000677011',
                'ar_name1' => 'المن',
                'ar_name5' => 'حكيم',
                'en_name1' => 'Almann',
                'en_name5' => 'Hakim',
                'mobile' => '0504303052',
                'email' => 'almann_h@yahoo.com',
                'phone' => '0148650000',
                'phone_extension' => '155',
                'is_employee' => true,
                'job_title' => 'المدير المالي والإداري',
                'job_level' => 5,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            // --------------------------------------------------
            // [
            //     'national_id' => '',// --------------------------------------------------
            //     'ar_name1' => 'عصام',
            //     'ar_name5' => 'الشربيني',
            //     'en_name1' => 'Issam',
            //     'en_name5' => 'Elesherbiny',
            //     'mobile' => '0544852951',
            //     'email' => 'eesam1913@gmail.com',
            //     'phone' => '0148650000',
            //     'phone_extension' => '156',
            //     'is_employee' => true,
            // 'job_title' => '',
            // 'job_level' => 0,
            //     'created_by_id' => auth()->user()->id,
            //     'created_by_name' => auth()->user()->user_name,
            // ],
            // --------------------------------------------------
            [
                'national_id' => '2065592616',
                'ar_name1' => 'فريد',
                'ar_name5' => 'البحيري',
                'en_name1' => 'Fareed',
                'en_name5' => 'Albuhayri',
                'mobile' => '0508744474',
                'email' => 'albehairyfm@yahoo.com',
                'phone' => '0148650000',
                'phone_extension' => '201',
                'is_employee' => true,
                'job_title' => 'المدير العام',
                'job_level' => 5,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],

        );
        /*******************************************************************************************************/
        // if (Person::all()->count() >= count($employees)) {
        //     return false;
        // }
        // -------------------------------------
        foreach ($employees as $employee) {
            if (Person::where('national_id', $employee['national_id'])->first() != true) {
                $last_employment_no = Person::max('employment_no');
                $employee['employment_no'] = $last_employment_no + 1;
                // array_push($employee, "employment_no" => $last_employment_no+1);
                $new_employee = new Person;
                $new_employee->create($employee);
            }
        }
        return true;
    }
}
