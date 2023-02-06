<?php

namespace App\Http\Controllers;

use App\OfficeData;
use App\Project;
use App\ProjectDoc;
use App\ProjectDocType;
use Carbon\Carbon;
use Elibyy\TCPDF\Facades\TCPDF as TCPDF;
use \Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


use ZipArchive;
use File;



use function PHPSTORM_META\override;

class ProjectDocController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    public $is_tafweed = false;
    private  $azel_data = [
        'walls_material' => 'بولسترين',
        'walls_value' => '0.53',
        'ceiling_material' => 'بولسترين',
        'ceiling_value' => '0.31',
        'window_material' => 'زجاج مضاعف',
        'window_value' => '2.67',
    ];
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
        // $this->create_hakeem_pdf('projectDoc.tafweed2');
        // return view('projectDoc.tafweed');
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
     * @param  \App\ProjectDoc  $projectDoc
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDoc $projectDoc)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectDoc  $projectDoc
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectDoc $projectDoc)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectDoc  $projectDoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectDoc $projectDoc)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectDoc  $projectDoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectDoc $projectDoc)
    {
        //
    }

    // -----------------------------------------------------------------------------------------------------------------
    public static function get_missing_data($doc_name, $project)
    {
        $missing_data = [];
        // -----------------------------------------------------------------
        if ($project->organization_id) {
            if (!($project->representative_id)) {
                array_push($missing_data, 'يجب تسجيل معلومات المفوض أو الوكيل');
            }
        }
        // -----------------------------------------------------------------
        if ($doc_name == 'تعهد العزل') {
            if (!($project->plot()->first()->neighbor()->first())) {
                array_push($missing_data, 'يجب تسجيل معلومات الحي');
            }
            if (!($project->plot()->first()->district()->first())) {
                array_push($missing_data, 'يجب تسجيل معلومات المنطقة');
            }
            if (!($project->plot()->first()->x_coordinate)) {
                array_push($missing_data, 'يجب تسجيل الإحداثي X');
            }
            if (!($project->plot()->first()->y_coordinate)) {
                array_push($missing_data, 'يجب تسجيل الإحداثي Y');
            }
        }
        // -----------------------------------------------------------------
        if ($doc_name == 'غلاف المذكرة الإنشائية') {
            if (!($project->plot()->first()->neighbor()->first())) {
                array_push($missing_data, 'يجب تسجيل معلومات الحي');
            }
            if (!($project->plot()->first()->district()->first())) {
                array_push($missing_data, 'يجب تسجيل معلومات المنطقة');
            }
            if (!($project->project_str_hight)) {
                array_push($missing_data, 'يجب تسجيل معلومات الإرتفاع الإنشائي المصمم');
            }
            if (!($project->str_designed_by)) {
                array_push($missing_data, 'يجب تسجيل المهندس الإنشائي المصمم');
            }
        }
        // -----------------------------------------------------------------
        if ($doc_name == 'تقرير ارض فضاء') {
            if (!($project->plot()->first()->plan()->first())) {
                array_push($missing_data, 'يجب تسجيل معلومات المخطط');
            }
            if (!($project->last_rokhsa_no)) {
                array_push($missing_data, 'يجب تسجيل رقم الرخصة ');
            }
            if (!($project->last_rokhsa_issue_date)) {
                array_push($missing_data, 'يجب تسجيل تاريخ اصدار الرخصة');
            }
        }
        // -----------------------------------------------------------------
        if ($doc_name == 'طلب ربط رخصة بالقرار المساحي') {

            if (!($project->plot()->first()->plan()->first())) {
                array_push($missing_data, 'يجب تسجيل معلومات المخطط');
            }
            if (!($project->last_rokhsa_no)) {
                array_push($missing_data, 'يجب تسجيل رقم الرخصة ');
            }
            if (!($project->last_rokhsa_issue_date)) {
                array_push($missing_data, 'يجب تسجيل تاريخ اصدار الرخصة');
            }
            if (!($project->qarar_masahe_no)) {
                array_push($missing_data, 'يجب تسجيل رقم القرار المساحي');
            }
            if (!($project->qarar_masahe_issue_date)) {
                array_push($missing_data, 'يجب تسجيل تاريخ اصدار القرار المساحي');
            }
        }
        // -----------------------------------------------------------------
        return $missing_data;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_pdf(Request $request)
    {
        // -----------------------------------------------------------------
        if ($request->form_action == 'get_all_docs') {


            $dir    = 'D:\temp\\';


            $files1 = array_diff(scandir($dir), array('..', '.'));
            if (!extension_loaded('zip')) {
                return redirect()->back()->withErrors(['zip not loaded.. ', 'contact system administrator']);
            }
            $newZip = new ZipArchive();
            // $zip_name = time() . '.zip';
            $zip_name = 'me' . '.zip';
            try {

                $newZip->open($dir . $zip_name, ZIPARCHIVE::CREATE);
                foreach ($files1 as $file) {

                    $newZip->addFile($dir . $file);
                }
                $newZip->close();
                $headers = ['Content-Type: application/zip'];

                return response()->download($dir . $zip_name);
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['zip error.. ', $th]);
            }



            return;

            $project = Project::findOrFail($request->project_id);
            $office_data = OfficeData::findOrFail(1);
            $project_team = ProjectController::get_project_team($project);
            $date_and_time = DateAndTime::get_date_time_arr();
            $_ = $this->get_doc_data($project);
            $data = [
                'project' => $project,
                'office_data' => $office_data,
                'project_team' => $project_team,
                'date_and_time' => $date_and_time,
                'azel_data' => $this->azel_data,
                '_' => $_,
            ];

            $all_project_doc_types = ProjectDocType::all();
            // $all_project_doc_types = ProjectDocType::where('is_in_quick_add', true)->get();

            foreach ($all_project_doc_types as  $project_doc_type) {
                TCPDF::Reset();
                $newPDF = new TCPDF();
                $doc_name = $project_doc_type->name_ar;
                $pdf_view = $project_doc_type->view_template;
                $is_tafweed = ($project_doc_type->name_ar == 'تفويض') ? true : false;
                // -----------------------------------------------------------------
                // check if there is data missing for the pdf file
                $missing_dat = $this->get_missing_data($doc_name, $project);
                if (!empty($missing_dat)) {
                    array_unshift($missing_dat, ['بعض المستندات لم يتم طباعتها يجب تعبئة هذه البيانات']);

                    return redirect()->back()->withErrors($missing_dat);
                }
                // -----------------------------------------------------------------
                switch ($project_doc_type->header_foooter_template) {
                    case 'hakeem_header_footer':
                        $newPDF = $this->set_hakeem_header_footer($newPDF, $is_tafweed);
                        break;
                    case 'amana_header_footer':
                        $newPDF = $this->set_amana_header_footer($newPDF, $is_tafweed);
                        break;
                    case 'page_no_footer':
                        $newPDF = $this->set_page_no_footer($newPDF, $is_tafweed);
                        break;

                    default:
                        # code...
                        break;
                }
                // -----------------------------------------------------------------
                $newPDF = $this->set_common_settings($newPDF);
                // -----------------------------------------------------------------
                if ($doc_name == 'تعهد العزل') {
                    $newPDF::SetAutoPageBreak(TRUE, 24);
                    $newPDF::SetMargins(20, 20, 20, true);
                    $newPDF::setCellHeightRatio(1.3);
                    $newPDF::SetFont('al-mohanad', 'B', 11, '', false);
                }
                // -----------------------------------------------------------------
                if ($doc_name == 'اقرار الرخصة الفورية') {
                    $newPDF::SetAutoPageBreak(TRUE, 10);
                }
                // -----------------------------------------------------------------
                $newPDF::SetTitle($doc_name);
                $newPDF::SetSubject($doc_name);
                // -----------------------------------------------------------------
                $the_view = View::make($pdf_view)->with($data);
                $html = $the_view->render();
                $newPDF::AddPage('P', 'A4');
                $newPDF::writeHTML($html, true, false, true, false, '');
                $newPDF::lastPage();
                // dd(__DIR__);

                $dest = 'D:/temp/';
                // $dest = '%USERPROFILE%' . '/Desktop' . '/temp/';

                $newPDF::Output($dest . date_format(now(), 'Ymd_His') . '_' . $doc_name . '.pdf', 'F');
            }
            return 'done';
            // -----------------------------------------------------------------
        }
        // -----------------------------------------------------------------
        $project = Project::findOrFail($request->project_id);
        $project_doc_type = ProjectDocType::findOrFail($request->project_doc_type_id);
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_team($project);  // team
        $date_and_time = DateAndTime::get_date_time_arr();
        $_ = $this->get_doc_data($project);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'azel_data' => $this->azel_data,
            '_' => $_,
        ];
        // -----------------------------------------------------------------
        $newPDF = new TCPDF();
        $doc_name = $project_doc_type->name_ar;
        $pdf_view = $project_doc_type->view_template;
        $is_tafweed = ($project_doc_type->name_ar == 'تفويض') ? true : false;
        // -----------------------------------------------------------------
        // check if there is data missing for the pdf file
        $missing_dat = $this->get_missing_data($doc_name, $project);
        if (!empty($missing_dat)) {
            return redirect()->back()->withErrors($missing_dat);
        }
        // -----------------------------------------------------------------
        switch ($project_doc_type->header_foooter_template) {
            case 'hakeem_header_footer':
                $newPDF = $this->set_hakeem_header_footer($newPDF, $is_tafweed);
                break;
            case 'amana_header_footer':
                $newPDF = $this->set_amana_header_footer($newPDF, $is_tafweed);
                break;
            case 'page_no_footer':
                $newPDF = $this->set_page_no_footer($newPDF, $is_tafweed);
                break;

            default:
                # code...
                break;
        }
        // -----------------------------------------------------------------
        $newPDF = $this->set_common_settings($newPDF);
        // -----------------------------------------------------------------
        if ($doc_name == 'تعهد العزل') {
            $newPDF::SetAutoPageBreak(TRUE, 24);
            $newPDF::SetMargins(20, 20, 20, true);
            $newPDF::setCellHeightRatio(1.3);
            $newPDF::SetFont('al-mohanad', 'B', 11, '', false);
        }
        // -----------------------------------------------------------------
        if ($doc_name == 'اقرار الرخصة الفورية') {
            $newPDF::SetAutoPageBreak(TRUE, 10);
        }
        // -----------------------------------------------------------------
        $newPDF::SetTitle($doc_name);
        $newPDF::SetSubject($doc_name);
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::AddPage('P', 'A4');
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        if (env('DEVELOPMENT'))  return  $newPDF::Output(date_format(now(), 'Ymd_His') . '.pdf', 'I');
        return $newPDF::Output(date_format(now(), 'Ymd_His') . '.pdf', 'D');
        // return;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_doc_data($project)
    {
        // -----------------------------------------------------
        $_ = [];
        // -----------------------------------------------------
        if ($project->organization_id) {
            $org = $project->organization;
            $_['owner_name'] = $org->name_ar;
            $_['id_issue_date'] = $org->issue_date;
            $_['id_issue_place'] = $org->issue_place;
            $_['organization_title'] = 'السادة';
            $_['organization_suffix'] = 'الموقرين';
            if ($org->commercial_registration_no) {
                $_['id_name'] = 'رقم السجل التجاري';
                $_['id_number'] = $org->commercial_registration_no;
            } elseif ($org->license_number) {
                $_['id_name'] = 'رقم الترخيص';
                $_['id_number'] = $org->license_number;
            } elseif ($org->unified_code) {
                $_['id_name'] = 'الرقم الموحد';
                $_['id_number'] = $org->unified_code;
            } elseif ($org->special_code) {
                $_['id_name'] = 'الرقم الخاص / المميز';
                $_['id_number'] = $org->special_code;
            }
        }
        // -----------------------------------------------------
        if ($project->person_id) {
            $person = $project->person;
            $_['owner_name'] = $person->get_full_name_ar();
            $_['owner_title'] = $person->person_title()->first()->name_ar;
            $_['owner_suffix'] = $person->person_title()->first()->suffix_ar;
            $_['id_name'] = 'رقم السجل المدني';
            $_['id_number'] = $person->national_id;
            $_['owner_mobile'] = $person->mobile;
            $_['owner_email'] = $person->email;
            $_['id_issue_date'] = $person->national_id_issue_date;
            $_['id_issue_place'] = $person->national_id_issue_place;
            $_['phone'] = $person->phone;
            $_['email'] = $person->email;
            $_['nationality'] = $person->get_nationality_name_ar();
        }
        // -----------------------------------------------------
        if ($project->representative_id) {
            $representative = $project->representative;
            $_['representative_mobile'] = $representative->mobile;
            $_['representative_name_ar'] = $representative->get_full_name_ar();
            $_['representative_title'] = $representative->person_title()->first()->name_ar;
            $_['representative_suffix'] = $representative->person_title()->first()->suffix_ar;
            $_['representative_n_id'] = $representative->national_id;
            $_['authorization_no'] = $project->representative_authorization_no;
            $_['authorization_issue_date'] = $project->representative_authorization_issue_date;
            $_['authorization_issue_place'] = $project->representative_authorization_issue_place;
            $_['representative_phone'] = $representative->phone;
            $_['representative_email'] = $representative->email;
        }
        // -----------------------------------------------------
        if ($project->plot_id) {
            $plot = $project->plot;
            $_['plot_no'] = $plot->plot_no;
            $_['deed_no'] = $plot->deed_no;
            $_['deed_date'] = $plot->deed_date;
            $_['deed_issue_place'] = $plot->deed_issue_place;
            $_['x_coordinate'] = $plot->x_coordinate;
            $_['y_coordinate'] = $plot->y_coordinate;
            if ($plot->district_id) {
                $_['district_name'] = $plot->district->ar_name;
            }
            if ($plot->neighbor_id) {
                $_['neighbor_name'] = $plot->neighbor->ar_name;
            }
            if ($plot->plan) {
                $_['plan_number'] = $plot->plan->plan_no;
                $_['plan_name'] = $plot->plan->plan_ar_name;
            }
            if ($plot->street) {
                $_['street_name'] = $plot->street->ar_name;
            }
        }
        // -----------------------------------------------------
        if ($project->project_manager_id) {
            $_['project_manager'] = $project->project_manager->get_full_name_ar();
            $_['project_manager_job_title'] = $project->project_manager->job_title;
        }
        // -----------------------------------------------------
        $_['required_use'] = $project->project_type;

        // -----------------------------------------------------
        return $_;
        // -----------------------------------------------------
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function set_common_settings($newPDF)
    {
        // set some language dependent data:
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'ar';
        $lg['w_page'] = 'page';
        $newPDF::setLanguageArray($lg);
        // -----------------------------------------------------------------
        // main pdf setting
        $newPDF::SetAuthor('Hakeem-App');
        $newPDF::SetFooterMargin(0);
        $newPDF::setCellHeightRatio(1.5);
        // -----------------------------------------------------------------
        // set arabic font
        $newPDF::SetFont('al-mohanad', '', 12, '', false);
        // -----------------------------------------------------------------
        // to create new page auto (create_new_page,margin_bottom)
        $newPDF::SetAutoPageBreak(TRUE, 24);
        // -----------------------------------------------------------------
        return $newPDF;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function set_invoice_header_footer($newPDF)
    {
        // Custom Header
        $newPDF::setHeaderCallback(function ($pdf) {
            // top header logo
            $pdf->Image(URL::asset('/img/header-small.jpg'), 15, 10, 40, '', 'JPG', '');
            // background logo
            $pdf->Image(URL::asset('/img/bg-Logo-t.jpg'), 20, 70, 170, '', 'JPG');
        });
        // -----------------------------------------------------------------
        $newPDF::setFooterCallback(function ($pdf) {

            $pdf->SetY(-22); // Position at 22 mm from bottom
            $pdf->SetFont('aljazeera', '', 11);
            // text
            $html_ar = 'الفاتورة الإلكترونية لا تحتاج توقيع أو ختم';
            $html_en = 'Electronic Invoice Dos Not Require Signature Or Stamp';
            // cell hight
            $pdf->setCellHeightRatio(1.5);
            // creating the cell
            $pdf->Cell(0, 0, $html_en, 'TB', true, 'L', 0, '', 0, false, 'B', 'M');
            $pdf->Cell(0, 0, $html_ar, 'TB', true, 'R', 0, '', 0, false, 'B', 'M');

            // -----------------------------------------------------------------

            $pdf->SetY(-18); // Position at 22 mm from bottom
            // $pdf->SetFont('courier', '', 8);
            $pdf->SetFont('consolas', '', 8);
            $data = 'printed at: ' . (Carbon::now())->toDateString();
            $pdf->Cell(0, 0, $data, 0, true, 'L', 0, '', 0, false, 'B', 'B');
            $page_numbring = 'Page ' . $pdf->getAliasNumPage() . ' Of ' . $pdf->getAliasNbPages();
            $pdf->Cell(0, 0, $page_numbring, 0, true, 'R', 0, '', 0, false, 'B', 'B');

            // image of footer
            // $pdf->Image(URL::asset('/img/footer.jpg'), 10, 280, 190, '', 'JPG');

            $pdf->SetFont('helveticaB', 'B', 11);
            // $pdf->SetTextColor(57, 39, 20);
            $pdf->SetFillColor(215, 183, 126);
            $html2 = 'Silver Center, Alhezam Road, Alihn Dist, Almadinah Almunawarah, KSA, P.O.BOX:20337';
            $html3 = 'Tel:920020544, 0148650000, 0148645585, Email:ahc@hakeemarch.com';
            $pdf->SetY(-12);
            $pdf->Cell(0, 0, $html2, '', true, 'C', 1, '', 0, false, 'B', 'M');
            $pdf->SetY(-7);
            $pdf->Cell(0, 0, $html3, '', true, 'C', 1, '', 0, false, 'B', 'M');
            // $pdf->setCellHeightRatio(0.5);
        });



        // -----------------------------------------------------------------
        // seting page margin (L,T,R)
        $newPDF::SetMargins(15, 15, 15);
        // -----------------------------------------------------------------
        return $newPDF;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function set_hakeem_header_footer($newPDF, $is_tafweed = false)
    {
        // Custom Header
        $newPDF::setHeaderCallback(function ($pdf) {
            // top header logo
            $pdf->Image(URL::asset('/img/header.jpg'), 200, 4, 190, '', 'JPG', '');
            // background logo
            $pdf->Image(URL::asset('/img/bg-Logo-t.jpg'), 190, 70, 170, '', 'JPG');
        });
        // -----------------------------------------------------------------
        // Custom Footer
        //  just for tafweed
        if ($is_tafweed) {
            $newPDF::setFooterCallback(function ($pdf) {
                // Position at 22 mm from bottom
                $pdf->SetY(-22);
                // Set font
                $pdf->SetFont('freeserif', '', 11);
                // text
                $html = 'ملاحظة: هذا التفويض يخص هذه المعاملة فقط، وينتهي مفعوله بانتهاءالمعاملة لدى الامانة او الغاءه من احدالطرفين.';
                // cell hight
                $pdf->setCellHeightRatio(1.5);
                // creating the cell
                $pdf->Cell(0, 0, $html, 'T', true, 'R', 0, '', 0, false, 'B', 'M');

                // -----------------------------------------------------------------
                // Position at 22 mm from bottom
                $pdf->SetY(-18);
                // Set font
                // $pdf->SetFont('helvetica', 'I', 8);
                $pdf->SetFont('consolas', '', 8);
                // print date 
                $data = 'printed at: ' . (Carbon::now())->toDateString();
                $pdf->Cell(0, 0, $data, 0, true, 'L', 0, '', 0, false, 'B', 'B');
                // Page number
                $page_numbring = 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages();
                $pdf->Cell(0, 0, $page_numbring, 0, true, 'R', 0, '', 0, false, 'B', 'B');
                // image of footer
                // $pdf->Image(URL::asset('/img/footer.jpg'), 10, 280, 190, '', 'JPG');

                $pdf->SetFont('helveticaB', 'B', 11);
                // $pdf->SetTextColor(57, 39, 20);
                // $pdf->SetFillColor(215, 183, 126);
                $pdf->SetFillColor(215, 183, 126);
                $html2 = 'Silver Center, Alhezam Road, Alihn Dist, Almadinah Almunawarah, KSA, P.O.BOX:20337';
                $html3 = 'Tel:920020544, 0148650000, 0148645585, Email:ahc@hakeemarch.com';
                $pdf->SetY(-12);
                $pdf->Cell(0, 0, $html2, '', true, 'C', 1, '', 0, false, 'B', 'M');
                $pdf->SetY(-7.8);
                $pdf->Cell(0, 0, $html3, '', true, 'C', 1, '', 0, false, 'B', 'M');
                // $pdf->setCellHeightRatio(0.5);
            });
        } else {
            $newPDF::setFooterCallback(function ($pdf) {
                // Position at 22 mm from bottom
                $pdf->SetY(-18);
                // Set font
                $pdf->SetFont('consolas', '', 8);
                // print date 
                $data = 'printed at: ' . (Carbon::now())->toDateString();
                $pdf->Cell(0, 0, $data, 0, true, 'L', 0, '', 0, false, 'B', 'B');
                // Page number
                $page_numbring = 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages();
                $pdf->Cell(0, 0, $page_numbring, 0, true, 'R', 0, '', 0, false, 'B', 'B');
                // image of footer
                // $pdf->Image(URL::asset('/img/footer.jpg'), 10, 280, 190, '', 'JPG');
                $pdf->SetFont('helveticaB', 'B', 11);
                $pdf->SetFillColor(215, 183, 126);
                $html2 = 'Silver Center, Alhezam Road, Alihn Dist, Almadinah Almunawarah, KSA, P.O.BOX:20337';
                $html3 = 'Tel:920020544, 0148650000, 0148645585, Email:ahc@hakeemarch.com';
                $pdf->SetY(-12);
                $pdf->Cell(0, 0, $html2, '', true, 'C', 1, '', 0, false, 'B', 'M');
                $pdf->SetY(-7.5);
                $pdf->Cell(0, 0, $html3, '', true, 'C', 1, '', 0, false, 'B', 'M');
            });
        }

        // -----------------------------------------------------------------
        // seting page margin (L,T,R)
        $newPDF::SetMargins(15, 32, 15);
        // -----------------------------------------------------------------
        return $newPDF;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function set_page_no_footer($newPDF)
    {
        // Custom Footer
        $newPDF::setFooterCallback(function ($pdf) {

            // Position at 22 mm from bottom
            $pdf->SetY(-13);
            // Set font
            $pdf->SetFont('consolas', '', 8);
            // print date 
            $data = 'printed at: ' . (Carbon::now())->toDateString();
            $pdf->Cell(0, 0, $data, 'T', true, 'L', 0, '', 0, false, 'B', 'B');
            // Page number
            $page_numbring = 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages();
            $pdf->Cell(0, 0, $page_numbring, 'T', true, 'R', 0, '', 0, false, 'B', 'B');
        });
        // -----------------------------------------------------------------
        // seting page margin (L,T,R)
        // $newPDF::SetMargins(20, 20, 20);
        // -----------------------------------------------------------------
        return $newPDF;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function set_amana_header_footer($newPDF)
    {
        $newPDF::setHeaderCallback(function ($pdf) {
            // top header logo
            $pdf->Image(URL::asset('/img/amana-logo.jpg'), 90, 10, 35, '', 'JPG', '');
            $pdf->SetFont('traditionalarabic', '', 12, '', false);
            // set top right text
            $pdf->Cell(0, 0, '', 0, 1, 'R', 0, '', 0);
            $pdf->Cell(0, 0, '', 0, 1, 'R', 0, '', 0);
            $pdf->Cell(0, 0, 'المملكة العربية السعودية', 0, 1, 'R', 0, '', 0);
            $pdf->Cell(0, 0, 'وزارة الشؤون البلدية والقروية', 0, 1, 'R', 0, '', 0);
            $pdf->Cell(0, 0, 'امانة منطقة المدينة المنورة', 0, 1, 'R', 0, '', 0);
            $pdf->Cell(0, 0, 'الرمز(266\300)', 0, 1, 'R', 0, '', 0);
            // background rectangel
            $pdf->RoundedRect(10, 45, 190, 230, 5, '1111');
        });
        // -----------------------------------------------------------------
        // Custom Footer
        $newPDF::setFooterCallback(function ($pdf) {
            // Position at 22 mm from bottom
            $pdf->SetY(-18);
            // Set font
            $pdf->SetFont('helvetica', 'I', 8);
            // Page number
            $page_numbring = 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages();
            $pdf->Cell(0, 0, $page_numbring, 0, true, 'R', 0, '', 0, false, 'B', 'M');
            // image of footer
            $pdf->Image(URL::asset('/img/amana-footer.jpg'), 10, 280, 190, '', 'JPG');
            // $pdf->setCellHeightRatio(0.5);
        });
        // -----------------------------------------------------------------
        // seting page margin (L,T,R)
        $newPDF::SetMargins(15, 50, 15);
        // -----------------------------------------------------------------
        return $newPDF;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function to_arabic_numbers($html)
    {
        $text = strval($html);
        // $numarr = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
        $a = preg_replace_callback(
            '/[0-9]/',
            function ($matches) {
                $numarr = array(0 => "۰", 1 => "۱", 2 => "٢", 3 => "۳", 4 => '٤', 5 => '٥', 6 => '٦', 7 => '٧', 8 => '٨', 9 => '٩');
                return $numarr[intval($matches[0])];
            },
            $text
        );
        return $a;
    }
    // -----------------------------------------------------------------------------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------








    public function create_hakeem_pdf(array $data = []) // ! canceld
    {

        $doc_name = $data['doc_name'];
        $pdf_view = $data['view'];

        // data needed in document
        $project = Project::findOrFail($data['project_id']);
        $office_data = OfficeData::findOrFail(1);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
        ];

        // ------------------------------------------------------------
        $newPDF = new TCPDF();
        // Content
        $content = $pdf_view;
        // set some language dependent data:
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'ar';
        $lg['w_page'] = 'page';

        // Custom Header
        $newPDF::setHeaderCallback(function ($pdf) {
            // top header logo
            $pdf->Image(URL::asset('/img/header.jpg'), 10, 4, 190, '', 'JPG', '');
            // background logo
            $pdf->Image(URL::asset('/img/bg-Logo-t.jpg'), 20, 70, 170, '', 'JPG');
        });

        // Custom Footer
        $newPDF::setFooterCallback(function ($pdf) {
            // Position at 22 mm from bottom
            $pdf->SetY(-18);
            // Set font
            $pdf->SetFont('helvetica', 'I', 8);
            // Page number
            $page_numbring = 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages();
            $pdf->Cell(0, 0, $page_numbring, 0, true, 'R', 0, '', 0, false, 'B', 'M');
            // image of footer
            $pdf->Image(URL::asset('/img/footer.jpg'), 10, 280, 190, '', 'JPG');
            // $pdf->setCellHeightRatio(0.5);
        });

        $newPDF::SetAuthor('Hakeem-App');
        $newPDF::SetTitle('تفويض');
        $newPDF::SetSubject('تفويض');
        #SetMargins(left, top, right = -1,, keepmargins = false) ⇒ Object
        $newPDF::SetMargins(15, 20, 15);
        // $newPDF::SetFooterMargin(PDF_MARGIN_FOOTER);
        $newPDF::SetFooterMargin(0);
        $newPDF::setCellHeightRatio(1.2);
        // -----------------------------------------------------------------
        // set arabic font
        // $newPDF::SetFont('aefurat', '', 16, '', false);
        // PDF::SetFont('dejavusans', '', 8, '', false);
        // $newPDF::SetFont('freeserif', '', 14, '', false);
        $newPDF::SetFont('al-mohanad', '', 12, '', false);
        // $newPDF::SetFont('aljazeera', '', 12, '', false);
        // $newPDF::SetFont('font', '', 12, '', false); // good font 
        // $newPDF::SetFont('traditionalarabic', '', 12, '', false);
        // $newPDF::SetFont('al-gemah-alhoda', '', 12, '', false); // just for hedars
        // $newPDF::SetFont('al-mateen', '', 12, '', false);
        // $newPDF::SetFont('shahab', '', 12, '', false); // no numbers in tis fonts
        // $newPDF::SetFont('ptboldheading', '', 12, '', false);
        // $newPDF::SetFont('consolas', '', 11, '', false);    // just for english and numbers
        // $newPDF::SetFont('consolasb', '', 11, '', false);    // just for english and numbers   boold
        // $newPDF::SetFont('consolasi', '', 11, '', false);    // just for english and numbers   italic
        // $newPDF::SetFont('consolasbi', '', 11, '', false);    // just for english and numbers   boold and italic




        // $newPDF::SetFont('arabictwo', '', 11, '', false);    // just for arabic numbers
        // $newPDF::SetFont('arabic', '', 11, '', false);    // just for arabic numbers


        // PDF::SetFont('aefurat', '', 16, '', false);
        // PDF::SetFont('aealarabiya', '', 16, '', false);
        // -----------------------------------------------------------------
        // $newPDF::SetCellPadding(5);
        $newPDF::setLanguageArray($lg);

        // $newPDF::setRTL(false);
        // $newPDF::SetFontSize(10);

        // $newPDF::SetFontSubsetting(false);
        // $newPDF::SetFontSubsetting('freeserif');
        // $newPDF::SetFontSize('10px');

        // $newPDF->SetFont('freeserif', '', 16);
        // $newPDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $newPDF::SetAutoPageBreak(TRUE, 0);
        // $newPDF::AddPage('L', 'A4');
        $newPDF::AddPage('P', 'A4');
        // $newPDF::writeHTML($html, true, false, true, false, '');
        // $the_view = \Illuminate\Support\Facades\View::make($pdf_view)->with('project', $project);
        $the_view = View::make($pdf_view)->with($data);
        // $the_view = view($pdf_view, $project);
        // $the_view = \view($pdf_view, 'project', $project);
        // dd($the_view->render());
        // $html = $this->to_arabic_numbers($the_view->render());
        $html = $the_view->render();
        // dd($the_view);
        // dd($html);
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'Ymd_His') . '.pdf', 'D');
        exit;

        // --------------------------------------------------------------------------------------------------------------

        // return view('projectDoc.tafweed');
        // return view('projectDoc.index');
        // $pdf = new TCPDF('P', 'mm', 'A4');
        // $pdf = new HakeemPDF('P', 'mm', 'A4');

        // $pdf::SetTitle('sample pdf');
        // $pdf::AddPage();
        // $pdf::writeHTML('<h1>ok</h1>', true, false, true, false, '');
        // $pdf::AddPage();
        // $pdf::writeHTML('<h1>Page2</h1>', true, false, true, false, '');
        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        // $pdf::Output('test.pdf');

        // to save pdf 
        // $pdf::Output('C:/' . 'test.pdf', 'F');
        // $pdf::Output(public_path(uniqid() . 'test.pdf'), 'F');

        // to download a file
        // $pdf::Output('test.pdf', 'D');

        // view to pdf
        // $view = \view('projectDoc.tafweed');
        // $pdf::SetTitle('sample pdf');
        // $pdf::AddPage();
        // $pdf::writeHTML($view->render(), true, false, true, false, '');
        // $pdf::Output('test.pdf');
        // $pdf::Output('test.pdf', 'D');
    }
}
