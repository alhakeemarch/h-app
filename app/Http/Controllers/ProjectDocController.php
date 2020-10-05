<?php

namespace App\Http\Controllers;

use App\OfficeData;
use App\Person;
use App\Plot;
use App\Project;
use App\ProjectDoc;
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
    public function tafweed(Request $request)
    {
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
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
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'date_and_time' => $date_and_time,
        ];
        // creating pdf 
        $newPDF = new TCPDF();
        // Content
        $doc_name = 'report_empty_land';
        $pdf_view = 'projectDoc.report_empty_land';
        // setting a header and foooter 
        $newPDF = $this->set_hakeem_header_footer($newPDF);
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
    public function t_azel(Request $request)
    {
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $date_and_time = DateAndTime::get_date_time_arr();
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'date_and_time' => $date_and_time,
        ];
        // creating pdf 
        $newPDF = new TCPDF();
        $pdf_view = 'projectDoc.t_azel';
        // -----------------------------------------------------------------
        // set some language dependent data:
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'ar';
        $lg['w_page'] = 'page';
        $newPDF::setLanguageArray($lg);
        // -----------------------------------------------------------------
        $newPDF::SetAuthor('Hakeem-App');
        $newPDF::SetTitle('تعهد العزل');
        $newPDF::SetSubject('تعهد العزل');
        $newPDF::SetFooterMargin(0);
        $newPDF::SetAutoPageBreak(TRUE, 24);
        $newPDF::SetMargins(20, 30, 20, true);
        $newPDF::setCellHeightRatio(1.1);
        // $newPDF::Ln(10);
        // -----------------------------------------------------------------
        // set arabic font
        $newPDF::SetFont('al-mohanad', '', 12, '', false);
        // -----------------------------------------------------------------
        $newPDF::AddPage('P', 'A4');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'I');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_missing_data($doc_name, $project)
    {
        $missing_data = [];
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
        return $missing_data;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_project_docs()
    {
        return [
            'تفويض' => 'projectDoc.tafweed',
            'تفويض المساحة' => 'projectDoc.tafweed_masaha',
            'تعهد المخاطر' => 'projectDoc.t_makhater',
            'تعهد السور' => 'projectDoc.t_soor',
            'تعهد العزل' => 'projectDoc.t_azel',
            'تعهد المياه' => 'projectDoc.t_meyaah',
            'تقرير ارض فضاء' => 'projectDoc.report_empty_land',
            // 'طلب ربط رخصة بالقرار المساحي' => '',
            'غلاف المذكرة الإنشائية' => 'projectDoc.str_notes_cover',
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
