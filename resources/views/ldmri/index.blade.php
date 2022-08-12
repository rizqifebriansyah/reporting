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
            <h5 class="m-0">LAPORAN DIAGNOSA MORBIDITAS RAJAL IGD</h5>
        </div>




        <div class="col-md-5">PENCARIAN LAPORAN DIAGNOSA MORBIDITAS RAJAL IGD<b><span id="total_records"></span></b></div>
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
                  <button id="btn-selesai" class="btn btn-success" onclick="caridiagnosa()">Filter</button>
                </div>
              </div>
   
</div>
<div class="col-lg-12">
    <div class="dtabel">
        <table class="table table-bordered mt-3" align="right" id='table-list'>
            <thead>
                <tr>
                    <th rowspan="3" style="vertical-align: middle;">NO</th>
                    <th rowspan="3" style="vertical-align: middle;">GOLONGAN SEBAB PENYAKIT</th>

                    <th colspan="18" style="vertical-align: middle-center;">RENTAN USIA DIAGNOSA </th>
                    <th colspan="2" rowspan="2" style="vertical-align: middle;">KASUS BARU</th>
                    <th rowspan="3" style="vertical-align: middle;">JUMLAH KASUS BARU</th>
                    <th rowspan="3" style="vertical-align: middle;">JUMLAH KUNJUNGAN</th>
                    
                </tr>

                <tr>
                    
                    <th colspan="2">0-6 Hari</th>
                    <th colspan="2">7-28 Hari</th>
                    <th colspan="2">28Hr - 1th</th>
                    <th colspan="2">1 - 4 th</th>
                    <th colspan="2">5 - 14 th</th>
                    <th colspan="2">15-24 th</th>
                    <th colspan="2">25 - 44 th</th>
                    <th colspan="2">45 - 64 th</th>
                    <th colspan="2">LB - 65 th</th>
                </tr>
                <tr>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>

                </tr>

            </thead>
            <tbody>
            @php $i=1 @endphp
        @foreach ($diagnosa as $d)
        <tr>
            <td> {{$i++}}</td>
            <td>{{ $d->GOLONGAN_SEBAB_PENYAKIT }}</td>
            <td>{{ $d->L_UMUR_0_6HR }}</td>
            <td>{{ $d->P_UMUR_0_6HR }}</td>
            <td>{{ $d->L_UMUR_7_28HR }}</td>
            <td>{{ $d->P_UMUR_7_28HR }}</td>
            <td>{{ $d->L_UMUR_28HR_1TH }}</td>
            <td>{{ $d->P_UMUR_28HR_1TH }}</td>
            <td>{{ $d->L_UMUR_1_4_TH }}</td>
            <td>{{ $d->P_UMUR_1_4_TH }}</td>
            <td>{{ $d->L_UMUR_5_14_TH }}</td>
            <td>{{ $d->P_UMUR_5_14_TH }}</td>
            <td>{{ $d->L_UMUR_15_24_TH }}</td>
            <td>{{ $d->P_UMUR_15_24_TH }}</td>
            <td>{{ $d->L_UMUR_25_44_TH }}</td>
            <td>{{ $d->P_UMUR_25_44_TH }}</td>
            <td>{{ $d->L_UMUR_45_64_TH }}</td>
            <td>{{ $d->P_UMUR_45_64_TH }}</td>
            <td>{{ $d->L_UMUR_LB_65_TH }}</td>
            <td>{{ $d->P_UMUR_LB_65_TH }}</td>
            <td>{{ $d->L_KASUS_BARU }}</td>
            <td>{{ $d->P_KASUS_BARU }}</td>
            <td>{{ $d->JUMLAH_KASUS_BARU }}</td>
            <td>{{ $d->JUMLAH_KUNJUNGAN }}</td>
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

  function caridiagnosa() {
    tglawal = $('#from_date').val()
    tglakhir = $('#to_date').val()


    $.ajax({
      type: "post",
      data: {
        _token: "{{ csrf_token() }}",
        tglawal,
        tglakhir
      },
      url: "{{ route('caridatadiagnosa') }}",
      error: function(data) {

        alert('error!')
      },
      success: function(response) {

        $('.dtabel').html(response);
      }
    });
  }
</script>

@endauth

@stop