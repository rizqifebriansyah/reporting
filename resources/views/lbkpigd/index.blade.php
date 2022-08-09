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
      <button type="button" name="filter" id="filter" class="btn btn-info btn-sm" onclick="filterdata()">Filter</button>
    </div>
  </div>
</div>
<div class="col-lg-12">
<div class="vtabel">
  <table class="table table-bordered mt-3" id='table-list'>
    <thead>
      <tr>
        <th>NO</th>
        <th>TGL</th>
        <th>no_rm</th>
        <th>NAMA_PASIEN</th>
        <th>DIAGNOSA</th>
        <th>L</th>
        <th>P</th>
        <th>BPJS</th>
        <th>PNS</th>
        <th>ASKESLAIN</th>
        <th>BAYARSENDIRI</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1 @endphp
      @foreach ($pasien as $p)
      <tr>
        <td>{{ $i++ }}</td>
        <td><strong>{{ $p->TGL }}</strong></td>
        <td>{{ $p->no_rm }}</td>
        <td>{{ $p->NAMA_PASIEN }}</td>
        <td>{{ $p->DIAGNOSA }}</td>
        <td>{{ $p->L }}</td>
        <td>{{ $p->P }}</td>
        <td>{{ $p->BPJS }}</td>
        <td>{{ $p->PNS }}</td>
        <td>{{ $p->ASKESLAIN }}</td>
        <td>{{ $p->BAYARSENDIRI }}</td>


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
      "pageLength": 15,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table-list_wrapper .col-md-6:eq(0)');
    $('#tablelist').DataTable({
      "paging": true,
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

  function filterdata() {
    tglawal = $('#from_date').val()
    tglakhir = $('#to_date').val()


    $.ajax({
      type: "post",
      data: {
        _token: "{{ csrf_token() }}",
        tglawal,
        tglakhir
      },
      url: "{{ route('caridata') }}",
      error: function(data) {

        alert('error!')
      },
      success: function(response) {

        $('.vtabel').html(response);
      }
    });
  }
</script>

@endauth

@stop