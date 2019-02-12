<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Support\Facades\Auth;
use App\Nationality;
use Illuminate\Http\Request;


class PersonController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Person $person)
    {

        if (Auth::user()->user_level >= 100) {
            // return "you are the 100";
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
    public function create(Request $request, Person $person)
    {
        $persontype = false;
        if ($request->fromeEmployee) {
            $persontype = 'employee';
        }
        if ($request->fromeCustomer) {
            $persontype = 'customer';
        }
        if ($persontype == false) {
            return redirect('/')->withErrors(['Undefined Person type', 'please Contact the Administrator']);
        }

        $nationalitiesArr = Nationality::gitNationalities();
        $national_id = $request->input('national_id');
        return view('/person/create', [
            'national_id' => $national_id,
            'nationalitiesArr' => $nationalitiesArr, 
            'persontype' => $persontype
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

        $validatedData = $request->validate([
            'ar_name1' => 'required|string|min:2',
            'ar_name2' => 'string|nullable',
            'ar_name3' => 'string|nullable',
            'ar_name4' => 'string|nullable',
            'ar_name5' => "required|string|min:2",
            'en_name1' => 'string|nullable|regex:/[A-Za-z]/',
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
    public function show(Request $request, Person $person, $found_person)
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

        $found_person = $person->where('national_id', $request->national_id)->first();
        if ($found_person) {

            return redirect()->action('PersonController@show', ['id' => $found_person->id]);
        } else {
            return redirect()->action('PersonController@create', $request);
        }

    }

}
