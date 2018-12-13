@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Data Surat</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="surat-datatable" class="table table-striped table-bordered table-hover dataTable">
          <thead>
          <tr>
            <th>#</th>
            <th>Jenis</th>
            <th>Pengirim</th>
            <th>Tgl. Srt</th>
            <th>Tgl. Krm</th>
            <th>No. Srt</th>
            <th>Subject</th>
            <th>Ringkasan</th>
            <th>Tgl. Sistem</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($surats as $surat)
                <tr>
                    <td>{{ $surat->id }}</td>
                    <td>{{ $surat->type->name }}</td>
                    <td>{{ $surat->sender->fullName }}</td>
                    <td>{{ $surat->letter_date }}</td>
                    <td>{{ $surat->send_date }}</td>
                    <td>00{{ $surat->id }}/{{ $surat->number }}</td>
                    <td>{{ $surat->subject }}</td>
                    <td>{{ $surat->summary }}</td>
                    <td>{{ $surat->created_at }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{-- workorder modal --}}
        {{-- @include('workorder.create_modal') --}}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("AdminLTE/plugins/datatables/dataTables.bootstrap.css") }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.css"/>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset("AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.js"></script>

<script>
 $(function () {
    $('#surat-datatable').DataTable({
      responsive: true,
      "aaSorting" : [[0,"desc"]],
      dom: 'Bfrtip',
        buttons: [
            { 
              extend:'copy', 
              attr: { id: 'allan' },
              text:      '<i class="fa fa-files-o"></i> Copy',
              titleAttr: 'Copy rows to clipboard',
              exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                }
              },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                messageTop: 'Data Surat Report',
                title: 'Data Surat ' + '{{ config('app.name') }}',
                text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'Export rows to PDF format',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                },
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i> CSV',
                titleAttr: 'Export rows to CSV format',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                },
                title: 'Data Surat ' + '{{ config('app.name') }}'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i> Excel',
                titleAttr: 'Export rows to Excel format',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                },
                title: 'Data Surat ' + '{{ config('app.name') }}'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> Print',
                titleAttr: 'Print rows',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                },
                title: 'Data Surat ' + '{{ config('app.name') }}'
            },
        ]
    });
  });
</script>
@endsection