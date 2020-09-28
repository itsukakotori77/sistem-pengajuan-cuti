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
                    <i class="material-icons">library_books</i> Pengajuan Cuti
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
                                <h2>Pengajuan Cuti</h2>
                                <small>Form pengajuan cuti</small>
                            </div>
                            <div class="col-sm-6">
                                <div class="pull-right">
                                    <a href="{{ url('/pengajuan') }}" class="btn btn-info btn-lg"><strong>Kembali</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                <!-- <b>Panel Success</b> -->
                                <div class="panel-group" id="accordion_2" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-success">
                                        <div class="panel-heading" role="tab" id="headingOne_2">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" class="text-center" data-parent="#accordion_2" href="#collapseOne_2" aria-expanded="true" aria-controls="collapseOne_2">
                                                    Pemberitahuan
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                            <div class="panel-body">
                                                <div class="text-center">
                                                    <h1 class="font-proxima text-green" style="color: #2f2f2f;">Berhasil !!</h1>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="text-center">
                                                            <img src="{{ asset('asset/images/flat.png') }}" alt="" style="width: 300px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="font-proxima" style="color: #2f2f2f; font-size: 20px; margin-top: 40px;">
                                                            Pengajuan cuti anda telah selesai dilakukan, selanjutkan akan ada persetujuan dari pihak pimpinan divisi
                                                            untuk menyetujui apakah pengajuan cuti anda dapat diterima atau tidak.
                                                        </p>
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
            </div>
        </div>
    </div>

@endsection 