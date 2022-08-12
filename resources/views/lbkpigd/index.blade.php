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
      <h5 class="m-0">LAPORAN BULANAN KUNJUNGAN PASIEN IGD DETAIL</h5>
    </div>




    <div class="col-md-5">PENCARIAN LAPORAN BULANAN KUNJUNGAN PASIEN IGD DETAIL <b><span id="total_records"></span></b></div>
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
        <button id="btn-selesai" class="btn btn-success" onclick="filterdata()">Filter</button>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="vtabel">
      <table class="table table-bordered mt-3" id='table-list'>
        <thead>
          <tr>
            <th>NO</th>
            <th>TANGGAL</th>
            <th>NO REKAMEDIS</th>
            <th>NAMA PASIEN</th>
            <th>DIAGNOSA</th>
            <th>LAKI-LAKI</th>
            <th>PEREMPUAN</th>
            <th>BPJS</th>
            <th>PNS</th>
            <th>ASKES LAIN</th>
            <th>BAYAR SENDIRI</th>
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
      "pageLength": 5,
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