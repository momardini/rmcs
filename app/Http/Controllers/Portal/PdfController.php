<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Analytic;
use App\Models\Interview;
use PDF;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class PdfController extends Controller
{
    public function show_default(Request $request){
        return Voyager::view('portal.pdf.analytic-default');
    }
    public function show_analytic_results(Request $request){
        if (isset($request->interview_id)) {
            $interview = Interview::find($request->interview_id);
            $appointment = $interview->appointment;
            $patient = $appointment->patient;
            $station = $appointment->station;
            $pdfContent = PDF::loadView('portal.pdf.analytic-result', compact( 'patient', 'appointment', 'interview','station'), [], ['format' => 'A5-P']);
            return $pdfContent->stream('portal.pdf.analytic-result');
        }else{
            return Voyager::view('portal.pdf.analytic-default');
        }

//        return Voyager::view('portal.pdf.analytic-result', compact( 'patient', 'appointment', 'interview','station'));
    }
    public function show_analytic_request(Request $request){
        if (isset($request->interview_id)) {
            $interview = Interview::find($request->interview_id);
            $appointment = $interview->appointment;
            $patient = $appointment->patient;
            $station = $appointment->station;
            $analytics = Analytic::all();
            $pdfContent = PDF::loadView('portal.pdf.analytic-request', compact( 'patient', 'appointment', 'interview','station','analytics'), [], ['format' => 'A5-P']);
            return $pdfContent->stream('portal.pdf.analytic-request');
        }else{
            return Voyager::view('portal.pdf.analytic-default');
        }

    }
    public function show_recipe_request(Request $request){
        if (isset($request->interview_id)) {
            $interview = Interview::find($request->interview_id);
            $appointment = $interview->appointment;
            $patient = $appointment->patient;
            $station = $appointment->station;
            $pdfContent = PDF::loadView('portal.pdf.recipe-request', compact( 'patient', 'appointment', 'interview','station'), [], ['format' => 'A5-P']);
            return $pdfContent->stream('portal.pdf.recipe-request');
        }else{
            return Voyager::view('portal.pdf.analytic-default');
        }
    }
    public function show_xray_request(Request $request){
        if (isset($request->interview_id)) {
            $interview = Interview::find($request->interview_id);
            $appointment = $interview->appointment;
            $patient = $appointment->patient;
            $station = $appointment->station;
            $pdfContent = PDF::loadView('portal.pdf.xray-request', compact( 'patient', 'appointment', 'interview','station'), [], ['format' => 'A5-P']);
            return $pdfContent->stream('portal.pdf.xray-request');
        }else{
            return Voyager::view('portal.pdf.analytic-default');
        }
    }
    public function show_action_request(Request $request){
        if (isset($request->interview_id)) {
            $interview = Interview::find($request->interview_id);
            $appointment = $interview->appointment;
            $patient = $appointment->patient;
            $station = $appointment->station;
            $pdfContent = PDF::loadView('portal.pdf.action-request', compact( 'patient', 'appointment', 'interview','station'), [], ['format' => 'A5-P']);
            return $pdfContent->stream('portal.pdf.action-request');
        }else{
            return Voyager::view('portal.pdf.analytic-default');
        }
    }
}
