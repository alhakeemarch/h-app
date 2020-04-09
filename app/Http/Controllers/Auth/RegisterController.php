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
    // -----------------------------------------------------------------------------------------------------------------
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
     */
    use RegistersUsers;
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Handle a registration request for the application.
     * 
     * this method is overriding the original one in //Illuminate\Foundation\Auth\RegistersUsers
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, Person $person)
    {
        // return $request;
        $validatedData = $this->validator($request);
        // ------------------------------------------------------------------------------- //
        $found_user = User::where('national_id', $request->national_id)->first();
        if ($found_user) {
            return redirect()->back()->withErrors(['This person is already registered..', 'Contact the system administrator for more information']);
        }
        // ------------------------------------------------------------------------------- //
        $found_person = $person->where('national_id', $request->national_id)->first();
        if (!$found_person) {
            return redirect()->back()->withErrors(['contact the system administrator to register the initial data first']);
        }
        // ------------------------------------------------------------------------------- //
        if (!$found_person->is_employee) {
            return redirect()->back()->withErrors(['unauthorised access - just for employees']);
        }
        // ------------------------------------------------------------------------------- //
        if (!$found_person->email) {
            return redirect()->back()->withErrors(['Contact System administrator, person email is required']);
        }
        // ------------------------------------------------------------------------------- //
        if ($found_person->email != $request->email) {
            return redirect()->back()->withErrors(['Contact System administrator, email mismatch']);
        }
        // ------------------------------------------------------------------------------- //
        // give the employee -> employment number
        if (!$found_person->employment) {
            $last_employment_no = $person->max('employment_no');
            $found_person['employment_no'] = $last_employment_no + 1;
            $found_person->save();
        }
        // ------------------------------------------------------------------------------- //
        // return 'hi';
        event(new Registered($user = $this->create($validatedData)));
        $this->guard()->login($user);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function showRegistrationForm(Request $request, Person $person)
    {
        $found_person = $person->find($request->person_id);
        return view('auth.register')->with(['person' => $found_person]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($data)
    {
        return $data->validate([
            'person_id' => 'unique:users|required|numeric',
            'national_id' => 'unique:users|required|numeric|starts_with:1,2|digits:10',
            'email' => 'unique:users|required|email',
            'is_employee' => 'required|boolean',
            'name' => 'required|string',
            'user_name' => 'unique:users|required|string|min:3|max:10|regex:/^[a-z][a-z0-9_-]+$/',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create($data)
    {
        // dd($data);
        return User::create([
            'person_id' => (int) $data['person_id'],
            'national_id' => (int) $data['national_id'],
            'name' => $data['name'],
            'user_name' => Str::lower($data['user_name']),
            'email' => $data['email'],
            'pass_char' => $data['password'],
            'password' => Hash::make($data['password']),
            'created_by_id' => null,
            'created_by_id' => 'registeration',
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function check(Request $request, Person $person, User $user)
    {
        // ------------------------------------------------------------------------------- //
        if ($request->method() === "GET") {
            return view('auth.register_check');
        }
        // ------------------------------------------------------------------------------- //
        $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        ]);
        // ------------------------------------------------------------------------------- //
        $found_user = $user->where('national_id', $request->national_id)->first();
        if ($found_user) {
            return redirect()->back()->withErrors(['This person is already registered..', 'Contact the system administrator for more information']);
        }
        // ------------------------------------------------------------------------------- //
        $found_person = $person->where('national_id', $request->national_id)->first();
        if (!$found_person) {
            return redirect()->back()->withErrors(['contact the system administrator to register the initial data first']);
        }
        // ------------------------------------------------------------------------------- //
        if (!$found_person->is_employee) {
            return redirect()->back()->withErrors(['unauthorised access - just for employees']);
        }
        // ------------------------------------------------------------------------------- //
        if (!$found_person->email) {
            return redirect()->back()->withErrors(['Contact System administrator, person email is required']);
        }
        // ------------------------------------------------------------------------------- //
        return redirect()->action('Auth\RegisterController@register', ['person_id' => $found_person->id]);
        // ------------------------------------------------------------------------------- //
    }
    // -----------------------------------------------------------------------------------------------------------------
}
