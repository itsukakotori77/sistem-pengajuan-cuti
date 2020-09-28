<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Pengajuan Cuti Kepegawaian</title>

    @include('Otentikasi.linkcss')

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><img src="{{ asset('asset/images/Logo.png') }}" style="width: 50px;"> <strong class="font-proxima" style="font-size: 25px; color: #474545;">PT. Sumber Berkah Logam</strong></a>
            <small style="color: #474545;">Sistem Pengajuan Cuti Pegawai</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="msg">Silahkan login dengan akun anda</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                        @error('email') 
                            <div class="form-line error">
                                <b class="error">{{ $message }}</b>
                            </div>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" autocomplete="off" name="password" placeholder="Password" required>
                        </div>
                        @error('password') 
                            <div class="form-line error">
                                <b class="error">{{ $message }}</b>
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block btn-danger waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6 align-right">
                            <div class="pull-left">
                                <!-- <a href="{{ url('/forgot_password') }}">Lupa Password?</a> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('Otentikasi.linkjs')
    
</body>

</html>