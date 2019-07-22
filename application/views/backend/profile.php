
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Cấu hình thông tin tài khoản</li>
    </ol>
</nav>
<?php $user = $user[0];?>
<div class="row m-0">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <form style="width: 100%;" role="form" method="post" name="upload_form" id="upload_form" action="">
        <div class="form-group">
            <label for="">Họ và Tên</label>
            <input type="texxt" class="form-control" value='<?php echo $user->hoten; ?>' name="hoten" id="hoten" aria-describedby="helpId" placeholder="" />
        </div>
        <div class="form-group">
            <label for="">Tên đăng nhập</label>
            <input type="text" disabled='disabled' class="form-control" value='<?php echo $user->tendangnhap; ?>'
            name="ten" id="ten" aria-describedby="helpId" placeholder="" />
        </div>
        <div class="form-group">
            <label for="">Mật khẩu (để trống nếu không muốn đổi mật khẩu)</label>
            <input type="password" class="form-control" name="matkhau" id="matkhau" aria-describedby="helpId" placeholder="" />
        </div>
        <div class="form-group pl-4">
            <input type="checkbox" class="form-check-input" name="trangthai" id="trangthai" <?php if($user->trangthai) echo "checked"; ?>>
             Kích hoạt
        </div>
        <div class="form-group mt-5">
            <button name="" id="" class="btn btn-success btn-sm btn-save-profile" type='button'>
            <i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
        </div>
        </form>
    </div>
</div>
