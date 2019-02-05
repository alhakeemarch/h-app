<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Person;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Error;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Handle a registration request for the application.
     * fa
     * this method is overriding the original one in //Illuminate\Foundation\Auth\RegistersUsers
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, Person $person)
    {
        $found_person = $person->find($request->id);
        if (!$found_person) {
            return 'contact the system administrator to register the initial data first';
        }
        if (!$found_person->is_employee) {
            return 'unauthorised access - just for employees';
        }
        if (($found_person->id != $request->id) || ($found_person->national_id != $request->national_id) || ($found_person->email != $request->email)) {
            return 'Data mismatch - try again or contact the system administrator';
        }

        $validatedData = $request->validate([
            'id' => 'required|numeric|min:1',
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
            'email' => 'required|email',
            'is_employee' => 'required|boolean',

            'user_name' => 'required|string|min:3|max:10|regex:/^[a-z][a-z0-9_-]+$/',
            'password' => 'required|string|min:6|confirmed',
        ]);

        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        return $this->registered($request, $user)
            ? : redirect($this->redirectPath());
    }

    // protected function registered(Request $request, $user)
    // {
    //     //
    // }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    // not used fa
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    

    // edited by fa
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        return User::create([
            'person_id' => (int)$data['id'],
            'national_id' => (int)$data['national_id'],
            'name' => $data['the_name'],
            // 'user_name' => $data['user_name'],
            'user_name' => Str::lower($data['user_name']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

// byme
    public function userRegister(Request $request, Person $person, User $user)
    {
        if ($request->method() === "GET") {
            return view('/auth/register');
        }

        $validatedData = $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        ]);

        $found_user = $user->where('national_id', $request->national_id)->first();
        if ($found_user) {
            return 'This person already registered go to login';
        }
        
        $found_person = $person->where('national_id', $request->national_id)->first();
        if ($found_person) {
            return view('/auth/register')->with('person', $found_person);
        } else {
            return 'Contact System Administrator to Rigister';
            // return view('/auth/register2')->with('national_id', $request->input('national_id'));
        }

    }

}
