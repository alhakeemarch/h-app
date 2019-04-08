<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\Auth;
use App\Nationality;

class EmployeeController extends PersonController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Person $person)
    {

        $allPersons = $person->all()->where('is_employee', true);;
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
        return 'this is employee Create Method';
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
    public function show(Request $request, Person $person, $id = null)
    {
        $employee =  $person->where('id', $id)->first();
        if ($employee) {
            return view('person/show')->with('person', $employee);
            # code...
        } else {
            abort(404);
        }

                    
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
        return 'this is edit employee method';
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
        return 'this is update employee method';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        return 'this is destroy employee method';
    }


    public function check(Request $request, Person $person)
    {
        $fromeCustomer = false;
        $fromeEmployee = true;

        if ($request->method() === "GET") {
            // ['name' => 'Victoria'];
            return view('/person/check')->with(['fromeEmployee' => $fromeEmployee, 'fromeCustomer' => $fromeCustomer]);
        }

        $validatedData = $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        ]);

        $found_person = $person->where('national_id', $request->national_id)->first();
        if ($found_person) {
            return redirect()->action('EmployeeController@show', ['id' => $found_person->id]);
        } else {
            return redirect()->action('EmployeeController@create', $request);
        }
    }
}
