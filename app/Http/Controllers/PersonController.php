<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Country;
use App\GradeRank;
use App\Major;
use App\Person;
use App\PersonTitles;
use App\SceMembershipType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\ValidDate;
use App\Rules\ValidHijriDate;
use App\Rules\ValidGregorianDate;

class PersonController extends Controller
{

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // $this->authorizeResource(Person::class, 'person');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
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
        $allPersons = Person::all()->reverse();
        return view('person.index')->with('persons', $allPersons);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Person $person)
    {
        $national_id = $request->input('national_id');
        $formsData = array_merge($this->formsData(), [
            'national_id' => $national_id,
            'person' => $person,
        ]);
        // dd($formsData);
        return view('person.create')->with($formsData);
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
        // return $request;
        $validatedData = collect($this->validatePerson($request));
        $nationality = Country::where('code_2chracters', $validatedData['nationality_code'])->first();
        // dd($nationality);
        if ($nationality) {
            $validatedData->put('nationality_ar', $nationality->ar_name);
            $validatedData->put('nationality_en', $nationality->en_name);
        }
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
        return redirect()->action('PersonController@index');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Person $person)
    {
        // if person not found laravel (route model binding) will send us 404 page
        $this->authorize('viewAny', $person);
        return view('person.show')->with('person', $person);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        $formsData = array_merge($this->formsData(), [
            'person' => $person,
        ]);
        return view('person.edit')->with($formsData);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $validatedData = collect($this->validatePerson($request));
        $nationality = Country::where('code_2chracters', $validatedData['nationality_code'])->first();
        if ($nationality) {
            $validatedData->put('nationality_ar', $nationality->ar_name);
            $validatedData->put('nationality_en', $nationality->en_name);
        }
        // -------------------
        $last_edit_by_id = auth()->user()->id;
        $last_edit_by_name = auth()->user()->user_name;
        if (!$last_edit_by_id and !$last_edit_by_name) {
            return abort(403);
        }
        $validatedData->put('last_edit_by_id', $last_edit_by_id);
        $validatedData->put('last_edit_by_name', $last_edit_by_name);
        // -------------------
        $person->update($validatedData->all());
        $person->save();
        return redirect()->action('PersonController@show', $person->id);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->action('PersonController@index');
    }
    // -----------------------------------------------------------------------------------------------------------------

    public function check(Request $request, Person $person)
    {
        if ($request->method() === "GET") {
            return view('person.check');
        }

        $validatedData = $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
            // 'body' => 'required',
        ]);
        // return $request->all();

        $found_person = $person->where('national_id', $request->national_id)->first();
        // return $found_person;
        if ($found_person) {
            return redirect()->action('PersonController@show', $found_person->id);
            // return redirect()->action('PersonController@show', ['id' => $found_person->id]);
        } else {
            return redirect()->action('PersonController@create', $request);
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function formsData()
    {
        $countries = Country::all();
        $majors = Major::all();
        $gread_ranks = GradeRank::all();
        $SCE_membership_types = SceMembershipType::all();
        $person_titles = PersonTitles::all();
        $banks = Bank::all();
        return [
            'countries' => $countries,
            'majors' => $majors,
            'gread_ranks' => $gread_ranks,
            'gread_ranks' => $gread_ranks,
            'SCE_membership_types' => $SCE_membership_types,
            'person_titles' => $person_titles,
            'banks' => $banks,
        ];
    }
    // -----------------------------------------------------------------------------------------------------------------

    public static function validatePerson($request)
    {
        return $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
            'is_employee' => 'boolean|nullable',
            'is_customer' => 'boolean|nullable',
            // ----------------------------------------------------
            'ar_name1' => 'required|string|min:2',
            'ar_name2' => 'string|nullable',
            'ar_name3' => 'string|nullable',
            'ar_name4' => 'string|nullable',
            'ar_name5' => "required|string|min:2",
            'en_name1' => 'string|nullable|regex:/[A-Za-z]/',
            'en_name2' => 'string|nullable|regex:/[A-Za-z]/',
            'en_name3' => 'string|nullable|regex:/[A-Za-z]/',
            'en_name4' => 'string|nullable|regex:/[A-Za-z]/',
            'en_name5' => 'string|nullable|regex:/[A-Za-z]/',
            // ----------------------------------------------------
            'gender' => 'string|nullable',
            'relational_status' => 'string|nullable',
            'religion' => 'string|nullable',
            'prefer_language' => 'string|nullable',
            // ----------------------------------------------------
            'nationality_code' => "required",
            'nationality_ar' => "nullable",
            'nationality_en' => "nullable",
            // ----------------------------------------------------
            'hafizah_no' => 'numeric|nullable',
            'national_id_issue_date' => ['nullable', 'string', new ValidHijriDate],
            'national_id_expire_date' => ['nullable', 'string', new ValidHijriDate],
            'national_id_issue_place' => 'string|nullable',
            // ----------------------------------------------------
            'pasport_no' => 'nullable',
            'pasport_issue_date' => ['nullable', 'string', new ValidGregorianDate],
            'pasport_expire_date' => ['nullable', 'string', new ValidGregorianDate],
            'pasport_issue_place' => 'nullable',
            // ----------------------------------------------------
            'ah_birth_date' => ['nullable', 'string', new ValidHijriDate],
            'ad_birth_date' => ['nullable', 'string', new ValidGregorianDate],
            'birth_place' => 'string|nullable',
            'birth_city' => 'string|nullable',
            // ----------------------------------------------------
            'ah_hiring_date' => ['nullable', 'string', new ValidHijriDate],
            'ad_hiring_date' => ['nullable', 'string', new ValidGregorianDate],
            'hiring_day' => 'string|nullable',
            // ----------------------------------------------------
            'employment_no' => 'numeric|nullable',
            'fingerprint_no' => 'numeric|nullable',
            // ----------------------------------------------------
            'degree' => 'string|nullable',
            'major_id' => 'numeric|nullable',
            'graduated_from' => 'string|nullable',
            'college_name' => 'string|nullable',
            'graduation_year' => 'numeric|nullable',
            'graduation_points' => 'numeric|nullable',
            'graduation_points_of' => 'numeric|nullable',
            'graduation_grade_rank_id' => 'numeric|nullable',
            // ----------------------------------------------------
            'id_job_title' => 'string|nullable',
            'job_title' => 'string|nullable',
            'job_division' => 'string|nullable',
            'job_position' => 'string|nullable',
            'current_project' => 'string|nullable',
            // ----------------------------------------------------
            'SCE_membership_no' => 'numeric|nullable',
            'SCE_membership_type_id' => 'numeric|nullable',
            'SCE_membership_expire_date' => ['nullable', 'string', new ValidGregorianDate],
            'SCE_classification_expire_date' => ['nullable', 'string', new ValidGregorianDate],
            // ----------------------------------------------------
            'mobile' => 'required|numeric|starts_with:0,9|digits:10,12,14',
            'phone' => 'nullable',
            'phone_extension' => 'nullable',
            'email' => 'nullable|email',
            'personal_email' => 'email|nullable',
            'mobile2' => 'string|nullable',
            'mobile3' => 'string|nullable',
            // ----------------------------------------------------
            'foreign_phone1' => 'string|nullable',
            'foreign_phone2' => 'string|nullable',
            'foreign_address1' => 'string|nullable',
            'foreign_address2' => 'string|nullable',
            // ----------------------------------------------------
            'SNA_application_no' => 'numeric|nullable',
            'SNA_service_no' => 'numeric|nullable',
            'SNA_account_no' => 'numeric|nullable',
            'SNA_building_no' => 'numeric|nullable',
            'SNA_street_name' => 'string|nullable',
            'SNA_district_name' => 'string|nullable',
            'SNA_city_name' => 'string|nullable',
            'SNA_zip_code' => 'numeric|nullable',
            'SNA_additional_no' => 'numeric|nullable',
            'SNA_unit_no' => 'numeric|nullable',
            'SNA_residence_type' => 'string|nullable',
            'SNA_residence_ownership' => 'string|nullable',
            // ----------------------------------------------------
            'bank_id' => 'numeric|nullable',
            'bank_account_no' => 'numeric|nullable',
            'bank_IBAN_no' => 'numeric|nullable',
            // ----------------------------------------------------
            'emergency_contact_name1' => 'string|nullable',
            'emergency_contact_mobile1' => 'string|nullable',
            'emergency_contact_relationship1' => 'string|nullable',
            'emergency_contact_name2' => 'string|nullable',
            'emergency_contact_mobile2' => 'string|nullable',
            'emergency_contact_relationship2' => 'string|nullable',
            // ----------------------------------------------------
            'notes' => 'string|nullable',
            'private_notes' => 'string|nullable',

        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
}
