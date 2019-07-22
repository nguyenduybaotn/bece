<html><head>
                                <meta charset="utf-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <title>Snippet - Bootsnipp.com</title>
                                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
                                <style>body{ 
    margin-top:40px; 
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}</style>
                                <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                                <script type="text/javascript">$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});</script>
                            </head>
                            <body>
                            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container pt-5">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-circle btn-default btn-primary">1</a>
            <p>Thông tin website</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Thông tin CSDL</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Hoàn tất</p>
        </div>
    </div>
</div>
<form role="form" action="" method="get">
    <div class="row setup-content" id="step-1" style="">
        <div class="col-12">
            <h3>Thông tin website</h3>
        </div>
            <div class="col-4">
                
                <div class="form-group">
                    <label class="control-label">Tên website</label>
                    <input maxlength="100" type="text" required="required" name="ten" value="1" class="form-control" placeholder="" />
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label class="control-label">Mô tả website</label>
                    <input maxlength="100" type="text" required="required" name="mota" value="2" class="form-control" placeholder="">
                </div>
            </div>
        <div class="col-12">
            <div class="row">
		 <div class="col-md-4 col-sm-4 col-xs-12 form-group">
		      <label class="labeltext">Nhiều hơn 1 ngôn ngữ</label><br>
		          <div class="form-check-inline">

					<label class="customradio"><span class="radiotextsty">Yes</span>
					  <input type="radio" value="1" name="radio">
					  <span class="checkmark"></span>
					</label>        
					<label class="customradio"><span class="radiotextsty">No</span>
					  <input type="radio" value="0" checked="checked" name="radio">
					  <span class="checkmark"></span>
					</label>

				</div>
		  </div>
	</div>
        </div>
    </div>
    <div class="row setup-content" id="step-2" style="display: none;">
        <div class="col-12">
            <h3>Thông tin CSDL</h3>
        </div>
        <div class="col-4">
                
                <div class="form-group">
                    <label class="control-label">Tên server</label>
                    <input maxlength="100" type="text" required="required" value="http://localhost" name="tenserver" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label class="control-label">Tên đăng nhập</label>
                    <input maxlength="100" type="text" required="required" name="tendangnhap" value="root" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label class="control-label">Mật khẩu đăng nhập</label>
                    <input maxlength="100" type="text" required="required" name="matkhaudangnhap"  value="123" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label class="control-label">Tên CSDL</label>
                    <input maxlength="100" type="text" required="required" name="tencsdl" value="test" class="form-control" placeholder="">
                </div>
            </div>
    </div>
    <div class="row setup-content" id="step-3" style="display: none;">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Hoàn tất</h3>
                <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
            </div>
        </div>
    </div>
</form>
</div>
                            
                        </body></html>