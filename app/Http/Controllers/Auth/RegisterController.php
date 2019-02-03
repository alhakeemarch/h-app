<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Person;
use Illuminate\Http\Request;

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
    // public function register(Request $request, Person $person)
    // {
    //     // $found = $person->findOrFail(6);
    //     return $found;
    //     return $request;

    //     # code...
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

// byme
    public function userRegister(Request $request, Person $person)
    {
        if ($request->method() === "GET") {
            return view('/auth/register');
        }

        $validatedData = $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
            // 'body' => 'required',
        ]);

        $found_person = $person->getPersonByNationalId($request->input('national_id'));
        if ($found_person) {

            // return redirect()->action('PersonController@show', ['id' => $found_person->id]);
            // return 'hi1';
            return view('/auth/register')->with('person', $found_person);

        } else {
            return 'Contact System Administrator to Rigister';
            return view('/auth/register2')->with('national_id', $request->input('national_id'));
        }

    }

    // byme
    public function personStore(Request $request, Person $person)
    {
        if ($request->method() === "GET") {
            return view('/auth/register');
        }

        $validatedData = $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',

            'ar_name1' => 'required|string|min:2',
            'ar_name2' => 'string|nullable',
            'ar_name3' => 'string|nullable',
            'ar_name4' => 'string|nullable',
            'ar_name5' => "required|string|min:2",

            'mobile' => 'required|numeric|starts_with:0,9|digits:10,12,14',
            'email' => 'required|email',

            'is_employee' => 'required|boolean'
        ]);

        $person = Person::create($request->all());

        return view('/auth/register3')->with('person', $person);


    }


}
