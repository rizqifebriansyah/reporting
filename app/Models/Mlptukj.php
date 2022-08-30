<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Mlptukj extends Model
{

    protected $storeprocedure = 'LAPORAN_PENDAPATAN_TINDAKAN_UNIT_KMRJENAZAH';     

    public function alldetail(){
        $time= Carbon::now()->format('Y-m-d');
        return DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_KMRJENAZAH(' $time',' $time')");
    }
}
