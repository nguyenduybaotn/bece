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
                    //console.log(response);
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
                    }
                },
                error : function(response){
                    //console.log(response);
                    $.notify(response, "success");
                }
            });
    });
});