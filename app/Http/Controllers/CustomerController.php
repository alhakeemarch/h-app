<?php

namespace App\Http\Controllers;

use App\Country;
use App\Customer;
use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\Auth;


class CustomerController extends PersonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Person $customer)
    {
        $customers = $customer->all()->where('is_customer', true)->reverse();
        return view('customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Person $customer)
    {
        // return $request;
        $nationalitiesArr = Country::all();
        $national_id = $request->input('national_id');
        return view('/customer/create', [
            'national_id' => $national_id,
            'nationalitiesArr' => $nationalitiesArr,
            'customer' => $customer
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
        $nationality = Country::where('code_2chracters', $validatedData['code_2chracters'])->first();
        // dd($nationality);
        if ($nationality) {
            $validatedData->put('nationality_ar', $nationality->ar_name);
            $validatedData->put('nationality_en', $nationality->en_name);
        }
        $validatedData->put('is_employee', false);
        $validatedData->put('is_customer', true);
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
        return redirect()->action('CustomerController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Person $customer)
    {
        // if person not found laravel (route model binding) will send us 404 page
        if ($customer->is_customer) {
            return view('customer.show')->with('customer', $customer);
        }
        if ($customer->is_employee) {
            // $this->authorize('viewAny', Person::class);
            return view('errors.notExpected')->withErrors(['This (ID) is already registered as employee,
            contact your administrator for more details.']);
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
    public function edit(Person $customer)
    {
        $formsData = array_merge($this->formsData(), [
            'person' => $customer,
        ]);
        return view('customer.edit')->with($formsData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $customer)
    {
        if (!$customer->is_customer) {
            return abort(403);
        }

        $validatedData = collect($this->validatePerson($request));
        $nationality = Country::where('code_2chracters', $validatedData['nationality_code'])->first();
        if ($nationality) {
            $validatedData->put('nationality_ar', $nationality->ar_name);
            $validatedData->put('nationality_en', $nationality->en_name);
        }
        $validatedData->put('is_customer', true);
        // -------------------
        $last_edit_by_id = auth()->user()->id;
        $last_edit_by_name = auth()->user()->user_name;
        if (!$last_edit_by_id and !$last_edit_by_name) {
            return abort(403);
        }
        $validatedData->put('last_edit_by_id', $last_edit_by_id);
        $validatedData->put('last_edit_by_name', $last_edit_by_name);
        // -------------------
        $customer->update($validatedData->all());
        $customer->save();
        return redirect()->action('CustomerController@show', $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $customer)
    {
        $customer->delete();
        return redirect()->action('CustomerController@index');
    }


    public function check(Request $request, Person $person)
    {

        if ($request->method() === "GET") {
            return view('/customer/check');
        }

        $validatedData = $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        ]);

        $found_person = $person->where('national_id', $request->national_id)->first();
        // return $found_person;
        if ($found_person) {
            return redirect()->route('customer.show', [$found_person]);
        } else {
            return redirect()->action('CustomerController@create', $request);
        }
    }
}
