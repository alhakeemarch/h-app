<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }

    public static function firstInsertion()
    {
        $banks = array(
            [
                'name_en' => 'The National Commercial Bank',
                'name_ar' => 'البنك الأهلي التجاري',
                // -----------------------------
                'IBAN_2digit_code' => '10',
                'swift_code' => 'NCBKSAJE',
                'symbol_en' => 'NCB',
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'The Saudi British Bank',
                'name_ar' => 'البنك السعودي البريطاني',
                // -----------------------------
                'IBAN_2digit_code' => '45',
                'swift_code' => 'SABBSARI',
                'symbol_en' => 'SABB',
                'symbol_ar' => 'ساب',
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Banque Saudi Fransi',
                'name_ar' => 'البنك السعودي الفرنسي',
                // -----------------------------
                'IBAN_2digit_code' => '55',
                'swift_code' => 'BSFRSARIWST',
                'symbol_en' => null,
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'alawwal bank',
                'name_ar' => 'البنك الأول',
                // -----------------------------
                'IBAN_2digit_code' => '50',
                'swift_code' => 'AAALSARI',
                'symbol_en' => null,
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Saudi Investment Bank',
                'name_ar' => 'البنك السعودي للاستثمار',
                // -----------------------------
                'IBAN_2digit_code' => null,
                'swift_code' => 'SIBCSARI',
                'symbol_en' => null,
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Arab National Bank',
                'name_ar' => 'البنك العربي الوطني',
                // -----------------------------
                'IBAN_2digit_code' => '30',
                'swift_code' => 'ARNBSARI',
                'symbol_en' => null,
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Bank AlBilad',
                'name_ar' => 'بنك البلاد',
                // -----------------------------
                'IBAN_2digit_code' => '15',
                'swift_code' => 'ALBISARI',
                'symbol_en' => null,
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Bank AlJazira',
                'name_ar' => 'بنك الجزيرة',
                // -----------------------------
                'IBAN_2digit_code' => null,
                'swift_code' => 'BJAZSAJE',
                'symbol_en' => null,
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Riyad Bank',
                'name_ar' => 'بنك الرياض',
                // -----------------------------
                'IBAN_2digit_code' => '20',
                'swift_code' => 'RIBLSARI',
                'symbol_en' => null,
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Samba Financial Group',
                'name_ar' => 'مجموعة سامبا المالية',
                // -----------------------------
                'IBAN_2digit_code' => '40',
                'swift_code' => 'SAMBSARIJCS',
                'symbol_en' => 'Samba',
                'symbol_ar' => 'سامبا',
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Al Rajhi Bank',
                'name_ar' => 'مصرف الراجحي',
                // -----------------------------
                'IBAN_2digit_code' => '80',
                'swift_code' => 'RJHISARI',
                'symbol_en' => null,
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'alinma bank',
                'name_ar' => 'مصرف الإنماء',
                // -----------------------------
                'IBAN_2digit_code' => null,
                'swift_code' => 'INMASARI',
                'symbol_en' => null,
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Gulf International Bank Saudi Aribia',
                'name_ar' => 'بنك الخليج الدولي - السعودية',
                // -----------------------------
                'IBAN_2digit_code' => null,
                'swift_code' => 'GULFSARI',
                'symbol_en' => 'GIB-SA',
                'symbol_ar' => null,
                // -----------------------------
                'web_address' => null,
                // -----------------------------
                'phone_banking_in' => null,
                'phone_banking_out' => null,
                'privileged_phone_banking_in' => null,
                'privileged_phone_banking_out' => null,
                'online_banking_link' => null,
                // -----------------------------
                'business_phone_banking_in' => null,
                'business_phone_banking_out' => null,
                'business_online_banking_link' => null,
                'business_email' => null,
                // -----------------------------
                'services_phone_in' => null,
                'services_phone_out' => null,
                'contact_email' => null,
                // -----------------------------
                'consulting_phone' => null,
                'financing_phone' => null,
                // -----------------------------
                'complaint_phone' => null,
                'complaint_email' => null,
                // -----------------------------
                'fax' => null,
                // -----------------------------
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
        );
        /*******************************************************************************************************/
        if (Bank::all()->count() >= count($banks)) {
            return false;
        }
        // -------------------------------------
        foreach ($banks as $bank) {
            $new_bank = new Bank();
            $new_bank->create($bank);
        }
        return true;
    }
}
