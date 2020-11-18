<?php

namespace App\Http\Controllers;

use App\PersonTitles;
use App\Project;
use App\Quotation;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF as TCPDF;
use \Illuminate\Support\Facades\View;

class QuotationController extends Controller
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
        //
        return Quotation::all();
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Project $project, Quotation $quotation)
    {
        $project = Project::findOrFail($request->project_id);
        $person_titles = PersonTitles::all();
        return view('quotation.create')->with([
            'project' => $project,
            'person_titles' => $person_titles,
            'quotation' => $quotation,
        ]);
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
        return $request;
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Quotation $quotation)
    {
        $project = Project::findOrFail($request->project_id);
        $person_titles = PersonTitles::all();
        return view('quotation.edit')->with([
            'project' => $project,
            'quotation' => $quotation,
            'person_titles' => $person_titles,
        ]);
        return $request;
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        if ($request->update_address_to) {
            $request->validate([
                'address_to_title_id' => 'required|numeric',
                'address_to_name' => 'string|required',
                'is_address_to_before_owner' => 'boolean|required',
            ]);
            $quotation->address_to_title_id = $request->address_to_title_id;
            $quotation->address_to_name = $request->address_to_name;
            $quotation->is_address_to_before_owner = $request->is_address_to_before_owner;
            $quotation->last_edit_by_id = auth()->user()->id;
            $quotation->last_edit_by_name = auth()->user()->user_name;
            $quotation->save();
            return redirect(route('project.show', $request->project_id))
                ->with('success', 'quotation updated successfully - تم تحديث العرض بنجاح');
        }
        if ($request->update_quotation_date) {
            $date_and_time = DateAndTime::get_date_time_arr();
            $quotation->quotation_date = $date_and_time['g_date_en'];
            $quotation->last_edit_by_id = auth()->user()->id;
            $quotation->last_edit_by_name = auth()->user()->user_name;
            $quotation->save();
            return redirect(route('project.show', $request->project_id))
                ->with('success', 'quotation updated successfully - تم تحديث العرض بنجاح');
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_pdf(Request $request)
    {
        // return $request;
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
            self::create_new($data);
        }
        // creating pdf 
        $newPDF = new TCPDF();
        // Content
        $doc_name = 'quotation';
        $pdf_view = 'projectDoc.quotation';
        // -----------------------------------------------------------------
        // setting a header and foooter 

        $newPDF = ProjectDocController::set_hakeem_header_footer($newPDF);
        // setting main sittings
        $newPDF = ProjectDocController::set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('عرض سعر');
        $newPDF::SetSubject('عرض سعر');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::AddPage('P', 'A4');
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        // -----------------------------------------------------------------
        // to print contract no and user id and contract creator id 
        $text = 'Code="U' . auth()->user()->id
            . '-P' . $project->id
            . '"';
        // -----------------------------------------------------------------
        $newPDF::SetY(150);
        $newPDF::SetX(198);
        $newPDF::StartTransform();
        $newPDF::Rotate(+90);
        $newPDF::SetFont('helvetica', '', 8);
        $newPDF::SetTextColor(0, 0, 0, 25);;
        $newPDF::Cell(0, 0, $text, 0, 0, 'C', 0, '', 0, false, 'B', 'B');
        $newPDF::StopTransform();
        // -----------------------------------------------------------------
        $newPDF::Output(date_format(now(), 'Ymd_His') . '.pdf', 'D');
        return;
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
    public static function create_new($data)
    {
        $quotation = new Quotation;
        $quotation->project_id = $data['project']->id;
        $quotation->quotation_date = $data['date_and_time']['g_date_en'];
        $quotation->created_by_id = auth()->user()->id;
        $quotation->created_by_name = auth()->user()->user_name;
        $quotation->save();
        // return $quotation;
    }
    // -----------------------------------------------------------------------------------------------------------------
}
