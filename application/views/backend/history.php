
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
        <li class="breadcrumb-item " aria-current="page">Lịch sử</li>
    </ol>
</nav>
<div class="row m-0">
	<div class="tab-content" id="myTabContent"   style='width:100%;'>
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"   style='width:100%;'>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="row">
                    <form style="width: 100%;" role="form" method="post" name="box_form" id="box_form" action="">
                    <div class='col-lg-12 col-md-12 col-xs-12' style='border:0px solid #000;'>
                        <h3 style='text-align:center;'>Nội dung</h3>
                        <div class="form-group mt-5">
                            <button name="ok" id="ok" class="btn btn-success btn-sm btn-luutintuc" type='submit'>
                            <i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
                        </div>
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> Vui lòng nhập đủ thông tin bắc buộc (*)
                        </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Cập nhật thành công
                        </div>
                        <div class="form-group">
                            <div class='row control-label'>
                                <label class=" col-lg-6 col-md-6">Tiếng Anh
                                    <!-- <span class="required"> * </span> -->
                                </label>
                                <label class="col-lg-6 col-md-6">Tiếng Việt
                                    <!-- <span class="required"> * </span> -->
                                </label>
                            </div>
                            <div class='row'>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <textarea class="form-control" rows="4" name="noidung2" id="noidung2"><?php echo $data_content_History['noidung2']; ?></textarea>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs">
                                    <textarea class="form-control" rows="4" name="noidung" id="noidung"><?php echo $data_content_History['noidung']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <!-- # -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="row">
                    <div class='col-lg-12 col-md-12 col-xs-12' style='border:0px solid #000; margin-top: 15px;'>
                        <h3 style='text-align:center;'>Hình Ảnh</h3>
                        <div class="form-group mt-5">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary popup_add_img" data-toggle="modal" data-target="#popup_add_img">
                              Thêm ảnh
                            </button>
                        </div>
                        
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table_data">
                        <thead>
                            <tr>
                                <th class="text_center">STT</th>
    							<th class="text_center">Hình Ảnh (400x267px)</th>
    							<th class="text_center">Trạng Thái</th>
    							<th class="text_center">Ngày tạo</th>
    							<th class="text_center">Thực Thi</th>
                            </tr>
                        </thead>
                        <tbody id="data_tbody">
                            <?php
                                if(isset($data_img_History) && !empty($data_img_History)){
                                    foreach($data_img_History as $key => $row){
                                        $key++;
                                        echo "<tr>";
                                            echo "<td>$key</td>";
                                            echo "<td style='width:30%'><div style='margin:auto; max-width: 200px;'><img class='img-fluid' src='".$row['img']."' /></div></td>";
                                            if($row['trangthai'] == 0 ){
                								echo "<td style='width:55%'><i class='btn btn-danger btn-sm'>Ẩn</i></td>";
                							}else{
                								echo "<td style='width:55%'><i class='btn btn-success btn-sm'>Kích hoạt</i></td>";
                							}
                                            echo "<td style='width:55%'>".$row['date']."</td>";
                                            echo "<td class='center action_table text_center' style='width:15%; min-width: 130px;'>";
                                                echo "<button type='button' class='btn btn-info btn-sm popup_edit_img' data-toggle='modal' data-target='#popup_edit_img' data-id='".$row['id']."'>Sửa</button>";
                                                echo "<button type='button' class='btn btn-danger btn-sm btn_delImg' onclick='return delImg(".$row['id'].");'><i class='fa fa-remove'></i>&nbsp;&nbsp;Xóa</button>";
                							echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal add -->
<div class="modal fade" id="popup_add_img" tabindex="-1" role="dialog" aria-labelledby="Thêm hình ảnh" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm hình</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="">Hìnhn (<b>Kích thước 400x267px</b>)<b style='color:red;'> *</b> <span id="img_add_error" class="output-error"></span></label>
                <div class='input-group'>
                    <input type="text" class="form-control col-md-12" name="img" id="img_add" aria-describedby="helpId"/>
                    <span class="input-group-addon">
                    	<button type="button" onclick="openPopup_img_add()" name="btnChonFile" id="btnChonFile" class="fa fa-image font-red" style="width:29px; height:29px;"></button>
                    </span>
                </div>
                <div class="preview_img_add pt-3" style='text-align: center;'></div>
            </div>
            <div class='form-group'>
                <label for="" class="ml-2">Ngày đăng</label>
                <div class='input-group'>
                    <input type="text" class="form-control" style="max-width: 150px;" name="date" id="date" aria-describedby="helpId" value="<?php echo date("Y-m-d H:i:s"); ?>" />
                </div>
            </div>
            <div class='form-group'>
                <div class='input-group'>
                    <input type="checkbox" name="trangthai" id="trangthai" aria-describedby="helpId" checked value="1"/>
                    <label for="" class="ml-2">Trạng thái</label>
                </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" id="cancel_addImg" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="addImg" class="btn btn-primary" onclick="return addImg()">Tải ảnh lên</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="popup_edit_img" tabindex="-1" role="dialog" aria-labelledby="Cập nhật hình ảnh" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập nhật hình</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="">Hìnhn (<b>Kích thước 400x267px</b>)<b style='color:red;'> *</b> <span id="img_edit_error" class="output-error"></span></label>
                <div class='input-group'>
                    <input type="text" class="form-control col-md-12" name="img" id="img_edit" aria-describedby="helpId" value="" />
                    <span class="input-group-addon">
                    	<button type="button" onclick="openPopup_img_edit()" name="btnChonFile" id="btnChonFile" class="fa fa-image font-red" style="width:29px; height:29px;"></button>
                    </span>
                </div>
                <div class="preview_img_edit pt-3" style='text-align: center;'></div>
            </div>
            <div class='form-group'>
                <label for="" class="ml-2">Ngày đăng</label>
                <div class='input-group'>
                    <input type="text" class="form-control" style="max-width: 150px;" name="date" id="date_edit" aria-describedby="helpId" value="" />
                </div>
            </div>
            <div class='form-group'>
                <div class='input-group'>
                    <input type="checkbox" name="trangthai" id="trangthai_edit" aria-describedby="helpId"  value="1"/>
                    <label for="" class="ml-2">Trạng thái</label>
                </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" id="cancel_editImg" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="editImg" class="btn btn-primary" onclick="return editImg()">Cập nhật Ảnh</button>
      </div>
    </div>
  </div>
</div>

<?php
//$this->vu->debug($data_img_History);
?>


