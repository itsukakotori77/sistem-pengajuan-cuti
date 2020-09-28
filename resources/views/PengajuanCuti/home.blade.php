@extends('layoutsFront.master')

@section('content')

    <!-- Home -->
    <div class="banner-area banner-3" autofocus>
        <div class="overlay dark-overlay"></div>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                            <div class="banner-content content-padding" style="margin-top: 30px;">
                                <h5 class="subtitle">PT. Sumber Berkah Logam</h5>
                                <h1 class="banner-title">Pengajuan cuti pegawai PT. Sumber Berkah Logam</h1>
                                <p>Pengajuan cuti yang dapat diajukan adalah cuti tahunan, cuti sakit, cuti besar, cuti bersama, cuti penting dan cuti hamil (Khusus pegawai perempuan)</p>
                                @if(Auth::check())
                                    <a href="{{ url('/pengajuan/cuti/lihat') }}" class="btn btn-white btn-circled">Lihat pengajuan</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Intro -->
    <section id="intro" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="section-heading">
                        <p class="lead">Berikut syarat pengajuan cuti</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5  d-none d-lg-block col-sm-12">
                    <div class="intro-img">
                        <img src="{{ asset('asset/images/dayoff.png') }}" alt="intro-img" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 ">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>01.</span>
                                <h4>Karyawan tetap</h4>
                                <p>Harus karyawan tetap PT. Sumber Berkah Logam.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>02.</span>
                                <h4>Serah terima pekerjaan</h4>
                                <p>Dimaksudkan untuk mengganti pekerjaan yang belum dapat diselesaikan semasa cuti. </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>03.</span>
                                <h4>Merekrut pegawai pengganti sementara</h4>
                                <p>Dimaksudkan agar dapat mencari pengganti selama cuti berlangsung.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="intro-box">
                                <span>04.</span>
                                <h4>Dalam keadaan hamil</h4>
                                <p>Dikhususkan untuk pegawai perempuan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection