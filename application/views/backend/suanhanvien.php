<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Sửa nhân viên</li>
    </ol>
</nav>
<?php foreach($this->tool_model->get_all_table_where('nhanvien',"id=$id") as $row){ ?>
<div class="row m-0">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <form style="    width: 100%;" role="form" method="post" name="upload_form" id="upload_form" enctype="multipart/form-data" action="">
        <div class="form-group">
			<label for="">Họ và tên</label>
			<input type="text" class="form-control" value='<?php echo $row->hoten;?>' name="ten" id="ten" aria-describedby="helpId" placeholder="" />
		</div>
        <div class="form-group">
			<label for="">Tên đăng nhập</label>
			<input type="text" class="form-control" value='<?php echo $row->tendangnhap;?>' name="tendangnhap" id="tendangnhap" aria-describedby="helpId" placeholder="" />
		</div>
        <div class="form-group">
			<label for="">Mật khẩu</label>
			<input type="text" class="form-control" value='' name="matkhau" id="matkhau" aria-describedby="helpId" placeholder="" />
		</div>
        <div class="form-group">
            <label for="">Loại nhân viên</label>
			<select class="form-control" name='loainhanvien'>
				<option <?php if($row->loai == 0) echo "selected";?> value='0'>Nhân viên</option>
				<option <?php if($row->loai == 1) echo "selected";?>  value='1'>Admin</option>
			</select>
        </div>
        <div class="form-group pl-4">
            <input type="checkbox" class="form-check-input" name="trangthai" id="trangthai" value='1' <?php if($row->loai == 1) echo "checked";?> >
            Active
        </div>
        <div class="form-group mt-5">
            <button name="" id="" class="btn btn-success btn-sm btn-luuartwork1" type='submit'>
            <i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
        </div>
        </form>
    </div>
</div>
<?php } ?>
