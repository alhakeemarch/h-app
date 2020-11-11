<?php

namespace App\Http\Controllers;

use App\Person;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            // return abort(403);
        }
        // $users = User::where('is_active', 1)->get();
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
        // --------------------------------------------------------
        if ($request->form_action == 'reset_password') {
            $user->pass_char = '123456';
            $user->password = \Hash::make('123456');
            $user->save();
            return redirect()->back()->with('success', 'password reset to (123456), تم تغير الرقم السري الى (123456)');
        }
        // --------------------------------------------------------
        if ($request->form_action == 'activate_user') {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back()->with('success', 'user active status changed successfully');
        }
        // --------------------------------------------------------
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
    public static function firest_insartion()
    {
        DB::insert(`
            INSERT INTO users (id, person_id, national_id, is_admin, is_manager, is_active, name, user_name, email, email_verified_at, pass_char, password, user_type_id, user_type_name, user_level, job_level, notes, private_notes, created_by_id, created_by_name, last_edit_by_id, last_edit_by_name, deleted_at, remember_token, created_at, updated_at) VALUES
        (1, 1, 1000000000, 1, 1, 1, 'System Admin', 'admin', 'admin@hakeemarch.com', NULL, '1024', '$2y$10\$X9Jl1LJ6pjTPrAmewa7WnuGxZmgJKWq0hTFYq3YPi12/F2aBS.wq.', 100, 'Admin', 100, 100, NULL, NULL, NULL, NULL, 1, 'admin', NULL, NULL, '2020-07-06 07:26:29', '2020-07-20 08:21:06'),
        (2, 2, 2001846613, 1, 1, 1, 'فهد - Fahd', 'fahd', 'al-fahd@windowslive.com', NULL, 'view#sonic', '$2y$10\$E4ELAJ/lgDtF6EX/15t6x.fHlvtHh8/ChgcYQzWewHOSmYC0Pvp/q', 100, 'Admin', 100, 100, NULL, NULL, NULL, NULL, 1, 'admin', NULL, NULL, '2020-07-06 07:26:29', '2020-08-12 11:27:54'),
        (3, 3, 1077844478, 0, 1, 1, 'هنادي - Hanadi', 'hanadi', '1412hano@gmail.com', NULL, '123456', '$2y$10\$Yht4rHGc2YpjVA3/iamasek6oIruWCN0ktU0v8wu844Z5zwnRxN7y', 100, 'Admin', 100, 100, NULL, NULL, NULL, NULL, 1, 'admin', NULL, '1BjTBc5DsJ6TDP50MkFevkQOLrWxb05MuZ9TNsl1QcnN8z1MKqJfDf2X6eJn', '2020-07-06 07:26:30', '2020-07-14 11:09:11'),
        (4, 4, 1000000001, 0, 0, 1, 'تجربة -1:test -1', 'test1', 'test1@hakeemarch.com', NULL, '123456', '$2y$10\$I0LT3xveiOR.zdw0WCIunOqPKUNr67GNwhY90oaclxDFnz8OnsEne', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, 1, 'admin', NULL, NULL, '2020-06-09 06:28:11', '2020-07-13 12:17:14'),
        (5, 12, 1089293235, 0, 0, 0, 'ايمان بدوي:Eman Badawi', 'eman', 'eman.ahmad.badawi@gmail.com', NULL, '0593693637', '$2y$10$.i446kVaAc2.Er.3kpbQHuWrzLol0hXiJFV/1yixvOMJeTm10on7.', 5, 'standard_user', 20, 1, NULL, NULL, NULL, NULL, 1, 'admin', NULL, 'BxfUD6fjCa17YLTByJjfX2SeJjRVsyqnG9cqkvoUpAkZUlTN6Tl4Y2RYzH3K', '2020-06-09 06:29:49', '2020-07-14 08:20:07'),
        (6, 20, 2104043340, 0, 0, 0, 'محمد أظهر:Mohammed Azhar', 'syedazh105', 'syedazhar118@yahoo.com', NULL, 'azhar1998', '$2y$10$Gme1FHD19I16EzTFARs9vuTSGcIe4Jew.7n39aQLT1EzTxndchusW', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FkHzE3iiteYmQd3EaO5VWG43E96QJQXwDEe6vdOUYcdLZKYzm6nnD4rVlAG4', '2020-06-15 03:06:32', '2020-06-15 03:06:32'),
        (7, 23, 2299165486, 0, 0, 0, 'سميع الدين احمد:SamiUddin Ahmed', 'sam', 'sami_a_u@yahoo.com', NULL, '03012050419', '$2y$10$krdwHrEoFbwoehrNSfGSiepc70bm3x4CHI351K7AmacpAwWw758qy', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-15 03:40:04', '2020-06-15 03:40:04'),
        (8, 18, 2341451017, 0, 0, 0, 'نعمان شريف:Numan Sharif', 'numan', 'numansharif378@gmail.com', NULL, 'sharif', '$2y$10$dTJbwtOkB09/gaTCfT2yCuql7VhNpVrKWgnMvinnPXKNsvKlujvHu', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-15 04:02:26', '2020-06-15 04:02:26'),
        (9, 19, 2168121131, 0, 0, 0, 'عاطف الشربيني:Atif Alshirbini', 'sherbiny', 'atef_sherbeeny@hotmail.com', NULL, 'hakeem', '$2y$10$tN.XU7wShL.e3brlPl4p/eOwZBIMPa51Kxtuva/r74Uyj5B9VREXe', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'oCCZU0PlwN7jIa9a0UwzBymfUAYh7dj5o5NMxSLjWTXFsFAxj8BDBmUnvaQ5', '2020-07-06 09:28:59', '2020-07-06 09:28:59'),
        (10, 16, 2049114958, 0, 0, 0, 'احمد بكران:Ahmed Bakran', 'bakran', 'eng.ahmedb882013@hotmail.com', NULL, '121410Eng', '$2y$10$gzYwg1mHvZ/7UekG4tLJG.Pi9eNbYJN0CGcgn4RFBdqeZPhUum6Te', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-06 09:39:11', '2020-07-06 09:39:11'),
        (11, 25, 2428342998, 0, 0, 0, 'اسلام محمد:Islam Mohamed', 'eslamabdo', 'architect_eslam@hotmail.com', NULL, '3221341qweasd', '$2y$10$0ih.IoV8k8k5Fzseah9/4OzmuUm7NTdxW7cOSS3ExgjUGyO2Om562', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'g58dqb5Ygrez8iL2lcbbdGZEBkAmO5SY1ATsj3ZqjcEy9PgCIhjb7Zarvv9C', '2020-07-08 12:14:35', '2020-07-08 12:14:35'),
        (12, 21, 2181479805, 0, 0, 0, 'حنفي مهني:Hanafi Mahany', 'hanafy1972', 'hanafy1972@gmail.com', NULL, 'hanafy1972', '$2y$10$nyqYWRanZ2.oHCvlmoKeWOeYXe.PBgmtC.P9nj.bfLC43rsbJnj1S', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Eb24kNaxQuxp4kNejBWpmTsuIOX2T5oxsESsPE1D6UJzvACs8Q3ZRsz8coA2', '2020-07-08 12:21:30', '2020-07-08 12:21:30'),
        (13, 17, 2247329408, 0, 0, 0, 'ايهم قاسم:Aeham Kasem', 'ayham', 'ayhamhk77@gmail.com', NULL, '850725', '$2y$10$iSgyRJxe16j4ifNdDxK50um02R9CTtH1sSvWC5wSgDkpfeBmHkurG', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-09 10:44:48', '2020-07-09 10:44:48'),
        (14, 37, 1054651656, 0, 0, 0, 'محمد حكيم:Mohammad Hakim', 'hakimm1987', 'hakim.m1987@hotmail.com', NULL, 'Mh11490887', '$2y$10$bbVYuFeMG/aIMf7Jay1qCedOzR1HAh7e67J9gUE4iU2aZXAoXu/76', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-12 10:04:26', '2020-07-12 10:04:26'),
        (15, 27, 2335460305, 0, 0, 0, 'عبدالله سليمان:Abdalla Soliman', 'abdallah', 'abdallahfahmy202@yahoo.com', NULL, 'moodyhabiby', '$2y$10$Tgg9QrLTub/OpbjPv.qNFOfHZuqvgoePiIRSt5PDLg7syRizFFpiu', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-12 11:17:03', '2020-07-12 11:17:03'),
        (16, 26, 2114967744, 0, 0, 0, 'ياسر احمد:Yasir Ahmed', 'asd1970', 'asdbyasd@yahoo.com', NULL, '123456', '$2y$10$RZWYygIC4tJXP4OWg7lzg.dlvvFv0AJAipCAgDaeckV2Kao9wFGDm', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, 2, 'fahd', NULL, NULL, '2020-07-12 11:25:08', '2020-07-22 06:14:54'),
        (17, 30, 2235784085, 0, 0, 0, 'هاني علي:Hani Ali', 'hmousa', 'hmousa74@yahoo.com', NULL, '123456', '$2y$10$8/tXWsBnqj3/FBO4hiy3c.MSGLIdbKCoz5JsH1aAlJzSS.gZcPtde', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, 1, 'admin', NULL, NULL, '2020-07-12 11:33:44', '2020-07-12 12:05:17'),
        (18, 31, 2106863042, 0, 0, 0, 'ايمن رجب:Ayman Rajab', 'a123456', 'aymanragab100100@gmail.com', NULL, 'a123456', '$2y$10$SGu8e303UjqYYAHMDcSDWegC/GQRcGm4CRakknmG3pGOWX.NTRsN.', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-12 11:48:48', '2020-07-12 11:48:48'),
        (19, 24, 2110900574, 0, 0, 0, 'احمد البحيري:Ahamad Albehari', 'ahmadfarid', 'ahmadfaridbehery@gmail.com', NULL, '131313101010aA', '$2y$10$9nuIHg1mdZ9m2FwMH4mTrOJcd4wEgdbReeTkAQKBEU0Nji2PVZtNO', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-12 12:13:43', '2020-07-12 12:13:43'),
        (20, 28, 2262922434, 0, 0, 0, 'افتخار حسين:Iftequar Hussain', 'iftequar', 'iftequarhuss@gmail.com', NULL, 'windows1', '$2y$10$lUfA8AVno8HXmZ3m4APEj.BESkmaR.aqPmjvJ4iISAcnGmm4efakO', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I9DonIYvqnckSiAqYMOvc8pJbeaDQug9JboDdm2WE9VptPTuFzuaP039kSYj', '2020-07-12 12:28:55', '2020-07-12 12:28:55'),
        (21, 32, 2445000975, 0, 0, 0, 'محمود غنيم:Mahmoud Ghonim', 'mghoneam7', 'ghoneammahmoud0@gmail.com', NULL, '0591717245mm', '$2y$10$5Xx6NZbxJBGYYvTDy664C.ppLimH02Er1uK9bFh7zGMiEG4V0FDYG', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, 21, 'mghoneam7', NULL, NULL, '2020-07-13 10:24:35', '2020-07-15 10:49:23'),
        (22, 15, 2232574422, 0, 1, 0, 'عبدالعاطي عبدالعاطي:Abd Elaty Abd Elaty', 'abdelaty22', 'abdelaty_aly@yahoo.com', NULL, '198222', '$2y$10$2hFS6AnKjo0a/DcCnvnha.mRympKGtlr/4IO2s4fiX9MR0p1coUbS', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, 2, 'fahd', NULL, NULL, '2020-07-14 10:08:12', '2020-07-21 11:41:20'),
        (23, 29, 1081562868, 0, 0, 0, 'عبدالله عويضه:Abdullah Owaidh', 'owidah', 'abdullah-owidah99@hotmail.com', NULL, '0547125704a', '$2y$10$0r4SsceWuqy1BWgUhals.u3dxNw0McYhOCsnxMxDtkfINjg/eg/Hq', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zkSqHYld1QB5kcCKXvb6xuxnw6gCVP1kMzbn5iGQqwEZLW3tbtadGh0QNiBq', '2020-07-19 07:13:45', '2020-07-19 07:13:45'),
        (24, 36, 2099159010, 0, 0, 0, 'محمد زايد:Mohammed Zayed', 'zayed', 'boodymoza@yahoo.com', NULL, 'moz55555', '$2y$10$3Kb/A7gh0Y1Kqf6j0k5/JeIKwIhHhMqUobJfNIg1uUgzAw7b02iTW', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-20 12:26:40', '2020-07-20 12:26:40'),
        (25, 33, 1091137875, 0, 0, 0, 'امنية الدرغام:Omnia Aldirgham', 'omnia', 'd.omnia1@hotmail.com', NULL, 'm4545458', '$2y$10$2.HjFj/Px5YaaGxOOHD2QueZbWv9JW1zbU4GbkxdxlijjuKWWaOXG', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, 2, 'fahd', NULL, NULL, '2020-07-21 08:32:31', '2020-08-18 11:42:09'),
        (26, 35, 1076608981, 0, 0, 0, 'لمى ادريس:Lama Idris', 'lama', 'lama.a.idris@hotmail.com', NULL, '123456', '$2y$10$El3c4kAzhDhB0S1.apFs8exRPZrD19QDvTvloh19jh0OqyO/APsL.', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, 2, 'fahd', NULL, NULL, '2020-07-21 08:37:10', '2020-08-18 11:41:33'),
        (27, 38, 1000677011, 0, 1, 0, 'المن حكيم:Almann Hakim', 'almann3030', 'almann_h@yahoo.com', NULL, 'ah303030', '$2y$10$XDErmDiM23V8XiE8Z6G.guqN6SfiX3IOlOEkMv6CBVWKHYvT/nUiu', 5, 'standard_user', 1, 1, NULL, NULL, NULL, NULL, 2, 'fahd', NULL, NULL, '2020-07-21 12:37:28', '2020-08-18 11:40:59');`);
    }
    // -----------------------------------------------------------------------------------------------------------------
}
