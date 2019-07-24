<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản trị</title>
    <link rel="stylesheet" href="<?php echo base_url('themes/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('themes/css/admin.css');?>">
</head>
<body>
    <div class="main">
	   <div class="container">
		  <center>
			 <div class="middle">
				<div id="login">
				   <form action="javascript:void(0);" method="get">
					  <fieldset class="clearfix">
						 <p ><span class="fa fa-user"></span><input type="text"  class="login__input name" Placeholder="Username" autofocus required></p>
						 <p><span class="fa fa-lock"></span><input type="password"  class="login__input pass" Placeholder="Password" required></p>
						 <div>
							<span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" data-toggle="modal" data-target="#myModal"  href="#">Quên mật khẩu
							password?</a></span>
							<span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" onclick='return false' class="login__submit" value="Sign In"></span>
						 </div>
					  </fieldset>
					  <div class="clearfix"></div>
				   </form>
				   <div class="clearfix"></div>
				</div>
				<!-- end login -->
				<div class="logo">
				   <img class='backend_img_logo' src="<?php echo base_url('themes/image/logo.png');?>" alt="logo" title="logo" />
				   <div class="clearfix"></div>
				</div>
			 </div>
		  </center>
	   </div>
	   <div class="modal" id="myModal">
		  <div class="modal-dialog">
			<div class="modal-content">

			  <!-- Modal Header -->
			  <div class="modal-header">
				<h4 class="modal-title">Lấy lại mật khẩu</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>

			  <!-- Modal body -->
			  <div class="modal-body">
				<div class="form-group">
					<label for="">Email</label>
					<input type="text"  class="form-control email" value='nguyenduybaotn@gmail.com' name="email" id="email" aria-describedby="helpId" placeholder="" />
				</div>
			  </div>

			  <!-- Modal footer -->
			  <div class="modal-footer">
				<button type="button" class="form-control forgot__submit" class="btn btn-danger" >Gửi</button>
			  </div>

			</div>
		  </div>
		</div>
	</div>
	
    <script src="<?php echo base_url('themes/js/jquery-3.3.1.min.js');?>" ></script>
    <script src="<?php echo base_url('themes/js/popper.js');?>" ></script>
    <script src="<?php echo base_url('themes/js/bootstrap.min.js');?>" ></script>
    <script src="<?php echo base_url('themes/js/notify.min.js');?>" ></script>
    <script>
        var base_url = '<?php echo base_url();?>';
		$(document).ready(function(){
		/* =========================== login ==================================== */    
			$('.login__submit').click(function(){
				console.log("1");
				$('.login__submit').attr('disabled','disabled');
				$('.login__submit').html("<i class='fa fa-spinner fa-spin'></i> &nbsp;&nbsp; Loading...");
				
				var user = {
					tendangnhap : $('.login__input.name').val(),
					matkhau : $('.login__input.pass').val()
				}
					$.ajax({
						type  : 'POST',
						url : base_url+'backend/kiemtradangnhap',
						crossDomain: true,
						data : {user:user},
						success : function(response){
							console.log(response);
							if(response!=0){
								$.notify("Đăng nhập thành công", "success");
								setTimeout(function(){
									window.location.href = response;
								},1000);
								
							}else{
								$.notify("Đăng nhập không thành công", "danger");
								$('.login__submit').removeAttr('disabled');
								$('.login__submit').html("Login");
								$('.loi').addClass("alert alert-danger");
								$('.loi').html("Sai tên đăng nhập hoặc mật khẩu!");
								$('.login__submit').html("Sign in");
							}
						},
						error : function(response){
							$.notify("Đăng nhập không thành công", "danger");
							$('.login__submit').html("Sign in");
						}
					});
			});
			$('.forgot__submit').click(function(){
				$('.forgot__submit').attr('disabled','disabled');
				$('.forgot__submit').html("<i class='fa fa-spinner fa-spin'></i> &nbsp;&nbsp; Loading...");
				
				var email = $('.email').val();
					$.ajax({
						type  : 'POST',
						url : base_url+'backend/forgot',
						crossDomain: true,
						data : {email:email},
						success : function(response){
							console.log(response);
							if(response=='1'){
								$.notify("Gửi email thành công, vui lòng kiểm tra hộp thư email.", "success");
								setTimeout(function(){
									location.reload();
								},3000);
							}else if(response == '-1'){
								$.notify("Không tìm thấy email này", "danger");
								$('.forgot__submit').removeAttr('disabled');
								$('.loi').addClass("alert alert-danger");
								$('.loi').html("Sai email!");
								$('.forgot__submit').html("Gửi");
							}else if(response== '2'){
								$.notify("Đã có lỗi xảy ra khi gửi email", "danger");
								$('.forgot__submit').removeAttr('disabled');
								$('.forgot__submit').html("Gửi");
								$('.loi').addClass("alert alert-danger");
								$('.loi').html("Lỗi gửi email!");
							}else if(response== '0'){
								$.notify("Đã quá giới hạn gửi email, vui lòng liên hệ Admin.", "danger");
								$('.forgot__submit').removeAttr('disabled');
								$('.forgot__submit').html("Gửi");
								$('.loi').addClass("alert alert-danger");
								$('.loi').html("Lỗi gửi email!");
							}
						},
						error : function(response){
							$.notify("Gửi mail không thành công", "danger");
							$('.forgot__submit').html("Gửi");
						}
					});
			});
		});
    </script>
</body>
</html>
