<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Fpdf;
use App\Exports\LptukjExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class LptukjController extends Controller
{
    public function index()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');

        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $kamarjenazah = DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_KMRJENAZAH('$start','$end')");
        return view('lptukj.index', ['kamarjenazah' => $kamarjenazah]);
    }

    public function carikamar(Request $request)
    {
        $kamarjenazah = DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_KMRJENAZAH('$request->tglawal','$request->tglakhir')");
        return view('lptukj.ktabel', ['kamarjenazah' => $kamarjenazah]);
    }
    public function cetak_pdf2($tglawal, $tglakhir){
        $start = Carbon::now()->format('Y-m-d H:i:s');
        $kamarjenazah = DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_KMRJENAZAH('$tglawal','$tglakhir')");
          
        $pdf = new FPDF('L','mm','A4');
 
        $pdf::AddPage('L','A4');
        $pdf::SetTitle('Cetak Laporan Pendapatan Kamar Jenazah');
        $pdf::SetMargins('15', '20', '10');
        $pdf::SetFont('Arial','B',18);
        $pdf::image('public/dist/img/logo-rs.png',3, 2, 20 ,30);
        $pdf::SetXY(30, 8);
        $pdf::Cell(10, 7, 'LAPORAN PENDAPATAN KAMAR JENAZAH', 0, 1);
        
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetXY(2, 33);
        $pdf::SetFont('Arial','',8);
        $pdf::Cell(10, 7, 'PERIODE', 0, 1);
        $pdf::SetXY(40, 33);
        $pdf::SetFont('Arial','',8);
        $pdf::Cell(10, 7,' '.'Periode'. ' '.$tglawal.' '.'S/D'.' '.$tglakhir, 0, 1);
        $pdf::SetXY(2, 40);
        $pdf::SetFont('Arial','B',12);
        $pdf::cell(67,5,"UNIT",1,"","C");
        $pdf::cell(25,5,"TOTAL",1,"","C");
        $pdf::cell(25,5,"UMUM",1,"","C");
        $pdf::cell(25,5,"PG",1,"","C");
        $pdf::cell(25,5,"KAI",1,"","C");
        $pdf::cell(25,5,"SKTM",1,"","C");
        $pdf::cell(25,5,"BPJS",1,"","C");
        $pdf::cell(25,5,"JAMPERSAL",1,"","C");
        $pdf::cell(25,5,"JR",1,"","C");
        $pdf::cell(25,5,"COVID",1,"","C");
        $pdf::cell(25,5,"RS",1,"","C");
        $pdf::cell(25,5,"ASURANSI LAIN",1,"","C");
        $pdf::Ln();
        $pdf::SetFont("Arial","",8);
        $pdf::SetXY(2, 45);
              
        foreach($kamarjenazah as $k){
            $pdf::SetX(2);$pdf::Cell(67,6, $k->UNIT,1,"","C");
            $pdf::Cell(10,6,$k->TOTALQ,1,"","C");
            $pdf::Cell(15,6,$k->TOTALV,1,"","C");
            $pdf::Cell(10,6,$k->Q_UMUM,1,"","C");
            $pdf::Cell(15,6,$k->V_UMUM,1,"","C");
            $pdf::Cell(10,6,$k->Q_PG,1,"","C");
            $pdf::Cell(15,6,$k->V_PG,1,"","C");
            $pdf::Cell(10,6,$k->Q_KAI,1,"","C");
            $pdf::Cell(15,6,$k->V_KAI,1,"","C");
            $pdf::Cell(10,6,$k->Q_SKTM,1,"","C");
            $pdf::Cell(15,6,$k->V_SKTM,1,"","C");
            $pdf::Cell(10,6,$k->Q_BPJS,1,"","C");
            $pdf::Cell(15,6,$k->V_BPJS,1,"","C");
            $pdf::Cell(10,6,$k->Q_JAMPERSAL,1,"","C");
            $pdf::Cell(15,6,$k->V_JAMPERSAL,1,"","C");
            $pdf::Cell(10,6,$k->Q_JR,1,"","C");
            $pdf::Cell(15,6,$k->V_JR,1,"","C");
            $pdf::Cell(10,6,$k->Q_COVID,1,"","C");
            $pdf::Cell(15,6,$k->V_COVID,1,"","C");
            $pdf::Cell(10,6,$k->Q_RS,1,"","C");
            $pdf::Cell(15,6,$k->V_RS,1,"","C");
            $pdf::Cell(10,6,$k->Q_ASURANSI_LAIN,1,"","C");
            $pdf::Cell(15,6,$k->V_ASURANSI_LAIN,1,"","C");
            $pdf::Ln();
        }
        $pdf::SetXY(50, 130);
        $pdf::Cell(10, 7, 'STAFF IT BERTUGAS', 0, 1);
        $pdf::SetXY(40, 160);
        $pdf::Cell(10, 7, '_____________________________', 0, 1);
        $pdf::SetXY(200, 130);
        $pdf::Cell(10, 7, 'KEPALA RUANGAN', 0, 1);
        $pdf::SetXY(190, 160);
        $pdf::Cell(10, 7, 'NIP.__________________________', 0, 1);
        $pdf::SetXY(2, 180);
        $pdf::SetFont('Arial','',8);
        $pdf::Cell(10, 7, 'TANGGAL CETAK : '.' '.$start, 0, 1);



        $pdf::Output();
        exit;
    }
    public function cetak_pdf()
    {
       
        $pdf = new FPDF('L','mm','A4');
 
        $pdf::AddPage('L','A4');
        $pdf::SetTitle('Cetak Laporan Pendapatan Kamar Jenazah');
        $pdf::SetMargins('15', '20', '10');
        $pdf::SetFont('Arial','B',18);
        $pdf::image('public/dist/img/logo-rs.png',3, 2, 20 ,30);
        $pdf::SetXY(30, 8);
        $pdf::Cell(10, 7, 'LAPORAN PENDAPATAN KAMAR JENAZAH', 0, 1);
        
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetXY(2, 33);
        $pdf::SetFont('Arial','',8);
        $pdf::Cell(10, 7, 'PERIODE', 0, 1);
        $pdf::SetXY(40, 33);
        $pdf::SetFont('Arial','',8);
        $pdf::Cell(10, 7, 'S/D', 0, 1);
        $pdf::SetXY(2, 40);
        $pdf::SetFont('Arial','B',12);
        $pdf::cell(67,5,"UNIT",1,"","C");
        $pdf::cell(25,5,"TOTAL",1,"","C");
        $pdf::cell(25,5,"UMUM",1,"","C");
        $pdf::cell(25,5,"PG",1,"","C");
        $pdf::cell(25,5,"KAI",1,"","C");
        $pdf::cell(25,5,"SKTM",1,"","C");
        $pdf::cell(25,5,"BPJS",1,"","C");
        $pdf::cell(25,5,"JAMPERSAL",1,"","C");
        $pdf::cell(25,5,"JR",1,"","C");
        $pdf::cell(25,5,"COVID",1,"","C");
        $pdf::cell(25,5,"RS",1,"","C");
        $pdf::cell(25,5,"ASURANSI LAIN",1,"","C");
        $pdf::Ln();
        $pdf::SetFont("Arial","",8);
        $pdf::SetXY(2, 45);
        $kamarjenazah=DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_KMRJENAZAH('2022-06-01','2022-06-30')");
       
        foreach($kamarjenazah as $k){
            $pdf::SetX(2);$pdf::Cell(67,6, $k->UNIT,1,"","C");
            $pdf::Cell(10,6,$k->TOTALQ,1,"","C");
            $pdf::Cell(15,6,$k->TOTALV,1,"","C");
            $pdf::Cell(10,6,$k->Q_UMUM,1,"","C");
            $pdf::Cell(15,6,$k->V_UMUM,1,"","C");
            $pdf::Cell(10,6,$k->Q_PG,1,"","C");
            $pdf::Cell(15,6,$k->V_PG,1,"","C");
            $pdf::Cell(10,6,$k->Q_KAI,1,"","C");
            $pdf::Cell(15,6,$k->V_KAI,1,"","C");
            $pdf::Cell(10,6,$k->Q_SKTM,1,"","C");
            $pdf::Cell(15,6,$k->V_SKTM,1,"","C");
            $pdf::Cell(10,6,$k->Q_BPJS,1,"","C");
            $pdf::Cell(15,6,$k->V_BPJS,1,"","C");
            $pdf::Cell(10,6,$k->Q_JAMPERSAL,1,"","C");
            $pdf::Cell(15,6,$k->V_JAMPERSAL,1,"","C");
            $pdf::Cell(10,6,$k->Q_JR,1,"","C");
            $pdf::Cell(15,6,$k->V_JR,1,"","C");
            $pdf::Cell(10,6,$k->Q_COVID,1,"","C");
            $pdf::Cell(15,6,$k->V_COVID,1,"","C");
            $pdf::Cell(10,6,$k->Q_RS,1,"","C");
            $pdf::Cell(15,6,$k->V_RS,1,"","C");
            $pdf::Cell(10,6,$k->Q_ASURANSI_LAIN,1,"","C");
            $pdf::Cell(15,6,$k->V_ASURANSI_LAIN,1,"","C");
            $pdf::Ln();
        }
        $pdf::SetXY(50, 130);
        $pdf::Cell(10, 7, 'STAFF IT BERTUGAS', 0, 1);
        $pdf::SetXY(40, 160);
        $pdf::Cell(10, 7, '_____________________________', 0, 1);
        $pdf::SetXY(200, 130);
        $pdf::Cell(10, 7, 'KEPALA RUANGAN', 0, 1);
        $pdf::SetXY(190, 160);
        $pdf::Cell(10, 7, 'NIP.__________________________', 0, 1);
        $pdf::SetXY(2, 180);
        $pdf::SetFont('Arial','',8);
        $pdf::Cell(10, 7, 'TANGGAL CETAK : ', 0, 1);



        $pdf::Output();
        exit;
        
    }
    public function cetak_excel()
	{
		return Excel::download(new LptukjExport, 'lptukj.xlsx');
	}
}
