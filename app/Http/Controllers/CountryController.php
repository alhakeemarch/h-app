<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        // return $countries;
        return view('country.index')->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return $request;
        $code_2chracters = $request->code_2chracters;
        $country = new Country();
        return view('country.create')->with([
            'country' => $country,
            'code_2chracters' => $code_2chracters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return $country;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }

    public function check(Request $request, Country $country)
    {
        if ($request->method() === "GET") {
            return view('country.check');
        }

        $validatedData = $request->validate([
            'code_2chracters' => 'required|regex:/[A-Z]/',
        ]);
        // return $request->all();

        $found_country = $country->where('code_2chracters', $request->code_2chracters)->first();
        // return $found_country;
        // $found_country = false;
        if ($found_country) {
            return redirect()->action('CountryController@show', $found_country->id);
            // return redirect()->action('countryController@show', ['id' => $found_country->id]);
        } else {
            return redirect()->action('CountryController@create', $request);
        }
    }








    /**
     * inserts all available nationalities to db.
     *
     * @return BOOLEAN
     */
    public static function firstInsertion()
    {
        // https://github.com/umpirsky/country-list/tree/master/data/en

        // https://github.com/sameer-shelavale/php-countries-array
        /*******************************************************************************************************
         *      1) name
         *      2) code_2chracters code, 2 characters (ISO-3166-1 code_2chracters)
         *      3) code_3chracters code, 3 characters (ISO-3166-1 code_3chracters)
         *      4) numeric code (ISO-3166-1 numeric)
         *      5) isd_phone_code code for country
         *      6) continent
         *******************************************************************************************************/
        $countries = array(
            "AF" => array(
                'code_2chracters' => 'AF', 'code_3chracters' => 'AFG', 'code_numeric' => '004',
                'isd_phone_code' => '93', "en_name" => "Afghanistan", "continent" => "Asia",
            ),
            "AX" => array(
                'code_2chracters' => 'AX', 'code_3chracters' => 'ALA', 'code_numeric' => '248',
                'isd_phone_code' => '358', "en_name" => "Aland Islands", "continent" => "Europe"
            ),
            "AL" => array(
                'code_2chracters' => 'AL', 'code_3chracters' => 'ALB', 'code_numeric' => '008',
                'isd_phone_code' => '355', "en_name" => "Albania", "continent" => "Europe"
            ),
            "DZ" => array(
                'code_2chracters' => 'DZ', 'code_3chracters' => 'DZA', 'code_numeric' => '012',
                'isd_phone_code' => '213', "en_name" => "Algeria", "continent" => "Africa"
            ),
            "AS" => array(
                'code_2chracters' => 'AS', 'code_3chracters' => 'ASM', 'code_numeric' => '016',
                'isd_phone_code' => '1684', "en_name" => "American Samoa", "continent" => "Oceania"
            ),
            "AD" => array(
                'code_2chracters' => 'AD', 'code_3chracters' => 'AND', 'code_numeric' => '020',
                'isd_phone_code' => '376', "en_name" => "Andorra", "continent" => "Europe"
            ),
            "AO" => array(
                'code_2chracters' => 'AO', 'code_3chracters' => 'AGO', 'code_numeric' => '024',
                'isd_phone_code' => '244', "en_name" => "Angola", "continent" => "Africa"
            ),
            "AI" => array(
                'code_2chracters' => 'AI', 'code_3chracters' => 'AIA', 'code_numeric' => '660',
                'isd_phone_code' => '1264', "en_name" => "Anguilla", "continent" => "North America"
            ),
            "AQ" => array(
                'code_2chracters' => 'AQ', 'code_3chracters' => 'ATA', 'code_numeric' => '010',
                'isd_phone_code' => '672', "en_name" => "Antarctica", "continent" => "Antarctica"
            ),
            "AG" => array(
                'code_2chracters' => 'AG', 'code_3chracters' => 'ATG', 'code_numeric' => '028',
                'isd_phone_code' => '1268', "en_name" => "Antigua and Barbuda", "continent" => "North America"
            ),
            "AR" => array(
                'code_2chracters' => 'AR', 'code_3chracters' => 'ARG', 'code_numeric' => '032',
                'isd_phone_code' => '54', "en_name" => "Argentina", "continent" => "South America"
            ),
            "AM" => array(
                'code_2chracters' => 'AM', 'code_3chracters' => 'ARM', 'code_numeric' => '051',
                'isd_phone_code' => '374', "en_name" => "Armenia", "continent" => "Asia"
            ),
            "AW" => array(
                'code_2chracters' => 'AW', 'code_3chracters' => 'ABW', 'code_numeric' => '533',
                'isd_phone_code' => '297', "en_name" => "Aruba", "continent" => "North America"
            ),
            "AU" => array(
                'code_2chracters' => 'AU', 'code_3chracters' => 'AUS', 'code_numeric' => '036',
                'isd_phone_code' => '61', "en_name" => "Australia", "continent" => "Oceania"
            ),
            "AT" => array(
                'code_2chracters' => 'AT', 'code_3chracters' => 'AUT', 'code_numeric' => '040',
                'isd_phone_code' => '43', "en_name" => "Austria", "continent" => "Europe"
            ),
            "AZ" => array(
                'code_2chracters' => 'AZ', 'code_3chracters' => 'AZE', 'code_numeric' => '031',
                'isd_phone_code' => '994', "en_name" => "Azerbaijan", "continent" => "Asia"
            ),
            "BS" => array(
                'code_2chracters' => 'BS', 'code_3chracters' => 'BHS', 'code_numeric' => '044',
                'isd_phone_code' => '1242', "en_name" => "Bahamas", "continent" => "North America"
            ),
            "BH" => array(
                'code_2chracters' => 'BH', 'code_3chracters' => 'BHR', 'code_numeric' => '048',
                'isd_phone_code' => '973', "en_name" => "Bahrain", "continent" => "Asia"
            ),
            "BD" => array(
                'code_2chracters' => 'BD', 'code_3chracters' => 'BGD', 'code_numeric' => '050',
                'isd_phone_code' => '880', "en_name" => "Bangladesh", "continent" => "Asia"
            ),
            "BB" => array(
                'code_2chracters' => 'BB', 'code_3chracters' => 'BRB', 'code_numeric' => '052',
                'isd_phone_code' => '1246', "en_name" => "Barbados", "continent" => "North America"
            ),
            "BY" => array(
                'code_2chracters' => 'BY', 'code_3chracters' => 'BLR', 'code_numeric' => '112',
                'isd_phone_code' => '375', "en_name" => "Belarus", "continent" => "Europe"
            ),
            "BE" => array(
                'code_2chracters' => 'BE', 'code_3chracters' => 'BEL', 'code_numeric' => '056',
                'isd_phone_code' => '32', "en_name" => "Belgium", "continent" => "Europe"
            ),
            "BZ" => array(
                'code_2chracters' => 'BZ', 'code_3chracters' => 'BLZ', 'code_numeric' => '084',
                'isd_phone_code' => '501', "en_name" => "Belize", "continent" => "North America"
            ),
            "BJ" => array(
                'code_2chracters' => 'BJ', 'code_3chracters' => 'BEN', 'code_numeric' => '204',
                'isd_phone_code' => '229', "en_name" => "Benin", "continent" => "Africa"
            ),
            "BM" => array(
                'code_2chracters' => 'BM', 'code_3chracters' => 'BMU', 'code_numeric' => '060',
                'isd_phone_code' => '1441', "en_name" => "Bermuda", "continent" => "North America"
            ),
            "BT" => array(
                'code_2chracters' => 'BT', 'code_3chracters' => 'BTN', 'code_numeric' => '064',
                'isd_phone_code' => '975', "en_name" => "Bhutan", "continent" => "Asia"
            ),
            "BO" => array(
                'code_2chracters' => 'BO', 'code_3chracters' => 'BOL', 'code_numeric' => '068',
                'isd_phone_code' => '591', "en_name" => "Bolivia", "continent" => "South America"
            ),
            "BQ" => array(
                'code_2chracters' => 'BQ', 'code_3chracters' => 'BES', 'code_numeric' => '535',
                'isd_phone_code' => '599', "en_name" => "Bonaire, Sint Eustatius and Saba", "continent" => "North America"
            ),
            "BA" => array(
                'code_2chracters' => 'BA', 'code_3chracters' => 'BIH', 'code_numeric' => '070',
                'isd_phone_code' => '387', "en_name" => "Bosnia and Herzegovina", "continent" => "Europe"
            ),
            "BW" => array(
                'code_2chracters' => 'BW', 'code_3chracters' => 'BWA', 'code_numeric' => '072',
                'isd_phone_code' => '267', "en_name" => "Botswana", "continent" => "Africa"
            ),
            "BV" => array(
                'code_2chracters' => 'BV', 'code_3chracters' => 'BVT', 'code_numeric' => '074',
                'isd_phone_code' => '61', "en_name" => "Bouvet Island", "continent" => "Antarctica"
            ),
            "BR" => array(
                'code_2chracters' => 'BR', 'code_3chracters' => 'BRA', 'code_numeric' => '076',
                'isd_phone_code' => '55', "en_name" => "Brazil", "continent" => "South America"
            ),
            "IO" => array(
                'code_2chracters' => 'IO', 'code_3chracters' => 'IOT', 'code_numeric' => '086',
                'isd_phone_code' => '246', "en_name" => "British Indian Ocean Territory", "continent" => "Asia"
            ),
            "BN" => array(
                'code_2chracters' => 'BN', 'code_3chracters' => 'BRN', 'code_numeric' => '096',
                'isd_phone_code' => '672', "en_name" => "Brunei Darussalam", "continent" => "Asia"
            ),
            "BG" => array(
                'code_2chracters' => 'BG', 'code_3chracters' => 'BGR', 'code_numeric' => '100',
                'isd_phone_code' => '359', "en_name" => "Bulgaria", "continent" => "Europe"
            ),
            "BF" => array(
                'code_2chracters' => 'BF', 'code_3chracters' => 'BFA', 'code_numeric' => '854',
                'isd_phone_code' => '226', "en_name" => "Burkina Faso", "continent" => "Africa"
            ),
            "BI" => array(
                'code_2chracters' => 'BI', 'code_3chracters' => 'BDI', 'code_numeric' => '108',
                'isd_phone_code' => '257', "en_name" => "Burundi", "continent" => "Africa"
            ),
            "KH" => array(
                'code_2chracters' => 'KH', 'code_3chracters' => 'KHM', 'code_numeric' => '116',
                'isd_phone_code' => '855', "en_name" => "Cambodia", "continent" => "Asia"
            ),
            "CM" => array(
                'code_2chracters' => 'CM', 'code_3chracters' => 'CMR', 'code_numeric' => '120',
                'isd_phone_code' => '231', "en_name" => "Cameroon", "continent" => "Africa"
            ),
            "CA" => array(
                'code_2chracters' => 'CA', 'code_3chracters' => 'CAN', 'code_numeric' => '124',
                'isd_phone_code' => '1', "en_name" => "Canada", "continent" => "North America"
            ),
            "CV" => array(
                'code_2chracters' => 'CV', 'code_3chracters' => 'CPV', 'code_numeric' => '132',
                'isd_phone_code' => '238', "en_name" => "Cape Verde", "continent" => "Africa"
            ),
            "KY" => array(
                'code_2chracters' => 'KY', 'code_3chracters' => 'CYM', 'code_numeric' => '136',
                'isd_phone_code' => '1345', "en_name" => "Cayman Islands", "continent" => "North America"
            ),
            "CF" => array(
                'code_2chracters' => 'CF', 'code_3chracters' => 'CAF', 'code_numeric' => '140',
                'isd_phone_code' => '236', "en_name" => "Central African Republic", "continent" => "Africa"
            ),
            "TD" => array(
                'code_2chracters' => 'TD', 'code_3chracters' => 'TCD', 'code_numeric' => '148',
                'isd_phone_code' => '235', "en_name" => "Chad", "continent" => "Africa"
            ),
            "CL" => array(
                'code_2chracters' => 'CL', 'code_3chracters' => 'CHL', 'code_numeric' => '152',
                'isd_phone_code' => '56', "en_name" => "Chile", "continent" => "South America"
            ),
            "CN" => array(
                'code_2chracters' => 'CN', 'code_3chracters' => 'CHN', 'code_numeric' => '156',
                'isd_phone_code' => '86', "en_name" => "China", "continent" => "Asia"
            ),
            "CX" => array(
                'code_2chracters' => 'CX', 'code_3chracters' => 'CXR', 'code_numeric' => '162',
                'isd_phone_code' => '61', "en_name" => "Christmas Island", "continent" => "Asia"
            ),
            "CC" => array(
                'code_2chracters' => 'CC', 'code_3chracters' => 'CCK', 'code_numeric' => '166',
                'isd_phone_code' => '891', "en_name" => "Cocos (Keeling) Islands", "continent" => "Asia"
            ),
            "CO" => array(
                'code_2chracters' => 'CO', 'code_3chracters' => 'COL', 'code_numeric' => '170',
                'isd_phone_code' => '57', "en_name" => "Colombia", "continent" => "South America"
            ),
            "KM" => array(
                'code_2chracters' => 'KM', 'code_3chracters' => 'COM', 'code_numeric' => '174',
                'isd_phone_code' => '269', "en_name" => "Comoros", "continent" => "Africa"
            ),
            "CG" => array(
                'code_2chracters' => 'CG', 'code_3chracters' => 'COG', 'code_numeric' => '178',
                'isd_phone_code' => '242', "en_name" => "Congo", "continent" => "Africa"
            ),
            "CD" => array(
                'code_2chracters' => 'CD', 'code_3chracters' => 'COD', 'code_numeric' => '180',
                'isd_phone_code' => '243', "en_name" => "The Democratic Republic of The Congo", "continent" => "Africa"
            ),
            "CK" => array(
                'code_2chracters' => 'CK', 'code_3chracters' => 'COK', 'code_numeric' => '184',
                'isd_phone_code' => '682', "en_name" => "Cook Islands", "continent" => "Oceania"
            ),
            "CR" => array(
                'code_2chracters' => 'CR', 'code_3chracters' => 'CRI', 'code_numeric' => '188',
                'isd_phone_code' => '506', "en_name" => "Costa Rica", "continent" => "North America"
            ),
            "CI" => array(
                'code_2chracters' => 'CI', 'code_3chracters' => 'CIV', 'code_numeric' => '384',
                'isd_phone_code' => '225', "en_name" => "Cote D'ivoire", "continent" => "Africa"
            ),
            "CW" => array(
                'code_2chracters' => 'CW', 'code_3chracters' => 'CUW', 'code_numeric' => '531',
                'isd_phone_code' => '599', "en_name" => "Curaçao", "continent" => "North America"
            ),
            "HR" => array(
                'code_2chracters' => 'HR', 'code_3chracters' => 'HRV', 'code_numeric' => '191',
                'isd_phone_code' => '385', "en_name" => "Croatia", "continent" => "Europe"
            ),
            "CU" => array(
                'code_2chracters' => 'CU', 'code_3chracters' => 'CUB', 'code_numeric' => '192',
                'isd_phone_code' => '53', "en_name" => "Cuba", "continent" => "North America"
            ),
            "CY" => array(
                'code_2chracters' => 'CY', 'code_3chracters' => 'CYP', 'code_numeric' => '196',
                'isd_phone_code' => '357', "en_name" => "Cyprus", "continent" => "Asia"
            ),
            "CZ" => array(
                'code_2chracters' => 'CZ', 'code_3chracters' => 'CZE', 'code_numeric' => '203',
                'isd_phone_code' => '420', "en_name" => "Czech Republic", "continent" => "Europe"
            ),
            "DK" => array(
                'code_2chracters' => 'DK', 'code_3chracters' => 'DNK', 'code_numeric' => '208',
                'isd_phone_code' => '45', "en_name" => "Denmark", "continent" => "Europe"
            ),
            "DJ" => array(
                'code_2chracters' => 'DJ', 'code_3chracters' => 'DJI', 'code_numeric' => '262',
                'isd_phone_code' => '253', "en_name" => "Djibouti", "continent" => "Africa"
            ),
            "DM" => array(
                'code_2chracters' => 'DM', 'code_3chracters' => 'DMA', 'code_numeric' => '212',
                'isd_phone_code' => '1767', "en_name" => "Dominica", "continent" => "North America"
            ),
            "DO" => array(
                'code_2chracters' => 'DO', 'code_3chracters' => 'DOM', 'code_numeric' => '214',
                'isd_phone_code' => '1809', "en_name" => "Dominican Republic", "continent" => "North America"
            ),
            "EC" => array(
                'code_2chracters' => 'EC', 'code_3chracters' => 'ECU', 'code_numeric' => '218',
                'isd_phone_code' => '593', "en_name" => "Ecuador", "continent" => "South America"
            ),
            "EG" => array(
                'code_2chracters' => 'EG', 'code_3chracters' => 'EGY', 'code_numeric' => '818',
                'isd_phone_code' => '20', "en_name" => "Egypt", "continent" => "Africa"
            ),
            "SV" => array(
                'code_2chracters' => 'SV', 'code_3chracters' => 'SLV', 'code_numeric' => '222',
                'isd_phone_code' => '503', "en_name" => "El Salvador", "continent" => "North America"
            ),
            "GQ" => array(
                'code_2chracters' => 'GQ', 'code_3chracters' => 'GNQ', 'code_numeric' => '226',
                'isd_phone_code' => '240', "en_name" => "Equatorial Guinea", "continent" => "Africa"
            ),
            "ER" => array(
                'code_2chracters' => 'ER', 'code_3chracters' => 'ERI', 'code_numeric' => '232',
                'isd_phone_code' => '291', "en_name" => "Eritrea", "continent" => "Africa"
            ),
            "EE" => array(
                'code_2chracters' => 'EE', 'code_3chracters' => 'EST', 'code_numeric' => '233',
                'isd_phone_code' => '372', "en_name" => "Estonia", "continent" => "Europe"
            ),
            "ET" => array(
                'code_2chracters' => 'ET', 'code_3chracters' => 'ETH', 'code_numeric' => '231',
                'isd_phone_code' => '251', "en_name" => "Ethiopia", "continent" => "Africa"
            ),
            "FK" => array(
                'code_2chracters' => 'FK', 'code_3chracters' => 'FLK', 'code_numeric' => '238',
                'isd_phone_code' => '500', "en_name" => "Falkland Islands (Malvinas)", "continent" => "South America"
            ),
            "FO" => array(
                'code_2chracters' => 'FO', 'code_3chracters' => 'FRO', 'code_numeric' => '234',
                'isd_phone_code' => '298', "en_name" => "Faroe Islands", "continent" => "Europe"
            ),
            "FJ" => array(
                'code_2chracters' => 'FJ', 'code_3chracters' => 'FJI', 'code_numeric' => '243',
                'isd_phone_code' => '679', "en_name" => "Fiji", "continent" => "Oceania"
            ),
            "FI" => array(
                'code_2chracters' => 'FI', 'code_3chracters' => 'FIN', 'code_numeric' => '246',
                'isd_phone_code' => '238', "en_name" => "Finland", "continent" => "Europe"
            ),
            "FR" => array(
                'code_2chracters' => 'FR', 'code_3chracters' => 'FRA', 'code_numeric' => '250',
                'isd_phone_code' => '33', "en_name" => "France", "continent" => "Europe"
            ),
            "GF" => array(
                'code_2chracters' => 'GF', 'code_3chracters' => 'GUF', 'code_numeric' => '254',
                'isd_phone_code' => '594', "en_name" => "French Guiana", "continent" => "South America"
            ),
            "PF" => array(
                'code_2chracters' => 'PF', 'code_3chracters' => 'PYF', 'code_numeric' => '258',
                'isd_phone_code' => '689', "en_name" => "French Polynesia", "continent" => "Oceania"
            ),
            "TF" => array(
                'code_2chracters' => 'TF', 'code_3chracters' => 'ATF', 'code_numeric' => '260',
                'isd_phone_code' => '262', "en_name" => "French Southern Territories", "continent" => "Antarctica"
            ),
            "GA" => array(
                'code_2chracters' => 'GA', 'code_3chracters' => 'GAB', 'code_numeric' => '266',
                'isd_phone_code' => '241', "en_name" => "Gabon", "continent" => "Africa"
            ),
            "GM" => array(
                'code_2chracters' => 'GM', 'code_3chracters' => 'GMB', 'code_numeric' => '270',
                'isd_phone_code' => '220', "en_name" => "Gambia", "continent" => "Africa"
            ),
            "GE" => array(
                'code_2chracters' => 'GE', 'code_3chracters' => 'GEO', 'code_numeric' => '268',
                'isd_phone_code' => '995', "en_name" => "Georgia", "continent" => "Asia"
            ),
            "DE" => array(
                'code_2chracters' => 'DE', 'code_3chracters' => 'DEU', 'code_numeric' => '276',
                'isd_phone_code' => '49', "en_name" => "Germany", "continent" => "Europe"
            ),
            "GH" => array(
                'code_2chracters' => 'GH', 'code_3chracters' => 'GHA', 'code_numeric' => '288',
                'isd_phone_code' => '233', "en_name" => "Ghana", "continent" => "Africa"
            ),
            "GI" => array(
                'code_2chracters' => 'GI', 'code_3chracters' => 'GIB', 'code_numeric' => '292',
                'isd_phone_code' => '350', "en_name" => "Gibraltar", "continent" => "Europe"
            ),
            "GR" => array(
                'code_2chracters' => 'GR', 'code_3chracters' => 'GRC', 'code_numeric' => '300',
                'isd_phone_code' => '30', "en_name" => "Greece", "continent" => "Europe"
            ),
            "GL" => array(
                'code_2chracters' => 'GL', 'code_3chracters' => 'GRL', 'code_numeric' => '304',
                'isd_phone_code' => '299', "en_name" => "Greenland", "continent" => "North America"
            ),
            "GD" => array(
                'code_2chracters' => 'GD', 'code_3chracters' => 'GRD', 'code_numeric' => '308',
                'isd_phone_code' => '1473', "en_name" => "Grenada", "continent" => "North America"
            ),
            "GP" => array(
                'code_2chracters' => 'GP', 'code_3chracters' => 'GLP', 'code_numeric' => '312',
                'isd_phone_code' => '590', "en_name" => "Guadeloupe", "continent" => "North America"
            ),
            "GU" => array(
                'code_2chracters' => 'GU', 'code_3chracters' => 'GUM', 'code_numeric' => '316',
                'isd_phone_code' => '1871', "en_name" => "Guam", "continent" => "Oceania"
            ),
            "GT" => array(
                'code_2chracters' => 'GT', 'code_3chracters' => 'GTM', 'code_numeric' => '320',
                'isd_phone_code' => '502', "en_name" => "Guatemala", "continent" => "North America"
            ),
            "GG" => array(
                'code_2chracters' => 'GG', 'code_3chracters' => 'GGY', 'code_numeric' => '831',
                'isd_phone_code' => '44', "en_name" => "Guernsey", "continent" => "Europe"
            ),
            "GN" => array(
                'code_2chracters' => 'GN', 'code_3chracters' => 'GIN', 'code_numeric' => '324',
                'isd_phone_code' => '224', "en_name" => "Guinea", "continent" => "Africa"
            ),
            "GW" => array(
                'code_2chracters' => 'GW', 'code_3chracters' => 'GNB', 'code_numeric' => '624',
                'isd_phone_code' => '245', "en_name" => "Guinea-bissau", "continent" => "Africa"
            ),
            "GY" => array(
                'code_2chracters' => 'GY', 'code_3chracters' => 'GUY', 'code_numeric' => '328',
                'isd_phone_code' => '592', "en_name" => "Guyana", "continent" => "South America"
            ),
            "HT" => array(
                'code_2chracters' => 'HT', 'code_3chracters' => 'HTI', 'code_numeric' => '332',
                'isd_phone_code' => '509', "en_name" => "Haiti", "continent" => "North America"
            ),
            "HM" => array(
                'code_2chracters' => 'HM', 'code_3chracters' => 'HMD', 'code_numeric' => '334',
                'isd_phone_code' => '672', "en_name" => "Heard Island and Mcdonald Islands", "continent" => "Antarctica"
            ),
            "VA" => array(
                'code_2chracters' => 'VA', 'code_3chracters' => 'VAT', 'code_numeric' => '336',
                'isd_phone_code' => '379', "en_name" => "Holy See (Vatican City State)", "continent" => "Europe"
            ),
            "HN" => array(
                'code_2chracters' => 'HN', 'code_3chracters' => 'HND', 'code_numeric' => '340',
                'isd_phone_code' => '504', "en_name" => "Honduras", "continent" => "North America"
            ),
            "HK" => array(
                'code_2chracters' => 'HK', 'code_3chracters' => 'HKG', 'code_numeric' => '344',
                'isd_phone_code' => '852', "en_name" => "Hong Kong", "continent" => "Asia"
            ),
            "HU" => array(
                'code_2chracters' => 'HU', 'code_3chracters' => 'HUN', 'code_numeric' => '348',
                'isd_phone_code' => '36', "en_name" => "Hungary", "continent" => "Europe"
            ),
            "IS" => array(
                'code_2chracters' => 'IS', 'code_3chracters' => 'ISL', 'code_numeric' => '352',
                'isd_phone_code' => '354', "en_name" => "Iceland", "continent" => "Europe"
            ),
            "IN" => array(
                'code_2chracters' => 'IN', 'code_3chracters' => 'IND', 'code_numeric' => '356',
                'isd_phone_code' => '91', "en_name" => "India", "continent" => "Asia"
            ),
            "ID" => array(
                'code_2chracters' => 'ID', 'code_3chracters' => 'IDN', 'code_numeric' => '360',
                'isd_phone_code' => '62', "en_name" => "Indonesia", "continent" => "Asia"
            ),
            "IR" => array(
                'code_2chracters' => 'IR', 'code_3chracters' => 'IRN', 'code_numeric' => '364',
                'isd_phone_code' => '98', "en_name" => "Iran", "continent" => "Asia"
            ),
            "IQ" => array(
                'code_2chracters' => 'IQ', 'code_3chracters' => 'IRQ', 'code_numeric' => '368',
                'isd_phone_code' => '964', "en_name" => "Iraq", "continent" => "Asia"
            ),
            "IE" => array(
                'code_2chracters' => 'IE', 'code_3chracters' => 'IRL', 'code_numeric' => '372',
                'isd_phone_code' => '353', "en_name" => "Ireland", "continent" => "Europe"
            ),
            "IM" => array(
                'code_2chracters' => 'IM', 'code_3chracters' => 'IMN', 'code_numeric' => '833',
                'isd_phone_code' => '44', "en_name" => "Isle of Man", "continent" => "Europe"
            ),
            "IL" => array(
                'code_2chracters' => 'IL', 'code_3chracters' => 'ISR', 'code_numeric' => '376',
                'isd_phone_code' => '972', "en_name" => "Israel", "continent" => "Asia"
            ),
            "IT" => array(
                'code_2chracters' => 'IT', 'code_3chracters' => 'ITA', 'code_numeric' => '380',
                'isd_phone_code' => '39', "en_name" => "Italy", "continent" => "Europe"
            ),
            "JM" => array(
                'code_2chracters' => 'JM', 'code_3chracters' => 'JAM', 'code_numeric' => '388',
                'isd_phone_code' => '1876', "en_name" => "Jamaica", "continent" => "North America"
            ),
            "JP" => array(
                'code_2chracters' => 'JP', 'code_3chracters' => 'JPN', 'code_numeric' => '392',
                'isd_phone_code' => '81', "en_name" => "Japan", "continent" => "Asia"
            ),
            "JE" => array(
                'code_2chracters' => 'JE', 'code_3chracters' => 'JEY', 'code_numeric' => '832',
                'isd_phone_code' => '44', "en_name" => "Jersey", "continent" => "Europe"
            ),
            "JO" => array(
                'code_2chracters' => 'JO', 'code_3chracters' => 'JOR', 'code_numeric' => '400',
                'isd_phone_code' => '962', "en_name" => "Jordan", "continent" => "Asia"
            ),
            "KZ" => array(
                'code_2chracters' => 'KZ', 'code_3chracters' => 'KAZ', 'code_numeric' => '398',
                'isd_phone_code' => '7', "en_name" => "Kazakhstan", "continent" => "Asia"
            ),
            "KE" => array(
                'code_2chracters' => 'KE', 'code_3chracters' => 'KEN', 'code_numeric' => '404',
                'isd_phone_code' => '254', "en_name" => "Kenya", "continent" => "Africa"
            ),
            "KI" => array(
                'code_2chracters' => 'KI', 'code_3chracters' => 'KIR', 'code_numeric' => '296',
                'isd_phone_code' => '686', "en_name" => "Kiribati", "continent" => "Oceania"
            ),
            "KP" => array(
                'code_2chracters' => 'KP', 'code_3chracters' => 'PRK', 'code_numeric' => '408',
                'isd_phone_code' => '850', "en_name" => "Democratic People's Republic of Korea", "continent" => "Asia"
            ),
            "KR" => array(
                'code_2chracters' => 'KR', 'code_3chracters' => 'KOR', 'code_numeric' => '410',
                'isd_phone_code' => '82', "en_name" => "Republic of Korea", "continent" => "Asia"
            ),
            "KW" => array(
                'code_2chracters' => 'KW', 'code_3chracters' => 'KWT', 'code_numeric' => '414',
                'isd_phone_code' => '965', "en_name" => "Kuwait", "continent" => "Asia"
            ),
            "KG" => array(
                'code_2chracters' => 'KG', 'code_3chracters' => 'KGZ', 'code_numeric' => '417',
                'isd_phone_code' => '996', "en_name" => "Kyrgyzstan", "continent" => "Asia"
            ),
            "LA" => array(
                'code_2chracters' => 'LA', 'code_3chracters' => 'LAO', 'code_numeric' => '418',
                'isd_phone_code' => '856', "en_name" => "Lao People's Democratic Republic", "continent" => "Asia"
            ),
            "LV" => array(
                'code_2chracters' => 'LV', 'code_3chracters' => 'LVA', 'code_numeric' => '428',
                'isd_phone_code' => '371', "en_name" => "Latvia", "continent" => "Europe"
            ),
            "LB" => array(
                'code_2chracters' => 'LB', 'code_3chracters' => 'LBN', 'code_numeric' => '422',
                'isd_phone_code' => '961', "en_name" => "Lebanon", "continent" => "Asia"
            ),
            "LS" => array(
                'code_2chracters' => 'LS', 'code_3chracters' => 'LSO', 'code_numeric' => '426',
                'isd_phone_code' => '266', "en_name" => "Lesotho", "continent" => "Africa"
            ),
            "LR" => array(
                'code_2chracters' => 'LR', 'code_3chracters' => 'LBR', 'code_numeric' => '430',
                'isd_phone_code' => '231', "en_name" => "Liberia", "continent" => "Africa"
            ),
            "LY" => array(
                'code_2chracters' => 'LY', 'code_3chracters' => 'LBY', 'code_numeric' => '434',
                'isd_phone_code' => '218', "en_name" => "Libya", "continent" => "Africa"
            ),
            "LI" => array(
                'code_2chracters' => 'LI', 'code_3chracters' => 'LIE', 'code_numeric' => '438',
                'isd_phone_code' => '423', "en_name" => "Liechtenstein", "continent" => "Europe"
            ),
            "LT" => array(
                'code_2chracters' => 'LT', 'code_3chracters' => 'LTU', 'code_numeric' => '440',
                'isd_phone_code' => '370', "en_name" => "Lithuania", "continent" => "Europe"
            ),
            "LU" => array(
                'code_2chracters' => 'LU', 'code_3chracters' => 'LUX', 'code_numeric' => '442',
                'isd_phone_code' => '352', "en_name" => "Luxembourg", "continent" => "Europe"
            ),
            "MO" => array(
                'code_2chracters' => 'MO', 'code_3chracters' => 'MAC', 'code_numeric' => '446',
                'isd_phone_code' => '853', "en_name" => "Macao", "continent" => "Asia"
            ),
            "MK" => array(
                'code_2chracters' => 'MK', 'code_3chracters' => 'MKD', 'code_numeric' => '807',
                'isd_phone_code' => '389', "en_name" => "Macedonia", "continent" => "Europe"
            ),
            "MG" => array(
                'code_2chracters' => 'MG', 'code_3chracters' => 'MDG', 'code_numeric' => '450',
                'isd_phone_code' => '261', "en_name" => "Madagascar", "continent" => "Africa"
            ),
            "MW" => array(
                'code_2chracters' => 'MW', 'code_3chracters' => 'MWI', 'code_numeric' => '454',
                'isd_phone_code' => '265', "en_name" => "Malawi", "continent" => "Africa"
            ),
            "MY" => array(
                'code_2chracters' => 'MY', 'code_3chracters' => 'MYS', 'code_numeric' => '458',
                'isd_phone_code' => '60', "en_name" => "Malaysia", "continent" => "Asia"
            ),
            "MV" => array(
                'code_2chracters' => 'MV', 'code_3chracters' => 'MDV', 'code_numeric' => '462',
                'isd_phone_code' => '960', "en_name" => "Maldives", "continent" => "Asia"
            ),
            "ML" => array(
                'code_2chracters' => 'ML', 'code_3chracters' => 'MLI', 'code_numeric' => '466',
                'isd_phone_code' => '223', "en_name" => "Mali", "continent" => "Africa"
            ),
            "MT" => array(
                'code_2chracters' => 'MT', 'code_3chracters' => 'MLT', 'code_numeric' => '470',
                'isd_phone_code' => '356', "en_name" => "Malta", "continent" => "Europe"
            ),
            "MH" => array(
                'code_2chracters' => 'MH', 'code_3chracters' => 'MHL', 'code_numeric' => '584',
                'isd_phone_code' => '692', "en_name" => "Marshall Islands", "continent" => "Oceania"
            ),
            "MQ" => array(
                'code_2chracters' => 'MQ', 'code_3chracters' => 'MTQ', 'code_numeric' => '474',
                'isd_phone_code' => '596', "en_name" => "Martinique", "continent" => "North America"
            ),
            "MR" => array(
                'code_2chracters' => 'MR', 'code_3chracters' => 'MRT', 'code_numeric' => '478',
                'isd_phone_code' => '222', "en_name" => "Mauritania", "continent" => "Africa"
            ),
            "MU" => array(
                'code_2chracters' => 'MU', 'code_3chracters' => 'MUS', 'code_numeric' => '480',
                'isd_phone_code' => '230', "en_name" => "Mauritius", "continent" => "Africa"
            ),
            "YT" => array(
                'code_2chracters' => 'YT', 'code_3chracters' => 'MYT', 'code_numeric' => '175',
                'isd_phone_code' => '262', "en_name" => "Mayotte", "continent" => "Africa"
            ),
            "MX" => array(
                'code_2chracters' => 'MX', 'code_3chracters' => 'MEX', 'code_numeric' => '484',
                'isd_phone_code' => '52', "en_name" => "Mexico", "continent" => "North America"
            ),
            "FM" => array(
                'code_2chracters' => 'FM', 'code_3chracters' => 'FSM', 'code_numeric' => '583',
                'isd_phone_code' => '691', "en_name" => "Micronesia", "continent" => "Oceania"
            ),
            "MD" => array(
                'code_2chracters' => 'MD', 'code_3chracters' => 'MDA', 'code_numeric' => '498',
                'isd_phone_code' => '373', "en_name" => "Moldova", "continent" => "Europe"
            ),
            "MC" => array(
                'code_2chracters' => 'MC', 'code_3chracters' => 'MCO', 'code_numeric' => '492',
                'isd_phone_code' => '377', "en_name" => "Monaco", "continent" => "Europe"
            ),
            "MN" => array(
                'code_2chracters' => 'MN', 'code_3chracters' => 'MNG', 'code_numeric' => '496',
                'isd_phone_code' => '976', "en_name" => "Mongolia", "continent" => "Asia"
            ),
            "ME" => array(
                'code_2chracters' => 'ME', 'code_3chracters' => 'MNE', 'code_numeric' => '499',
                'isd_phone_code' => '382', "en_name" => "Montenegro", "continent" => "Europe"
            ),
            "MS" => array(
                'code_2chracters' => 'MS', 'code_3chracters' => 'MSR', 'code_numeric' => '500',
                'isd_phone_code' => '1664', "en_name" => "Montserrat", "continent" => "North America"
            ),
            "MA" => array(
                'code_2chracters' => 'MA', 'code_3chracters' => 'MAR', 'code_numeric' => '504',
                'isd_phone_code' => '212', "en_name" => "Morocco", "continent" => "Africa"
            ),
            "MZ" => array(
                'code_2chracters' => 'MZ', 'code_3chracters' => 'MOZ', 'code_numeric' => '508',
                'isd_phone_code' => '258', "en_name" => "Mozambique", "continent" => "Africa"
            ),
            "MM" => array(
                'code_2chracters' => 'MM', 'code_3chracters' => 'MMR', 'code_numeric' => '104',
                'isd_phone_code' => '95', "en_name" => "Myanmar", "continent" => "Asia"
            ),
            "NA" => array(
                'code_2chracters' => 'NA', 'code_3chracters' => 'NAM', 'code_numeric' => '516',
                'isd_phone_code' => '264', "en_name" => "Namibia", "continent" => "Africa"
            ),
            "NR" => array(
                'code_2chracters' => 'NR', 'code_3chracters' => 'NRU', 'code_numeric' => '520',
                'isd_phone_code' => '674', "en_name" => "Nauru", "continent" => "Oceania"
            ),
            "NP" => array(
                'code_2chracters' => 'NP', 'code_3chracters' => 'NPL', 'code_numeric' => '524',
                'isd_phone_code' => '977', "en_name" => "Nepal", "continent" => "Asia"
            ),
            "NL" => array(
                'code_2chracters' => 'NL', 'code_3chracters' => 'NLD', 'code_numeric' => '528',
                'isd_phone_code' => '31', "en_name" => "Netherlands", "continent" => "Europe"
            ),
            "NC" => array(
                'code_2chracters' => 'NC', 'code_3chracters' => 'NCL', 'code_numeric' => '540',
                'isd_phone_code' => '687', "en_name" => "New Caledonia", "continent" => "Oceania"
            ),
            "NZ" => array(
                'code_2chracters' => 'NZ', 'code_3chracters' => 'NZL', 'code_numeric' => '554',
                'isd_phone_code' => '64', "en_name" => "New Zealand", "continent" => "Oceania"
            ),
            "NI" => array(
                'code_2chracters' => 'NI', 'code_3chracters' => 'NIC', 'code_numeric' => '558',
                'isd_phone_code' => '505', "en_name" => "Nicaragua", "continent" => "North America"
            ),
            "NE" => array(
                'code_2chracters' => 'NE', 'code_3chracters' => 'NER', 'code_numeric' => '562',
                'isd_phone_code' => '227', "en_name" => "Niger", "continent" => "Africa"
            ),
            "NG" => array(
                'code_2chracters' => 'NG', 'code_3chracters' => 'NGA', 'code_numeric' => '566',
                'isd_phone_code' => '234', "en_name" => "Nigeria", "continent" => "Africa"
            ),
            "NU" => array(
                'code_2chracters' => 'NU', 'code_3chracters' => 'NIU', 'code_numeric' => '570',
                'isd_phone_code' => '683', "en_name" => "Niue", "continent" => "Oceania"
            ),
            "NF" => array(
                'code_2chracters' => 'NF', 'code_3chracters' => 'NFK', 'code_numeric' => '574',
                'isd_phone_code' => '672', "en_name" => "Norfolk Island", "continent" => "Oceania"
            ),
            "MP" => array(
                'code_2chracters' => 'MP', 'code_3chracters' => 'MNP', 'code_numeric' => '580',
                'isd_phone_code' => '1670', "en_name" => "Northern Mariana Islands", "continent" => "Oceania"
            ),
            "NO" => array(
                'code_2chracters' => 'NO', 'code_3chracters' => 'NOR', 'code_numeric' => '578',
                'isd_phone_code' => '47', "en_name" => "Norway", "continent" => "Europe"
            ),
            "OM" => array(
                'code_2chracters' => 'OM', 'code_3chracters' => 'OMN', 'code_numeric' => '512',
                'isd_phone_code' => '968', "en_name" => "Oman", "continent" => "Asia"
            ),
            "PK" => array(
                'code_2chracters' => 'PK', 'code_3chracters' => 'PAK', 'code_numeric' => '586',
                'isd_phone_code' => '92', "en_name" => "Pakistan", "continent" => "Asia"
            ),
            "PW" => array(
                'code_2chracters' => 'PW', 'code_3chracters' => 'PLW', 'code_numeric' => '585',
                'isd_phone_code' => '680', "en_name" => "Palau", "continent" => "Oceania"
            ),
            "PS" => array(
                'code_2chracters' => 'PS', 'code_3chracters' => 'PSE', 'code_numeric' => '275',
                'isd_phone_code' => '970', "en_name" => "Palestinia", "continent" => "Asia"
            ),
            "PA" => array(
                'code_2chracters' => 'PA', 'code_3chracters' => 'PAN', 'code_numeric' => '591',
                'isd_phone_code' => '507', "en_name" => "Panama", "continent" => "North America"
            ),
            "PG" => array(
                'code_2chracters' => 'PG', 'code_3chracters' => 'PNG', 'code_numeric' => '598',
                'isd_phone_code' => '675', "en_name" => "Papua New Guinea", "continent" => "Oceania"
            ),
            "PY" => array(
                'code_2chracters' => 'PY', 'code_3chracters' => 'PRY', 'code_numeric' => '600',
                'isd_phone_code' => '595', "en_name" => "Paraguay", "continent" => "South America"
            ),
            "PE" => array(
                'code_2chracters' => 'PE', 'code_3chracters' => 'PER', 'code_numeric' => '604',
                'isd_phone_code' => '51', "en_name" => "Peru", "continent" => "South America"
            ),
            "PH" => array(
                'code_2chracters' => 'PH', 'code_3chracters' => 'PHL', 'code_numeric' => '608',
                'isd_phone_code' => '63', "en_name" => "Philippines", "continent" => "Asia"
            ),
            "PN" => array(
                'code_2chracters' => 'PN', 'code_3chracters' => 'PCN', 'code_numeric' => '612',
                'isd_phone_code' => '870', "en_name" => "Pitcairn", "continent" => "Oceania"
            ),
            "PL" => array(
                'code_2chracters' => 'PL', 'code_3chracters' => 'POL', 'code_numeric' => '616',
                'isd_phone_code' => '48', "en_name" => "Poland", "continent" => "Europe"
            ),
            "PT" => array(
                'code_2chracters' => 'PT', 'code_3chracters' => 'PRT', 'code_numeric' => '620',
                'isd_phone_code' => '351', "en_name" => "Portugal", "continent" => "Europe"
            ),
            "PR" => array(
                'code_2chracters' => 'PR', 'code_3chracters' => 'PRI', 'code_numeric' => '630',
                'isd_phone_code' => '1', "en_name" => "Puerto Rico", "continent" => "North America"
            ),
            "QA" => array(
                'code_2chracters' => 'QA', 'code_3chracters' => 'QAT', 'code_numeric' => '634',
                'isd_phone_code' => '974', "en_name" => "Qatar", "continent" => "Asia"
            ),
            "RE" => array(
                'code_2chracters' => 'RE', 'code_3chracters' => 'REU', 'code_numeric' => '638',
                'isd_phone_code' => '262', "en_name" => "Reunion", "continent" => "Africa"
            ),
            "RO" => array(
                'code_2chracters' => 'RO', 'code_3chracters' => 'ROU', 'code_numeric' => '642',
                'isd_phone_code' => '40', "en_name" => "Romania", "continent" => "Europe"
            ),
            "RU" => array(
                'code_2chracters' => 'RU', 'code_3chracters' => 'RUS', 'code_numeric' => '643',
                'isd_phone_code' => '7', "en_name" => "Russian Federation", "continent" => "Europe"
            ),
            "RW" => array(
                'code_2chracters' => 'RW', 'code_3chracters' => 'RWA', 'code_numeric' => '646',
                'isd_phone_code' => '250', "en_name" => "Rwanda", "continent" => "Africa"
            ),
            "BL" => array(
                'code_2chracters' => 'BL', 'code_3chracters' => 'BLM', 'code_numeric' => '652',
                'isd_phone_code' => '590', "en_name" => "Saint Barthélemy", "continent" => "North America"
            ),
            "SH" => array(
                'code_2chracters' => 'SH', 'code_3chracters' => 'SHN', 'code_numeric' => '654',
                'isd_phone_code' => '290', "en_name" => "Saint Helena", "continent" => "Africa"
            ),
            "KN" => array(
                'code_2chracters' => 'KN', 'code_3chracters' => 'KNA', 'code_numeric' => '659',
                'isd_phone_code' => '1869', "en_name" => "Saint Kitts and Nevis", "continent" => "North America"
            ),
            "LC" => array(
                'code_2chracters' => 'LC', 'code_3chracters' => 'LCA', 'code_numeric' => '662',
                'isd_phone_code' => '1758', "en_name" => "Saint Lucia", "continent" => "North America"
            ),
            "MF" => array(
                'code_2chracters' => 'MF', 'code_3chracters' => 'MAF', 'code_numeric' => '663',
                'isd_phone_code' => '590', "en_name" => "Saint Martin", "continent" => "North America"
            ),
            "PM" => array(
                'code_2chracters' => 'PM', 'code_3chracters' => 'SPM', 'code_numeric' => '666',
                'isd_phone_code' => '508', "en_name" => "Saint Pierre and Miquelon", "continent" => "North America"
            ),
            "VC" => array(
                'code_2chracters' => 'VC', 'code_3chracters' => 'VCT', 'code_numeric' => '670',
                'isd_phone_code' => '1784', "en_name" => "Saint Vincent and The Grenadines", "continent" => "North America"
            ),
            "WS" => array(
                'code_2chracters' => 'WS', 'code_3chracters' => 'WSM', 'code_numeric' => '882',
                'isd_phone_code' => '685', "en_name" => "Samoa", "continent" => "Oceania"
            ),
            "SM" => array(
                'code_2chracters' => 'SM', 'code_3chracters' => 'SMR', 'code_numeric' => '674',
                'isd_phone_code' => '378', "en_name" => "San Marino", "continent" => "Europe"
            ),
            "ST" => array(
                'code_2chracters' => 'ST', 'code_3chracters' => 'STP', 'code_numeric' => '678',
                'isd_phone_code' => '239', "en_name" => "Sao Tome and Principe", "continent" => "Africa"
            ),
            "SA" => array(
                'code_2chracters' => 'SA', 'code_3chracters' => 'SAU', 'code_numeric' => '682',
                'isd_phone_code' => '966', "en_name" => "Saudi Arabia", "continent" => "Asia"
            ),
            "SN" => array(
                'code_2chracters' => 'SN', 'code_3chracters' => 'SEN', 'code_numeric' => '686',
                'isd_phone_code' => '221', "en_name" => "Senegal", "continent" => "Africa"
            ),
            "RS" => array(
                'code_2chracters' => 'RS', 'code_3chracters' => 'SRB', 'code_numeric' => '688',
                'isd_phone_code' => '381', "en_name" => "Serbia", "continent" => "Europe"
            ),
            "SC" => array(
                'code_2chracters' => 'SC', 'code_3chracters' => 'SYC', 'code_numeric' => '690',
                'isd_phone_code' => '248', "en_name" => "Seychelles", "continent" => "Africa"
            ),
            "SL" => array(
                'code_2chracters' => 'SL', 'code_3chracters' => 'SLE', 'code_numeric' => '694',
                'isd_phone_code' => '232', "en_name" => "Sierra Leone", "continent" => "Africa"
            ),
            "SG" => array(
                'code_2chracters' => 'SG', 'code_3chracters' => 'SGP', 'code_numeric' => '702',
                'isd_phone_code' => '65', "en_name" => "Singapore", "continent" => "Asia"
            ),
            "SX" => array(
                'code_2chracters' => 'SX', 'code_3chracters' => 'SXM', 'code_numeric' => '534',
                'isd_phone_code' => '1721', "en_name" => "Sint Maarten", "continent" => "North America"
            ),
            "SK" => array(
                'code_2chracters' => 'SK', 'code_3chracters' => 'SVK', 'code_numeric' => '703',
                'isd_phone_code' => '421', "en_name" => "Slovakia", "continent" => "Europe"
            ),
            "SI" => array(
                'code_2chracters' => 'SI', 'code_3chracters' => 'SVN', 'code_numeric' => '705',
                'isd_phone_code' => '386', "en_name" => "Slovenia", "continent" => "Europe"
            ),
            "SB" => array(
                'code_2chracters' => 'SB', 'code_3chracters' => 'SLB', 'code_numeric' => '090',
                'isd_phone_code' => '677', "en_name" => "Solomon Islands", "continent" => "Oceania"
            ),
            "SO" => array(
                'code_2chracters' => 'SO', 'code_3chracters' => 'SOM', 'code_numeric' => '706',
                'isd_phone_code' => '252', "en_name" => "Somalia", "continent" => "Africa"
            ),
            "ZA" => array(
                'code_2chracters' => 'ZA', 'code_3chracters' => 'ZAF', 'code_numeric' => '729',
                'isd_phone_code' => '27', "en_name" => "South Africa", "continent" => "Africa"
            ),
            "SS" => array(
                'code_2chracters' => 'SS', 'code_3chracters' => 'SSD', 'code_numeric' => '710',
                'isd_phone_code' => '211', "en_name" => "South Sudan", "continent" => "Africa"
            ),
            "GS" => array(
                'code_2chracters' => 'GS', 'code_3chracters' => 'SGS', 'code_numeric' => '239',
                'isd_phone_code' => '500', "en_name" => "South Georgia and The South Sandwich Islands", "continent" => "Antarctica"
            ),
            "ES" => array(
                'code_2chracters' => 'ES', 'code_3chracters' => 'ESP', 'code_numeric' => '724',
                'isd_phone_code' => '34', "en_name" => "Spain", "continent" => "Europe"
            ),
            "LK" => array(
                'code_2chracters' => 'LK', 'code_3chracters' => 'LKA', 'code_numeric' => '144',
                'isd_phone_code' => '94', "en_name" => "Sri Lanka", "continent" => "Asia"
            ),
            "SD" => array(
                'code_2chracters' => 'SD', 'code_3chracters' => 'SDN', 'code_numeric' => '736',
                'isd_phone_code' => '249', "en_name" => "Sudan", "continent" => "Africa"
            ),
            "SR" => array(
                'code_2chracters' => 'SR', 'code_3chracters' => 'SUR', 'code_numeric' => '740',
                'isd_phone_code' => '597', "en_name" => "Suriname", "continent" => "South America"
            ),
            "SJ" => array(
                'code_2chracters' => 'SJ', 'code_3chracters' => 'SJM', 'code_numeric' => '744',
                'isd_phone_code' => '47', "en_name" => "Svalbard and Jan Mayen", "continent" => "Europe"
            ),
            "SZ" => array(
                'code_2chracters' => 'SZ', 'code_3chracters' => 'SWZ', 'code_numeric' => '748',
                'isd_phone_code' => '268', "en_name" => "Swaziland", "continent" => "Africa"
            ),
            "SE" => array(
                'code_2chracters' => 'SE', 'code_3chracters' => 'SWE', 'code_numeric' => '752',
                'isd_phone_code' => '46', "en_name" => "Sweden", "continent" => "Europe"
            ),
            "CH" => array(
                'code_2chracters' => 'CH', 'code_3chracters' => 'CHE', 'code_numeric' => '756',
                'isd_phone_code' => '41', "en_name" => "Switzerland", "continent" => "Europe"
            ),
            "SY" => array(
                'code_2chracters' => 'SY', 'code_3chracters' => 'SYR', 'code_numeric' => '760',
                'isd_phone_code' => '963', "en_name" => "Syrian Arab Republic", "continent" => "Asia"
            ),
            "TW" => array(
                'code_2chracters' => 'TW', 'code_3chracters' => 'TWN', 'code_numeric' => '158',
                'isd_phone_code' => '886', "en_name" => "Taiwan, Province of China", "continent" => "Asia"
            ),
            "TJ" => array(
                'code_2chracters' => 'TJ', 'code_3chracters' => 'TJK', 'code_numeric' => '762',
                'isd_phone_code' => '992', "en_name" => "Tajikistan", "continent" => "Asia"
            ),
            "TZ" => array(
                'code_2chracters' => 'TZ', 'code_3chracters' => 'TZA', 'code_numeric' => '834',
                'isd_phone_code' => '255', "en_name" => "Tanzania, United Republic of", "continent" => "Africa"
            ),
            "TH" => array(
                'code_2chracters' => 'TH', 'code_3chracters' => 'THA', 'code_numeric' => '764',
                'isd_phone_code' => '66', "en_name" => "Thailand", "continent" => "Asia"
            ),
            "TL" => array(
                'code_2chracters' => 'TL', 'code_3chracters' => 'TLS', 'code_numeric' => '626',
                'isd_phone_code' => '670', "en_name" => "Timor-leste", "continent" => "Asia"
            ),
            "TG" => array(
                'code_2chracters' => 'TG', 'code_3chracters' => 'TGO', 'code_numeric' => '768',
                'isd_phone_code' => '228', "en_name" => "Togo", "continent" => "Africa"
            ),
            "TK" => array(
                'code_2chracters' => 'TK', 'code_3chracters' => 'TKL', 'code_numeric' => '772',
                'isd_phone_code' => '690', "en_name" => "Tokelau", "continent" => "Oceania"
            ),
            "TO" => array(
                'code_2chracters' => 'TO', 'code_3chracters' => 'TON', 'code_numeric' => '776',
                'isd_phone_code' => '676', "en_name" => "Tonga", "continent" => "Oceania"
            ),
            "TT" => array(
                'code_2chracters' => 'TT', 'code_3chracters' => 'TTO', 'code_numeric' => '780',
                'isd_phone_code' => '1868', "en_name" => "Trinidad and Tobago", "continent" => "North America"
            ),
            "TN" => array(
                'code_2chracters' => 'TN', 'code_3chracters' => 'TUN', 'code_numeric' => '788',
                'isd_phone_code' => '216', "en_name" => "Tunisia", "continent" => "Africa"
            ),
            "TR" => array(
                'code_2chracters' => 'TR', 'code_3chracters' => 'TUR', 'code_numeric' => '792',
                'isd_phone_code' => '90', "en_name" => "Turkey", "continent" => "Asia"
            ),
            "TM" => array(
                'code_2chracters' => 'TM', 'code_3chracters' => 'TKM', 'code_numeric' => '795',
                'isd_phone_code' => '993', "en_name" => "Turkmenistan", "continent" => "Asia"
            ),
            "TC" => array(
                'code_2chracters' => 'TC', 'code_3chracters' => 'TCA', 'code_numeric' => '796',
                'isd_phone_code' => '1649', "en_name" => "Turks and Caicos Islands", "continent" => "North America"
            ),
            "TV" => array(
                'code_2chracters' => 'TV', 'code_3chracters' => 'TUV', 'code_numeric' => '798',
                'isd_phone_code' => '688', "en_name" => "Tuvalu", "continent" => "Oceania"
            ),
            "UG" => array(
                'code_2chracters' => 'UG', 'code_3chracters' => 'UGA', 'code_numeric' => '800',
                'isd_phone_code' => '256', "en_name" => "Uganda", "continent" => "Africa"
            ),
            "UA" => array(
                'code_2chracters' => 'UA', 'code_3chracters' => 'UKR', 'code_numeric' => '804',
                'isd_phone_code' => '380', "en_name" => "Ukraine", "continent" => "Europe"
            ),
            "AE" => array(
                'code_2chracters' => 'AE', 'code_3chracters' => 'ARE', 'code_numeric' => '784',
                'isd_phone_code' => '971', "en_name" => "United Arab Emirates", "continent" => "Asia"
            ),
            "GB" => array(
                'code_2chracters' => 'GB', 'code_3chracters' => 'GBR', 'code_numeric' => '826',
                'isd_phone_code' => '44', "en_name" => "United Kingdom", "continent" => "Europe"
            ),
            "US" => array(
                'code_2chracters' => 'US', 'code_3chracters' => 'USA', 'code_numeric' => '840',
                'isd_phone_code' => '1', "en_name" => "United States", "continent" => "North America"
            ),
            "UM" => array(
                'code_2chracters' => 'UM', 'code_3chracters' => 'UMI', 'code_numeric' => '581',
                'isd_phone_code' => '1', "en_name" => "United States Minor Outlying Islands", "continent" => "Oceania"
            ),
            "UY" => array(
                'code_2chracters' => 'UY', 'code_3chracters' => 'URY', 'code_numeric' => '858',
                'isd_phone_code' => '598', "en_name" => "Uruguay", "continent" => "South America"
            ),
            "UZ" => array(
                'code_2chracters' => 'UZ', 'code_3chracters' => 'UZB', 'code_numeric' => '860',
                'isd_phone_code' => '998', "en_name" => "Uzbekistan", "continent" => "Asia"
            ),
            "VU" => array(
                'code_2chracters' => 'VU', 'code_3chracters' => 'VUT', 'code_numeric' => '548',
                'isd_phone_code' => '678', "en_name" => "Vanuatu", "continent" => "Oceania"
            ),
            "VE" => array(
                'code_2chracters' => 'VE', 'code_3chracters' => 'VEN', 'code_numeric' => '862',
                'isd_phone_code' => '58', "en_name" => "Venezuela", "continent" => "South America"
            ),
            "VN" => array(
                'code_2chracters' => 'VN', 'code_3chracters' => 'VNM', 'code_numeric' => '704',
                'isd_phone_code' => '84', "en_name" => "Vietnam", "continent" => "Asia"
            ),
            "VG" => array(
                'code_2chracters' => 'VG', 'code_3chracters' => 'VGB', 'code_numeric' => '092',
                'isd_phone_code' => '1284', "en_name" => "Virgin Islands, British", "continent" => "North America"
            ),
            "VI" => array(
                'code_2chracters' => 'VI', 'code_3chracters' => 'VIR', 'code_numeric' => '850',
                'isd_phone_code' => '1430', "en_name" => "Virgin Islands, U.S.", "continent" => "North America"
            ),
            "WF" => array(
                'code_2chracters' => 'WF', 'code_3chracters' => 'WLF', 'code_numeric' => '876',
                'isd_phone_code' => '681', "en_name" => "Wallis and Futuna", "continent" => "Oceania"
            ),
            "EH" => array(
                'code_2chracters' => 'EH', 'code_3chracters' => 'ESH', 'code_numeric' => '732',
                'isd_phone_code' => '212', "en_name" => "Western Sahara", "continent" => "Africa"
            ),
            "YE" => array(
                'code_2chracters' => 'YE', 'code_3chracters' => 'YEM', 'code_numeric' => '887',
                'isd_phone_code' => '967', "en_name" => "Yemen", "continent" => "Asia"
            ),
            "ZM" => array(
                'code_2chracters' => 'ZM', 'code_3chracters' => 'ZMB', 'code_numeric' => '894',
                'isd_phone_code' => '260', "en_name" => "Zambia", "continent" => "Africa"
            ),
            "ZW" => array(
                'code_2chracters' => 'ZW', 'code_3chracters' => 'ZWE', 'code_numeric' => '716',
                'isd_phone_code' => '263', "en_name" => "Zimbabwe", "continent" => "Africa"
            ),
            // non iso cuontry
            "XK" => array(
                'code_2chracters' => 'XK', 'code_3chracters' => 'KOS', 'code_numeric' => '383',
                'isd_phone_code' => '383', "en_name" => "Kosovo", "continent" => "Europe",
            ),
        );



        $ar_countries = array(
            'IS' => 'آيسلندا',
            'ET' => 'إثيوبيا',
            'AZ' => 'أذربيجان',
            'AM' => 'أرمينيا',
            'AW' => 'أروبا',
            'ER' => 'إريتريا',
            'ES' => 'إسبانيا',
            'AU' => 'أستراليا',
            'EE' => 'إستونيا',
            'IL' => 'إسرائيل',
            'SZ' => 'إسواتيني',
            'AF' => 'أفغانستان',
            'PS' => 'الأراضي الفلسطينية',
            'AR' => 'الأرجنتين',
            'JO' => 'الأردن',
            'TF' => 'الأقاليم الجنوبية الفرنسية',
            'IO' => 'الإقليم البريطاني في المحيط الهندي',
            'EC' => 'الإكوادور',
            'AE' => 'الإمارات العربية المتحدة',
            'AL' => 'ألبانيا',
            'BH' => 'البحرين',
            'BR' => 'البرازيل',
            'PT' => 'البرتغال',
            'BA' => 'البوسنة والهرسك',
            'CZ' => 'التشيك',
            'ME' => 'الجبل الأسود',
            'DZ' => 'الجزائر',
            'DK' => 'الدانمرك',
            'CV' => 'الرأس الأخضر',
            'SV' => 'السلفادور',
            'SN' => 'السنغال',
            'SD' => 'السودان',
            'SE' => 'السويد',
            'EH' => 'الصحراء الغربية',
            'SO' => 'الصومال',
            'CN' => 'الصين',
            'IQ' => 'العراق',
            'GA' => 'الغابون',
            'VA' => 'الفاتيكان',
            'PH' => 'الفلبين',
            'CM' => 'الكاميرون',
            'CG' => 'الكونغو - برازافيل',
            'CD' => 'الكونغو - كينشاسا',
            'KW' => 'الكويت',
            'DE' => 'ألمانيا',
            'MA' => 'المغرب',
            'MX' => 'المكسيك',
            'SA' => 'المملكة العربية السعودية',
            'GB' => 'المملكة المتحدة',
            'NO' => 'النرويج',
            'AT' => 'النمسا',
            'NE' => 'النيجر',
            'IN' => 'الهند',
            'US' => 'الولايات المتحدة',
            'JP' => 'اليابان',
            'YE' => 'اليمن',
            'GR' => 'اليونان',
            'AQ' => 'أنتاركتيكا',
            'AG' => 'أنتيغوا وبربودا',
            'AD' => 'أندورا',
            'ID' => 'إندونيسيا',
            'AO' => 'أنغولا',
            'AI' => 'أنغويلا',
            'UY' => 'أوروغواي',
            'UZ' => 'أوزبكستان',
            'UG' => 'أوغندا',
            'UA' => 'أوكرانيا',
            'IR' => 'إيران',
            'IE' => 'أيرلندا',
            'IT' => 'إيطاليا',
            'PG' => 'بابوا غينيا الجديدة',
            'PY' => 'باراغواي',
            'PK' => 'باكستان',
            'PW' => 'بالاو',
            'BB' => 'بربادوس',
            'BM' => 'برمودا',
            'BN' => 'بروناي',
            'BE' => 'بلجيكا',
            'BG' => 'بلغاريا',
            'BZ' => 'بليز',
            'BD' => 'بنغلاديش',
            'PA' => 'بنما',
            'BJ' => 'بنين',
            'BT' => 'بوتان',
            'BW' => 'بوتسوانا',
            'PR' => 'بورتوريكو',
            'BF' => 'بوركينا فاسو',
            'BI' => 'بوروندي',
            'PL' => 'بولندا',
            'BO' => 'بوليفيا',
            'PF' => 'بولينيزيا الفرنسية',
            'PE' => 'بيرو',
            'BY' => 'بيلاروس',
            'TH' => 'تايلاند',
            'TW' => 'تايوان',
            'TM' => 'تركمانستان',
            'TR' => 'تركيا',
            'TA' => 'تريستان دا كونا',
            'TT' => 'ترينيداد وتوباغو',
            'TD' => 'تشاد',
            'CL' => 'تشيلي',
            'TZ' => 'تنزانيا',
            'TG' => 'توغو',
            'TV' => 'توفالو',
            'TK' => 'توكيلو',
            'TN' => 'تونس',
            'TO' => 'تونغا',
            'TL' => 'تيمور - ليشتي',
            'JM' => 'جامايكا',
            'GI' => 'جبل طارق',
            'AX' => 'جزر آلاند',
            'BS' => 'جزر البهاما',
            'KM' => 'جزر القمر',
            'IC' => 'جزر الكناري',
            'MQ' => 'جزر المارتينيك',
            'MV' => 'جزر المالديف',
            'UM' => 'جزر الولايات المتحدة النائية',
            'PN' => 'جزر بيتكيرن',
            'TC' => 'جزر توركس وكايكوس',
            'SB' => 'جزر سليمان',
            'FO' => 'جزر فارو',
            'FK' => 'جزر فوكلاند',
            'VG' => 'جزر فيرجن البريطانية',
            'VI' => 'جزر فيرجن التابعة للولايات المتحدة',
            'KY' => 'جزر كايمان',
            'CK' => 'جزر كوك',
            'CC' => 'جزر كوكوس (كيلينغ)',
            'MH' => 'جزر مارشال',
            'MP' => 'جزر ماريانا الشمالية',
            'WF' => 'جزر والس وفوتونا',
            'AC' => 'جزيرة أسينشين',
            'CX' => 'جزيرة كريسماس',
            'IM' => 'جزيرة مان',
            'NF' => 'جزيرة نورفولك',
            'CF' => 'جمهورية أفريقيا الوسطى',
            'DO' => 'جمهورية الدومينيكان',
            'ZA' => 'جنوب أفريقيا',
            'SS' => 'جنوب السودان',
            'GE' => 'جورجيا',
            'GS' => 'جورجيا الجنوبية وجزر ساندويتش الجنوبية',
            'DJ' => 'جيبوتي',
            'JE' => 'جيرسي',
            'DM' => 'دومينيكا',
            'DG' => 'دييغو غارسيا',
            'RW' => 'رواندا',
            'RU' => 'روسيا',
            'RO' => 'رومانيا',
            'RE' => 'روينيون',
            'ZM' => 'زامبيا',
            'ZW' => 'زيمبابوي',
            'CI' => 'ساحل العاج',
            'WS' => 'ساموا',
            'AS' => 'ساموا الأمريكية',
            'BL' => 'سان بارتليمي',
            'PM' => 'سان بيير ومكويلون',
            'MF' => 'سان مارتن',
            'SM' => 'سان مارينو',
            'VC' => 'سانت فنسنت وجزر غرينادين',
            'KN' => 'سانت كيتس ونيفيس',
            'LC' => 'سانت لوسيا',
            'SX' => 'سانت مارتن',
            'SH' => 'سانت هيلينا',
            'ST' => 'ساو تومي وبرينسيبي',
            'EA' => 'سبتة ومليلية',
            'LK' => 'سريلانكا',
            'SJ' => 'سفالبارد وجان ماين',
            'SK' => 'سلوفاكيا',
            'SI' => 'سلوفينيا',
            'SG' => 'سنغافورة',
            'SY' => 'سوريا',
            'SR' => 'سورينام',
            'CH' => 'سويسرا',
            'SL' => 'سيراليون',
            'SC' => 'سيشل',
            'RS' => 'صربيا',
            'TJ' => 'طاجيكستان',
            'OM' => 'عُمان',
            'GM' => 'غامبيا',
            'GH' => 'غانا',
            'GD' => 'غرينادا',
            'GL' => 'غرينلاند',
            'GT' => 'غواتيمالا',
            'GP' => 'غوادلوب',
            'GU' => 'غوام',
            'GF' => 'غويانا الفرنسية',
            'GY' => 'غيانا',
            'GG' => 'غيرنزي',
            'GN' => 'غينيا',
            'GQ' => 'غينيا الاستوائية',
            'GW' => 'غينيا بيساو',
            'VU' => 'فانواتو',
            'FR' => 'فرنسا',
            'VE' => 'فنزويلا',
            'FI' => 'فنلندا',
            'VN' => 'فيتنام',
            'FJ' => 'فيجي',
            'CY' => 'قبرص',
            'QA' => 'قطر',
            'KG' => 'قيرغيزستان',
            'KZ' => 'كازاخستان',
            'NC' => 'كاليدونيا الجديدة',
            'HR' => 'كرواتيا',
            'KH' => 'كمبوديا',
            'CA' => 'كندا',
            'CU' => 'كوبا',
            'CW' => 'كوراساو',
            'KR' => 'كوريا الجنوبية',
            'KP' => 'كوريا الشمالية',
            'CR' => 'كوستاريكا',
            'XK' => 'كوسوفو',
            'CO' => 'كولومبيا',
            'KI' => 'كيريباتي',
            'KE' => 'كينيا',
            'LV' => 'لاتفيا',
            'LA' => 'لاوس',
            'LB' => 'لبنان',
            'LU' => 'لوكسمبورغ',
            'LY' => 'ليبيا',
            'LR' => 'ليبيريا',
            'LT' => 'ليتوانيا',
            'LI' => 'ليختنشتاين',
            'LS' => 'ليسوتو',
            'MO' => 'ماكاو الصينية (منطقة إدارية خاصة)',
            'MT' => 'مالطا',
            'ML' => 'مالي',
            'MY' => 'ماليزيا',
            'YT' => 'مايوت',
            'MG' => 'مدغشقر',
            'EG' => 'مصر',
            'MK' => 'مقدونيا',
            'MW' => 'ملاوي',
            'MN' => 'منغوليا',
            'MR' => 'موريتانيا',
            'MU' => 'موريشيوس',
            'MZ' => 'موزمبيق',
            'MD' => 'مولدوفا',
            'MC' => 'موناكو',
            'MS' => 'مونتيسيرات',
            'MM' => 'ميانمار (بورما)',
            'FM' => 'ميكرونيزيا',
            'NA' => 'ناميبيا',
            'NR' => 'ناورو',
            'NP' => 'نيبال',
            'NG' => 'نيجيريا',
            'NI' => 'نيكاراغوا',
            'NZ' => 'نيوزيلندا',
            'NU' => 'نيوي',
            'HT' => 'هايتي',
            'HN' => 'هندوراس',
            'HU' => 'هنغاريا',
            'NL' => 'هولندا',
            'BQ' => 'هولندا الكاريبية',
            'HK' => 'هونغ كونغ الصينية (منطقة إدارية خاصة)',
            'XB' => 'Pseudo-Bidi',
            'XA' => 'XA',
        );





        /*******************************************************************************************************/
        if (Country::all()->count() >= count($countries)) {
            return false;
        }
        // -------------------------------------
        $aad_user_id = auth()->user()->id;
        $add_user_name = auth()->user()->user_name;
        // -------------------------------------
        foreach ($countries as $key => $value) {
            $country = new Country();
            $country->created_by_id = $aad_user_id;
            $country->created_by_name = $add_user_name;
            // -------------------------------------
            $country->code_2chracters = $value['code_2chracters'];
            $country->code_3chracters = $value['code_3chracters'];
            $country->code_numeric = $value['code_numeric'];
            $country->isd_phone_code = $value['isd_phone_code'];
            $country->en_name = $value['en_name'];
            $country->continent = $value['continent'];
            // -------------------------------------
            $code2 = $value['code_2chracters'];
            $ar_country_name = '';
            // -------------------------------------
            foreach ($ar_countries as $ar_key => $ar_value) {
                if ($code2 == $ar_key) {
                    $ar_country_name = $ar_value;
                }
            }
            $country->ar_name = $ar_country_name;
            // -------------------------------------
            $country->save();
        }

        return true;
    }
}
