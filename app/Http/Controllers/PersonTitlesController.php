<?php

namespace App\Http\Controllers;

use App\Person;
use App\PersonTitles;
use Illuminate\Http\Request;

class PersonTitlesController extends Controller
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
     * @param  \App\PersonTitles  $personTitles
     * @return \Illuminate\Http\Response
     */
    public function show(PersonTitles $personTitles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonTitles  $personTitles
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonTitles $personTitles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonTitles  $personTitles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonTitles $personTitles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonTitles  $personTitles
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonTitles $personTitles)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function firstInsertion()
    {
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->name;
        $person_titles = array(
            [
                'name_ar' => 'السيد',
                'name_en' => 'mister',
                'short_en' => 'Mr.',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],


        );
        if (PersonTitles::all()->count() >= count($person_titles)) {
            return false;
        }
        // -------------------------------------
        foreach ($person_titles as $person_title) {
            $new_title = new PersonTitles();
            $new_title->create($person_title);
        }
        return true;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function set_defult_title_all()
    {
        $all_persons = Person::all();
        foreach ($all_persons as $person) {
            if (!($person->person_title_id)) {
                $person->person_title_id  = 1;
                $person->save();
            }
        }
    }
}
