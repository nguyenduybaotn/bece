<?php $PATH_FOLDER_THEME = base_url("themes/Stellar-Admin/"); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
</nav>
<div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card px-3">
                <div class="card-body">
                  <h2 class="card-title">Danh sách các liên hệ</h2>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Tên</th>
                          <th>Email</th>
                          <th>Tiêu đề</th>
                          <th>Nội dung</th>
                          <th>Ngày gửi</th>
                          <th>Tình trạng</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Airi Satou</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>55</td>
                          <td>2009/10/09</td>
                          <td><label class="badge badge-info">Chưa xem</label></td>
                        </tr>
                        <tr>
                          <td>Angelica Ramos</td>
                          <td>Chief Executive Officer (CEO)</td>
                          <td>London</td>
                          <td>30</td>
                          <td>2009/10/09</td>
                          <td><label class="badge badge-info">Chưa xem</label></td>
                        </tr>
                        <tr>
                          <td>Ashton Cox</td>
                          <td>Regional Director</td>
                          <td>San Francisco</td>
                          <td>36</td>
                          <td>2004/12/02</td>
                          <td><label class="badge badge-info">Chưa xem</label></td>
                        </tr>
                        <tr>
                          <td>Angelica Ramos</td>
                          <td>Chief Executive Officer (CEO)</td>
                          <td>London</td>
                          <td>30</td>
                          <td>2011/07/25</td>
                          <td><label class="badge badge-info">Chưa xem</label></td>
                        </tr>
                        <tr>
                          <td>Ashton Cox</td>
                          <td>Regional Director</td>
                          <td>San Francisco</td>
                          <td>32</td>
                          <td>2004/12/02</td>
                          <td><label class="badge badge-info">Chưa xem</label></td>
                        </tr>
                        <tr>
                          <td>Angelica Ramos</td>
                          <td>Chief Executive Officer (CEO)</td>
                          <td>London</td>
                          <td>31</td>
                          <td>2011/07/25</td>
                          <td><label class="badge badge-info">Chưa xem</label></td>
                        </tr>
                        <tr>
                          <td>Ashton Cox</td>
                          <td>Regional Director</td>
                          <td>Tokyo</td>
                          <td>39</td>
                          <td>2004/12/02</td>
                          <td><label class="badge badge-info">Chưa xem</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <p class="mb-0">Showing 1 to 10 of 57 entries</p>
                    <nav>
                      <ul class="pagination rounded-separated pagination-info mt-3">
                        <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ROW ENDS -->
	<div class="row">
            <div class="col-12 col-lg-5 col-md-5 grid-margin stretch-card">
              <div class="card px-3 activity-card">
                <div class="card-body">
                  <h2 class="card-title">Các hành động gần đây</h2>
                  <?php foreach($this->tool_model->get_all_table_where('truycap',"trangthai=1 order by thoigian desc limit 0,5") as $row){ ?>
				  <div class="col">
                    <div class="pic pr-3"><img src="https://via.placeholder.com/150/000000/FFFFFF/?text=Avartar" alt=""></div>
                    <div class="content">
                      <p class="activity"><b><?php echo $row->danhmuc;?></b></p>
                      <p class="a-text"><?php echo $row->mota;?></p>
                    </div>
                    <div class="time">
                      <p><?php echo $this->tool_model->time_elapsed_string($row->thoigian)?></p>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-7 col-md-7 grid-margin stretch-card">
              <div class="card calender-card">
						<div class="card-body">
							<h2 class="card-title">Calender</h2>
							<div class="datepicker"></div>
						</div>
					</div>
            </div>
          </div>
          <!-- ROW ENDS -->