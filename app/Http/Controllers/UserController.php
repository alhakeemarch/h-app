<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->is_admin) {
            return abort(403);
        }

        $users = User::all();
        return view('user.index')->with('users', $users);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
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
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    // not used yet
    public function check(Request $request, Person $person)
    {
        // if ($request->method() === "GET") {
        //     return view('person.check');
        // }

        // $validatedData = $request->validate([
        //     'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        //     // 'body' => 'required',
        // ]);
        // // return $request->all();

        // $found_person = $person->where('national_id', $request->national_id)->first();
        // // return $found_person;
        // if ($found_person) {
        //     return redirect()->action('PersonController@show', $found_person->id);
        //     // return redirect()->action('PersonController@show', ['id' => $found_person->id]);
        // } else {
        //     return redirect()->action('PersonController@create', $request);
        // }
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function configuration(Request $request)
    {
        return view('user.configuration');
    }
    // -----------------------------------------------------------------------------------------------------------------
}
