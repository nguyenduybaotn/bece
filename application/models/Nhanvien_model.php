<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Nguyen Duy Bao
 * Description: Nhan vien model class
 */
class Nhanvien_model extends CI_Model{
	protected $table_nhanvien = [];
	function __construct(){
		parent::__construct();
		// ten bang trong csdl la `nhanvien` 
		// id , hoten, tendangnhap, tendangnhapmd5, matkhau, trangthai
		$this->table_nhanvien['ten'] = "nhanvien";
	}
	
	// function kiem tra dang nhap --> tra ve nhanvien[0] (nhan vien dau tien tim thay) neu khop thong tin, nguoc lai tra lai -1
	function kiemtradangnhap($tendangnhap, $matkhau){
		// trim khoang trang
		$tendangnhap = trim($tendangnhap);
		$matkhau = trim($matkhau);
		// ma hoa md5 chuoi mat khau va ten dang nhap truyen vao
		$matkhau = md5($matkhau);
		$tendangnhap = md5($tendangnhap);
		// so sanh chuoi ma hoa chu khong so sanh truc tiep de bi tan con sql injection
		$sql = "tendangnhapmd5='$tendangnhap' and matkhau='$matkhau'";
		$kq = $this->tool_model->get_all_table_where($this->table_nhanvien['ten'],$sql);
		if(count($kq))
			return $kq[0];
		else
			return '-1';
	}
	function profile_edit($user){
		//$user : id, hoten, matkhau, trangthai
		$matkhau = trim($user['matkhau']);
		if($matkhau == ''){
			// khong doi mat khau
			$data = array(
				'hoten' 		=> $user['hoten'],
				'trangthai'		=> $user['trangthai']
			);
			$this->db->where('id',$user['id']);
			$this->db->update($this->table_nhanvien['ten'],$data);
			return 1;
		}else{
			// doi mat khau
			$data = array(
				'hoten' 		=> $user['hoten'],
				'matkhau'  		=> md5($matkhau),
				'trangthai'		=> $user['trangthai']
			);
			$this->db->where('id',$user['id']);
			$this->db->update($this->table_nhanvien['ten'],$data);
			return 1;
		}
		
	}
	
	function profile_update($path){
		$hoten = $this->input->post('hoten');
		$tendangnhap = $this->input->post('ten');
		$matkhau = $this->input->post('matkhau');
		if($path=='') $path = $this->tool_model->get_element_table_where('hinhdaidien','nhanvien',"tendangnhap='".$tendangnhap."'"); 
		if($matkhau != ''){
			$data = array(
				'hoten' 		=> $hoten,
				'matkhau' 		=> md5($matkhau),
				'hinhdaidien'	=> $path
			);
			$this->db->where('tendangnhap',$tendangnhap);
			$this->db->update($this->table_nhanvien['ten'],$data);
			//$this->db->insert('nhanvien',$data);
		}else{
			$data = array(
				'hoten' 		=> $hoten,
				'hinhdaidien'	=> $path
			);
			$this->db->where('tendangnhap',$tendangnhap);
			$this->db->update($this->table_nhanvien['ten'],$data);
			//$this->db->insert('nhanvien',$data);
		}
	}
	
	function themnhanvien(){
		$ten = $this->input->post('ten');
		$tendangnhap = $this->input->post('tendangnhap');
		$matkhau = $this->input->post('matkhau');
		$loai = $this->input->post('loainhanvien');
		
		if($this->input->post('trangthai') == null)
			$trangthai = 0;
		else
			$trangthai = 1;

		$data = array(
			'hoten' 		=> $ten,
			'tendangnhap' 	=> $tendangnhap,
			'matkhau' 		=> md5($matkhau),
			'tendangnhapmd5'=> md5($tendangnhap),
			'trangthai'		=> $trangthai,
			'loai'			=> $loai
		);
		$this->db->insert('nhanvien',$data);
		return $this->db->insert_id();
	}
	function suanhanvien($id){
		$ten = $this->input->post('ten');
		$tendangnhap = $this->input->post('tendangnhap');
		$matkhau = trim($this->input->post('matkhau'));
		$loai = $this->input->post('loainhanvien');
		
		if($this->input->post('trangthai') == null)
			$trangthai = 0;
		else
			$trangthai = 1;
		if($matkhau == ''){
			$data = array(
				'hoten' 		=> $ten,
				'tendangnhap' 	=> $tendangnhap,
				'tendangnhapmd5'=> md5($tendangnhap),
				'trangthai'		=> $trangthai,
				'loai'			=> $loai
			);
			$this->db->where('id',$id);
			$this->db->update('nhanvien',$data);
		}else{
			$data = array(
				'hoten' 		=> $ten,
				'tendangnhap' 	=> $tendangnhap,
				'matkhau' 		=> md5($matkhau),
				'tendangnhapmd5'=> md5($tendangnhap),
				'trangthai'		=> $trangthai,
				'loai'			=> $loai
			);
			$this->db->where('id',$id);
			$this->db->update('nhanvien',$data);
		}
	}
}
?>
