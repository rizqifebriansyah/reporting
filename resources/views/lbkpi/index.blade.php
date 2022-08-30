@extends('master')

@section('css')




@stop
@section('content')
@guest
@endguest
@auth




<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">LAPORAN BULNAN KUNJUNGAN PASIEN IGD</h5>
        </div>




        <div class="col-md-5">PENCARIAN LAPORAN BULNAN KUNJUNGAN PASIEN IGD<b><span id="total_records"></span></b></div>
        <div classs="d-flex justify-content-center mt-5">
            <div class="form-inline input-daterange">
                <div class="form-group mt-3 ml-3 mb-2">
                    <label for="max" class="col-sm-2 col-form-label">from</label>
                    <input type='text' class='datepicker-here form-control' autocomplete="off" data-language='en' data-date-format="yyyy-mm-dd" name="from_date" id="from_date" class="form-control" />
                </div>
                <div class="form-group mb-2">
                    <label for="max" class="col-sm-2 col-form-label">to</label>
                    <input type='text' class='datepicker-here form-control' autocomplete="off" data-language='en' data-date-format="yyyy-mm-dd" name="to_date" id="to_date" class="form-control" />
                </div>
                <button id="btn-selesai" class="btn btn-success" onclick="cariigd()">Filter</button>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="col-lg-12">
            <div class="itabel">
                <h1><img src="{{ asset('dist/img/logo-rs.png') }}" alt="">LAPORAN BULNAN KUNJUNGAN PASIEN IGD</h1>
                <table class="table table-bordered mt-3" align="right" id='table-list'>
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">NO</th>
                            <th rowspan="2" style="vertical-align: middle;">PENJAMIN</th>
                            <th rowspan="2" style="vertical-align: middle;">JENIS PELAYANAN</th>

                            <th colspan="4" style="vertical-align: middle-center;">PASIEN INSTALASI GAWAT DARURAT </th>
                            <th rowspan="2" style="vertical-align: middle;">TOTALJENIS PELAYANAN</th>
                        </tr>

                        <tr>

                            <th>BARU</th>
                            <th>LAMA</th>
                            <th>RUJUKAN</th>
                            <th>DIRUJUK</th>
                        </tr>


                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                        @foreach ($igd as $g)
                        <tr>
                            <td> {{$i++}}</td>
                            <td>{{ $g->PENJAMIN }}</td>
                            <td>{{ $g->JENIS_PELAYANAN }}</td>
                            <td>{{ $g->PASIEN_BARU }}</td>
                            <td>{{ $g->PASIEN_LAMA }}</td>
                            <td>{{ $g->PASIEN_RUJUKAN }}</td>
                            <td>{{ $g->PASIEN_DIRUJUK }}</td>
                            <td>{{ $g->TOTALJENIS_PELAYANAN }}</td>
                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;"></th>
                            <th rowspan="2" style="vertical-align: middle;"></th>
                            <th rowspan="2" style="vertical-align: middle;"> </th>

                            <th colspan="4" style="vertical-align: middle-center;"> </th>
                            <th rowspan="2" style="vertical-align: middle;"> </th>
                        </tr>

                        <tr>

                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
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
</div>

@stop


@section('js')
<script>
    $(function() {
        $("#table-list").DataTable({
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // converting to interger to find total
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // computing column Total of the complete result 
                var PENJAMINTotal = api
                    .column(1)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var JENISPELAYANANTotal = api
                    .column(2)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var BARUTotal = api
                    .row(2)
                    .column(3)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var LAMATotal = api
                    .row(2)
                    .column(4)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var RUJUKANTotal = api
                    .row(2)
                    .column(5)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                var DIRUJUKTotal = api
                    .row(2)
                    .column(6)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                var TOTALJENISPELAYANANTotal = api
                    .column(7)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);




                // Update footer by showing the total with the reference of the column index 
                $(api.column(0).footer()).html('Total');
                $(api.column(1).footer()).html(PENJAMINTotal);
                $(api.column(2).footer()).html(JENISPELAYANANTotal);
                $(api.row(2).column(3).footer()).html(BARUTotal);
                $(api.row(2).column(4).footer()).html(LAMATotal);
                $(api.row(2).column(5).footer()).html(RUJUKANTotal);
                $(api.row(2).column(6).footer()).html(DIRUJUKTotal);
                $(api.column(7).footer()).html(TOTALJENISPELAYANANTotal);

            },
            "sortable": true,
            "responsive": true,
            "lengthChange": false,
            "serverside": true,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#table-list_wrapper .col-md-6:eq(0)');
        $('#tablelist').DataTable({
            "paging": true,
            "serverside": true,
            "sortable": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    $(function() {
        $(".input-daterange").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        }).datepicker('update', new Date());
    });

    function cariigd() {
        tglawal = $('#from_date').val()
        tglakhir = $('#to_date').val()


        $.ajax({
            type: "post",
            data: {
                _token: "{{ csrf_token() }}",
                tglawal,
                tglakhir
            },
            url: "{{ route('caridataigd') }}",
            error: function(data) {

                alert('error!')
            },
            success: function(response) {

                $('.itabel').html(response);
            }
        });
    }
</script>

@endauth

@stop