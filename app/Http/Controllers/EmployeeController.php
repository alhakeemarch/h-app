<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends PersonController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Person $person)
    {
        // $this->authorize('viewAny', $person);
        $employees = $person->all()->where('is_employee', true)->reverse();
        return view('employee.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Person $employee)
    {

        $nationalitiesArr = Nationality::all();
        // return $nationalitiesArr;
        $national_id = $request->input('national_id');
        return view('/employee/create', [
            'national_id' => $national_id,
            'nationalitiesArr' => $nationalitiesArr,
            'employee' => $employee
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
        $nationality = Nationality::where('id', $validatedData['nationaltiy_code'])->first();
        // dd($nationality);
        if ($nationality) {
            $validatedData->put('nationaltiy_ar', $nationality->ar_name);
            $validatedData->put('nationaltiy_en', $nationality->en_name);
        }
        $validatedData->put('is_employee', true);
        $validatedData->put('is_customer', false);
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
        return redirect()->action('EmployeeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Person $employee)
    {
        // $this->authorize('viewAny', Person::class);
        if ($employee->is_employee) {
            return view('employee.show')->with('employee', $employee);
        }
        if ($employee->is_customer) {
            return view('errors.notExpected')->withErrors(['This (ID) is a Customer, You can show his details in Customers Page,
             for more info contact System Administrator.']);
        }
        return view('errors.notExpected')->withErrors(['This (ID) is already registered (!! not employee or customer),
        contact System Administrator for more details.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $employee)
    {
        $nationalitiesArr = Nationality::all();
        return view('employee.edit')->with([
            'employee' => $employee,
            'nationalitiesArr' => $nationalitiesArr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $employee)
    {
        if (!$employee->is_employee) {
            return abort(403);
        }

        $validatedData = collect($this->validatePerson($request));
        $nationality = Nationality::where('id', $validatedData['nationaltiy_code'])->first();
        if ($nationality) {
            $validatedData->put('nationaltiy_ar', $nationality->ar_name);
            $validatedData->put('nationaltiy_en', $nationality->en_name);
        }
        $validatedData->put('is_employee', true);
        // -------------------
        $last_edit_by_id = auth()->user()->id;
        $last_edit_by_name = auth()->user()->user_name;
        if (!$last_edit_by_id and !$last_edit_by_name) {
            return abort(403);
        }
        $validatedData->put('last_edit_by_id', $last_edit_by_id);
        $validatedData->put('last_edit_by_name', $last_edit_by_name);
        // -------------------
        $employee->update($validatedData->all());
        $employee->save();
        return redirect()->action('EmployeeController@show', $employee->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $employee)
    {
        $employee->delete();
        return redirect()->action('EmployeeController@index');
    }


    public function check(Request $request, Person $person)
    {
        if ($request->method() === "GET") {
            return view('employee.check');
        }
        $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        ]);
        $found_person = $person->isexist($request->national_id)->first();
        if ($found_person) {
            return redirect()->action('EmployeeController@show',  $found_person->id);
        } else {
            return redirect()->action('EmployeeController@create', $request);
        }
    }
}
