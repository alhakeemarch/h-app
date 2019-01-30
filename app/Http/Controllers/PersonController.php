<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use App\Nationality;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return 'this is store method';
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
