<?php

namespace App\Http\Controllers;

use App\Country;
use App\Major;
use App\Person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PersonController extends Controller
{

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Person $person)
    {

        $countries = Country::all();
        $majors = Major::all();
        // return $countries;
        $national_id = $request->input('national_id');
        return view('/person/create', [
            'national_id' => $national_id,
            'countries' => $countries,
            'person' => $person,
            'majors' => $majors,
        ]);
    }

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
        $nationality = Country::where('code_2chracters', $validatedData['nationaltiy_code'])->first();
        // dd($nationality);
        if ($nationality) {
            $validatedData->put('nationaltiy_ar', $nationality->ar_name);
            $validatedData->put('nationaltiy_en', $nationality->en_name);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        $countries = Country::all();
        $majors = Major::all();
        return view('person.edit')->with([
            'person' => $person,
            'countries' => $countries,
            'majors' => $majors,
        ]);
    }

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
        $nationality = Country::where('code_2chracters', $validatedData['nationaltiy_code'])->first();
        if ($nationality) {
            $validatedData->put('nationaltiy_ar', $nationality->ar_name);
            $validatedData->put('nationaltiy_en', $nationality->en_name);
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
            'mobile' => 'required|numeric|starts_with:0,9|digits:10,12,14',
            'phone' => 'nullable',
            'phone_extension' => 'nullable',
            'email' => 'nullable|email',
            // ----------------------------------------------------
            'nationaltiy_code' => "required",
            'nationaltiy_ar' => "nullable",
            'nationaltiy_en' => "nullable",
            // ----------------------------------------------------
            'hafizah_no' => 'numeric|nullable',
            'national_id_issue_date' => 'nullable',
            'national_id_expire_date' => 'nullable',
            'national_id_issue_place' => 'string|nullable',
            // ----------------------------------------------------
            'pasport_no' => 'nullable',
            'pasport_issue_date' => 'nullable',
            'pasport_id_expire_date' => 'nullable',
            'pasport_id_issue_place' => 'nullable',
            // ----------------------------------------------------
            'ah_birth_date' => 'nullable',
            'ad_birth_date' => 'nullable',
            'birth_place' => 'string|nullable',
            'birth_city' => 'string|nullable',
            // ----------------------------------------------------
            'notes' => 'string|nullable',
            'private_notes' => 'string|nullable',
        ]);
    }
}
