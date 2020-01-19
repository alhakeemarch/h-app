<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Person;
use PhpParser\Node\Expr\Error;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    // -----------------------------------------------------------------------------------------------------------------
    // byme
    public function userLogin(Request $request, Person $person, User $user)
    {
        if ($request->method() === "GET") {
            return view('/auth/login');
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
    protected function valid_email(string $email)
    {
        $email = trim($email);
        $email = stripslashes($email);
        $email = htmlspecialchars($email);
        // check if e-mail address is well-formed
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    // -----------------------------------------------------------------------------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------
    public function check(Request $request, Person $person, User $user)
    {
        // ------------------------------------------------------------------------------- //
        if ($request->method() === "GET") {
            return view('auth.login_check');
        }
        // ------------------------------------------------------------------------------- //
        $request->validate([
            'user_name' => 'required',
        ]);
        // ------------------------------------------------------------------------------- //
        $request_user_name = $request->user_name;
        // ------------------------------------------------------------------------------- //
        if (strpos($request_user_name, "@")) {
            $found_user = $user->where('email', $request_user_name)->first();
            if (!$found_user) {
                return redirect()->back()->withErrors(['User Not found. Try Again or Contact the Administrator']);
            }
            if (!$found_user->is_active) {
                return redirect()->back()->withErrors(['This user is NOT active. Contact the Administrator']);
            }

            // لازم أحول الأمر من هنا إلى راوت عشان يفضل نفسه في المتصفح عند التحديث أو الخطأ
            return view('/auth/login')->with('user', $found_user);
        }
        // ------------------------------------------------------------------------------- //
        if (substr($request_user_name, 0, 1) == '1' || substr($request_user_name, 0, 1) == '2') {
            $found_user = $user->where('national_id', $request_user_name)->first();
            if (!$found_user) {
                return redirect()->back()->withErrors(['User Not found. Try Again or Contact the Administrator']);
            }
            if (!$found_user->is_active) {
                return redirect()->back()->withErrors(['This user is NOT active. Contact the Administrator']);
            }
            return view('/auth/login')->with('user', $found_user);
        }
        // ------------------------------------------------------------------------------- //
        if (preg_match('/^[a-z][a-z0-9_]+$/i', $request_user_name)) {
            $request_user_name = Str::lower($request_user_name);
            $found_user = $user->where('user_name', $request_user_name)->first();
            if (!$found_user) {
                return redirect()->back()->withErrors(['User Not found. Try Again or Contact the Administrator']);
            }
            if (!$found_user->is_active) {
                return redirect()->back()->withErrors(['This user is NOT active. Contact the Administrator']);
            }
            return view('/auth/login')->with('user', $found_user);
        }
        // ------------------------------------------------------------------------------- //
        return redirect()->back()->withErrors(['Input Must be : Email, Username, National ID OR Employee ID (ONLY)']);
    }
    // -----------------------------------------------------------------------------------------------------------------


    // الراوتين الاساسية 
    // login
    // showLoginForm

}
