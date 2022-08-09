@auth
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
            <td> {{$i++}}</td>
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