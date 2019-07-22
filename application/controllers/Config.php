<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

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
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }
	/* 
    function cho trang index
    URL: / or /index
    */
	public function index()
	{
       //1. chạy các cấu hình
        // 1.1. chọn 1 hay 2 ngôn ngữ
        $this->load->view('config');
	}
}
