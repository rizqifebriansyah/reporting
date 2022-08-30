<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class LdmriController extends Controller
{
    
    public function index()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');

        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $diagnosa = DB::select("CALL SP_LAPORAN_DIAGNOSA_MORBIDITAS_RAJAL_IGD('$start','$end')");
        return view('ldmri.index', ['diagnosa'=> $diagnosa]);
    }

    public function cari(Request $request){
        $diagnosa = DB::select("CALL SP_LAPORAN_DIAGNOSA_MORBIDITAS_RAJAL_IGD('$request->tglawal','$request->tglakhir')");
        return view('ldmri.dtabel', ['diagnosa'=> $diagnosa]);
    }
}
