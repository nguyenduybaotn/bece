
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Sửa banner</li>
    </ol>
</nav>
<?php foreach($this->tool_model->get_all_table_where('banner',"id=$id") as $row){ $danhmuccha = $row->loai;?>
<div class="row m-0">
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
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" name="ten2" id="ten2" aria-describedby="helpId" placeholder="" value='<?php echo $row->ten2; ?>' />
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" class="form-control" name="mota2" id="mota2" aria-describedby="helpId" placeholder="" value='<?php echo $row->mota2; ?>' />
                </div>
                <div class="form-group">
                    <label for="">Liên kết</label>
                    <input type="text" class="form-control" name="lienket2" id="lienket2" aria-describedby="helpId" placeholder="" value='<?php echo $row->lienket2; ?>' />
                </div>
                <div class="form-group">
                    <label for="">Hình đại diện (<b>Kích thước 2000x859</b>)</label>
                    <input type="file" class="form-control" name="file" id="file" aria-describedby="helpId" placeholder="" />
                    <img src='<?php echo base_url($row->hinhdaidien); ?>' alt='' style='height: 100px' />
                </div>
				<!--
                <div class="form-group">
                    <label for="">Lựa chọn danh mục</label>
					<select class="form-control" name='loai'>
						<?php 
						foreach($this->tool_model->get_all_table_where('menu',"danhmuccha=0") as $ds){
							if($danhmuccha==$ds->id) echo "<option selected value='".$ds->id."'>- ".$ds->tenmenu2."</option>";
							else echo "<option value='".$ds->id."'>- ".$ds->tenmenu2."</option>";
							foreach($this->tool_model->get_all_table_where('menu',"danhmuccha=$ds->id") as $dss){
								if($danhmuccha==$dss->id) echo "<option selected value='".$dss->id."'>&nbsp;&nbsp;&nbsp;+ ".$dss->tenmenu2."</option>";
								else echo "<option value='".$dss->id."'>&nbsp;&nbsp;&nbsp;+ ".$dss->tenmenu2."</option>";
								foreach($this->tool_model->get_all_table_where('menu',"danhmuccha=$dss->id") as $dsss){
									if($danhmuccha==$dsss->id) echo "<option selected value='".$dsss->id."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* ".$dsss->ten2."</option>";
									else echo "<option value='".$dsss->id."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* ".$dsss->tenmenu2	."</option>";
								}
							}
						}
						?>
					</select>
                </div>
				-->
                <div class="form-group">
                    <label for="">Sắp xếp(số lớn lên trên)</label>
                    <input type="text" class="form-control" name="sapxep" id="sapxep" 
                    value="<?php echo $row->sapxep; ?>" aria-describedby="helpId" placeholder="" />
                </div>
                <div class="form-group pl-4">
                    <input type="checkbox" class="form-check-input" name="trangthai" id="trangthai" <?php if($row->trangthai==1) echo "checked"; ?>>
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
                    <input type="text" class="form-control" name="ten" id="ten" aria-describedby="helpId" placeholder="" value='<?php echo $row->ten; ?>' />
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" class="form-control" name="mota" id="mota" aria-describedby="helpId" placeholder="" value='<?php echo $row->mota; ?>' />
                </div>
                <div class="form-group">
                    <label for="">Liên kết</label>
                    <input type="text" class="form-control" name="lienket" id="lienket" aria-describedby="helpId" placeholder="" value='<?php echo $row->lienket; ?>' />
                </div>
				<div class="form-group mt-5">
					<button name="" id="" class="btn btn-success btn-sm btn-luutintuc" type='submit'>
					<i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
				</div>
			</div>
		 </div>
    </div>
    </form>
</div>
<?php } ?>