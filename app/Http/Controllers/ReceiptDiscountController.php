<?php

namespace App\Http\Controllers;

use App\ReceiptDiscount;
use Illuminate\Http\Request;

class ReceiptDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('receiptDiscount.index');
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
     * @param  \App\ReceiptDiscount  $receiptDiscount
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiptDiscount $receiptDiscount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReceiptDiscount  $receiptDiscount
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceiptDiscount $receiptDiscount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReceiptDiscount  $receiptDiscount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceiptDiscount $receiptDiscount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReceiptDiscount  $receiptDiscount
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiptDiscount $receiptDiscount)
    {
        //
    }
}
