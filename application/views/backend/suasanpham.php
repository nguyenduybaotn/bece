<?php 
$ten = $this->tool_model->get_element_table_where('ten','sanpham',"id=$id");
$ten2 = $this->tool_model->get_element_table_where('ten2','sanpham',"id=$id");
$ma = $this->tool_model->get_element_table_where('ma','sanpham',"id=$id");
$thongsochung = $this->tool_model->get_element_table_where('thongsochung','sanpham',"id=$id");
$thongsochung2 = $this->tool_model->get_element_table_where('thongsochung2','sanpham',"id=$id");
$nanglucsanxuat = $this->tool_model->get_element_table_where('nanglucsanxuat','sanpham',"id=$id");
$nanglucsanxuat2 = $this->tool_model->get_element_table_where('nanglucsanxuat2','sanpham',"id=$id");
$chitiet = $this->tool_model->get_element_table_where('chitiet','sanpham',"id=$id");
$chitiet2 = $this->tool_model->get_element_table_where('chitiet2','sanpham',"id=$id");
$danhmuccha = $this->tool_model->get_element_table_where('danhmuccha','sanpham',"id=$id");
$hinhdaidien = $this->tool_model->get_element_table_where('hinhdaidien','sanpham',"id=$id");
$sapxep = $this->tool_model->get_element_table_where('sapxep','sanpham',"id=$id");
$trangthai = $this->tool_model->get_element_table_where('trangthai','sanpham',"id=$id");
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
        <li class="breadcrumb-item " aria-current="page">Sửa sản phẩm: <b><?php echo $ten; ?></b></li>
    </ol>
</nav>
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
					<label for="">Danh mục</label>
					<select class="form-control" name="danhmuccha" id="danhmuccha">
						<option value='0'>- Gốc</option>
						<?php 
						$ck = false;
						if($this->tool_model->get_element_table_where('nlsx','danhmucsanpham',"id=$danhmuccha")==1)
							$ck=true;
						foreach($this->tool_model->get_all_table_where('danhmucsanpham',"danhmuccha=0") as $ds){
							if($danhmuccha==$ds->id) echo "<option nlsx='".$ds->nlsx."'  selected value='".$ds->id."'>- ".$ds->ten2."</option>";
							else echo "<option nlsx='".$ds->nlsx."'  value='".$ds->id."'>- ".$ds->ten2."</option>";
							foreach($this->tool_model->get_all_table_where('danhmucsanpham',"danhmuccha=$ds->id") as $dss){
								if($danhmuccha==$dss->id) echo "<option nlsx='".$ds->nlsx."'  selected value='".$dss->id."'>&nbsp;&nbsp;&nbsp;+ ".$dss->ten2."</option>";
								else echo "<option nlsx='".$ds->nlsx."'  value='".$dss->id."'>&nbsp;&nbsp;&nbsp;+ ".$dss->ten2."</option>";
								foreach($this->tool_model->get_all_table_where('danhmucsanpham',"danhmuccha=$dss->id") as $dsss){
									if($danhmuccha==$dsss->id) echo "<option nlsx='".$ds->nlsx."'  selected value='".$dsss->id."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* ".$dsss->ten2."</option>";
									else echo "<option nlsx='".$ds->nlsx."'  value='".$dsss->id."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* ".$dsss->ten2."</option>";
								}
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="">Tên sản phẩm</label>
					<input type="text" class="form-control" value='<?php echo $ten2; ?>' name="ten2" id="ten2" aria-describedby="helpId" placeholder="" />
				</div>
				<div class="form-group">
					<label for="">Mã sản phẩm</label>
					<input type="text" class="form-control" value='<?php echo $ma; ?>' name="ma" id="ma" aria-describedby="helpId" placeholder="" />
				</div>
				<div class="form-group">
					<label for="">Mô tả ngắn</label>
					<textarea class="form-control" name="thongsochung2" id="editor1" aria-describedby="helpId" placeholder=""><?php echo $thongsochung2; ?></textarea>
				</div>
				<div class="form-group">
					<label for="">Thông số kỹ thuật</label>
					<textarea class="form-control" name="chitiet2" id="editor2" aria-describedby="helpId" placeholder=""><?php echo $chitiet2; ?></textarea>
				</div>
				<div class="form-group nlsx <?php if($ck==true) echo "active"; ?>">
					<label for="">Năng lực sản xuất</label>
					<textarea class="form-control nanglucsanxuat2" name="nanglucsanxuat2" id="editor5" aria-describedby="helpId" placeholder=""><?php echo $nanglucsanxuat2; ?></textarea>
				</div>
				
				<div class="form-group">
					<label for="">Hình đại diện <b>(kích thước chuẩn 800x735)</b></label>
					<input type="file" class="form-control" name="file" id="file" aria-describedby="helpId" placeholder="" />
					<img src='<?php echo base_url($hinhdaidien)?>' style='height:100px;' />
				</div>
				<div class="form-group">
					<label for="">Sắp xếp(số lớn lên trên)</label>
					<input type="text" class="form-control" name="sapxep" id="sapxep" 
					value="<?php echo $sapxep;?>" aria-describedby="helpId" placeholder="" />
				</div>
				<div class="form-group pl-4">
					<input type="checkbox" class="form-check-input" name="trangthai" id="trangthai" <?php if($trangthai) echo "checked";?>>
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
					<label for="">Tên sản phẩm</label>
					<input type="text" class="form-control" value='<?php echo $ten; ?>' name="ten" id="ten" aria-describedby="helpId" placeholder="" />
				</div>
				<div class="form-group">
					<label for="">Mô tả ngắn</label>
					<textarea class="form-control" name="thongsochung" id="editor3" aria-describedby="helpId" placeholder=""><?php echo $thongsochung; ?></textarea>
				</div>
				<div class="form-group">
					<label for="">Thông số kỹ thuật</label>
					<textarea class="form-control" name="chitiet" id="editor4" aria-describedby="helpId" placeholder=""><?php echo $chitiet; ?></textarea>
				</div>
				<div class="form-group nlsx <?php if($ck==true) echo "active"; ?>">
					<label for="">Năng lực sản xuất</label>
					<textarea class="form-control nanglucsanxuat" name="nanglucsanxuat" id="editor6" aria-describedby="helpId" placeholder=""><?php echo $nanglucsanxuat; ?></textarea>
				</div>
				<div class="form-group mt-5">
					<button name="" id="" class="btn btn-success btn-sm btn-luutintuc" type='submit'>
					<i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
				</div>
			</div>
		 </div>
		</form>
	</div>
</div>

<script>
    CKEDITOR.replace('editor1',{
	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
});
CKEDITOR.replace('editor2',{
	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
});
CKEDITOR.replace('editor3',{
	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
});
CKEDITOR.replace('editor4',{
	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
});
CKEDITOR.replace('editor5',{
	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
});
CKEDITOR.replace('editor6',{
	filebrowserBrowseUrl: '<?php echo base_url();?>/ckfinder/ckfinder.html',
	filebrowserUploadUrl: '<?php echo base_url();?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
});
</script>