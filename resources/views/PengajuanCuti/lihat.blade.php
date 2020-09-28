@extends('layoutsFront.master')

@section('content')

    <section id="pricing" class="section-padding bg-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 m-auto">
                    <div class="section-heading">
                        <h4 class="section-title">Pengajuan Cuti</h4>
                        <p>Riwayat cuti yang diajukan </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pull-right">
                    <a href="{{ url('/pengajuan/cuti') }}" class="btn btn-secondary">Kembali</a>  
                </div>
                <div class="col-sm-12">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pengaju</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status Cuti</th>
                                <th>Aksi</th>
                                <!-- <th>Cetak Surat</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')

    <script>
        var table = $('.datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    searching: false,
                    lengthChange: false,
                    ajax: "{{ url('/pengajuan/cuti/lihat') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'Nama', name: 'Nama' },
                        { data: 'Tanggal_Pengajuan', name: 'Tanggal_Pengajuan' },
                        { data: 'Status', name: 'Status' },
                        { data: 'Cetak', name: 'Cetak' }
                    ]
                });

        function selesai(id)
        {
            csrf_token = $('meta[name="csrf_token"]').attr('content');

            Swal.fire({
                title: 'Apakah anda ingin menghentikan cuti ?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: 'Jangan simpan',
            }).then((result) => {
                if (result.isConfirmed) 
                {
                    $.ajax({
                        url: "{{ url('/pengajuan/cuti/stop') }}" + "/" + id,
                        type: "POST",
                        data: {"_method" : "PUT", "_token" : csrf_token},
                        success: function(data)
                        {
                            setTimeout(function() {
                                    $.bootstrapGrowl("Cuti telah diselesaikan !", 
                                    { 
                                        type: 'success',
                                        width: 'auto', 
                                    });
                            }, 1000);
                            table.ajax.reload();
                        }
                    });
                    // Swal.fire('Saved!', '', 'success');
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info');
                }
            });
           
        }
    </script>

@stop 