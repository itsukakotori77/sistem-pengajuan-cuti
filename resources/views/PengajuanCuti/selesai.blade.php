@extends('layoutsFront.master')

@section('content')

    <section id="testimonial" class="section-padding ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="mb-5">
                        <h3 class="mb-2">Selesai !!</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 m-auto col-sm-12 col-md-12">
                    <div class="carousel slide" id="test-carousel2">
                        <div class="carousel-inner">
                            <ol class="carousel-indicators">
                                <li data-target="#test-carousel2" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="testimonial-content style-2">
                                            <div class="author-info ">
                                                <div class="author-img">
                                                    <img src="{{ asset('asset/images/flat.png') }}" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <p>
                                                Pengajuan cuti anda telah selesai dilakukan, selanjutnya akan ada persetujuan dari pihak pimpinan divisi
                                                untuk menyetujui apakah pengajuan cuti anda dapat diterima atau tidak.
                                            </p>
                                            <div class="author-text">
                                                <!-- <h5>Marine Joshi</h5>
                                                <p>Senior designer</p> -->
                                                <div class="text-center">
                                                    <a href="{{ url('/pengajuan/cuti/form') }}" class="btn btn-primary">Kembali</a>
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
    </section>

@endsection

