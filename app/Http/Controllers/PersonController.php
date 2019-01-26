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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.add');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }

    
    public function check(Request $request, Person $person)
    {
    $nat=Nationality::gitNationalities();
        if ($request->method()==="GET") {
            return view('/person/check');
        }
  
        if ($request->input('n_id')) {
            $national_id = $request->input('n_id');
        $found_person = $person->getPersonByNationalId($national_id);
        return ($found_person) ? view('person/show')->with('person', $found_person) : view('/person/create', ['n_id' => $national_id,'nat' => $nat]);
        }else {
            return 'not valed input';
            return view('/person/show');
        }        
    }

}