<?php

namespace App\Http\Controllers;

use App\OfficeData;
use App\Person;
use App\Plot;
use App\Project;
use App\ProjectDoc;
use App\Quotation;
use Carbon\Carbon;
use PDF as TCPDF;
// use Elibyy\TCPDF\Facades\TCPdf as TCPDF;
// use App\Tcpdf\HakeemPDF;
use \Illuminate\Support\Facades\View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use function PHPSTORM_META\override;

class ProjectDocController extends Controller
{
    public $is_tafweed = false;
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
    public function quotation(Request $request)
    {
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $quotation = new Quotation;
        $quotation = $quotation->where('project_id', $project->id)->first();
        $date_and_time = (isset($quotation->id)) ? DateAndTime::get_date_time_arr($quotation->quotation_date) : DateAndTime::get_date_time_arr();
        $project_contracts = ContractController::get_project_contracts_for_quotation($project);
        $total_arr = $this->get_total_array($project);
        if ($project_contracts->count() < 1) {
            return redirect()->back()->withErrors(['contracts must be created to appear in quotation', 'يجب انشاء العقود لتظهر قيمها في عرض السعر']);
        }
        $data = [
            'project' => $project,
            'project_contracts' => $project_contracts,
            'total_arr' => $total_arr,
            'date_and_time' => $date_and_time,
            'quotation' => $quotation,
        ];

        if (!(isset($quotation->id))) {
            return QuotationController::create_new($data);
        }
        // creating pdf 
        $newPDF = new TCPDF();
        // Content
        $doc_name = 'quotation';
        $pdf_view = 'projectDoc.quotation';
        // -----------------------------------------------------------------
        // setting a header and foooter 
        $newPDF = $this->set_hakeem_header_footer($newPDF);
        // setting main sittings
        $newPDF = $this->set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('عرض سعر');
        $newPDF::SetSubject('عرض سعر');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_total_array($project)
    {
        $project_contracts = ContractController::get_project_contracts_for_quotation($project);
        $total_arr = [
            'total_cost' => 0,
            'total_vat' => 0,
            'total_price_withe_vat' => 0,
            'total_price_withe_vat_text' => '',
            'vat_percentage' => 0,
        ];
        foreach ($project_contracts as $contract) {
            $total_arr['total_cost'] += $contract->cost;
            $total_arr['total_vat'] += $contract->vat_value;
            $total_arr['total_price_withe_vat'] += $contract->price_withe_vat;
            $total_arr['vat_percentage'] = (int) $contract->vat_percentage;
        }
        $ar_num  = new \App\I18N_Arabic_Numbers();
        $total_arr['total_price_withe_vat_text'] = $ar_num->money2str($total_arr['total_price_withe_vat'], 'SAR');

        return $total_arr;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function tafweed(Request $request)
    {
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_team($project);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
        ];
        // creating pdf 
        $newPDF = new TCPDF();
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'projectDoc.tafweed';
        $is_tafweed = true;
        // -----------------------------------------------------------------
        // setting a header and foooter 
        $newPDF = $this->set_hakeem_header_footer($newPDF, $is_tafweed);
        // setting main sittings
        $newPDF = $this->set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('تفويض');
        $newPDF::SetSubject('تفويض');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function tafweed_masaha(Request $request)
    {
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
        ];
        // creating pdf 
        $newPDF = new TCPDF();
        // Content
        $doc_name = 'tafweed_masaha';
        $pdf_view = 'projectDoc.tafweed_masaha';
        $newPDF = $this->set_common_settings($newPDF);
        // setting pdf title
        $newPDF::SetTitle('تفويض مساحة');
        $newPDF::SetSubject('تفويض مساحة');
        // overriding som settings
        $newPDF::SetMargins(15, 15, 15);
        $newPDF::SetFont('al-mohanad', '', 11, '', false);
        $newPDF::setCellHeightRatio(1.55);
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function t_makhater(Request $request)
    {
        // return view('projectDoc.t_makhater');
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
        ];

        // creating pdf 
        $newPDF = new TCPDF();
        // Content
        $doc_name = 't_makhater';
        $pdf_view = 'projectDoc.t_makhater';
        // -----------------------------------------------------------------
        // setting a header and foooter 
        $newPDF = $this->set_amana_header_footer($newPDF);
        // setting main sittings
        $newPDF = $this->set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('تعهد مخاطر');
        $newPDF::SetSubject('تعهد مخاطر');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function t_soor(Request $request)
    {
        // return view('projectDoc.t_soor');
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
        ];
        // creating pdf 
        $newPDF = new TCPDF();
        // Content
        $doc_name = 't_soor';
        $pdf_view = 'projectDoc.t_soor';
        // setting a header and foooter 
        $newPDF = $this->set_amana_header_footer($newPDF);
        // -----------------------------------------------------------------
        // setting main sittings
        $newPDF = $this->set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('تعهد السور');
        $newPDF::SetSubject('تعهد السور');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function t_meyaah(Request $request)
    {
        // return view('projectDoc.t_meyaah');
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
        ];
        // creating pdf 
        $newPDF = new TCPDF();
        // Content
        $doc_name = 't_meyaah';
        $pdf_view = 'projectDoc.t_meyaah';
        // setting a header and foooter 
        $newPDF = $this->set_page_no_footer($newPDF);
        // -----------------------------------------------------------------
        // setting main sittings
        $newPDF = $this->set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('تعهد المياه');
        $newPDF::SetSubject('تعهد المياه');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function str_notes_cover(Request $request)
    {
        // return view('projectDoc.str_notes_cover');
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
        ];
        // Content
        $doc_name = 'str_notes_cover';
        $pdf_view = 'projectDoc.str_notes_cover';
        // check if there is data missing for the pdf file
        $missing_dat = $this->get_missing_data($doc_name, $project);
        if (!empty($missing_dat)) {
            return redirect()->back()->withErrors($missing_dat);
        }
        // creating pdf 
        $newPDF = new TCPDF();
        // setting a header and foooter 
        $newPDF = $this->set_hakeem_header_footer($newPDF);
        // -----------------------------------------------------------------
        // setting main sittings
        $newPDF = $this->set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // overriding som settings
        // $newPDF::SetMargins(15, 15, 15);
        $newPDF::SetFont('al-mohanad', '', 16, '', false);
        $newPDF::setCellHeightRatio(3);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('غلاف المذكرة الإنشائية');
        $newPDF::SetSubject('غلاف المذكرة الإنشائية');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function report_empty_land(Request $request)
    {
        // return view('projectDoc.report_empty_land');
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $date_and_time = DateAndTime::get_date_time_arr();
        $doc_name = 'report_empty_land';
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'date_and_time' => $date_and_time,
        ];
        // creating pdf 
        $missing_dat = $this->get_missing_data($doc_name, $project);
        if (!empty($missing_dat)) {
            return redirect()->back()->withErrors($missing_dat);
        }
        $newPDF = new TCPDF();
        // Content

        $pdf_view = 'projectDoc.report_empty_land';
        // setting a header and foooter 
        $newPDF = $this->set_hakeem_header_footer($newPDF);
        // -----------------------------------------------------------------
        // setting main sittings
        $newPDF = $this->set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('تقرير أرض فضاء');
        $newPDF::SetSubject('تقرير أرض فضاء');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function request_bind_to_baladi(Request $request)
    {
        // return view('projectDoc.report_empty_land');
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $date_and_time = DateAndTime::get_date_time_arr();
        $doc_name = 'request_bind_to_baladi';
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'date_and_time' => $date_and_time,
        ];
        // creating pdf 
        $missing_dat = $this->get_missing_data($doc_name, $project);
        if (!empty($missing_dat)) {
            // return redirect()->back()->withErrors($missing_dat);
        }
        $newPDF = new TCPDF();
        // Content

        $pdf_view = 'projectDoc.request_bind_to_baladi';
        // setting a header and foooter 
        $newPDF = $this->set_hakeem_header_footer($newPDF);
        // -----------------------------------------------------------------
        // setting main sittings
        $newPDF = $this->set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('طلب ربط ببلدي');
        $newPDF::SetSubject('طلب ربط ببلدي');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'I');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function t_azel(Request $request)
    {
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $date_and_time = DateAndTime::get_date_time_arr();
        $doc_name = 't_azel';
        $azel_data = [
            'walls_material' => 'بولسترين',
            'walls_value' => '0.53',
            'ceiling_material' => 'بولسترين',
            'ceiling_value' => '0.31',
            'window_material' => 'زجاج مضاعف',
            'window_value' => '2.67',
        ];
        $data_for_pdf = [
            'project' => $project,
            'office_data' => $office_data,
            'date_and_time' => $date_and_time,
            'date_and_time' => $date_and_time,
            'azel_data' => $azel_data,
        ];
        // check if there is data missing for the pdf file
        $missing_dat = $this->get_missing_data($doc_name, $project);
        if (!empty($missing_dat)) {
            return redirect()->back()->withErrors($missing_dat);
        }
        // creating pdf 
        $newPDF = new TCPDF();
        $pdf_view = 'projectDoc.t_azel';
        // -----------------------------------------------------------------
        // set some language dependent data:
        $lg = [
            'a_meta_charset' => 'UTF-8',
            'a_meta_dir' => 'rtl',
            'a_meta_language' => 'ar',
            'w_page' => 'page',
        ];
        $newPDF::setLanguageArray($lg);
        // -----------------------------------------------------------------
        $newPDF::SetAuthor('Hakeem-App');
        $newPDF::SetTitle('تعهد العزل');
        $newPDF::SetSubject('تعهد العزل');
        $newPDF::SetFooterMargin(0);
        $newPDF::SetAutoPageBreak(TRUE, 24);
        $newPDF::SetMargins(20, 20, 20, true);
        $newPDF::setCellHeightRatio(1.3);
        // $newPDF::Ln(10);
        // -----------------------------------------------------------------
        // set arabic font
        $newPDF::SetFont('al-mohanad', 'B', 11, '', false);
        // $newPDF::SetFont('traditionalarabic', 'B', 14, '', false);
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data_for_pdf);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        $newPDF::AddPage('P', 'A4');
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        return;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_missing_data($doc_name, $project)
    {
        $missing_data = [];
        // dd($doc_name);
        // -----------------------------------------------------------------
        if ($doc_name == 't_azel') {
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
        if ($doc_name == 'str_notes_cover') {
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
        if ($doc_name == 'report_empty_land') {
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
        if ($doc_name == 'request_bind_to_baladi') {

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
    public static function get_project_docs()
    {
        return [
            'عرض سعر' => 'projectDoc.quotation',
            'تفويض' => 'projectDoc.tafweed',
            'تفويض المساحة' => 'projectDoc.tafweed_masaha',
            'تعهد المخاطر' => 'projectDoc.t_makhater',
            'تعهد السور' => 'projectDoc.t_soor',
            'تعهد العزل' => 'projectDoc.t_azel',
            'تعهد المياه' => 'projectDoc.t_meyaah',
            'غلاف المذكرة الإنشائية' => 'projectDoc.str_notes_cover',
            'تقرير ارض فضاء' => 'projectDoc.report_empty_land',
            'طلب ربط رخصة بالقرار المساحي' => 'projectDoc.request_bind_to_baladi',
        ];
    }
    // -----------------------------------------------------------------------------------------------------------------

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
        $newPDF::AddPage('P', 'A4');
        // -----------------------------------------------------------------
        return $newPDF;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function set_hakeem_header_footer($newPDF, $is_tafweed = false)
    {
        // Custom Header
        $newPDF::setHeaderCallback(function ($pdf) {
            // top header logo
            $pdf->Image(URL::asset('/img/header.jpg'), 10, 4, 190, '', 'JPG', '');
            // background logo
            $pdf->Image(URL::asset('/img/bg-Logo-t.jpg'), 20, 70, 170, '', 'JPG');
        });
        // -----------------------------------------------------------------
        // Custom Footer
        //  just for tafweed
        if ($is_tafweed) {
            $newPDF::setFooterCallback(function ($pdf) {
                // Position at 22 mm from bottom
                $pdf->SetY(-22);
                // Set font
                $pdf->SetFont('freeserif', '', 12);
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
                $pdf->SetFont('helvetica', 'I', 8);
                // print date 
                $data = 'printed at: ' . (Carbon::now())->toDateString();
                $pdf->Cell(0, 0, $data, 0, true, 'L', 0, '', 0, false, 'B', 'B');
                // Page number
                $page_numbring = 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages();
                $pdf->Cell(0, 0, $page_numbring, 0, true, 'R', 0, '', 0, false, 'B', 'B');
                // image of footer
                $pdf->Image(URL::asset('/img/footer.jpg'), 10, 280, 190, '', 'JPG');
                // $pdf->setCellHeightRatio(0.5);
            });
        } else {
            $newPDF::setFooterCallback(function ($pdf) {
                // Position at 22 mm from bottom
                $pdf->SetY(-18);
                // Set font
                $pdf->SetFont('helvetica', 'I', 8);
                // print date 
                $data = 'printed at: ' . (Carbon::now())->toDateString();
                $pdf->Cell(0, 0, $data, 0, true, 'L', 0, '', 0, false, 'B', 'B');
                // Page number
                $page_numbring = 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages();
                $pdf->Cell(0, 0, $page_numbring, 0, true, 'R', 0, '', 0, false, 'B', 'B');
                // image of footer
                $pdf->Image(URL::asset('/img/footer.jpg'), 10, 280, 190, '', 'JPG');
                // $pdf->setCellHeightRatio(0.5);



                // $pdf->SetY(-150);
                // $pdf->SetX(205);

                // $pdf->StartTransform();
                // $pdf->Rotate(+90);
                // $pdf->SetFont('helvetica', '', 8);
                // $pdf->Cell(0, 0, 'This is a sample data 1', 0, 0, 'C', 0, '', 0, false, 'B', 'B');
                // // $pdf->Cell(0, 0, 'This is a sample data 2', 0, 0, 'C', 0, '');
                // $pdf->StopTransform();

                // -----------------------------------------------------------------





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
            $pdf->SetY(-15);
            // Set font
            $pdf->SetFont('helvetica', 'I', 8);
            // print date 
            $data = 'printed at: ' . (Carbon::now())->toDateString();
            $pdf->Cell(0, 0, $data, 0, true, 'L', 0, '', 0, false, 'B', 'B');
            // Page number
            $page_numbring = 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages();
            $pdf->Cell(0, 0, $page_numbring, 0, true, 'R', 0, '', 0, false, 'B', 'B');
        });
        // -----------------------------------------------------------------
        // seting page margin (L,T,R)
        $newPDF::SetMargins(20, 20, 20);
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
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
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
