<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class LbkpiController extends Controller
{
    public function index()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');

        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $igd = DB::select("CALL LAPORAN_BULANAN_KUNJUNGAN_PASIEN_IGD('$start','$end','1002')");
       

        return view('lbkpi.index', ['igd'=> $igd]);
    }

    public function cariigd(Request $request){
        $igd = DB::select("CALL LAPORAN_BULANAN_KUNJUNGAN_PASIEN_IGD('$request->tglawal','$request->tglakhir','1002')");
        return view('lbkpi.itabel', ['igd'=> $igd]);
    }

}
