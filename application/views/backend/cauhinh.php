
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Cập nhật thông tin chung</li>
    </ol>
</nav>
<div class="row m-0">
    <ul class="nav nav-tabs" id="myTab" role="tablist" style='width:100%;margin-bottom: 20px;'>
	  <li class="nav-item">
		<a class="nav-link active" id="home-tab" onclick='show_home()' data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tiếng Anh</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" id="profile-tab" data-toggle="tab" onclick='hidden_home()' href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tiếng Việt</a>
	  </li>
	</ul>
	 <?php echo validation_errors(); ?>
	<?php foreach($this->tool_model->get_all_table_where('cauhinh','id=1') as $row){ ?>
	<form style="    width: 100%;" role="form" method="post" name="upload_form" id="upload_form" enctype="multipart/form-data" action="">
	<div class="tab-content" id="myTabContent"   style='width:100%;'>
		<div class="row tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style='display:-webkit-box !important;' >
            <div class="col col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="">Tên website</label>
                    <input type="text" class="form-control" value='<?php echo $row->name2;?>' name="name2" id="name2" aria-describedby="helpId" placeholder="" />
                </div>
				<div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" value='<?php echo $row->address2;?>' name="address2" id="address2" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="">Logo (<b>Kích thước 951x635</b>)</label>
                    <input type="file" class="form-control" name="file" id="file" aria-describedby="helpId" placeholder="" />
					<img src='<?php echo base_url($row->logo)?>' class='img-fluid' style='height:50px;' />
                </div>
                <div class="form-group">
                    <label for="">Facekbook</label>
                    <input type="text" class="form-control" value='<?php echo $row->facebook;?>' name="facebook" id="facebook" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="">Twitter</label>
                    <input type="text" class="form-control" value='<?php echo $row->twitter;?>' name="twitter" id="twitter" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="">Google +</label>
                    <input type="text" class="form-control" value='<?php echo $row->google;?>' name="google" id="google" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group mt-5">
                    <button name="" id="" class="btn btn-success btn-sm btn-luutintuc" type='submit'>
                    <i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
                </div>
            </div>
			<div class="col col-lg-6 col-md-6 col-xs-12">
                
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"   style='width:100%;'>
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="form-group">
                    <label for="">Tên website</label>
                    <input type="text" class="form-control" value='<?php echo $row->name;?>' name="name" id="name" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" value='<?php echo $row->address;?>' name="address" id="address" aria-describedby="helpId" placeholder="" />
                </div>
				<div class="form-group mt-5">
					<button name="" id="" class="btn btn-success btn-sm btn-luutintuc" type='submit'>
					<i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
				</div>
			</div>
		 </div>
    </div>
	<form>
	<?php } ?>
</div>
