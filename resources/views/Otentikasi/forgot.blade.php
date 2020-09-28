<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Pengajuan Cuti Kepegawaian</title>

    @include('Otentikasi.linkcss')

</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);"><img src="{{ asset('asset/images/Logo.png') }}" style="width: 50px;"> <strong class="font-proxima" style="font-size: 25px; color: #474545;">PT. Sumber Berkah Logam</strong></a>
            <small style="color: #474545;">Sistem Pengajuan Cuti Pegawai</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" action="{{ route('password.update') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="msg">
                        Masukkan email untuk melakukan reset password yang ada. 
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg btn-danger waves-effect" type="submit">RESET MY PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="{{ url('/') }}">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('Otentikasi.linkjs')

</body>
</html>