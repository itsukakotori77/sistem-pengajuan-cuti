<script>

    var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ url('/cuti') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'Nama_Pengaju', name: 'Nama_Pengaju' },
                    { data: 'Tanggal_Pengajuan', name: 'Tanggal_Pengajuan' },
                    { data: 'Jenis_Cuti', name: 'Jenis_Cuti' },
                    { data: 'Periode', name: 'Periode' },
                    { data: 'Surat_Hamil', name: 'Surat_Hamil' },
                    { data: 'Persetujuan', name: 'Persetujuan' },
                    { data: 'Status', name: 'Status' },
                    { data: 'Aksi', name: 'Aksi' },
                ]
            });

    function status(id)
    {
        // Ajax
        $.ajax({
            url : "{{ url('/cuti') }}" + "/" + id,
            type : "GET",
            dataType : "JSON",
            success : function(data)
            {
                $('#ID_Cuti').val("PGJCT0" + data.ID_Cuti);
                $('#ID_Cuti_1').val(data.ID_Cuti);
                $('#ID_Cuti_2').val(data.ID_Cuti);
                $('#Pengaju_Cuti').val(data.Nama_Depan + ' ' + data.Nama_Belakang);
                $('#Alasan_Cuti').val(data.Alasan);

                if(data.Persetujuan == 2 || data.Persetujuan == 0)
                    $('.btnSubmit').attr('disabled', true);
                else 
                    $('.btnSubmit').attr('disabled', false);

                $('#modalCuti').modal('show');
            }
        });

    }

    $(function(){
        $('#btnBack').hide();

        // Btn Decline
        $('#btnDecline').on('click', function(){
            if($('#tab2').hasClass('active').toString())
                $('#btnBack').show();
        });

        // Btn Back
        $('#btnKembali').on('click', function(){
            if($('#tab1').hasClass('active').toString())
                $('#btnBack').hide();
        });

        // Ajax Diterima
        $('#formDiterima').on('submit', function(e){
            e.preventDefault();
            id = $('#ID_Cuti').val();
            // Ajax
            $.ajax({
                url : "{{ url('/perizinan') }}" + "/" + id,
                type : "POST",
                data : $('#formDiterima').serialize(),
                success : function(data)
                {
                    // alert('sukses');
                    $('#modalCuti').modal('hide');
                    setTimeout(function() {
                        $.bootstrapGrowl("Cuti telah diizinkan !", 
                        { 
                            type: 'success',
                            width: 'auto', 
                        });
                    }, 1000);
                    table.ajax.reload();
                }
            });

            return false;
        });

        // Ajax Ditolak
        $('#formDitolak').on('submit', function(e){
            e.preventDefault();

            id = $('#ID_Cuti').val();
            // Ajax
            $.ajax({
                url : "{{ url('/perizinan') }}" + "/" + id,
                type : "POST",
                data : $('#formDitolak').serialize(),
                success : function(data)
                {
                    // alert('sukses');
                    $('#modalCuti').modal('hide');
                    setTimeout(function() {
                        $.bootstrapGrowl("Cuti tidak diizinkan !", 
                        { 
                            type: 'danger',
                            width: 'auto', 
                        });
                    }, 1000);
                    table.ajax.reload();
                }
            });
        });
    });

    function modalImg(id)
    {
        // Ajax
        $.ajax({
            url : "{{ url('/cuti') }}" + "/" + id,
            type : "GET",
            dataType : "JSON",
            success : function(data)
            {
                $('#foto-surat').attr('src', "{{ asset('asset/images/surat-hamil') }}" + "/" + data.Surat_Hamil);
                $('#modal-surat-hamil').modal('show');
            }
        });
    }
    

</script>