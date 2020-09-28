<?php

namespace App\Http\Controllers;

use App\OfficeData;
use App\Person;
use App\Plot;
use App\Project;
use App\ProjectDoc;
use PDF;
// use App\Tcpdf\HakeemPDF;
use \Illuminate\Support\Facades\View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class ProjectDocController extends Controller
{
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
     * @param  \App\ProjectDoc  $projectDoc
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDoc $projectDoc)
    {
        //
    }

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
        // return $request;
        $project = Project::findOrFail($request->project_id);
        $data = [
            'pdf_name' => 'tafweed',
            'view' => 'projectDoc.tafweed',
            'project_id' => $request->project_id,
        ];
        return $this->create_hakeem_pdf($data);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function tafweed_masaha(Request $request)
    {
        // return $request;
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
        ];

        // **********************************************************
        $pdf_name = 'tafweed_masaha';
        $newPDF = new PDF();
        // Content
        $pdf_view = 'projectDoc.tafweed_masaha';
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
        $newPDF::SetTitle('تفويض مساحة');
        $newPDF::SetSubject('تفويض مساحة');
        $newPDF::SetMargins(15, 15, 15);
        // $newPDF::SetFooterMargin(0);
        $newPDF::setCellHeightRatio(1.5);
        // -----------------------------------------------------------------
        // set arabic font
        $newPDF::SetFont('traditionalarabic', '', 12, '', false);
        // -----------------------------------------------------------------
        $newPDF::SetAutoPageBreak(TRUE, 0);
        $newPDF::AddPage('P', 'A4');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($pdf_name . '.pdf');
        exit;

        // **********************************************************
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function t_makhater(Request $request)
    {
        // return view('projectDoc.t_makhater');
        $project = Project::findOrFail($request->project_id);
        $data = [
            'pdf_name' => 't_makhater',
            'view' => 'projectDoc.t_makhater',
            'project_id' => $request->project_id,
        ];

        // **********************************************************
        $pdf_name = 't_makhater';
        $newPDF = new PDF();
        // Content
        $pdf_view = 'projectDoc.t_makhater';
        // -----------------------------------------------------------------
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
        // set some language dependent data:
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'ar';
        $lg['w_page'] = 'page';
        $newPDF::setLanguageArray($lg);
        // -----------------------------------------------------------------
        $newPDF::SetAuthor('Hakeem-App');
        $newPDF::SetTitle('تفويض مساحة');
        $newPDF::SetSubject('تفويض مساحة');
        #SetMargins(left, top, right = -1,, keepmargins = false) ⇒ Object
        $newPDF::SetMargins(15, 50, 15);
        // $newPDF::SetFooterMargin(PDF_MARGIN_FOOTER);
        $newPDF::SetFooterMargin(0);
        $newPDF::setCellHeightRatio(1.5);
        // $newPDF::setCellHeightRatio(1.2);
        // -----------------------------------------------------------------
        // set arabic font
        $newPDF::SetFont('al-mohanad', '', 14, '', false);
        // -----------------------------------------------------------------
        $newPDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $newPDF::AddPage('P', 'A4');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($pdf_name . '.pdf');
        exit;

        // **********************************************************
    }
    // -----------------------------------------------------------------------------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------
    public function t_soor(Request $request)
    {
        // return view('projectDoc.t_soor');
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
        ];

        // **********************************************************
        $pdf_name = 't_soor';
        $newPDF = new PDF();
        // Content
        $pdf_view = 'projectDoc.t_soor';
        // -----------------------------------------------------------------
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
        // set some language dependent data:
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'ar';
        $lg['w_page'] = 'page';
        $newPDF::setLanguageArray($lg);
        // -----------------------------------------------------------------
        $newPDF::SetAuthor('Hakeem-App');
        $newPDF::SetTitle('تفويض مساحة');
        $newPDF::SetSubject('تفويض مساحة');
        #SetMargins(left, top, right = -1,, keepmargins = false) ⇒ Object
        $newPDF::SetMargins(15, 50, 15);
        // $newPDF::SetFooterMargin(PDF_MARGIN_FOOTER);
        $newPDF::SetFooterMargin(0);
        $newPDF::setCellHeightRatio(1.5);
        // $newPDF::setCellHeightRatio(1.2);
        // -----------------------------------------------------------------
        // set arabic font
        $newPDF::SetFont('al-mohanad', '', 12, '', false);
        // -----------------------------------------------------------------
        $newPDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $newPDF::AddPage('P', 'A4');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($pdf_name . '.pdf');
        exit;

        // **********************************************************
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function create_hakeem_pdf(array $data = [])
    {

        $pdf_name = $data['pdf_name'];
        $pdf_view = $data['view'];
        $project = Project::findOrFail($data['project_id']);
        // $Project_manager = Person::findOrFail($project->project_manager_id);

        // return ($project->person());
        // return ($project->plot()->id);
        // dd($project->plot());

        $data = [
            'project' => $project,
            // 'Project_manager' => $Project_manager,
        ];

        // ------------------------------------------------------------
        $newPDF = new PDF();
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
        $newPDF::Output($pdf_name . '.pdf');
        exit;

        // --------------------------------------------------------------------------------------------------------------

        // return view('projectDoc.tafweed');
        // return view('projectDoc.index');
        // $pdf = new PDF('P', 'mm', 'A4');
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
    // -----------------------------------------------------------------------------------------------------------------
    public function to_arabic_numbers($html)
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
}
