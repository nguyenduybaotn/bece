<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$PATH_FOLDER_THEME = base_url("themes/Stellar-Admin/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php if(isset($title)) echo $title; else echo "Quản trị";?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    
    <script src="<?php echo base_url('ckeditor/ckeditor.js');?>" ></script>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo $PATH_FOLDER_THEME;?>node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo $PATH_FOLDER_THEME;?>node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?php echo $PATH_FOLDER_THEME;?>node_modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo $PATH_FOLDER_THEME;?>node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo $PATH_FOLDER_THEME;?>node_modules/chartist/dist/chartist.min.css" />
  <link rel="stylesheet" href="<?php echo $PATH_FOLDER_THEME;?>node_modules/jvectormap/jquery-jvectormap.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo $PATH_FOLDER_THEME;?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $PATH_FOLDER_THEME;?>images/favicon.png" />
</head>
<body>
	<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="<?php echo base_url('dashboard');?>"><img src="<?php echo base_url('themes/image/logo.png')?>" alt="logo"></a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('dashboard');?>"><img src="<?php echo base_url('themes/image/logo.png')?>" alt="logo"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block align-self-center mr-2" type="button" data-toggle="minimize">
        <span class="icon-list icons"></span>
      </button>
        <p class="page-name d-none d-lg-block">Hi, <?php if(isset($_SESSION['tendangnhap'])) echo $_SESSION['tendangnhap'];?></p>
        <ul class="navbar-nav ml-lg-auto">
          <li class="nav-item">
            <form class="mt-2 mt-md-0 d-none d-lg-block search-input">
              <div class="input-group">
                <span class="input-group-addon d-flex align-items-center"><i class="icon-magnifier icons"></i></span>
                <input type="text" class="form-control" placeholder="Search...">
              </div>
            </form>
          </li>
          <li class="nav-item dropdown notification-dropdown">
            
			<a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-people icons"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu navbar-dropdown preview-list notification-drop-down dropdownAnimation" aria-labelledby="notificationDropdown">
              <a class="dropdown-item preview-item" href="<?php echo base_url('backend/profile/'.$_SESSION['tendangnhap']);?>">
                <div class="preview-thumbnail">
                  <div class="preview-icon">
                    <i class="icon-info mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject font-weight-medium">Thay đổi thông tin cá nhân</p>
                  <p class="font-weight-light small-text">
                    Change info
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item" href="<?php echo base_url('logout');?>">
                <div class="preview-thumbnail">
                  <div class="preview-icon">
                    <i class="icon-speech mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject">Đăng xuất</p>
                  <p class="font-weight-light small-text">
                    Logout
                  </p>
                </div>
              </a>
              
            </div>
			
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center ml-auto" type="button" data-toggle="offcanvas">
          <span class="icon-menu icons"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">
              <span class="nav-link">Quản lý chung</span>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(isset($page) && $page == 'nhanvien') echo "page_active";?>" href="<?php echo base_url('backend/cauhinh');?>">
                <span class="menu-title">Cấu hình thông tin website</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(isset($page) && $page == 'nhanvien') echo "page_active";?>" href="<?php echo base_url('backend/menu');?>">
                <span class="menu-title">Quản lý danh sách menu</span>
                <i class="icon-wrench menu-icon"></i>
              </a>
            </li>  
            <li class="nav-item nav-category">
              <span class="nav-link">Quản lý bài viết</span>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(isset($page) && $page == 'blog') echo "page_active";?>" href="<?php echo base_url('backend/blog');?>">
                <span class="menu-title">Danh sách bài blog</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link <?php if(isset($page) && $page == 'dichvu') echo "page_active";?>" href="<?php echo base_url('backend/dichvu');?>">
                <span class="menu-title">Danh sách bài dịch vụ</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link <?php if(isset($page) && $page == 'tuyendung') echo "page_active";?>" href="<?php echo base_url('backend/tuyendung');?>">
                <span class="menu-title">Danh sách bài tuyển dụng</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li> 
            <li class="nav-item nav-category">
              <span class="nav-link">Quản lý khách hàng</span>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(isset($page) && $page == 'khachhang') echo "page_active";?>" href="<?php echo base_url('backend/khachhang');?>">
                <span class="menu-title">Danh sách khách hàng</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>   
          </ul>
        </nav>
        <!-- partial -->
        <div class="content-wrapper">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
					<div class="card calender-card">
						<div class="card-body">
							<a class='btn btn-sm btn-danger refesh' href='<?php echo base_url("ckfinder/created_ses_ck.php?ses=login_ck&redirect=$actual_link"); ?>'></a>
							<?php if(isset($view)) $this->load->view($view);?>
							<div class='p-5'></div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- ROW ENDS -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="<?php echo base_url()?>" target="_blank">BCEC</a>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  
	
	<!-- plugins:js -->
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/flot/jquery.flot.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/flot/jquery.flot.resize.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/flot.curvedlines/curvedLines.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/bootstrap-table/dist/bootstrap-table.min.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/chartist/dist/chartist.min.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/progressbar.js/dist/progressbar.min.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/chartist-plugin-legend/chartist-plugin-legend.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/d3/d3.min.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>node_modules/c3/c3.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo $PATH_FOLDER_THEME;?>js/off-canvas.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>js/hoverable-collapse.js"></script>
  <script src="<?php echo $PATH_FOLDER_THEME;?>js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo $PATH_FOLDER_THEME;?>js/dashboard.js"></script>
  <!-- End custom js for this page-->
    <?php if(isset($js)) $this->load->view($js); ?>
    <script>
        var base_url = '<?php echo base_url();?>';
    </script>
</body>
</html>
