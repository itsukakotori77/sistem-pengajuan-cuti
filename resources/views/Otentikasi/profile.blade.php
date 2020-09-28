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
                    <i class="material-icons">supervisor_account</i> Profile
                </li>
            </ol>
        </div>

        <!-- Content Body -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            @if(Auth::user()->avatar == '')
                                <img id="avatar_user" src="{{ asset('asset/images/foto-user/user.png') }}" alt="AdminBSB - Profile Image" style="width: 150px; height: 150px;" />
                            @else 
                                <img id="avatar_user" src="{{ asset('asset/images/foto-user/' . Auth::user()->avatar ) }}" alt="AdminBSB - Profile Image" style="width: 150px; height: 150px;" />
                            @endif
                        </div>
                        <div class="content-area">
                            <!-- Nama -->
                            <h3>{{ Auth::user()->name }}</h3>

                            <!--  -->
                            @if(Auth::user()->role == 1)
                                <p>Direktur</p>
                            @elseif(Auth::user()->role == 2)
                                <p>Manager</p>
                            @elseif(Auth::user()->role == 3)
                                <p>Keuangan</p>
                            @elseif(Auth::user()->role == 4)
                                <p>Purchasing</p>
                            @elseif(Auth::user()->role == 5)
                                <p>Administrasi</p>
                            @endif 

                            <!-- <p>Administrator</p> -->
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Status</span>
                                @if(Auth::user()->status == 1)
                                    <span class="label label-success">Aktif</span>
                                @else 
                                    <span class="label label-danger">Tidak Aktif</span>
                                @endif
                            </li>
                            <li>
                                <span>Bergabung Sejak</span>
                                <span>{{ date('d - F - Y', strtotime(Auth::user()->created_at)) }}</span>
                            </li>
                        </ul>
                        <!-- <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button> -->
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                <div class="pull-right">
                                    <li role="presentation"><a href="{{ url('/home') }}" class="btn btn-sm btn-primary"><strong>Kembali</strong></a></li>
                                </div>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                    <form class="form-horizontal form-profile" action="{{ url('/user/profile/' . Auth::user()->id ) }}" id="formProfile" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}

                                        <!-- Username -->
                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-3 control-label">Username</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="Username" name="Username" placeholder="Username" value="{{ Auth::user()->name }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="Email" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="Password" name="Password" placeholder="New Password">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Retype Password -->
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" onkeyup="check()" id="Retype-Password" name="Retype-Password" placeholder="New Password (Confirm)">
                                                </div>
                                                <h4 id="message" class="font-proxima"></h4>
                                            </div>
                                        </div>

                                        <!-- File -->
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">Upload Avatar</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="file" class="form-control uploads" id="Upload_Avatar" name="Foto_Avatar" accept="image/x-png,image/gif,image/jpeg">
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-2">
                                                <button type="button" class="btn btn-primary btn-sm btn-block" onclick="lihatFoto()">Lihat Foto</button>
                                            </div> -->
                                        </div>

                                        <!-- Submit Check -->
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <input type="checkbox" id="terms_condition_check" onclick="submitCheck()" class="chk-col-red filled-in" />
                                                <label for="terms_condition_check">Saya setuju <a href="#"></a></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" id="btnSubmit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Otentikasi.modal')

@endsection 

@section('js')

    @include('Otentikasi.script')

@stop 