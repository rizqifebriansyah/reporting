<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class LptubController extends Controller
{
    public function index()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');

        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $bimrohani = DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_BIMROHANI('$start','$end')");
        return view('lptub.index', ['bimrohani'=> $bimrohani]);
    }

    public function caribim(Request $request){
        $bimrohani = DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_BIMROHANI('$request->tglawal','$request->tglakhir')");
        return view('lptub.rtabel', ['bimrohani'=> $bimrohani]);
    }
}
