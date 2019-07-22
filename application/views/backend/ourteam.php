
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
        <li class="breadcrumb-item " aria-current="page">Đội của chúng tôi</li>
    </ol>
</nav>
<div class="row m-0">
	<div class="tab-content" id="myTabContent"   style='width:100%;'>
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"   style='width:100%;'>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="row">
                    <div class='col-lg-12 col-md-12 col-xs-12' style='border:0px solid #000; margin-top: 15px;'>
                        <div class="form-group mt-1">
                            <a href="<?php echo base_url("ckfinder/created_ses_ck.php?ses=login_ck&redirect=".base_url('backend/ourteam_add')); ?>" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp;Thêm nhân sự
                            </a>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table_data">
                            <thead>
                                <tr>
        							<th class="text_center">STT</th>
        							<th class="text_center">Hình ảnh</th>
        							<th class="text_center">Họ Tên</th>
        							<th class="text_center">Học vị</th>
        							<th class="text_center">Chức vụ</th>
                                    <th class="text_center">Trạng thái</th>
        							<th class="text_center">Ngày tạo</th>
        							<th class="text_center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        						//$this->My_model->debug($dataGiayraCong);
        						foreach ($dataOurTeam as $key => $row) {
        							$key++;
        							$url_ses = base_url("ckfinder/created_ses_ck.php?ses=login_ck&redirect=".base_url('backend/ourteam_edit/'.$row['id']));
        						?>
        						<tr class='odd gradeX' >
        							<td class="text_center"><?php echo $key; ?></td>
        
                                    <td><div ><img style='height: 50px;' class='img-fluid' src='<?php echo base_url($row['img']);?>' /></div></td>
                                    <td class="text_center"><?php echo $row['hoten2']; ?></td>
                                    <td class="text_center"><?php echo $row['hocvi2']; ?></td>
                                    <td class="text_center"><?php echo $row['chucvu2']; ?></td>
        							<td class="text_center">
        							<?php
        							if($row['trangthai'] == 0 ){
        								echo "<i class='btn btn-danger btn-sm'>Ẩn</i>";
        							}else{
        								echo "<i class='btn btn-success btn-sm'>Kích hoạt</i>";
        							}
        							?>
        							</td>
                                    <td class="text_center"><?php echo $row['date']; ?></td>
        							<td class="center action_table text_center" style='min-width: 130px;'>
                                        <button type='button' class='btn btn-info btn-sm '><a style='color:white;text-decoration:none;' href='<?php echo $url_ses; ?>'><i class='fa fa-edit'></i>&nbsp;&nbsp;Sửa</a></button>
                                        <button type='button' class='btn btn-danger btn-sm'><a style='color:white;text-decoration:none;' href='<?php echo base_url('backend/ourteam_del/'.$row['id']); ?>'  onclick="return confirm('Bạn chắc muốn xóa?');"><i class='fa fa-remove'></i>&nbsp;&nbsp;Xóa</a></button>
    
        							</td>
        							
        						</tr>
        						<?php } ?>
                                
                            </tbody>
                        </table>
                        
                        <div class="row">
                            <center style="margin:auto;">
                                <div class="paginationV"><?php if(isset($create_link))if($create_link != "") echo $create_link; ?></div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//$this->vu->debug($dataOurTeam);

?>


