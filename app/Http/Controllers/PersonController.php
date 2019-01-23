<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

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
        $request_id = $request->input('n_id');
        // $db_ids = Person::all()[0]->national_id;
        $all_persons = $person::all();
        
        // $all_ids =[];
        // foreach ($all_persons as $key => $value) {
        //     array_push($all_ids,$value->national_id);
        // }
        // var_dump($all_ids);
        // echo ($all_persons[0]->national_id);
        $the_p= $all_persons->where('national_id', '1000676971');
echo "<pre>";
        var_dump ($the_p);
echo "</pre>";

// foreach ($the_p as $key => $value) {
//     var_dump($key) ;
//     echo "<br>";
//     echo "<br>";
//     echo "<br>";
//     var_dump( $value);
//     echo "<br>";
// }
        // echo ($all_persons[0]->national_id);
        
//         var_dump(
// '<pre>',

//             $all_persons[0]->national_id,
//             // $all_persons->map->national_id,
// '</pre>'
//         );
        
        // dd ( $person::where('national_id', 1000676971));
        
        // dd($request->input('n_id'), Person::all());
        // return view("person.check");
    }
}
