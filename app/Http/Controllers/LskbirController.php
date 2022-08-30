<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class LskbirController extends Controller
{
       
    public function index()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');

        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $sensus = DB::select("CALL LAPORAN_SENSUS_KUNJUNGAN_BULANAN_IGD_REKAP('$start','$end', '1002')");
        return view('lskbir.index', ['sensus'=> $sensus]);
    }

    public function carisensus(Request $request){
        $sensus = DB::select("CALL LAPORAN_SENSUS_KUNJUNGAN_BULANAN_IGD_REKAP('$request->tglawal','$request->tglakhir', '1002')");
        return view('lskbir.stabel', ['sensus'=> $sensus]);
    }
}
