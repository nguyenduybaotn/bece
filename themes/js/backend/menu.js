
function change_alias(alias) {
    var str = alias;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
    str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
    str = str.replace(/đ/g,"d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
    str = str.replace(/ + /g," ");
    str = str.trim(); 
    return str;
}
/* =========================== func menu ==================================== */
function laydanhsachmenu(){
    $.ajax({
        type  : 'POST',
        url : base_url+'backend/laydanhsachmenu',
        success : function(response){
            $('.table_danhsachmenu').html(response);
        },
        error : function(response){
            console.log(response);
        }
    });
}
function suamenu(id){
    $.ajax({
        type  : 'POST',
        url : base_url+'backend/suamenu',
        data : {id:id},
        success : function(response){
            //console.log(response);
            $('#suamenu .modal-body').html(response);
            $('#suamenu').modal('show');
        },
        error : function(response){
            $.notify(response, "success");
        }
    });

}
function xoamenu(id){
    if(confirm("Bạn muốn xóa")){
        $.ajax({
            type  : 'POST',
            url : base_url+'backend/xoamenu',
            data : {id:id},
            success : function(response){
                $.notify("Xóa thành công", "success");
                laydanhsachmenu();
            },
            error : function(response){
                $.notify(response, "success");
            }
        });
    }
}
function sualienket(){
    var tenmenu = $('#tenmenu_e').val();
        tenmenu = change_alias(tenmenu);
        tenmenu = tenmenu.replace(/ /g,'-');
        $('#lienket_e').val(tenmenu);
}
function sualienket2(){
    var tenmenu = $('#tenmenu_e2').val();
        tenmenu = change_alias(tenmenu);
        tenmenu = tenmenu.replace(/ /g,'-');
        $('#lienket_e2').val(tenmenu);
}
$(document).ready(function(){
/* =========================== menu ==================================== */
    $( "#tenmenu" ).keyup(function() {
        var tenmenu = $('#tenmenu').val();
        tenmenu = change_alias(tenmenu);
        tenmenu = tenmenu.replace(/ /g,'-');
        $('#lienket').val(tenmenu);
    });
    $( "#tenmenu_e" ).keyup(function() {
        var tenmenu = $('#tenmenu_e').val();
        tenmenu = change_alias(tenmenu);
        tenmenu = tenmenu.replace(/ /g,'-');
        $('#lienket_e').val(tenmenu);
    });
	$( "#tenmenu2" ).keyup(function() {
        var tenmenu2 = $('#tenmenu2').val();
        tenmenu2 = change_alias(tenmenu2);
        tenmenu2 = tenmenu2.replace(/ /g,'-');
        $('#lienket2').val(tenmenu2);
    });
    $( "#tenmenu_e2" ).keyup(function() {
        var tenmenu2 = $('#tenmenu_e2').val();
        tenmenu2 = change_alias(tenmenu2);
        tenmenu2 = tenmenu2.replace(/ /g,'-');
        $('#lienket_e2').val(tenmenu2);
    });
	
    $('.btn-themmenu').click(function(){
        var menu = {
            tenmenu     : $('#tenmenu').val(),
            tenmenu2    : $('#tenmenu2').val(),
            lienket     : $('#lienket').val(),
            lienket2    : $('#lienket2').val(),
            danhmuccha  : $('#danhmuccha').val(),
            sapxep      : $('#sapxep').val(),
            trangthai   : $('#trangthai').is(":checked") ? 1 : 0
        };
        if(menu.tenmenu == '' || menu.tenmenu2 == ''){
            $('#tenmenu').addClass('is-invalid');
            $('#error-tenmenu').text('Tên menu không để trống');
			 $('#tenmenu2').addClass('is-invalid');
            $('#error-tenmenu2').text('Tên menu không để trống');
        }else{
            //console.log(menu);
            $.ajax({
                type  : 'POST',
                url : base_url+'backend/themmenu',
                data : {menu:menu},
                success : function(response){
                    if(response==-1){
                        // khong them moi duoc
                        $('#error-tenmenu').text('Không lưu được!');
                    }else{
                        //console.log("Đã lưu được");
                        $.notify("Đã lưu", "success");
                        setTimeout(function(){
                            $('#themmenu').modal('hide');
                            $('#tenmenu').val('');
                            $('#tenmenu2').val('');
                            $('#lienket').val('');
                            $('#lienket2').val('');
                            $('#danhmuccha').val(0);
                        },1000);
                        laydanhsachmenu();
                        
                        
                    }
                },
                error : function(response){
                    $.notify(response, "success");
                }
            });
        }
    });
    $('.btn-suamenu').click(function(){
        var menu = {
            id          : $('#id_e').val(),
            tenmenu     : $('#tenmenu_e').val(),
            tenmenu2     : $('#tenmenu_e2').val(),
            lienket     : $('#lienket_e').val(),
            lienket2     : $('#lienket_e2').val(),
            danhmuccha  : $('#danhmuccha_e').val(),
            sapxep      : $('#sapxep_e').val(),
            trangthai   : $('#trangthai_e').is(":checked") ? 1 : 0
        };
        //console.log(menu);
        if(menu.tenmenu == '' || menu.tenmenu2 == ''){
            $('#tenmenu_e').addClass('is-invalid');
            $('#error-tenmenu_e').text('Tên menu không để trống');
			$('#tenmenu_e2').addClass('is-invalid');
            $('#error-tenmenu_e2').text('Tên menu không để trống');
        }else{
            //console.log(menu);
            $.ajax({
                type  : 'POST',
                url : base_url+'backend/suamenuid',
                data : {menu:menu},
                success : function(response){
                    console.log(response);
                    if(response==-1){
                        // khong them moi duoc
                        $.notify("Không sửa được vì bị trùng", "warn");
                    }else{
                        //console.log("Đã lưu được");
                        $.notify("Đã lưu", "success");
                        $('#suamenu').modal('hide');
                        laydanhsachmenu();
                        
                        
                    }
                },
                error : function(response){
                    $.notify(response, "success");
                }
            })
        }
    });
});