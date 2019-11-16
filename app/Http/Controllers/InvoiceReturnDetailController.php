<?php

namespace App\Http\Controllers;

use App\InvoiceReturnDetail;
use Illuminate\Http\Request;

class InvoiceReturnDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoiceReturnDetail.index');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoiceReturnDetail  $invoiceReturnDetail
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceReturnDetail $invoiceReturnDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvoiceReturnDetail  $invoiceReturnDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceReturnDetail $invoiceReturnDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvoiceReturnDetail  $invoiceReturnDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceReturnDetail $invoiceReturnDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoiceReturnDetail  $invoiceReturnDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceReturnDetail $invoiceReturnDetail)
    {
        //
    }
}
