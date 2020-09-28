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
                    <i class="material-icons">library_books</i> User
                </li>
            </ol>
        </div>

        <input type="hidden" id="id_user">

        <!-- Form Hidden 1 -->
        <form action="#" method="POST" id="formValue0">
            {{ csrf_field() }}
            <input type="hidden" name="_method" val="PUT">
        </form>

        <!-- Form Hidden 2 -->
        <form action="#" method="POST" id="formValue1">
            {{ csrf_field() }}
            <input type="hidden" name="_method" val="PUT">
        </form>

        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Daftar User</h2>
                                <small>User yang terdaftar pada sistem</small>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example datatable">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Avatar</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th width="10%">Role</th>
                                    <th width="10%">Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 

@section('js')

    <script>
        var table = $('.datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        responsive: true,
                        ajax: "{{ url('/user') }}",
                        columns: [
                            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                            { data: 'avatar', name: 'avatar' },
                            { data: 'name', name: 'name' },
                            { data: 'email', name: 'email' },
                            { data: 'role', name: 'role' },
                            { data: 'status', name: 'status' },
                            { data: 'aksi', name: 'aksi' },
                        ]
                    });

        // Aktif
        function statusAktif(id)
        {
            csrf_token = $('meta[name="csrf_token"]').attr('content');

            $.ajax({
                url : "{{ url('/user/ubahstatus') }}" + "/" + id,
                type : "POST",
                data : {"_method" : "PUT", "_token" : csrf_token},
                success : function(data)
                {
                    setTimeout(function() {
                        $.bootstrapGrowl("Status Berhasil Diubah !", 
                        { 
                            type: 'success',
                            width: 'auto', 
                        });
                    }, 1000);
                    table.ajax.reload();
                },
                error : function(error)
                {
                    console.log(error);
                }
            });
        }
    </script>

@stop 