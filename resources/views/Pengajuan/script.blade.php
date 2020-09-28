<script>
    $(function(){
        var startDate = new moment();
        $("#Tanggal_Mulai").bootstrapMaterialDatePicker('setMinDate', startDate.format('DD/MM/YYYY'));
        $("#Tanggal_Berakhir").bootstrapMaterialDatePicker('setMinDate', startDate.format('DD/MM/YYYY'));
        
        // Datepicker
        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'DD/MM/YYYY',
            daysOfWeekDisabled: [0,6],
            time: false,
            clearButton: true
        });
    
        // Change Date
        $("#Tanggal_Mulai").on('change', function(e, date) {
            $("#Tanggal_Berakhir").bootstrapMaterialDatePicker('setDate', date);
            $("#Tanggal_Berakhir").bootstrapMaterialDatePicker('setMinDate', date);
            
            if(process($("#Tanggal_Mulai").val()) > process($("#Tanggal_Berakhir").val()))
                $("#Tanggal_Berakhir").val($("#Tanggal_Mulai").val());
        });
    
        function process(date)
        {
            var parts = date.split("/");
            return new Date(parts[2], parts[1] - 1, parts[0]);
        }
    
        $("#formPengajuan").validate({
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
    });


</script>