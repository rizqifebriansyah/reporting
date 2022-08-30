<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class LptupaController extends Controller
{
    public function index()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');

        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $anatomi = DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_PA('$start','$end')");
        return view('lptupa.index', ['anatomi'=> $anatomi]);
    }

    public function caripa(Request $request){
        $anatomi = DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_PA('$request->tglawal','$request->tglakhir')");
        return view('lptupa.atabel', ['anatomi'=> $anatomi]);
    }
}
