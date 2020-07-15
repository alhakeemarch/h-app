<?php

namespace App\Http\Controllers;

use App\Person;
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
        // $this->middleware('active_user');
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
        $users = User::all()->reverse();
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
        if (!auth()->user()->is_admin) {
            return abort(403);
        }
        return view('user.show')->with('user', $user);
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
        if (!auth()->user()->is_admin) {
            return abort(403);
        }
        return view('user.edit')->with('user', $user);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Person $person)
    {
        $person = $person->find($user->person_id);
        // --------------------------------------------------------
        $valed_data = $request->validate([
            'person_id' => 'required|numeric',
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
            // ----------------------------------------------------
            'name' => 'required|string',
            'user_name' => 'required|string|min:3|regex:/[a-z_-]/',
            'email' => 'required|email',
            'pass_char' => 'required|string|min:1',
            // ----------------------------------------------------
            'is_admin' => 'boolean|nullable',
            'is_manager' => 'boolean|nullable',
            'is_active' => 'boolean|nullable',
            // ----------------------------------------------------
            'user_type_id' => 'numeric|nullable',
            'user_type_name' => 'string|nullable',
            'user_level' => 'numeric|nullable',
            'job_level' => 'numeric|nullable',
            // ----------------------------------------------------
            'notes' => 'string|nullable',
            'private_notes' => 'string|nullable',
        ]);
        // --------------------------------------------------------
        if ($request->national_id != $user->national_id) {
            $user->national_id = $request->national_id;
            $person->national_id = $request->national_id;
        }
        if ($request->name != $user->name) {
            $user->name = $request->name;
        }
        if ($request->user_name != $user->user_name) {
            $user->user_name = $request->user_name;
        }
        if ($request->email != $user->email) {
            $user->email = $request->email;
            $person->email = $request->email;
        }
        if ($request->pass_char != $user->pass_char) {
            $user->pass_char = $request->pass_char;
            $user->password = \Hash::make($request->pass_char);
        }
        // --------------------------------------------------------
        ($request->is_admin) ? $user->is_admin = true : $user->is_admin = false;
        ($request->is_manager) ? $user->is_manager = true : $user->is_manager = false;
        ($request->is_active) ? $user->is_active = true : $user->is_active = false;
        // --------------------------------------------------------
        $user->user_type_id = $valed_data['user_type_id'];
        $user->user_type_name = $valed_data['user_type_name'];
        $user->user_level = $valed_data['user_level'];
        $user->job_level = $valed_data['job_level'];
        // --------------------------------------------------------
        $user->last_edit_by_id = auth()->user()->id;
        $user->last_edit_by_name = auth()->user()->user_name;
        // --------------------------------------------------------
        $user->notes = $request->notes;
        $user->private_notes = $request->private_notes;
        $user->save();
        $person->save();
        return redirect()->action('UserController@show', $user->id);
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
    public function changePassword(Request $request, User $user)
    {
        if ($request->method() === "GET") {
            return redirect()->action('UserController@configuration');
        }

        $valed_data = $request->validate([
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);

        $current_user = auth()->user();
        $old_password = $valed_data['old_password'];
        $current_password = $current_user->pass_char;

        if (!($old_password === $current_password)) {
            return redirect()->action('UserController@configuration')->withErrors(['old_password' => 'old password NOT correct']);
        }

        $current_user->password =  \Hash::make($valed_data['password']);
        $current_user->pass_char = $valed_data['password'];
        $current_user->last_edit_by_id = auth()->user()->id;
        $current_user->last_edit_by_name = auth()->user()->user_name;
        $current_user->save();

        return redirect()->action('UserController@configuration')->with('success', 'password changed successfully');
    }
    // -----------------------------------------------------------------------------------------------------------------
}
