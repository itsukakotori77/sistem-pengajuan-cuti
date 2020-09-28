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
                    <i class="material-icons">library_books</i> Cuti
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
                                <h2>Tabel Cuti</h2>
                                <small>Daftar pengajuan cuti yang telah dibuat</small>
                            </div>
                        </div>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pengaju</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Jenis Cuti</th>
                                    <th>Periode Cuti</th>
                                    <th>Surat Hamil</th>
                                    <th>Persetujuan</th>
                                    <th>Status Cuti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Cuti.modal')
    @include('Cuti.modalImg')

@endsection

@section('js')

    @include('Cuti.script')

@stop 