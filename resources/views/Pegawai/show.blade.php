@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-8" style="margin-left: 200px;">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="row">
                            <div class="image-area">
                                @if($pegawai->Foto == NULL)
                                    <img src="{{ asset('asset/images/foto-user/user.png') }}" style="width: 170px;" alt="AdminBSB - Profile Image" />
                                @else 
                                    <img src="{{ asset('asset/images/foto-user/' . $pegawai->Foto) }}" style="width: 170px;" alt="AdminBSB - Profile Image" />
                                @endif

                            </div>
                            <div class="content-area">
                                <!-- Nama -->
                                <h3>{{ $pegawai->Nama_Depan . ' ' .  $pegawai->Nama_Belakang }}</h3>
                                
                                <!-- Divisi -->
                                @if($pegawai->Divisi == 1)
                                    <h4>Miling</h4>
                                @elseif($pegawai->Divisi == 2)
                                    <h4>Bubut</h4>
                                @elseif($pegawai->Divisi == 3)
                                    <h4>Pengelasan</h4>
                                @elseif($pegawai->Divisi == 4)
                                    <h4>Pengecoran</h4>
                                @elseif($pegawai->Divisi == 5)
                                    <h4>Perangkaian</h4>
                                @elseif($pegawai->Divisi == 6)
                                    <h4>Gudang</h4>
                                @else
                                    <h4>Operasional</h4>
                                @endif
                                
                                <!-- Jabatan -->
                                @if($pegawai->Jataban == 1)
                                    <p>Direktur</p>
                                @elseif($pegawai->Jabatan == 2)
                                    <p>Manager</p>
                                @elseif($pegawai->Jabatan == 2)
                                    <p>Keuangan</p>
                                @elseif($pegawai->Jabatan == 2)
                                    <p>Purchasing</p>
                                @else 
                                    <p>Administrasi</p>
                                @endif
                                    
                            </div>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <div class="title">
                                    <i class="material-icons">edit</i>
                                    <strong>Jenis Kelamin</strong>
                                </div>
                                <div class="content">
                                    @if($pegawai->Jenis_Kelamin == 1)
                                        <div class="text-center">
                                            <h4><span class="label bg-red">Laki - laki</span></h4>
                                        </div>
                                    @else 
                                        <div class="text-center">
                                            <h4><span class="label bg-red">Perempuan</span></h4>
                                        </div>
                                    @endif
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">location_on</i>
                                    <strong>Tempat Tanggal Lahir</strong>
                                </div>
                                <div class="content">
                                    {{ $pegawai->Tempat_Lahir }}, {{ date('d/m/Y', strtotime($pegawai->Tanggal_Lahir)) }}
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">library_books</i>
                                    <strong>Alamat</strong>
                                </div>
                                <div class="content">
                                    {{ $pegawai->Alamat }}
                                </div>
                            </li> 
                            <li>
                                <div class="title">
                                    <i class="material-icons">email</i>
                                    <strong>Email</strong>
                                </div>
                                <div class="content">
                                    {{ $user->email }}
                                </div>
                            </li>
                            <li>
                                <a href="{{ url('/pegawai') }}" class="btn btn-sm btn-primary btn-block"><strong>Kembali</strong></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function(){
            $('#btnSubmit').attr('disabled', true)
        });

        function submitCheck()
        {
            if($('#terms_condition_check').prop('checked') == true)
                $('#btnSubmit').attr('disabled', false)
            else 
                $('#btnSubmit').attr('disabled', true)
        }
    </script>
@stop 