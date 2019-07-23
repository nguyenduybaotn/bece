
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Cấu hình thông tin tài khoản</li>
    </ol>
</nav>
<?php $user = $user[0]; echo validation_errors();?>
<div class="row m-0">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <form style="width: 100%;" role="form" method="post" name="upload_form" enctype="multipart/form-data" id="upload_form" action="">
			<div class="form-group">
				<label for="">Họ và Tên</label>
				<input type="text" class="form-control" value='<?php echo $user->hoten; ?>' name="hoten" id="hoten" aria-describedby="helpId" placeholder="" />
			</div>
			<div class="d-none form-group">
				<label for="">Tên đăng nhập</label>
				<input type="hidden" readonly class="form-control" value='<?php echo $user->tendangnhap; ?>' name="ten" id="ten" aria-describedby="helpId" placeholder="" />
			</div>
			<div class="form-group">
				<label for="">Mật khẩu (để trống nếu không muốn đổi mật khẩu)</label>
				<input type="password" class="form-control" name="matkhau" id="matkhau" aria-describedby="helpId" placeholder="" />
			</div>
			<div class="form-group">
				<label for="">Hình đại diện (<b>Kích thước 150x150</b>)</label>
				<input type="file" class="form-control" name="file" id="file" aria-describedby="helpId" placeholder="" />
				<img src='<?php echo base_url($user->hinhdaidien); ?>' class='img-fluid' style='height:50px;' />
			</div>
			<div class="form-group mt-5">
				<button name="" id="" class="btn btn-success btn-sm btn-save-profile" type='submit'>
				<i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
			</div>
        </form>
    </div>
</div>
