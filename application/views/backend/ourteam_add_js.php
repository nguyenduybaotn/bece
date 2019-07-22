<script src="<?php echo base_url('themes/plugins/app.min.js');?>" ></script>
<script src="<?php echo base_url('themes/plugins/app.min.js');?>" ></script>
<script src="<?php echo base_url('themes/plugins/jquery-validation/js/jquery.validate.min.js');?>" ></script>
<script src="<?php echo base_url('themes/plugins/jquery-validation/js/additional-methods.min.js');?>" ></script>

<script src="<?php echo base_url('themes/plugins/nnv-validation/nnv.validate.js'); ?>" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url('ckfinder/ckfinder.js'); ?>"></script>

<script>
    CKEDITOR.replace('thongtin',{
    	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
    	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
    CKEDITOR.replace('thongtin2',{
    	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
    	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
    
    function openPopup_img(){
        CKFinder.popup({
            height: 550,
            chooseFiles: true,
            onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                    document.getElementById( 'img' ).value = file.getUrl();
                    document.getElementById( 'preview_img' ).src = file.getUrl();
                    
                });
                finder.on( 'file:choose:resizedImage', function( evt ){
                    document.getElementById( 'img' ).value = evt.data.resizedUrl;
                    document.getElementById( 'preview_img' ).src = file.getUrl();
                });
            }
        });
    }
    $('#img').keyup(function() {
        var SrcImg= $('#img').val();
        if(SrcImg != ""){
            $('#preview_img').attr('src',SrcImg);
        }else{
            $('#preview_img').removeAttr('src');
        }
    });

</script>
<script type="text/javascript">
	var flag = 0;
	function validaForm(){
	    //IMPORTANT: update CKEDITOR textarea with actual content before submit
        //$('#box_form').on('submit', function() {
            for(var instanceName in CKEDITOR.instances) {
                CKEDITOR.instances[instanceName].updateElement();
            }
        //})

		if(nnv_validate("box_form") == 1 ){
            flag++;
			var dataForm = getDataForm("box_form");
			//console.log(dataForm);
			//$("#ok_giayracong").attr("disabled");
			$("#ok").hide();
			return true;
			//console.log(flag);
            if(flag == 1){
    // 			$.ajax({
    // 				url: 'http://localhost/',
    // 				type: 'POST',
    // 				dataType: 'json',
    // 				data: dataForm,
    // 	        	success : function (result){
    // 					if (!result.hasOwnProperty('error')){
    // 						alert('Kết quả trả về không phù hợp');
    // 					}else if(result['error'] == 'success'){
    // 						console.log(result);
    // 						window.location.href = "http://localhost/htdocs/danh-sach-giay-ra-cong";
    //                      flag = 0;
    // 					}else{
    // 						$("#output-error-select_NV").text(result['content_error']);
    //                         flag = 0;
    //                         $("#ok_giayracong").show();
    // 						//console.log(result);
    // 					}				
    // 	            },
    // 	            error : function (){
    // 	            	//console.log(result);
    // 	                alert('Có lỗi xảy ra trong quá trình xử lý');
    //                     $("#ok_giayracong").show();
    // 	            }
    // 			});
            }
		}
		$('html').scrollTop( 50 );
		return false;
		
	}


</script>