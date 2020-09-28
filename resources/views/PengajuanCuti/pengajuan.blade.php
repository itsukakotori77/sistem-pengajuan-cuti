@extends('layoutsFront.master')

@section('content')
    <!-- Form Pengajuan -->
    <section id="about" class="bg-light">
      <div class="about-bg-img d-none d-lg-block d-md-block"></div>
        <div class="container">
            <div class="row">
              <div class="col-lg-7 col-sm-12 col-md-8">
                <div class="about-content">
                  <form action="{{ url('/pengajuan/cuti') }}" id="formPengajuan" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                                <option value="6">Cuti Hamil</option>
                            </select> 
                        </div>

                        <div id="form-hamil">
                            @if($pegawai->Jenis_Kelamin == 2)
                                <!-- Form Input PDF -->
                                <label for="">Upload Kartu Hamil</label>
                                <div class="form-group">
                                    <input type="file" id="Kartu_Hamil" class="form-control" name="Kartu_Hamil" accept="image/*">
                                </div>
                            @endif
                        </div>
    
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
                                <textarea name="Alasan" class="form-control" required id="Alasan" cols="30" rows="6" placeholder="Alasan"></textarea>
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
    </section>

@endsection

@section('js')

    @include('PengajuanCuti.script')

@stop

