@guest
@endguest
@auth
<table class="table table-bordered mt-3" align="right" id='table-list'>
    <thead>
        <tr>
            <th rowspan="2" style="vertical-align: middle;">NO</th>
            <th rowspan="2" style="vertical-align: middle;">PENJAMIN</th>
            <th rowspan="2" style="vertical-align: middle;">JENIS_PELAYANAN</th>

            <th colspan="4" style="vertical-align: middle-center;">PASIEN INSTALASI GAWAT DARURAT </th>
            <th rowspan="2" style="vertical-align: middle;">TOTALJENIS_PELAYANAN</th>
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
</script>

@endauth