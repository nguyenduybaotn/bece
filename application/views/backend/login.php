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
							<span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Forgot
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
	</div>
	<!--
    <div class="cont">
        <div class="demo">
            <div class="login">
                <div class="login__check"></div>
                    <form action='' method='post'>
                    <div class="login__form">
                        <span class="loi" role="alert">
                        </span>
                        <div class="login__row">
                        <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                        </svg>
                        <input type="text" class="login__input name" placeholder="Username" autofocus/>
                        </div>
                        <div class="login__row">
                        <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                        </svg>
                        <input type="password" class="login__input pass" placeholder="Password"/>
                        </div>
                        <button  type="submit" onclick='return false' class="login__submit">
                         Sign in</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    -->
	
    <script src="<?php echo base_url('themes/js/jquery-3.3.1.min.js');?>" ></script>
    <script src="<?php echo base_url('themes/js/popper.js');?>" ></script>
    <script src="<?php echo base_url('themes/js/bootstrap.min.js');?>" ></script>
    <script src="<?php echo base_url('themes/js/notify.min.js');?>" ></script>
    <script src="<?php echo base_url('themes/js/login.js');?>" ></script>
    <script>
        var base_url = '<?php echo base_url();?>';
		$(document).ready(function(){
		/* =========================== login ==================================== */    
			$('.login__submit').click(function(){
				$('.login__submit').attr('disabled','disabled');
				$('.login__submit').html("<i class='fa fa-spinner fa-spin'></i> &nbsp;&nbsp; Loading...");
				
				var user = {
					tendangnhap : $('.login__input.name').val(),
					matkhau : $('.login__input.pass').val()
				}
					$.ajax({
						type  : 'POST',
						url : base_url+'kiem-tra-dang-nhap',
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
								$('.login__submit').removeAttr('disabled');
								$('.login__submit').html("Login");
								$('.loi').addClass("alert alert-danger");
								$('.loi').html("Sai tên đăng nhập hoặc mật khẩu!");
								$('.login__submit').html("Sign in");
							}
						},
						error : function(response){
							//console.log(response);
							$.notify(response, "success");
							$('.login__submit').html("Sign in");
							//location.reload();
						}
					});
			});
		});
    </script>
</body>
</html>
