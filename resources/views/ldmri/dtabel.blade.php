@guest
@endguest
@auth
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

        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<script>
  $(function() {
    $("#table-list").DataTable({
      "sortable": true,
      "responsive": true,
      "lengthChange": false,
      "serverside": true,
      "pageLength": 15,
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
</script>

@endauth