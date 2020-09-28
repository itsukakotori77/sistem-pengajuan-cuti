<script>
    $(function() {
        $('#btnBack').hide();
        $('.uploads').change(readURL)
        $('#f').submit(function(){
            // do ajax submit or just classic form submit
            //  alert("fake subminting")
            return false;
        });

        // Ajax Data
        $.ajax({
            url : "{{ url('/pegawai/datapegawai') }}",
            type : "GET",
            dataType : "JSON",
            success : function(data)
            {
                $.each(data,function(Nama_Depan, value)
                {
                    $("#Atasan").append('<option value="'+ value.Nama_Depan + ' ' + value.Nama_Belakang +'">'+value.Nama_Depan+ ' ' +value.Nama_Belakang+'</option>');
                });
                $('#Atasan').selectpicker('refresh');
            }
        });

        // Input Data
        $('#formPegawai').on('submit', function (e){
            // Ajax
            if(!e.isDefaultPrevented()){
                var id = $('#id').val();
                if(save_method == 'add'){
                    url = "{{ url('/pegawai') }}";
                } 
                else {
                    url = "{{ url('/pegawai') }}" + "/"  + id + "/edit";
                }   

                // Ajax
                $.ajax({
                    url : url,
                    type : "POST",
                    // data : $('#formPegawai').serialize(),
                    data : new FormData(this),
                    processData : false,
                    contentType : false,
                    success : function(data)
                    {
                        $('#pegawaiModal').modal('hide');
                        setTimeout(function() {
                            $.bootstrapGrowl("Eksekusi Berhasil Dijalankan !", 
                            { 
                                type: 'success',
                                width: 'auto', 
                            });
                        }, 1000);

                        table.ajax.reload();
                    },
                    error  : function(error)
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan pada proses input data!'
                        });
                        console.log(error);
                    }
                });
                return false;
            }
        });
    
        // Skenario Button
        $('#btnNext').on('click', function(){
            if($('#form2').hasClass('active').toString())
            {
                $('#btnBack').show();
                $('#btnGo').hide();
            }
        });

        $('#btnPrev').on('click', function(){
            if($('#form1').hasClass('active').toString())
            {
                $('#btnBack').hide();
                $('#btnGo').show();
            }
        });

        // Jquery Validator
        $("#formPegawai").validate({
            errorElement: 'label',
            errorPlacement: function (error, element) {
                error.addClass('error');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $('.form-line').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $('.form-line').removeClass('error');
            }
        });

        // Datepicker
        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'DD/MM/YYYY',
            time: false,
            clearButton: true
        });
    });

    var table = $('.datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: "{{ url('/pegawai') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'Foto', name: 'Foto' },
                        { data: 'Nama', name: 'Nama' },
                        { data: 'Jabatan', name: 'Jabatan' },
                        { data: 'Divisi', name: 'Divisi' },
                        { data: 'Atasan', name: 'Atasan' },
                        { data: 'aksi', name: 'aksi' },
                    ]
                });

    function readURL() 
    {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#avatar').attr('src', e.target.result);
                var croppr = new Cropper('#avatar', {
                    onInitialize: (instance) => { console.log(instance); },
                    onCropStart: (data) => { console.log('start', data); },
                    onCropEnd: (data) => { console.log('end', data); },
                    onCropMove: (data) => { console.log('move', data); }
                });

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Add Data
    function addData()
    {
        save_method = "add";
        $('#form-email').show();
        $('#form-password').show();
        $('#form-retype').show();
        $('#formPegawai')[0].reset();
        $('#pegawaiModal').modal('show');
    }

    // Update Data
    function updateData(id)
    {
        save_method = "edit";
        $('input[name=_method').val('PUT');
        // Ajax
        $.ajax({
            url : "{{ url('/pegawai') }}" + "/" + id + "/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data)
            {
                // Insert Data
                $('#id').val(data.ID_Pegawai);
                $('#Nama_Depan').val(data.Nama_Depan);
                $('#Nama_Belakang').val(data.Nama_Belakang);
                $('#Jenis_Kelamin').val(data.Jenis_Kelamin);
                $('#Alamat').val(data.Alamat);
                $('#Tempat_Lahir').val(data.Tempat_Lahir);
                $('#Tanggal_Lahir').val(moment(data.Tanggal_Lahir, 'YY-MM-DD').format('DD/MM/YYYY'));
                $('#Jabatan').val(data.Jabatan);
                $('#Divisi').val(data.Divisi);
                $('#Atasan').val(data.Atasan);
                $('#Email').val(data.Email);
                
                // $('#Foto_Avatar').val(data.Foto);
                $('#avatar').attr('src', "{{ asset('asset/images/foto-user') }}" + "/" + data.Foto);

                // Hide
                $('#Email').attr('readonly', true);
                $('#form-email').hide();
                $('#form-password').hide();
                $('#form-retype').hide();

                // Modal Show
                $('#pegawaiModal').modal('show');
            }
        });
    }

    // Validation
    function check() 
    {
        if ((document.getElementById('Password').value == document.getElementById('Retype_Password').value))
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

   
</script>
