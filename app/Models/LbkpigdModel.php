<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LbkpigdModel extends Model
{
    use HasFactory;

    protected $storeprocedure = 'LAPORAN_BULANAN_KUNJUNGAN_PASIEN_IGD_DETAIL';     
    public function alldetail(){
        $time= Carbon::now()->format('Y-m-d');
        return DB::select("CALL LAPORAN_BULANAN_KUNJUNGAN_PASIEN_IGD_DETAIL('$time','$time','1002')");
    }
}
