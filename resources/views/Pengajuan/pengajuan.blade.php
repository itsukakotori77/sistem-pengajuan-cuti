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
                    <i class="material-icons">library_books</i> Pengajuan Cuti
                </li>
            </ol>
        </div>

        <!-- Body -->
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Pengajuan Cuti</h2>
                                <small>Form Pengajuan Cuti</small>
                            </div>
                        </div>
                    </div>

                    <div class="body">
                        <div class="row">
                            <!-- Images -->
                            <div class="col-sm-6">
                                <img src="{{ asset('asset/images/dayoff.png') }}" alt="">
                            </div>

                            <!-- Form -->
                            <div class="col-sm-6">
                                <h3 class="demo-google-material-icon">
                                    <i class="material-icons">accessibility</i> <strong><span class="icon-name"> Form Pengajuan Cuti</span></strong>
                                </h3>
                                <hr>
                                <form action="{{ url('/pengajuan') }}" id="formPengajuan" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <!-- Input Hidden -->
                                    <input type="hidden" name="User_ID" value="{{ Auth::user()->id }}">

                                    <!-- Jenis Cuti -->
                                    <div class="form-group form-float">
                                        <label for="Jenis_Cuti">Jenis Cuti</label>
                                        <select name="Jenis_Cuti" class="form-control show-tick" id="Jenis_Cuti">
                                            <option disabled selected value="">Pilih Jenis Cuti</option>
                                            <option value="1">Cuti Tahunan</option>
                                            <option value="2">Cuti Sakit</option>
                                            <option value="3">Cuti Besar</option>
                                            <option value="4">Cuti Bersama</option>
                                            <option value="5">Cuti Penting</option>
                                            @if($pegawai->Jenis_Kelamin == 2)
                                                <option value="6">Cuti Hamil</option>
                                            @endif
                                        </select> 
                                    </div>

                                    <!-- Form Input PDF -->
                                    @if($pegawai->Jenis_Kelamin == 2)
                                        <label for="">Upload Kartu Hamil</label>
                                        <div class="form-group">
                                            <input type="file" id="Kartu_Hamil" class="form-control" required name="Surat_Hamil" accept="application/pdf">
                                        </div>
                                    @endif

                                    <!-- Tanggal Mulai dan Berakhir -->
                                    <div class="row">
                                        <!-- Tanggal Mulai -->
                                        <div class="col-sm-6">
                                            <label for="">Tanggal Mulai</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="Tanggal_Mulai" class="form-control datepicker" name="Tanggal_Mulai" placeholder="Tanggal Mulai DD/MM/YYYY">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tanggal Berakhir -->
                                        <div class="col-sm-6">
                                            <label for="">Tanggal Berakhir</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="Tanggal_Berakhir" class="form-control datepicker" name="Tanggal_Berakhir" placeholder="Tanggal Berakhir DD/MM/YYYY">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Alasan Cuti -->
                                    <label for="">Alasan Mengajukan Cuti</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="Alasan" class="form-control" required id="Alasan" cols="30" rows="6" placeholder="Alasan" autofocus></textarea>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block"><strong>Submit</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    @include('Pengajuan.script')

@stop 
