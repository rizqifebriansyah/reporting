@extends('master')

@section('css')




@stop
@section('content')
@auth
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">SELAMAT DATANG DI DASHBOAD LAPORAN</h1>
            </div><!-- /.col -->

        </div>
    </div>
</div>



<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">LAPORAN BULANAN KUNJUNGAN PASIEN IGD DETAIL</h5>
        </div>




        <div class="col-md-5">laporan pasien record <b><span id="total_records"></span></b></div>
        <div class="col-md-5">
            <div class="input-group input-daterange">
                <input type="text" name="from_date" id="from_date" class="form-control" />
                <div class="input-group-addon">to</div>
                <input type="text" name="to_date" id="to_date" class="form-control" />
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" name="filter" id="filter" class="btn btn-info btn-sm" onclick="caridiagnosa()">Filter</button>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="vtabel">
        <table class="table table-bordered mt-3" id='table-list'>
            <thead>
                <tr>
                    <th>GOLONGAN_SEBAB_PENYAKIT</th>
                
         
                    <th>RENTAN USIA DIAGNOSA </th>
</tr>

                <tr>
                    <th colspan="2">0-6 Hari</th>
                </tr>
                <tr>                        
                    <th>L</th>
                    <th>P</th>
                </tr>
                <tr>
                    <th colspan="2">7-28 Hari</th>
                </tr>
                <tr>
                    <th>L</th>
                    <th>P</th>
                </tr>





            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>

@stop


@section('js')


@endauth

@stop