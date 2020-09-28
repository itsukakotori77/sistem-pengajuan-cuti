@extends('layouts.master')

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
                    <i class="material-icons">library_books</i> Pegawai
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
                                <h2>Tabel Pegawai</h2>
                                <small>Data Pegawai yang terdaftar pada sistem</small>
                            </div>
                            <div class="col-sm-6">
                                <div class="pull-right">
                                    <button type="button" id="btnAdd" onclick="addData()" class="btn btn-success">
                                        <i class="material-icons">person_add</i>
                                        <strong> Tambah Data Pegawai</strong>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Divisi</th>
                                    <th>Atasan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    @include('Pegawai.modal')

@endsection

@section('js')

    @include('Pegawai.script')
    
@stop 