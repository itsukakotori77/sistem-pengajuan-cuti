@extends('layoutsFront.master')

@section('content')

    <section id="pricing" class="section-padding bg-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 m-auto">
                    <div class="section-heading">
                        <h4 class="section-title">Ubah Profil</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 m-auto">
                    <div class="section-heading">
                        <form action="{{ url('/user/profile/' . Auth::user()->id ) }}" method="POST" class="form-profile">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <!-- Username -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="">Username</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="Username" name="Username" placeholder="{{ $user->name }}" value="{{ $user->name }}" readonly required>
                                    </div>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="{{ $user->email }}" value="{{ $user->email }}" readonly required>
                                    </div>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="">Password</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Retype New Password -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="">Retype - Password</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="Retype-Password" onkeyup="check()" name="Retype-Password" placeholder="Retype - Password">
                                    </div>
                                </div>
                                <h4 id="message" class="font-proxima"></h4>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" id="btnSubmit" class="btn btn-success btn-sm">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')

    <script>
        function check() 
        {
            if ((document.getElementById('Password').value == document.getElementById('Retype-Password').value))
            {
                document.getElementById('btnSubmit').disabled = false;
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Sama';
            } 
            else {
                document.getElementById('btnSubmit').disabled = true;
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Tidak Sama';
            }
        }

        @if(session('message'))
            setTimeout(function() {
                $.bootstrapGrowl("{{ session('message') }}", 
                { 
                    type: 'success',
                    width: 'auto', 
                });
            }, 1000);
        @endif

    </script>

@stop 