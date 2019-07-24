<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    /*
    các biến toàn cục
    */
    protected $FOLDER_VIEW_ADMIN = "backend/";
	protected $checkLogin = false;
    /*
    function khởi tạo Controller load các thư viện mặc định
    */
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->library('form_validation');
		$this->load->helper('email');
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('cookie');
        $this->load->model('tool_model');
		$this->load->model('nhanvien_model');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }
	/* 
    function cho trang index
    URL: / or /index
    */
	public function index()
	{
		// neu dang dang nhap roi thi qua dashboard, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			header("location: ".base_url()."dashboard");
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	// kiem tra dang nhap tra ve id user neu dung thong tin hoac khong co thi tra ve 0
	public function kiemtradangnhap()
	{
		
		// user la bien truyen tu ajax trong file admin.js qua: user{ tendangnhap, matkhau }
		$data = $this->input->post('user');
		$nhanvien = $this->nhanvien_model->kiemtradangnhap($data['tendangnhap'],$data['matkhau']);
		// neu ton tai 1 nhan vien tro len thoa thong tin dang nhap
		if($nhanvien=='-1'){
			echo 0;
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "<b>".$data['tendangnhap']."</b> đăng nhập không thành công";
			$fullContent = json_encode($data);
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,0,"",$fullContent);
		}else if(count($nhanvien) == 1){
			$newdata = array(
				'id' => $nhanvien->id,
				'tendangnhap'     => $nhanvien->tendangnhap,
				'tinhtrang'     => $nhanvien->trangthai,
				'logged_in' => TRUE
			);
			// dua thong tin dang nhap vao $_SESSION
			$this->session->set_userdata($newdata);
			set_cookie('logged_in',true);
			// tra ve ket qua dang json la id cua nhan vien tim thay
			echo base_url("ckfinder/created_ses_ck.php?ses=login_ck&redirect=".base_url("dashboard"));//json_encode($nhanvien->id);
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "<b>".$nhanvien->tendangnhap."</b> đăng nhập thành công";
			$fullContent = json_encode($newdata);
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Đăng nhập/Đăng xuất",$fullContent);
		}else if(count($nhanvien) > 1 || count($nhanvien) == 0){ // khong ton tai hoac co tu 2 ket qua tro len
			echo 0;
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "<b>".$data['tendangnhap']."</b> đăng nhập không thành công";
			$fullContent = json_encode($data);
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,0,"",$fullContent);
		}
		
	}
	public function dashboard(){
		// neu dang dang nhap roi thi qua dashboard, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			
			$data['title'] = "Dashboard";
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'dashboard';
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function logout(){
		// unset $_SESSION['logged_in']
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã đăng xuất";
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Đăng nhập/Đăng xuất","");
		}
		$this->session->unset_userdata('logged_in');
		$this->dashboard();
	}
	// kiem tra dang nhap tra ve id user neu dung thong tin hoac khong co thi tra ve 0
	public function forgot()
	{
		// user la bien truyen tu ajax trong file admin.js qua: user{ tendangnhap, matkhau }
		$data = $this->input->post('email');
		if(count($this->tool_model->get_all_table_where("nhanvien","email='$data'"))>0){
			$spam = $this->tool_model->get_element_table_where('spam','nhanvien',"email='$data'");
			if($spam > 2){
				// spam rồi nên khóa lại
				echo "0";
			}else{
				//co ton tai email thì gửi mail mật khẩu tạm
				$matkhaumoi = $this->tool_model->randomPassword(10);
				$key = md5('nguyenduybaotn@gmail.com');
				$url = base_url("backend?key=$key");
				$emailFrom = "nguyenduybaotn@bece.com.vn";
				$emailTo = $data;
				$titleF = "BCEC.COM.VN";
				$title = "Mật khẩu tạm thời đăng nhập quản trị website";
				$content = "Đây là mật khẩu tạm thời để đăng nhập quản trị website <b>$matkhaumoi</b>. Vui lòng đổi lại mật khẩu sau khi đăng nhập thành công.<br></br><a href='$url'>Đăng nhập tại đây</a>";
				
				if($this->tool_model->send_email($emailFrom,$emailTo,$titleF,$title,$content)){
					// gửi mail thành công thì cập nhật lại mật khẩu tạm cho user
					$this->nhanvien_model->update('matkhau',md5($matkhaumoi),$data);
					// cập nhật spam tăng lên 1
					$this->nhanvien_model->update('spam',$spam + 1,$data);
					echo "1";
				}else{
					echo "2";
				}
			}
		}else{
			echo "-1";
		}
		
	}
	
	public function cauhinh(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'cauhinh';
			$data['group'] = '1';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'cauhinh';
			// set rule la ten phai co 
			$this->form_validation->set_rules('ten', 'ten', 'required');
			if ($this->form_validation->run() == TRUE){
				$dataF = $this->tool_model->get_all_table_where('cauhinh','id=1');
				// thuc thi khi co ten va dang submit thong tin tuc luu vao database
				if (empty($_FILES['file']['name']) ) {
					if (empty($_FILES['file2']['name']) ) {
						$this->tool_model->cauhinh('','');
					}else{
						$datax=$this->upload_image('menu','file2');
						$this->tool_model->cauhinh('',$datax['path']);
					}
				}else{
					$datax=$this->upload_image('menu','file');
					if (empty($_FILES['file2']['name']) ) {
						$this->tool_model->cauhinh($datax['path'],'');
					}else{
						$datax2=$this->upload_image('menu','file2');
						$this->tool_model->cauhinh($datax['path'],$datax2['path']);
					}
				}
				$dataB = $this->tool_model->get_all_table_where('cauhinh','id=1');
    			// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$nhanvien->tendangnhap."</b> đã cập nhật thông tin cấu hình.";
				$fullContent = json_encode($dataF)." <--> ".json_encode($dataB);
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Cấu hình",$fullContent);

				header("location:".base_url()."backend/cauhinh");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function profile($tendangnhap){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$dataF = $this->tool_model->get_all_table_where('nhanvien',"tendangnhap='$tendangnhap'");
			// set rule la ten phai co 
			$this->form_validation->set_rules('hoten', 'hoten', 'required');
			if ($this->form_validation->run() == TRUE){
				if (empty($_FILES['file']['name']) ) {
					$this->nhanvien_model->profile_update('');
				}else{
					$datax=$this->upload_image('menu','file');
					$this->nhanvien_model->profile_update($datax['path']);
				}
				$dataB = $this->tool_model->get_all_table_where('nhanvien',"tendangnhap='$tendangnhap'");
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$nhanvien->tendangnhap."</b> đã cập nhật thông tin profile.";
				$fullContent = json_encode($dataF)." <--> ".json_encode($dataB);
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,0,"Cấu hình",$fullContent);

				header("location:".base_url()."backend");
			}

			$data['user'] = $this->tool_model->get_all_table_where('nhanvien',"tendangnhap='$tendangnhap'");
			$data['title'] = 'Cấu hình thông tin tài khoản';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'profile';
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function profile_edit(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$user = $this->input->post('user');
			$result = -1;
			$result = $this->nhanvien_model->profile_edit($user);
			echo $result;
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "Sửa profile ".json_encode($user);
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);
		}else{
			echo -1;
		}
	}
	public function nhanvien(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			if($this->tool_model->get_element_table_where('loai','nhanvien',"id=".$this->session->userdata('id')) == 1){
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "Vào trang nhân viên";
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);

				$data['page'] = 'nhanvien';// page cho biet la dang o trang nao de active menu
				$data['group'] = 1;// group cho biet la dang o group nao de active group ben menu
				$data['view'] = $this->FOLDER_VIEW_ADMIN.'nhanvien';
				$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
			}else{
				header("Location: ".base_url('backend'));
				exit();
			}
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	
	public function themnhanvien(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			if($this->tool_model->get_element_table_where('loai','nhanvien',"id=".$this->session->userdata('id')) == 1){
				$data['page'] = 'nhanvien';
				$data['group'] = '1';
				$data['view'] = $this->FOLDER_VIEW_ADMIN.'themnhanvien';
				// set rule la ten phai co 
				$this->form_validation->set_rules('ten', 'ten', 'required');
				if ($this->form_validation->run() == TRUE){
					$id= 0 ;
					$id = $this->nhanvien_model->themnhanvien();
					// ghi log
					$thoigian = date("Y-m-d H:i:s");
					$content_log = "";
					$content_log .= "Thêm nhanvien ".json_encode($this->tool_model->get_all_table_where('nhanvien',"id=$id"));
					$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);
					
					header("location:".base_url()."backend/nhanvien");
				}
				$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
			}else{
				header("Location: ".base_url('backend'));
				exit();
			}
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function suanhanvien($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			if($this->tool_model->get_element_table_where('loai','nhanvien',"id=".$this->session->userdata('id')) == 1){
				$nhanvien = $this->tool_model->get_all_table_where('nhanvien',"id=$id");
				$data['id'] = $id;
				$data['page'] = 'nhanvien';
				$data['group'] = '1';
				$data['view'] = $this->FOLDER_VIEW_ADMIN.'suanhanvien';
				// set rule la ten phai co 
				$this->form_validation->set_rules('ten', 'ten', 'required');
				if ($this->form_validation->run() == TRUE){
					$this->nhanvien_model->suanhanvien($id);
					$nhanvien2 = $this->tool_model->get_all_table_where('nhanvien',"id=$id");
					// ghi log
					$thoigian = date("Y-m-d H:i:s");
					$content_log = "";
					$content_log .= "Sua nhanvien ".json_encode($nhanvien)." thành: ".json_encode($nhanvien2);
					$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);
					
					header("location:".base_url()."backend/nhanvien");
				}
				$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
			}else{
				header("Location: ".base_url('backend'));
				exit();
			}
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function menu(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "Vào trang menu";
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);

			$data['page'] = 'menu';// page cho biet la dang o trang nao de active menu
			$data['group'] = 1;// group cho biet la dang o group nao de active group ben menu
			$data['js'] = $this->FOLDER_VIEW_ADMIN.'menu_js';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'menu';
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function themmenu(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			
			$data['page'] = 'menu';
			$data['group'] = '1';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'themmenu';
			// set rule la ten phai co 
			$this->form_validation->set_rules('ten2', 'ten2', 'required');
			if ($this->form_validation->run() == TRUE){
			    $id= 0;
				// thuc thi khi co ten va dang submit thong tin tuc luu vao database
				if (empty($_FILES['file']['name']) ) {
					$id = $this->tool_model->themmenu('');
				}else{
					$datax=$this->upload_image('menu','file');
					$id = $this->tool_model->themmenu($datax['path']);
				}
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$nhanvien->tendangnhap."</b> đã thêm menu: ".$this->input->post('ten2');
				$fullContent = json_encode($this->tool_model->get_all_table_where('menu',"id=$id"));
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Menu",$fullContent);
				
				header("location:".base_url()."backend/menu");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function suamenu($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'menu';// page cho biet la dang o trang nao de active menu
			$data['group'] = 1;// group cho biet la dang o group nao de active group ben menu
			$data['js'] = $this->FOLDER_VIEW_ADMIN.'menu_js';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'suamenu';
			$data['id']=$id;
			
			$this->form_validation->set_rules('ten2', 'ten2', 'required');
			if ($this->form_validation->run() == TRUE){
				// lay mang menu co id=$id
				$menu = $this->tool_model->get_all_table_where('menu',"id=$id");
				
				if (empty($_FILES['file']['name']) ) {
					$this->tool_model->suamenu($id,'');
				}else{
					//xoa hinh cu
					$hinhcu = $this->tool_model->get_element_table_where("img",'menu',"id=$id");
					if($hinhcu){
						$hinhcu = getcwd().$hinhcu;
						if(file_exists($hinhcu)){
							unlink($hinhcu);
						}
					}
					$datax=$this->upload_image('menu','file');
					$this->tool_model->suamenu($id,$datax['path']);
				}
				$menu2 = $this->tool_model->get_all_table_where('menu',"id=$id");
				
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$nhanvien->tendangnhap."</b> đã sửa menu: ".$this->input->post('ten2');
				$fullContent = json_encode($menu)." <--> ".json_encode($menu2);
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Menu",$fullContent);
				
				header("location:".base_url()."backend/menu");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function xoamenu($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$ten = $this->tool_model->get_element_table_where('ten2','menu',"id=$id");
			//xoa hinh cu
    		$hinhcu = $this->tool_model->get_element_table_where("img",'menu',"id=$id");
    		if($hinhcu!=''){
				$hinhcu = getcwd().$hinhcu;
				if(file_exists($hinhcu)){
					unlink($hinhcu);
				}
    		}
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "<b>".$nhanvien->tendangnhap."</b> đã xóa menu: ".$ten;
			$fullContent = json_encode($this->tool_model->get_all_table_where('menu',"id=$id"));
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Menu",$fullContent);

			$this->tool_model->xoamenu($id);
			header("location:".base_url()."backend/menu");
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	
	public function blog(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'blog';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'blog';
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function themblog(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'blog';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'themblog';
			$data['js'] = $this->FOLDER_VIEW_ADMIN.'tintuc_js';
			// set rule la ten phai co 
			$this->form_validation->set_rules('ten', 'ten', 'required');
			if ($this->form_validation->run() == TRUE){
				$id= 0;
				// thuc thi khi co ten va dang submit thong tin tuc luu vao database
				if (empty($_FILES['file']['name']) ) {
					$id = $this->tool_model->themblog('',0);
				}else{
					$datax=$this->upload_image('tintuc','file');
					$id = $this->tool_model->themblog($datax['path'],0);
				}
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã thêm blog: ".$this->input->post('ten2');
				$fullContent = json_encode($this->tool_model->get_all_table_where('blog',"id=$id"));
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Blog",$fullContent);

				header("location:".base_url()."backend/blog");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function suablog($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'blog';
			$data['id'] = $id;
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'suablog';
			// set rule la ten phai co 
			$this->form_validation->set_rules('ten', 'ten', 'required');
			if ($this->form_validation->run() == TRUE){
				$blogF = $this->tool_model->get_all_table_where('blog',"id=$id");
				$ten2 = $this->tool_model->get_element_table_where('ten2','blog',"id=$id");
				// thuc thi khi co ten va dang submit thong tin tuc luu vao database
				if (empty($_FILES['file']['name']) ) {
					$this->tool_model->suablog($id,'');
				}else{
					//xoa hinh cu
					$hinhcu = $this->tool_model->get_element_table_where("hinhdaidien",'blog',"id=$id");
					$hinhcu = getcwd().$hinhcu;
					if(file_exists($hinhcu)){
						unlink($hinhcu);
					}
					$datax=$this->upload_image('tintuc','file');
					$this->tool_model->suablog($id,$datax['path']);
				}
				$blogB = $this->tool_model->get_all_table_where('blog',"id=$id");
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã sửa blog: ".$ten2." thành: ".$this->input->post('ten2');
				$fullContent = json_encode($blogF)." <--> ".json_encode($blogB);
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Blog",$fullContent);
				header("location:".base_url()."backend/blog");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function xoablog($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		    //xoa hinh cu
			$hinhcu = $this->tool_model->get_element_table_where("hinhdaidien",'blog',"id=$id");
			$hinhcu = getcwd().$hinhcu;
			if(file_exists($hinhcu)){
				unlink($hinhcu);
			}
			$ten2 = $this->tool_model->get_element_table_where('ten2','blog',"id=$id");
			$this->tool_model->xoablog($id);
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã xóa blog: ".$ten2;
			$fullContent = json_encode($this->tool_model->get_all_table_where('blog',"id=$id"));
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Blog",$fullContent);
			header("location:".base_url()."backend/blog");
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	
	public function khachhang(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'khachhang';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'khachhang';
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function themkhachhang(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'khachhang';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'themkhachhang';
			$data['js'] = $this->FOLDER_VIEW_ADMIN.'tintuc_js';
			// set rule la ten phai co 
			$this->form_validation->set_rules('ten', 'Tên TA và TV', 'required');
			if ($this->form_validation->run() == TRUE){
				$id = 0;
				// thuc thi khi co ten va dang submit thong tin tuc luu vao database
				if (empty($_FILES['file']['name']) ) {
					$id = $this->tool_model->themkhachhang('',0);
				}else{
					$datax=$this->upload_image('khachhang','file');
					$id = $this->tool_model->themkhachhang($datax['path'],0);
				}
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã thêm khách hàng: ".$this->input->post('ten2');
				$fullContent = json_encode($this->tool_model->get_all_table_where('khachhang',"id=$id"));
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Khách hàng",$fullContent);

				header("location:".base_url()."backend/khachhang");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function suakhachhang($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'khachhang';
			$data['id'] = $id;
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'suakhachhang';
			// set rule la ten phai co 
			$this->form_validation->set_rules('ten', 'ten', 'required');
			if ($this->form_validation->run() == TRUE){
				$khachhangF = $this->tool_model->get_all_table_where('khachhang',"id=$id");
				$ten2 = $this->tool_model->get_element_table_where('ten2','khachhang',"id=$id");
				// thuc thi khi co ten va dang submit thong tin tuc luu vao database
				if (empty($_FILES['file']['name']) ) {
					$this->tool_model->suakhachhang($id,'');
				}else{
					//xoa hinh cu
					$hinhcu = $this->tool_model->get_element_table_where("hinhdaidien",'khachhang',"id=$id");
					$hinhcu = getcwd().$hinhcu;
					if(file_exists($hinhcu)){
						unlink($hinhcu);
					}
					$datax=$this->upload_image('khachhang','file');
					$this->tool_model->suakhachhang($id,$datax['path']);
				}
				$khachhangB = $this->tool_model->get_all_table_where('khachhang',"id=$id");
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã sửa khách hàng: ".$ten2;
				$fullContent = json_encode($khachhangF)." <--> ".json_encode($khachhangB);
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Khách hàng",$fullContent);
				header("location:".base_url()."backend/khachhang");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function xoakhachhang($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		    //xoa hinh cu
			$hinhcu = $this->tool_model->get_element_table_where("hinhdaidien",'khachhang',"id=$id");
			$hinhcu = getcwd().$hinhcu;
			if(file_exists($hinhcu)){
				unlink($hinhcu);
			}
			$ten2 = $this->tool_model->get_element_table_where('ten2','khachhang',"id=$id");
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã xóa khách hàng: ".$ten2;
			$fullContent = json_encode($this->tool_model->get_all_table_where('khachhang',"id=$id"));
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Khách hàng",$fullContent);

			$this->tool_model->xoakhachhang($id);
			header("location:".base_url()."backend/khachhang");
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	
	public function dichvu(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'dichvu';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'dichvu';
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function themdichvu(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'dichvu';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'themdichvu';
			$data['js'] = $this->FOLDER_VIEW_ADMIN.'tintuc_js';
			// set rule la ten phai co 
			$this->form_validation->set_rules('ten', 'ten', 'required');
			if ($this->form_validation->run() == TRUE){
				$id= 0;
				// thuc thi khi co ten va dang submit thong tin tuc luu vao database
				if (empty($_FILES['file']['name']) ) {
					$id = $this->tool_model->themdichvu('',0);
				}else{
					$datax=$this->upload_image('dichvu','file');
					$id = $this->tool_model->themdichvu($datax['path'],0);
				}
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã thêm dịch vụ: ".$this->input->post('ten2');
				$fullContent = json_encode($this->tool_model->get_all_table_where('dichvu',"id=$id"));
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Dịch vụ",$fullContent);

				header("location:".base_url()."backend/dichvu");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function suadichvu($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'dichvu';
			$data['id'] = $id;
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'suadichvu';
			// set rule la ten phai co 
			$this->form_validation->set_rules('ten', 'ten', 'required');
			if ($this->form_validation->run() == TRUE){
				$dichvuF = $this->tool_model->get_all_table_where('dichvu',"id=$id");
				$ten2 = $this->tool_model->get_element_table_where('ten2','dichvu',"id=$id");
				// thuc thi khi co ten va dang submit thong tin tuc luu vao database
				if (empty($_FILES['file']['name']) ) {
					$this->tool_model->suadichvu($id,'');
				}else{
					//xoa hinh cu
					$hinhcu = $this->tool_model->get_element_table_where("hinhdaidien",'dichvu',"id=$id");
					$hinhcu = getcwd().$hinhcu;
					if(file_exists($hinhcu)){
						unlink($hinhcu);
					}
					$datax=$this->upload_image('dichvu','file');
					$this->tool_model->suadichvu($id,$datax['path']);
				}
				$dichvuB = $this->tool_model->get_all_table_where('dichvu',"id=$id");
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã sửa dịch vụ: ".$ten2." thành: ".$this->input->post('ten2');
				$fullContent = json_encode($dichvuF)." <--> ".json_encode($dichvuB);
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Dịch vụ",$fullContent);
				header("location:".base_url()."backend/dichvu");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function xoadichvu($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		    //xoa hinh cu
			$hinhcu = $this->tool_model->get_element_table_where("hinhdaidien",'dichvu',"id=$id");
			$hinhcu = getcwd().$hinhcu;
			if(file_exists($hinhcu)){
				unlink($hinhcu);
			}
			$ten2 = $this->tool_model->get_element_table_where('ten2','dichvu',"id=$id");
			$this->tool_model->xoadichvu($id);
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã xóa dịch vụ: ".$ten2;
			$fullContent = json_encode($this->tool_model->get_all_table_where('dichvu',"id=$id"));
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Dịch vụ",$fullContent);
			header("location:".base_url()."backend/dichvu");
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	
	public function tuyendung(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'tuyendung';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'tuyendung';
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function themtuyendung(){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'tuyendung';
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'themtuyendung';
			$data['js'] = $this->FOLDER_VIEW_ADMIN.'tintuc_js';
			// set rule la ten phai co 
			$this->form_validation->set_rules('ten', 'ten', 'required');
			if ($this->form_validation->run() == TRUE){
				$id= 0;
				// thuc thi khi co ten va dang submit thong tin tuc luu vao database
				if (empty($_FILES['file']['name']) ) {
					$id = $this->tool_model->themtuyendung('',0);
				}else{
					$datax=$this->upload_image('tuyendung','file');
					$id = $this->tool_model->themtuyendung($datax['path'],0);
				}
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã thêm tuyển dụng: ".$this->input->post('ten2');
				$fullContent = json_encode($this->tool_model->get_all_table_where('tuyendung',"id=$id"));
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"tuyển dụng",$fullContent);

				header("location:".base_url()."backend/tuyendung");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function suatuyendung($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$data['page'] = 'tuyendung';
			$data['id'] = $id;
			$data['view'] = $this->FOLDER_VIEW_ADMIN.'suatuyendung';
			// set rule la ten phai co 
			$this->form_validation->set_rules('ten', 'ten', 'required');
			if ($this->form_validation->run() == TRUE){
				$tuyendungF = $this->tool_model->get_all_table_where('tuyendung',"id=$id");
				$ten2 = $this->tool_model->get_element_table_where('ten2','tuyendung',"id=$id");
				// thuc thi khi co ten va dang submit thong tin tuc luu vao database
				if (empty($_FILES['file']['name']) ) {
					$this->tool_model->suatuyendung($id,'');
				}else{
					//xoa hinh cu
					$hinhcu = $this->tool_model->get_element_table_where("hinhdaidien",'tuyendung',"id=$id");
					$hinhcu = getcwd().$hinhcu;
					if(file_exists($hinhcu)){
						unlink($hinhcu);
					}
					$datax=$this->upload_image('tuyendung','file');
					$this->tool_model->suatuyendung($id,$datax['path']);
				}
				$tuyendungB = $this->tool_model->get_all_table_where('tuyendung',"id=$id");
				// ghi log
				$thoigian = date("Y-m-d H:i:s");
				$content_log = "";
				$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã sửa tuyển dụng: ".$ten2." thành: ".$this->input->post('ten2');
				$fullContent = json_encode($tuyendungF)." <--> ".json_encode($tuyendungB);
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"tuyển dụng",$fullContent);
				header("location:".base_url()."backend/tuyendung");
			}
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'master',$data);
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	public function xoatuyendung($id){
		// neu dang dang nhap roi thi qua cau hinh, nguoc lai thi dang nhap
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		    //xoa hinh cu
			$hinhcu = $this->tool_model->get_element_table_where("hinhdaidien",'tuyendung',"id=$id");
			$hinhcu = getcwd().$hinhcu;
			if(file_exists($hinhcu)){
				unlink($hinhcu);
			}
			$ten2 = $this->tool_model->get_element_table_where('ten2','tuyendung',"id=$id");
			$this->tool_model->xoatuyendung($id);
			// ghi log
			$thoigian = date("Y-m-d H:i:s");
			$content_log = "";
			$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã xóa tuyển dụng: ".$ten2;
			$fullContent = json_encode($this->tool_model->get_all_table_where('tuyendung',"id=$id"));
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"tuyển dụng",$fullContent);
			header("location:".base_url()."backend/tuyendung");
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* các function ho tro rieng */
	public function upload_image($folder_path,$string_field){
		$upload_path = "./datauploads/$folder_path/";
		if (!file_exists($upload_path)) {
			mkdir($upload_path, 0777);
		}
		$config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']             = 4096; // 4MB
		$this->load->library('upload', $config);
		
		$data =array();
		$data['error'] ='';
		$data['path'] ='';
		if ( ! $this->upload->do_upload($string_field))
        {
            $data['error']= $this->upload->display_errors('<p>', '</p>');
        }else
        {
            $file_path = $this->upload->data('file_name');
			$data['path']= "/datauploads/$folder_path/".$file_path;
			$data['filename']= $file_path;
        }
		return $data;
		
   	}
   	
	public function upload_pdf($folder_path,$string_field){
		$upload_path = "./datauploads/$folder_path/";
		if (!file_exists($upload_path)) {
			mkdir($upload_path, 0777);
		}
		$config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 4096;
		$this->load->library('upload', $config);
		
		$data =array();
		$data['error'] ='';
		$data['path'] ='';
		if ( ! $this->upload->do_upload($string_field))
        {
            $data['error']= $this->upload->display_errors('<p>', '</p>');
        }else
        {
            $file_path = $this->upload->data('file_name');
			$data['path']= "/datauploads/$folder_path/".$file_path;
			$data['filename']= $file_path;
        }
		return $data;
		
   	}
}
