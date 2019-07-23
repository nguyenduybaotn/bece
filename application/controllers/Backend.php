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
			$thoigian = date("Y-m-d h:i:s");
			$content_log = "";
			$content_log .= "<b>".$data['tendangnhap']."</b> đăng nhập không thành công";
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,0);
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
			$thoigian = date("Y-m-d h:i:s");
			$content_log = "";
			$content_log .= "<b>".$nhanvien->tendangnhap."</b> đăng nhập thành công";
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,1,"Đăng nhập/Đăng xuất");
		}else if(count($nhanvien) > 1 || count($nhanvien) == 0){ // khong ton tai hoac co tu 2 ket qua tro len
			echo 0;
			// ghi log
			$thoigian = date("Y-m-d h:i:s");
			$content_log = "";
			$content_log .= "<b>".$data['tendangnhap']."</b> đăng nhập không thành công";
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log,0);
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
			$thoigian = date("Y-m-d h:i:s");
			$content_log = "";
			$content_log .= "<b>".$_SESSION['tendangnhap']."</b> đã đăng xuất";
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);
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
			//co ton tai email
			//send email
			$content = "";
			$title = "";
			$config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.nbcmedia.vn',
                    'smtp_port' => 25,
                    'smtp_user' => 'bao.nguyen@nbcmedia.vn',
                    'smtp_pass' => 'ndb',
                    'mailtype'  => 'html', 
                    'charset'   => 'utf-8'  
                );
			$to = $email;
	        $from = "booking@theorchestra.com";
	        $subject = $title;
	        $message = $content;
	
	        $this->load->library('email',$config);
			
	        $this->email->set_newline("\r\n");
	        $this->email->from($from,'The Rainbow Show');
	        $this->email->to($to);
	        $this->email->subject($subject);
	        $this->email->message($message);
	 
	        $this->email->send();
			echo $this->email->print_debugger();
			/*
			if($this->tool_model->send_email($data,"1","2"))
				echo "1";
			else
				echo "2";
			*/
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
				
    			// ghi log
    			$thoigian = date("Y-m-d h:i:s");
    			$content_log = "";
    			$content_log .= "Cấu hình";
    			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);
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
			// set rule la ten phai co 
			$this->form_validation->set_rules('hoten', 'hoten', 'required');
			if ($this->form_validation->run() == TRUE){
				if (empty($_FILES['file']['name']) ) {
					$this->nhanvien_model->profile_update('');
				}else{
					$datax=$this->upload_image('menu','file');
					$this->nhanvien_model->profile_update($datax['path']);
				}
				
				// ghi log
				$thoigian = date("Y-m-d h:i:s");
				$content_log = "";
				$content_log .= "Vào trang profile của ".$tendangnhap;
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);
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
			$thoigian = date("Y-m-d h:i:s");
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
				$thoigian = date("Y-m-d h:i:s");
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
					$thoigian = date("Y-m-d h:i:s");
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
					$thoigian = date("Y-m-d h:i:s");
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
			$thoigian = date("Y-m-d h:i:s");
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
				$thoigian = date("Y-m-d h:i:s");
				$content_log = "";
				$content_log .= "Thêm menu ".json_encode($this->tool_model->get_all_table_where('menu',"id=$id"));
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);
				
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
				$thoigian = date("Y-m-d h:i:s");
				$content_log = "";
				$content_log .= "Đang sửa menu id ".$id." với giá trị ban đầu: ".json_encode($menu)." thành: ".json_encode($menu2);
				$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);
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
			// ghi log
			$thoigian = date("Y-m-d h:i:s");
			$content_log = "";
			$content_log .= "Xóa menu id: ".$id." với giá trị: ".json_encode($this->tool_model->get_all_table_where('menu',"id=$id"));
			$this->tool_model->ghi_log($this->tool_model->get_client_ip(), $thoigian, $content_log);

			//xoa hinh cu
    		$hinhcu = $this->tool_model->get_element_table_where("img",'menu',"id=$id");
    		if($hinhcu!=''){
				$hinhcu = getcwd().$hinhcu;
				if(file_exists($hinhcu)){
					unlink($hinhcu);
				}
    		}
			$this->tool_model->xoamenu($id);
			header("location:".base_url()."backend/menu");
		}else{
			$this->load->view( $this->FOLDER_VIEW_ADMIN.'login');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* các function ho tro rieng */
	public function upload_image($folder_path,$string_field){
		$config['upload_path']          = "./datauploads/$folder_path/";
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
		$config['upload_path']          = "./datauploads/$folder_path/";
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
