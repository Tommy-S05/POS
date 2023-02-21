<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Builder
 */

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:reports.day')->only(['reports_day']);
        $this->middleware('can:reports.date')->only(['reports_date']);
        $this->middleware('can:reports.results')->only(['reports_results']);
    }
    public function reports_day(){
        $sales = Sale::whereDate('sale_date', Carbon::today())->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_day', compact('sales', 'total'));
    }
    public function reports_date(){
        $sales = Sale::whereDate('sale_date', Carbon::today())->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_date', compact('sales',  'total'));
    }
    public function reports_results(Request $request){
        if ($request->date_start && $request->date_end){
            $date_start = $request->date_start.' 00:00:00';
            $date_end = $request->date_end.' 23:59:59';
        }

        else {
            $date_start = Carbon::today()->format('Y-m-d').' 00:00:00';
            $date_end = Carbon::today()->format('Y-m-d').' 23:59:59';
        }

        $sales = Sale::whereBetween('sale_date', [$date_start, $date_end])->get();
//        $sales = DB::table('sales')->whereBetween('sale_date', [$date_start, $date_end])->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_date', compact('sales',  'total'));
    }
}
