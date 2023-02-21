<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:reports.day')->only(['reports_day']);
        $this->middleware('can:reports.date')->only(['reports_date']);
        $this->middleware('can:reports.results')->only(['reports_results']);
    }
    public function reports_day(){

    }
    public function reports_date(){

    }
    public function reports_results(Request $request){

    }
}
