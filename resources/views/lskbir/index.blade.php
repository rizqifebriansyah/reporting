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
            <h5 class="m-0">LAPORAN SENSUS KUNJUNGAN BULANAN IGD REKAP</h5>
        </div>




        <div class="col-md-5">PENCARIAN LAPORAN SENSUS KUNJUNGAN BULANAN IGD REKAP<b><span id="total_records"></span></b></div>
        <div classs="d-flex justify-content-center mt-5">
                <div class="form-inline input-daterange">
                  <div class="form-group mt-3 ml-3 mb-2">
                    <label for="max" class="col-sm-2 col-form-label">from</label>
                    <input type='text' class='datepicker-here form-control' autocomplete="off" data-language='en' data-date-format="yyyy-mm-dd" name="from_date" id="from_date" class="form-control"/>
                  </div>
                  <div class="form-group mb-2">
                    <label for="max" class="col-sm-2 col-form-label">to</label>
                    <input type='text' class='datepicker-here form-control' autocomplete="off" data-language='en' data-date-format="yyyy-mm-dd" name="to_date" id="to_date" class="form-control"/>
                  </div>
                  <button id="btn-selesai" class="btn btn-success" onclick="carirekap()">Filter</button>
                </div>
              </div>
   
</div>
<div class="col-lg-12">
    <div class="stabel">
        <table class="table table-bordered mt-3" align="right" id='table-list'>
            <thead>
                <tr>
                    <th>No</th>
                    <th >JENIS PELAYANAN</th>
                    <th >RUJUKAN</th>
                    <th >NON RUJUKAN</th>
                    <th >DIRAWAT</th>
                    <th >RUJUK</th>
                    <th >PELAYANAN PULANG</th>
                    <th >MATI PRA PERAWATAN</th>
                    <th >DOA</th>
                    <th >JUMLAH PASIEN</th>
                </tr>
               
            </thead>
            <tbody>
            @php $i=1 @endphp
        @foreach ($sensus as $s)
        <tr>
            <td> {{$i++}}</td>
            <td>{{ $s->JENIS_PELAYANAN }}</td>
            <td>{{ $s->RUJUKAN }}</td>
            <td>{{ $s->NON_RUJUKAN }}</td>
            <td>{{ $s->DIRAWAT }}</td>
            <td>{{ $s->RUJUK }}</td>
            <td>{{ $s->PELAYANAN_PULANG }}</td>
            <td>{{ $s->MATI_PRA_PERAWATAN }}</td>
            <td>{{ $s->DOA }}</td>
            <td>{{ $s->JUMLAH_PASIEN }}</td>
            </tr>       
            @endforeach
     

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
<script>
  $(function() {
    $("#table-list").DataTable({
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
      "sortable":true,
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

  function carirekap() {
    tglawal = $('#from_date').val()
    tglakhir = $('#to_date').val()


    $.ajax({
      type: "post",
      data: {
        _token: "{{ csrf_token() }}",
        tglawal,
        tglakhir
      },
      url: "{{ route('caridatasensus') }}",
      error: function(data) {

        alert('error!')
      },
      success: function(response) {

        $('.stabel').html(response);
      }
    });
  }
</script>

@endauth

@stop