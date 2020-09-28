@extends('layouts.master')

<!-- Content -->
@section('content')

    <div class="container-fluid">
        <!-- section header -->
        <div class="block-header">
            <ol class="breadcrumb">
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons">home</i> Home
                    </a>
                </li>
                <li class="active">
                    <i class="material-icons">library_books</i> Perizinan Cuti
                </li>
            </ol>
        </div>

        <!-- section body -->
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Tabel Perizinan Cuti</h2>
                                <small>Data cuti yang diizinkan</small>
                            </div>
                            <div class="col-sm-6">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Laporan <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" style="margin-left: -100px;">
                                            <li><a href="{{ url('/cuti/laporan/disetujui') }}">Laporan Disetujui</a></li>
                                            <li><a href="{{ url('/cuti/laporan/tidakdisetujui') }}">Laporan Tidak Disetujui</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Persetujuan</th>
                                    <th>Pemegang Persetujuan</th>
                                    <th>Catatan</th>
                                    <th>Status Perizinan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 

@section('js')

    <script>
        var table = $('.datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: "{{ url('/perizinan') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'Tanggal_Persetujuan', name: 'Tanggal_Persetujuan' },
                        { data: 'Pemegang_Persetujuan', name: 'Pemegang_Persetujuan' },
                        { data: 'Catatan', name: 'Catatan' },
                        { data: 'Status_Perizinan', name: 'Status_Perizinan' },
                        { data: 'Aksi', name: 'Aksi' },
                    ]
                });
    </script>

@stop 