<script src="<?php echo base_url('themes/plugins/nnv-validation/nnv.validate.js'); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('ckfinder/ckfinder.js');?>"></script>
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
    // IMPORTANT: update CKEDITOR textarea with actual content before submit
    $('#box_form').on('submit', function() {
        for(var instanceName in CKEDITOR.instances) {
            CKEDITOR.instances[instanceName].updateElement();
        }
    })

    function openPopup_img_add(){
        CKFinder.popup({
            height: 550,
            chooseFiles: true,
            onInit: function( finder ) {
            	finder.on( 'files:choose', function( evt ) {
                	var file = evt.data.files.first();
                    document.getElementById( 'img_add' ).value = file.getUrl();
                    //document.getElementById( 'preview_img' ).src = file.getUrl();
                    $('.preview_img_add').html("<img class='img-fluid' src='"+file.getUrl()+"'/>");
                    
                });
                finder.on( 'file:choose:resizedImage', function( evt ){
                    document.getElementById( 'img_edit' ).value = evt.data.resizedUrl;
                    //document.getElementById( 'preview_img' ).src = file.getUrl();
                    $('.preview_img_edit').html("<img class='img-fluid' src='"+file.getUrl()+"'/>");
                });
            }
        });
    }
    function openPopup_img_edit(){
        CKFinder.popup({
            height: 550,
            chooseFiles: true,
            onInit: function( finder ) {
            	finder.on( 'files:choose', function( evt ) {
                	var file = evt.data.files.first();
					console.log(file);
                    document.getElementById( 'img_edit' ).value = file.getUrl();
                    //document.getElementById( 'preview_img' ).src = file.getUrl();
                    $('.preview_img_edit').html("<img class='img-fluid' src='"+file.getUrl()+"'/>");
                    
                });
                finder.on( 'file:choose:resizedImage', function( evt ){
                    document.getElementById( 'img_edit' ).value = evt.data.resizedUrl;
                    //document.getElementById( 'preview_img' ).src = file.getUrl();
                    $('.preview_img_edit').html("<img class='img-fluid' src='"+file.getUrl()+"'/>");
                });
            }
        });
    }
    $('#img_add').keyup(function() {
        var SrcImg= $('#img_add').val();
        if(SrcImg != ""){
            $('.preview_img_add').html("<img class='img-fluid' src='"+SrcImg+"'/>");
            $('#img_add_error').text('');
        }else{
            $('.preview_img_add').html('');
            $('#img_add_error').text('Vui lòng chọn hình!');
        }
    });
    $('#img_edit').keyup(function() {
        var SrcImg= $('#img_edit').val();
        if(SrcImg != ""){
            $('.preview_img_edit').html("<img class='img-fluid' src='"+SrcImg+"'/>");
            $('#img_edit_error').text('');
        }else{
            $('.preview_img_edit').html('');
            $('#img_edit_error').text('Vui lòng chọn hình!');
        }
    });
    
    
    /*Submit Add Img*/
    var flag = 0;
	function addImg(){
	    var txtImg  = $('#img_add');
	    var txtdate = $('#date');
	    var error   = $('#img_add_error');
	    var btn_add = $('#addImg');
	    var cancel  = $('#cancel_addImg');
	    var tbody   = $('#data_tbody');
	    var preview_img = $('.preview_img_add');
		if(txtImg.val() != "" ){
            flag++;
            error.text('');
			if($('#trangthai:checked').val() == 1){
			    var txtStatus = 1;
			}else{
			    var txtStatus = 0;
			}
			//btn_add.hide();
			var dataForm = {
			    img         :txtImg.val(),
			    trangthai   :txtStatus,
			    date        :txtdate.val()
			}
			//console.log(dataForm);
			//console.log(flag);
            if(flag == 1){
    			$.ajax({
    				url: '<?php echo base_url("backend/history_ajax_img_add"); ?>',
    				type: 'POST',
    				dataType: 'json',
    				data: dataForm,
    	        	success : function (result){
    					if (!result.hasOwnProperty('error')){
    						alert('Kết quả trả về không phù hợp');
    					}else if(result['error'] == 'success'){
    						console.log(result);
    						txtImg.val('');
    						txtdate.val('');
    						error.text('');
    						preview_img.html('');
    						tbody.html('');
    						tbody.append(result['data']);
    						
    						//window.location = '<?php echo base_url("backend/history"); ?>';
                         flag = 0;
                         $('#popup_add_img').modal('toggle');
    					}else{
    						$(error).text(result['content_error']);
                            flag = 0;
                            $(btn_add).show();
    						//console.log(result);
    					}				
    	            },
    	            error : function (){
    	            	//console.log(result);
    	                alert('Có lỗi xảy ra trong quá trình xử lý');
                        //$("#ok_giayracong").show();
    	            }
    			});
            }
		}else{
		    error.text("Vui lòng chọn hình!");
		}
		return false;
	}
	
	/* get info img when Edit */
    $('#popup_edit_img').on('show.bs.modal', function (event) {
        var modal = $(this);
        var button = $(event.relatedTarget); // Button that triggered the modal
        var idImg = button.data('id'); // Extract info from data-* attributes
        var data ={id:idImg};
        console.log(data);
        $.ajax({
          type : 'POST',
          dataType : 'json',
          url : '<?php echo base_url("backend/history_ajax_img_info");?>',
          data : data,
          success : function (result){
              if( $.isEmptyObject(result) === false){
                  console.log(result);
                $('#img_edit').val(result.data.img);
                $('.preview_img_edit').html("<img class='img-fluid' src='"+result.data.img+"'/>");
                $('#date_edit').val(result.data.date);
                $('#editImg').attr('data-id',idImg);
                if(result.data.trangthai == 1){
                    $('#trangthai_edit').attr("checked",true);
                }else{
                    $('#trangthai_edit').Attr("checked",false);
                }
              }
          },
          error : function (){
              alert('Có lỗi xảy ra trong quá trình xử lý!!!');
          }
        });
        /* info Collection */
        
        //modal.find('.infoColl').load("https://nbcmedia.vn/home/ajax_load_fullCollByIdColl",data,function(kq_return) {});
    });
    /* Submit Edit Img */
    function editImg(){
	    var txtImg  = $('#img_edit');
	    var txtdate = $('#date_edit');
	    var error   = $('#img_edit_error');
	    var btn_edit = $('#editImg');
	    var cancel  = $('#cancel_editImg');
	    var tbody   = $('#data_tbody');
	    var idImg   = btn_edit.attr('data-id');
	    var preview_img = $('#preview_img_edit');
		if(txtImg.val() != "" ){
            flag++;
            error.text('');
			if($('#trangthai_edit:checked').val() == 1){
			    var txtStatus = 1;
			}else{
			    var txtStatus = 0;
			}
			btn_edit.hide();
			var dataForm = {
			    id          :idImg,
			    img         :txtImg.val(),
			    trangthai   :txtStatus,
			    date        :txtdate.val()
			}
			console.log(dataForm);
			//console.log(flag);
            if(flag == 1 && !isNaN(idImg)){
    			$.ajax({
    				url: '<?php echo base_url("backend/history_ajax_img_edit"); ?>',
    				type: 'POST',
    				dataType: 'json',
    				data: dataForm,
    	        	success : function (result){
    					if (!result.hasOwnProperty('error')){
    						alert('Kết quả trả về không phù hợp');
    					}else if(result['error'] == 'success'){
    						//console.log(result);
    						txtImg.val('');
    						txtdate.val('');
    						error.text('');
    						preview_img.html('');
    						tbody.html('');
    						tbody.append(result['data']);
    						//window.location = '<?php echo base_url("backend/history"); ?>';
                         flag = 0;
                         $('#popup_edit_img').modal('toggle');
                         btn_edit.show();
    					}else{
    						$(error).text(result['content_error']);
                            flag = 0;
                            $(btn_edit).show();
    						//console.log(result);
    					}				
    	            },
    	            error : function (){
    	            	//console.log(result);
    	                alert('Có lỗi xảy ra trong quá trình xử lý');
    	            }
    			});
            }
		}else{
		    error.text("Vui lòng chọn hình!");
		}
		return false;
	}
	
	/* Submit Edit Img */
    function delImg(idImg){
        if(confirm('Bạn chắc muốn xóa?')){
            var btn_del  = $('.btn_delImg');
    	    var tbody   = $('#data_tbody');
    	    //console.log(idImg);
    		if(idImg != "" ){
                flag++;
    			var dataForm = {id:idImg}
    			//console.log(dataForm);
    			//console.log(flag);
                if(flag == 1 && !isNaN(idImg)){
        			$.ajax({
        				url: '<?php echo base_url("backend/history_ajax_img_del"); ?>',
        				type: 'POST',
        				dataType: 'json',
        				data: dataForm,
        	        	success : function (result){
        					if (!result.hasOwnProperty('error')){
        						alert('Kết quả trả về không phù hợp');
        					}else if(result['error'] == 'success'){
        						//console.log(result);
        						tbody.html('');
        						tbody.append(result['data']);
                                flag = 0;
        					}else{
        						$(error).text(result['content_error']);
                                flag = 0;
        						//console.log(result);
        					}				
        	            },
        	            error : function (){
        	            	//console.log(result);
        	                alert('Có lỗi xảy ra trong quá trình xử lý!!!!');
        	            }
        			});
                }
        }
    	    
		}else{
		    error.text("Không tìm thấy id để xóa!");
		}
		return false;
	}
</script>