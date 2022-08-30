<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class LbkpigdController extends Controller
{


    public function index()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');

        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $pasien = DB::select("CALL LAPORAN_BULANAN_KUNJUNGAN_PASIEN_IGD_DETAIL('$start','$end','1002')");
  
        return view('lbkpigd.index', ['pasien'=> $pasien]);
    }

    public function coba(Request $request){
        $pasien = DB::select("CALL LAPORAN_BULANAN_KUNJUNGAN_PASIEN_IGD_DETAIL('$request->tglawal','$request->tglakhir','1002')");
        return view('lbkpigd.vtabel', ['pasien'=> $pasien]);
    }




}
