<script>
    CKEDITOR.replace('noidung',{
    	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
    	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
    CKEDITOR.replace('noidung2',{
    	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
    	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
</script>
<script type="text/javascript">
	var form3 = $('#box_form');
    var error3 = $('.alert-danger', form3);
    var success3 = $('.alert-success', form3);

    // IMPORTANT: update CKEDITOR textarea with actual content before submit
    form3.on('submit', function() {
        for(var instanceName in CKEDITOR.instances) {
            CKEDITOR.instances[instanceName].updateElement();
        }
    })

    form3.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules: {
            noidung: {
                required: true
            },
            noidung2: {
                required: true
            }
        },

        messages: { // custom messages for radio buttons and checkboxes
            noidung: {
                required: "Vui lòng nhập nội dung"
            },
            noidung2: {
                required: "Vui lòng nhập nội dung",
                //minlength: jQuery.validator.format("Please select  at least {0} types of Service")
            }
        },


        invalidHandler: function (event, validator) { //display error alert on form submit   
            success3.hide();
            error3.show();
            App.scrollTo(error3, -200);
        },

        highlight: function (element) { // hightlight error inputs
           $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function (form) {
            success3.show();
            error3.hide();
            $('#ok').hide();
            $('#cancel').hide();
            App.scrollTo(error3, -200);
            form3[0].submit(); // submit the form
        }

    });

     //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
    $('.select2me', form3).change(function () {
        form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });

    //initialize datepicker
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });
    $('.date-picker .form-control').change(function() {
        form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
    })
</script>