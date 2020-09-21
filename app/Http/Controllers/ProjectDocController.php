<?php

namespace App\Http\Controllers;

use App\ProjectDoc;
use PDF;
use App\Tcpdf\HakeemPDF;



// use 'PDF' => Barryvdh\DomPDF\Facade::class,  // by fa
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class ProjectDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->create_hakeem_pdf('projectDoc.tafweed2');
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
    // ---------------------------------------------------------------------------------------------------------
    public function create_hakeem_pdf($view)
    {
        $newPDF = new PDF();
        // Content
        $content = $view;
        // set some language dependent data:
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'ar';
        $lg['w_page'] = 'page';

        // Custom Header
        $newPDF::setHeaderCallback(function ($pdf) {
            $pdf->Image(URL::asset('/img/header.jpg'), 10, 4, 190, '', 'JPG', '');
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
            $pdf->setCellHeightRatio(0.5);
        });

        $newPDF::SetAuthor('Hakeem-App');
        $newPDF::SetTitle('My Report');
        $newPDF::SetSubject('Report of System');
        #SetMargins(left, top, right = -1,, keepmargins = false) ⇒ Object
        $newPDF::SetMargins(15, 30, 15);
        // $newPDF::SetFooterMargin(PDF_MARGIN_FOOTER);
        $newPDF::SetFooterMargin(0);
        $newPDF::setCellHeightRatio(1.1);

        // set arabic font
        // $newPDF::SetFont('aefurat', '', 16, '', false);
        // PDF::SetFont('dejavusans', '', 8, '', false);
        // $newPDF::SetFont('freeserif', '', 14, '', false);
        $newPDF::SetFont('al-mohanad', '', 12.5, '', false);
        // PDF::SetFont('aefurat', '', 16, '', false);
        // PDF::SetFont('aealarabiya', '', 16, '', false);

        $newPDF::setLanguageArray($lg);

        // $newPDF::setRTL(false);
        // $newPDF::SetFontSize(10);

        // $newPDF::SetFontSubsetting(false);
        // $newPDF::SetFontSubsetting('freeserif');
        // $newPDF::SetFontSize('10px');

        // $newPDF->SetFont('freeserif', '', 16);
        $newPDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // $newPDF::AddPage('L', 'A4');
        $newPDF::AddPage('P', 'A4');
        // $newPDF::writeHTML($html, true, false, true, false, '');
        $the_view = \view($content);
        $newPDF::writeHTML($the_view->render(), true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output('my_file.pdf');
        exit;






















        // return view('projectDoc.tafweed');
        // return view('projectDoc.index');
        // $pdf = new PDF('P', 'mm', 'A4');
        $pdf = new HakeemPDF('P', 'mm', 'A4');

        $pdf::SetTitle('sample pdf');
        $pdf::AddPage();
        $pdf::writeHTML('<h1>ok</h1>', true, false, true, false, '');
        $pdf::AddPage();
        $pdf::writeHTML('<h1>Page2</h1>', true, false, true, false, '');
        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf::Output('test.pdf');

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
