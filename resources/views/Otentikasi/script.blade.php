<script>
    $(function(){
        $('#btnSubmit').attr('disabled', true);

        $('#btnPrev').attr('disabled', true);
        $(".uploads").change(readURL)
        $("#f").submit(function(){
            // do ajax submit or just classic form submit
            //  alert("fake subminting")
            return false;
        });

        // Jquery Validator
        $(".form-profile").validate({
            errorElement: 'label',
            errorPlacement: function (error, element) {
                error.addClass('error');
                element.closest('.form-line').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $('.form-line').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $('.form-line').removeClass('error');
            }
        });
    });
    
    // Read URL
    function readURL() 
    {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#avatar_user').attr('src', e.target.result);
                // var croppr = new Croppr('#avatar', {
                //     onInitialize: (instance) => { console.log(instance); },
                //     onCropStart: (data) => { console.log('start', data); },
                //     onCropEnd: (data) => { console.log('end', data); },
                //     onCropMove: (data) => { console.log('move', data); }
                // });
            }
            reader.readAsDataURL(input.files[0]);
            // setTimeout(initCropper, 1000);
        }
    }
        
    function initCropper()
    {
        var image = document.getElementById('avatar');
        var cropper = new Cropper(image, {
            aspectRatio: 16 / 9,
            crop(event) {
                console.log(event.detail.x);
                console.log(event.detail.y);
                console.log(event.detail.width);
                console.log(event.detail.height);
                console.log(event.detail.rotate);
                console.log(event.detail.scaleX);
                console.log(event.detail.scaleY);
            },
        });

        // On crop button clicked
        $('#btnSave').on('click', function(){
            var imgurl =  cropper.getCroppedCanvas().toDataURL();
            var img = document.createElement("img");
            img.src = imgurl;
            document.getElementById("cropped_result").appendChild(img);

            /* ---------------- SEND IMAGE TO THE SERVER-------------------------

                cropper.getCroppedCanvas().toBlob(function (blob) {
                    var formData = new FormData();
                    formData.append('croppedImage', blob);
                    // Use `jQuery.ajax` method
                    $.ajax('/path/to/upload', {
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function () {
                        console.log('Upload success');
                        },
                        error: function () {
                        console.log('Upload error');
                        }
                    });
                });
            ----------------------------------------------------*/
        });
    }

    function lihatFoto()
    {
        $('#modalUploadFoto').modal('show');
    }

    // Submit Cek
    function submitCheck()
    {
        if($('#terms_condition_check').prop('checked') == true)
            $('#btnSubmit').attr('disabled', false)
        else 
            $('#btnSubmit').attr('disabled', true)
    }

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

    // Notif 
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