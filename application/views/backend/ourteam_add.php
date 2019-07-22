
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Lịch sử</li>
    </ol>
</nav>
<div class="row m-0">
    <ul class="nav nav-tabs" id="myTab" role="tablist" style='width:100%;margin-bottom: 20px;'>
	  <li class="nav-item">
		<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tiếng Anh</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tiếng Việt</a>
	  </li>
	</ul>
	<form style="width: 100%;" role="form" method="post" id="box_form" onsubmit="return validaForm();" action="<?php echo base_url('backend/ourteam_add'); ?>">
	    <div class="tab-content" id="myTabContent"   style='width:100%;'>
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"   style='width:100%;'>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <label for="">Họ & Tên <b style='color:red;'> *</b> <span id="output-error-hoten2" class="output-error"></span></label>
                    <input type="text" class="form-control nnv-validate" name="hoten2" id="hoten2" aria-describedby="helpId" placeholder="" data-setting="text-error" data-error="Vui lòng nhập họ tên" />
                    
                </div>
                <div class="form-group">
                    <label for="">Chức vụ <b style='color:red;'> *</b> <span id="output-error-chucvu2" class="output-error"></span></label>
                    <input type="text" class="form-control nnv-validate" name="chucvu2" id="chucvu2" aria-describedby="helpId" placeholder="" data-setting="text-error" data-error="Vui lòng nhập chức vụ" />
                    
                </div>
                <div class="form-group">
                    <label for="">Học vị <b style='color:red;'> *</b> <span id="output-error-hocvi2" class="output-error"></span></label>
                    <input type="text" class="form-control " name="hocvi2" id="hocvi2" aria-describedby="helpId" placeholder="" data-setting="text-error" data-error="Vui lòng nhập học vị" />
                    
                </div>
                <div class="form-group">
                    <label for="">Thông tin <b style='color:red;'> *</b><span id="output-error-thongtin2" class="output-error"></span></label>
                    
                    <textarea class="form-control nnv-validate" name="thongtin2" id="thongtin2" aria-describedby="helpId" placeholder="" data-setting="text-error" data-error="Vui lòng nhập thông tin"></textarea>
                </div>
                
                
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"   style='width:100%;'>
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="form-group">
                    <label for="">Họ Tên <b style="color: red;">*</b> <span id="output-error-hoten" class="output-error"></span></label>
                    <input type="text" value='empty' class="form-control nnv-validate" name="hoten" id="hoten" aria-describedby="helpId" placeholder="" value=''  data-setting="text-error" data-error="Vui lòng nhập họ tên" />
                    
                </div>
                <div class="form-group">
                    <label for="">Chức vụ <b style="color: red;">*</b> <span id="output-error-chucvu" class="output-error"></span></label>
                    <input type="text" value='empty' class="form-control nnv-validate" name="chucvu" id="chucvu" aria-describedby="helpId" placeholder="" value='' data-setting="text-error" data-error="Vui lòng nhập chức vụ" />
                    
                </div>
                <div class="form-group">
                    <label for="">Học vị <b style="color: red;">*</b> <span id="output-error-hocvi" class="output-error"></span></label>
                    <input type="text" value='empty' class="form-control" name="hocvi" id="hocvi" aria-describedby="helpId" placeholder="" value='' data-setting="text-error" data-error="Vui lòng nhập học vị" />
                    
                </div>
                <div class="form-group">
                    <label for="">Thông tin<b style="color: red;">*</b> <span id="output-error-thongtin" class="output-error"></span></label>
                    
                    <textarea class="form-control nnv-validate" name="thongtin" id="thongtin" aria-describedby="helpId" placeholder="" data-setting="text-error" data-error="Vui lòng nhập thông tin">empty</textarea>
                </div>
			</div>
		</div>
        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label for="">Hình đại diện (<b>Kích thước 167x220</b>) <b style='color:red;'> *</b><span id="output-error-img" class="output-error"></span></label>
                <div class='input-group'>
                    <input type="text" class="form-control nnv-validate  col-md-6" name="img" id="img" aria-describedby="helpId" placeholder="" data-setting="text-error" data-error="Vui lòng chọn hình"/>
                    <span class="input-group-addon">
                    	<button type="button" onclick="openPopup_img()" name="btnChonFile" id="btnChonFile" class="fa fa-image font-red" style="width:29px; height:29px;"></button>
                    </span>
                    
                </div>
                <div class=""><img id="preview_img" src="" width="200"/></div>
                
            </div>
            <div class="form-group pl-4">
                <input type="checkbox" class="form-check-input nnv-validate" name="trangthai" id="trangthai" checked value="1">
                 Hiển thị
            </div>
            <div class="form-group pl-4">
                <label class="row">Ngày đăng</label>
                <div class='input-group'>
                    <input type="text" class="form-control row nnv-validate" name="date" id="date"  value="<?php echo date('Y-m-d H:i:s');?>" style="max-width:150px;">
                </div>
            </div>
    		 <div class="form-group mt-5">
                <button type="submit" name="ok" id="ok" class="btn btn-success btn-sm btn-luutintuc">
                <i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
                <a class="btn btn-warning btn-sm btn-luutintuc" href="<?php echo base_url("backend/ourteam"); ?>" >Trở về</a>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
//     CKEDITOR.replace('editor1',{
// 	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
// 	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
// });
// CKEDITOR.replace('editor2',{
// 	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
// 	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
// });
</script>