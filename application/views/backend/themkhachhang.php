
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Thêm khách hàng</li>
    </ol>
</nav>
<div class="row m-0">
    <?php $this->load->view('/backend/bar_lang'); ?>
	 <?php echo validation_errors(); ?>
	<form style="    width: 100%;" role="form" method="post" name="upload_form" id="upload_form" enctype="multipart/form-data" action="">
	<div class="tab-content" id="myTabContent"   style='width:100%;'>
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"   style='width:100%;'>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <form style="    width: 100%;" role="form" method="post" name="upload_form" id="upload_form" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" name="ten2" id="ten2" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" class="form-control" name="mota2" id="mota2" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="">Liên kết</label>
                    <input type="text" class="form-control" name="lienket2" id="lienket2" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="">Hình đại diện (<b>Kích thước 951x635</b>)</label>
                    <input type="file" class="form-control" name="file" id="file" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="">Sắp xếp(số lớn lên trên)</label>
                    <input type="text" class="form-control" name="sapxep" id="sapxep" 
                    value="<?php echo $this->tool_model->get_max('khachhang');?>" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group pl-4">
                    <input type="checkbox" class="form-check-input" name="trangthai" id="trangthai" checked>
                     Hiển thị
                </div>
                <div class="form-group mt-5">
                    <button name="" id="" class="btn btn-success btn-sm btn-luutintuc" type='submit'>
                    <i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
                    <a href="<?php echo base_url('backend/khachhang')?>" name="" id="" class="btn btn-danger btn-sm btn-luutintuc" type='button'>
					<i class="fa fa-save"></i>&nbsp;&nbsp;Quay lại</a>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"   style='width:100%;'>
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" name="ten" id="ten" aria-describedby="helpId" placeholder="" value='' />
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" class="form-control" name="mota" id="mota" aria-describedby="helpId" placeholder="" value='' />
                </div>
                <div class="form-group">
                    <label for="">Liên kết</label>
                    <input type="text" class="form-control" name="lienket" id="lienket" aria-describedby="helpId" placeholder="" />
                </div>
				<div class="form-group mt-5">
					<button name="" id="" class="btn btn-success btn-sm btn-luutintuc" type='submit'>
					<i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
                    <a href="<?php echo base_url('backend/khachhang')?>" name="" id="" class="btn btn-danger btn-sm btn-luutintuc" type='button'>
					<i class="fa fa-save"></i>&nbsp;&nbsp;Quay lại</a>
				</div>
			</div>
		 </div>
    </div>
    </form>
</div>

<script>
    CKEDITOR.replace('editor1',{
	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
});
CKEDITOR.replace('editor2',{
	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
});
</script>