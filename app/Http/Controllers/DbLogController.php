<?php

namespace App\Http\Controllers;

use App\DbLog;
use Illuminate\Http\Request;

class DbLogController extends Controller
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

        // $this->authorizeResource(Person::class, 'person');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('db_log.index')->with([
            'db_logs' => DbLog::all()->reverse(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

    public static function add_record($data)
    {
        $data['created_by_id'] = auth()->user()->id;
        $data['created_by_name'] = auth()->user()->user_name;
        DbLog::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DbLog  $dbLog
     * @return \Illuminate\Http\Response
     */
    public function show(DbLog $dbLog)
    {
        return view('db_log.show')->with([
            'db_log' => $dbLog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DbLog  $dbLog
     * @return \Illuminate\Http\Response
     */
    public function edit(DbLog $dbLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DbLog  $dbLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DbLog $dbLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DbLog  $dbLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(DbLog $dbLog)
    {
        //
    }
}
