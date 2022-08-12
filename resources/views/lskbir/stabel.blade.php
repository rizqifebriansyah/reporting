@guest
@endguest
@auth

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
