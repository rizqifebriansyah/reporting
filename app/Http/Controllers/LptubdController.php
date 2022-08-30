<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

use Illuminate\Http\Request;

class LptubdController extends Controller
{
    public function index()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');

        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $bankdarah = DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_BNKDARAH('$start','$end')");
        return view('lptubd.index', ['bankdarah'=> $bankdarah]);
    }

    public function caribd(Request $request){
        $bankdarah = DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_BNKDARAH('$request->tglawal','$request->tglakhir')");
        return view('lptubd.btabel', ['bankdarah'=> $bankdarah]);
    }
}
