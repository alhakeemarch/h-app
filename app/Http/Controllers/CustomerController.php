<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\Auth;
use App\Nationality;

class CustomerController extends PersonController
{
    //    /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


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

        $allPersons = $person->all()->where('is_customer', true);
        return view('person.index')->with('persons', $allPersons);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'this is customer Create Method';
        // $validatedData = $request->validate([
        //     'name1' => 'required|string|min:2',
        //     'name2' => 'string|nullable',
        //     'name3' => 'string|nullable',
        //     'name4' => 'string|nullable',
        //     'name5' => "required|string|min:2",
        //     'en_name1' => 'string|nullable',
        //     'en_name2' => 'string|nullable',
        //     'en_name3' => 'string|nullable',
        //     'en_name4' => 'string|nullable',
        //     'en_name5' => 'string|nullable',
        //     'phone_no' => 'required|numeric|starts_with:0,9|digits:10,12,14',
        //     'nationaltiy' => "required",
        //     'hafizah_number' => 'numeric|nullable',
        //     'national_id_issue_date' => 'nullable',
        //     'national_id_issue_place' => 'string|nullable',
        //     'birth_date' => 'nullable',
        //     'birth_place' => 'string|nullable',
        //     'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        // ]);

        // return $request->all();



        // $person = Person::create($request->all());
        // // $person->save();
        // return redirect()->action('PersonController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Person $person)
    {
        return view('person/show')->with('person', $person);
        return 'Employee Show function';

        $customer = $person->find($found_person);
        if ($customer->is_employee) {
            if (Auth::user()->user_level >= 100) {
                return view('person/show')->with('person', $customer);
            } else {
                return redirect()->back()->withErrors(['This (ID) is already registered as employer,
                contact your administrator for more details.']);
            }
        }
        if ($customer->is_customer) {
            return view('person/show')->with('person', $customer);
        }
        return redirect()->back()->withErrors(['This (ID) is already registered (!! not employee or customer),
        contact your administrator for more details.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return 'this is edit customer method';
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
        return 'this is update customer method';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        return 'this is destroy customer method';
    }


    public function check(Request $request, Person $person)
    {
        $fromeCustomer = true;
        $fromeEmployee = false;
        if ($request->method() === "GET") {
            return view('/person/check')->with(['fromeEmployee'=> $fromeEmployee, 'fromeCustomer'=>$fromeCustomer ]);
        }

        $validatedData = $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        ]);

        $found_person = $person->where('national_id', $request->national_id)->first();
        if ($found_person) {

            return redirect()->route('customer.show', [$found_person]);
            return redirect()->action('CustomerController@show', ['id' => $found_person->id]);
            
        } else {
            return redirect()->action('CustomerController@create', $request);
        }

    }
}
