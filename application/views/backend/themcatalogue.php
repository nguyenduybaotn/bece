
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Thêm catalogue</li>
    </ol>
</nav>
<div class="row m-0">
    <?php echo validation_errors(); ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist" style='width:100%;margin-bottom: 20px;'>
	  <li class="nav-item">
		<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tiếng Anh</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tiếng Việt</a>
	  </li>
	</ul>
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
                    <label for="">File đính kèm (<b>Định dạng *.pdf</b>)</label>
                    <input type="file" class="form-control" name="file2" id="file2" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="">Hình đại diện (<b>Kích thước 951x635</b>)</label>
                    <input type="file" class="form-control" name="file" id="file" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="">Sắp xếp(số lớn lên trên)</label>
                    <input type="text" class="form-control" name="sapxep" id="sapxep" 
                    value="<?php echo $this->tool_model->get_max('catalogue');?>" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group pl-4">
                    <input type="checkbox" class="form-check-input" name="trangthai" id="trangthai" checked>
                     Hiển thị
                </div>
                <div class="form-group mt-5">
                    <button name="" id="" class="btn btn-success btn-sm btn-luutintuc" type='submit'>
                    <i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
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
                    <label for="">File đính kèm (<b>Định dạng *.pdf - nếu không chọn mặc định lấy giống Tiếng Anh</b>)</label>
                    <input type="file" class="form-control" name="file3" id="file3" aria-describedby="helpId" placeholder="" />
                </div>
				<div class="form-group mt-5">
					<button name="" id="" class="btn btn-success btn-sm btn-luutintuc" type='submit'>
					<i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
				</div>
			</div>
		 </div>
    </div>
</div>
