<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Captain;
use App\Scout;
use PDF;

class FormsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function getGovernor(){
        $governor = Scout::find(Captain::where('role','gov')->value('scout_id'));
        $governor = $governor->last_name." ".$governor->first_name;
        return response()->json(["governor"=>$governor]);
    }
    public function previewHonorary(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $toscout = $request->input('toscout');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'toscout'=>$toscout,"gov"=>$gov];
        $pdf = PDF::loadView('/FormsTemplate/Honorary_meeting', compact('data'))->setPaper('a4');

        return $pdf->download('example.pdf');
    }
    public function downloadHonoraryPDF(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $toscout = $request->input('toscout');
        $data =["content"=>$content,"date"=>$date,'outing_mail'=>$outing_mail,'toscout'=>$toscout,"gov"=>$gov];
        $pdf = PDF::loadView('/FormsTemplate/Honorary_meeting', compact('data'))->setPaper('a4');

        return $pdf->download('example.pdf');
    }
    public function previewReporte_Scout_state_gov(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $state_scout_gov = $request->input('state_scout_gov');
        $subject = $request->input('subject');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'state_scout_gov'=>$state_scout_gov,"gov"=>$gov];
        $pdf = PDF::loadView('/FormsTemplate/Reporter_state_scout_governor', compact('data'))->setPaper('a4');

        return $pdf->download('example.pdf');
    }

    public function downloadReporte_Scout_state_gov(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $state_scout_gov = $request->input('state_scout_gov');
        $subject = $request->input('subject');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'state_scout_gov'=>$state_scout_gov,"gov"=>$gov];
        $pdf = PDF::loadView('/FormsTemplate/Reporter_state_scout_governor', compact('data'))->setPaper('a4');

        return $pdf->download('example.pdf');
    }
}
