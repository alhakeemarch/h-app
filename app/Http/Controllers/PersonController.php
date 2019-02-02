<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Support\Facades\Auth;
use App\Nationality;
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
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->user_level >= 100) {
            return "you are the 100";
        }
        // return Person::all();
        $allPersons = Person::all();
        return view('person.index')->with('persons', $allPersons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nat = Nationality::gitNationalities();
        $national_id = $request->input('national_id');
        // $national_id = 11;
        return view('/person/create', ['national_id' => $national_id, 'nat' => $nat]);
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name1' => 'required|string|min:2',
            'name2' => 'string|nullable',
            'name3' => 'string|nullable',
            'name4' => 'string|nullable',
            'name5' => "required|string|min:2",
            'en_name1' => 'string|nullable',
            'en_name2' => 'string|nullable',
            'en_name3' => 'string|nullable',
            'en_name4' => 'string|nullable',
            'en_name5' => 'string|nullable',
            'phone_no' => 'required|numeric|starts_with:0,9|digits:10,12,14',
            'nationaltiy' => "required",
            'hafizah_number' => 'numeric|nullable',
            'national_id_issue_date' => 'nullable',
            'national_id_issue_place' => 'string|nullable',
            'birth_date' => 'nullable',
            'birth_place' => 'string|nullable',
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
            // 'body' => 'required',
        ]);

        return $request->all();



        $person = Person::create($request->all());
        // $person->save();
        return redirect()->action('PersonController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view('person/show')->with('person', $person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return 'this is edit method';
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
        return 'this is update method';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        return 'this is destroy method';
    }


    public function check(Request $request, Person $person)
    {
        if ($request->method() === "GET") {
            return view('/person/check');
        }

        $validatedData = $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
            // 'body' => 'required',
        ]);

        $found_person = $person->getPersonByNationalId($request->input('national_id'));
        if ($found_person) {

            return redirect()->action('PersonController@show', ['id' => $found_person->id]);
        } else {
            return redirect()->action('PersonController@create', $request);
        }

    }

}
