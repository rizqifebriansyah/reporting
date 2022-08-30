<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class LptukjExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $time= Carbon::now()->format('Y-m-d');
        return DB::select("CALL LAPORAN_PENDAPATAN_TINDAKAN_UNIT_KMRJENAZAH(' $time',' $time')");
    }
}
