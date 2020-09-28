@extends('layouts.master')

@section('css')

    <link href="{{ asset('asset/charts/Chart.min.css') }}" rel="stylesheet" />

@stop 

@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">PENGAJUAN CUTI</div>
                        <div class="number count-to" data-from="0" data-to="{{ count($cuti) }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">PERIZINAN</div>
                        <div class="number count-to" data-from="0" data-to="{{ count($perizinan) }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">PEGAWAI</div>
                        <div class="number count-to" data-from="0" data-to="{{ count($pegawai) }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>Cuti</h2>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <canvas id="bar_chart" class="dashboard-flot-chart" style="height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="header">
                        <h2>DATA PEGAWAI</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Divisi</th>
                                        <th>Atasan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employee as $data)
                                        <tr>
                                            <td>{{  $loop->iteration }}</td>
                                            <!-- @if($data->Foto == '')
                                                <td>
                                                    <div class="text-center">
                                                        <img src="{{ asset('asset/images/foto-user/user.png') }}"alt="" style="width: 70px; border-radius: 50%;">
                                                    </div>
                                                </td>
                                            @else 
                                                <td>
                                                    <div class="text-center">
                                                        <img src="{{ asset('asset/images/foto-user/' . $data->Foto) }}"alt="" style="width: 70px; border-radius: 50%;">
                                                    </div>
                                                </td>
                                            @endif  -->

                                            <!-- Jabatan -->
                                            <td>{{ $data->Nama_Depan . ' ' . $data->Nama_Belakang }}</td>
                                            @if($data->Jabatan == 1)
                                                <td>Direktur</td>
                                            @elseif($data->Jabatan == 2)
                                                <td>Manager</td>
                                            @elseif($data->Jabatan == 3)
                                                <td>Keuangan</td>
                                            @elseif($data->Jabatan == 4)
                                                <td>Purchasing</td>
                                            @else 
                                                <td>Purchasing</td>
                                            @endif

                                            <!-- Divisi -->
                                            @if($data->Divisi == 1)
                                                <td>Bubut</td>
                                            @elseif($data->Divisi == 2)
                                                <td>Miling</td>
                                            @elseif($data->Divisi == 3)
                                                <td>Pengelasan</td>
                                            @elseif($data->Divisi == 4)
                                                <td>Pengecoran</td>
                                            @elseif($data->Divisi == 5)
                                                <td>Perangkaian</td>
                                            @elseif($data->Divisi == 6)
                                                <td>Gudang</td>
                                            @else 
                                                <td>Operasional</td>
                                            @endif
                                            <td>{{ $data->Atasan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>Cuti yang diajukan</h2>
                    </div>
                    <div class="body" style="height: 300px;">
                        <canvas id="donut_chart" class="dashboard-donut-chart" style="width: 500px;"></canvas>
                        <div class="text-center" style="margin-top: 50px;">
                            <span>Total Pengajuan Cuti : <strong>{{ count($cuti) }}</strong></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Browser Usage -->
        </div>
        
    </div>

@endsection 

@section('js')

    @include('Home.script')

@stop 
