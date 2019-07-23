<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Nguyen Duy Bao
 * Description: Tool model class
 */
class Tool_model extends CI_Model{

	public function get_all_table_where($table, $where){
        if($table && $where){
            $sql = "select * from $table where $where";
            $kq=$this->db->query($sql);
            return $kq->result();
        }else{
            return "";
        }
		
	}
    public function get_element_table_where($element, $table, $where){
        $sql = "select $element from $table where $where";
        $kq=$this->db->query($sql);
        return $kq->num_rows()?$kq->row()->$element:'';
	}
    public function format_date($date){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $d = date_create($date);
        return date_format($d,"d/m/Y h:m:s");
    }
	function stripUnicode($str){
		if(!$str) return false;
		$unicode = array(
		 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		 'd'=>'đ',
		 'D'=>'Đ',
		 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		 'i'=>'í|ì|ỉ|ĩ|ị',	  
		 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);
		foreach($unicode as $khongdau=>$codau) {
		  $arr = explode("|",$codau);
		  $str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}
	function encode_url($url,$id=''){
		$str = $this->stripUnicode($url);
		$str = str_replace("?","",$str);
		$str = str_replace("%","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);
		$str = str_replace("/","-",$str);
		$str = str_replace("\\","",$str);
		$str = str_replace(",","",$str);
		$str = str_replace("(","",$str);
		$str = str_replace(")","",$str);
		$str = str_replace("$","",$str);
		$str = str_replace("*","",$str);
		$str = str_replace("@","",$str);
		$str = str_replace("!","",$str);
		$str = str_replace("+","",$str);
		$str = str_replace("|","",$str);
		$str = str_replace('"','',$str);
		$str = str_replace(':','',$str);
		$str = str_replace('“','',$str);
		$str = str_replace('”','',$str);
		$str = str_replace('–','',$str);
		$str = str_replace('[','',$str);
		$str = str_replace(']','',$str);
		
		$str = str_replace("\t\n\r\0\x0B\xc2\xa0",'',$str);
		$str = trim($str, "\t\n\r\0\x0B\xc2\xa0");
		//$str = trim($str);
		$str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');
	// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","-",$str);
		$str = str_replace("  ","-",$str);
		$str = str_replace("----","-",$str);	
		$str = str_replace("---","-",$str);	
		$str = str_replace("--","-",$str);	//–
		$str = str_replace(" -","-",$str);	//–
		
		if($id==''){
			return trim($str);
		}else{
			return trim($str)."-$id".".html";
		}
	}
	function encode_url_map($url){
		$str = $this->stripUnicode($url);
		$str = str_replace("?","",$str);
		$str = str_replace("%","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);		
		$str = str_replace("  "," ",$str);
		$str = str_replace("/","-",$str);
		$str = str_replace("\\","",$str);
		$str = str_replace(",","",$str);
		$str = str_replace("(","",$str);
		$str = str_replace(")","",$str);
		$str = str_replace("$","",$str);
		$str = str_replace("*","",$str);
		$str = str_replace("@","",$str);
		$str = str_replace("!","",$str);
		$str = str_replace("+","",$str);
		$str = str_replace("|","",$str);
		$str = str_replace('"','',$str);
		$str = str_replace(':','',$str);
		$str = str_replace('“','',$str);
		$str = str_replace('”','',$str);
		$str = trim($str);
		$str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');
	// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","+",$str);
		$str = str_replace("----","+",$str);	
		$str = str_replace("---","+",$str);	
		$str = str_replace("--","+",$str);	
		return $str;
		
	}
	function removeSpecialChar($url){
		$str = $this->stripUnicode($url);
		$str = str_replace("?","",$str);
		$str = str_replace("%","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);		
		$str = str_replace("  ","",$str);
		$str = str_replace("/","",$str);
		$str = str_replace("\\","",$str);
		$str = str_replace(",","",$str);
		$str = str_replace("(","",$str);
		$str = str_replace(")","",$str);
		$str = str_replace("$","",$str);
		$str = str_replace("*","",$str);
		$str = str_replace("@","",$str);
		$str = str_replace("!","",$str);
		$str = str_replace("+","",$str);
		$str = str_replace("|","",$str);
		$str = str_replace('"','',$str);
		$str = str_replace(':','',$str);
		$str = str_replace('“','',$str);
		$str = str_replace('”','',$str);
		$str = trim($str);
		$str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');
	// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","",$str);
		$str = str_replace("----","",$str);	
		$str = str_replace("---","",$str);	
		$str = str_replace("--","",$str);	
		return $str;
		
	}
	function catchuoi($str, $length, $minword = 3)
	{
		$sub = '';
		$len = 0;
		foreach (explode(' ', $str) as $word)
		{
			$part = (($sub != '') ? ' ' : '') . $word;
			$sub .= $part;
			$len += strlen($part);
			if (strlen($word) > $minword && strlen($sub) >= $length)
			{
			  break;
			}
		 }
		return $sub . (($len < strlen($str)) ? '...' : '');
	}	
	function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
	public function count_row_table_where($table, $where){
		$sql = "select * from $table where $where";
		$kq = $this->db->query($sql);
		return $kq->num_rows();
	}
	public function remove_row_table_where($table, $where){
		$sql = "delete from $table where $where";
		$kq = $this->db->query($sql);
	}
	public function get_max($table){
		$sql = "select max(sapxep) as m from $table";
        $kq=$this->db->query($sql);
        return $kq->num_rows()!=NULL ? ($kq->row()->m + 1) : 1;
	}
	public function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	public function send_email($email,$title,$content){
		/*hE3f+8&OOeT?*/
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
	 
	        if($this->email->send()) {
                    return true;
        	}else {
                    return false;
        	}
	}
	public function ghi_log($ip, $thoigian, $content, $trangthai=0,$danhmuc=''){
		$data = array(
			'ip' 			=> $ip,
			'thoigian'  	=> $thoigian,
			'noidung' 		=> $content,
			'trangthai'		=> $trangthai,
			'danhmuc'		=> $danhmuc
		);
		$this->db->insert('truycap',$data);
	}
	public function get_danhmuc_cha2($active, $cha, $table){
		$kq= '';
		if($active) $kq.= " --> ".$this->get_element_table_where('ten2',$table,"id='$cha'");
		else $kq.= $this->get_element_table_where('ten2',$table,"id='$cha'");
		// cha cua $idcha
		$c = $this->get_element_table_where('danhmuccha',$table,"id='$cha'");
		if($c)
			return $kq.= $this->get_danhmuc_cha2(1,$c,$table);
		else return $kq;
		
	}	
	public function get_danhmuc_cha3($table,$active, $cha){
		$kq= '';
		if($active) $kq.= " --> ".$this->get_element_table_where('ten',$table,"id='$cha'");
		else $kq.= $this->get_element_table_where('ten',$table,"id='$cha'");
		// cha cua $idcha
		$c = $this->get_element_table_where('loai',$table,"id='$cha'");
		if($c)
			return $kq.= $this->get_danhmuc_cha3($table,1,$c);
		else return $kq;
		
	}	
	function cauhinh($hinhdaidien,$banner_services_support){
		$ten = $this->input->post('ten');
		$ten2 = $this->input->post('ten2');
		$diachi = $this->input->post('diachi');
		$diachi2 = $this->input->post('diachi2');
		$diachi_ = $this->input->post('diachi_');
		$diachi_2 = $this->input->post('diachi_2');
		$email = $this->input->post('email');
		$tel = $this->input->post('tel');
		$fax = $this->input->post('fax');
		$phone = $this->input->post('phone');
		$email_ = $this->input->post('email_');
		$tel_ = $this->input->post('tel_');
		$fax_ = $this->input->post('fax_');
		$text_contact2 = $this->input->post('text_contact2');
		$text_contact = $this->input->post('text_contact');
		$text_services_support2 = $this->input->post('text_services_support2');
		$text_services_support = $this->input->post('text_services_support');
		$facebook = $this->input->post('facebook');
		$googleplus = $this->input->post('googleplus');
		$youtube = $this->input->post('youtube');
		$twitter = $this->input->post('twitter');
		$map = $this->input->post('map');
		$copyright = $this->input->post('copyright');
		$map_ = $this->input->post('map_');
        if($hinhdaidien=='') $hinhdaidien = $this->tool_model->get_element_table_where('logo','cauhinh',"id=1");
        if($banner_services_support=='') $banner_services_support = $this->tool_model->get_element_table_where('banner_services_support','cauhinh',"id=1");
		$data = array(
			'logo' 		=> $hinhdaidien,
			'banner_services_support' 		=> $banner_services_support,
			'ten' 	    => $ten,
			'ten2' 	    => $ten2,
			'diachi' 	=> $diachi,
			'diachi2' 	=> $diachi2,
			'diachi_' 	=> $diachi_,
			'diachi_2' 	=> $diachi_2,
			'email' 	=> $email,
			'tel' 		=> $tel,
			'fax' 		=> $fax,
			'phone' 	=> $phone,
			'map' 		=> $map,
			'copyright' => $copyright,
			'email_' 	=> $email_,
			'tel_' 		=> $tel_,
			'fax_' 		=> $fax_,
			'map_' 		=> $map_,
			'text_contact2' 		=> $text_contact2,
			'text_contact' 		=> $text_contact,
			'text_services_support2' 		=> $text_services_support2,
			'text_services_support' 		=> $text_services_support,
			'facebook'	=> $facebook,
			'google'	=> $google,
			'twitter' 	=> $twitter,
			'linkedin' 	=> $linkedin
		);
		$this->db->where('id',1);
		$this->db->update('cauhinh',$data);
	}
	function about(){
		$noidung = $this->input->post('noidung2');
		$data = array(
			'about' 		=> $noidung
		);
		$this->db->where('id',1);
		$this->db->update('cauhinh',$data);
	}
	function thembanner($hinhdaidien){
		$ten = $this->input->post('ten');
		$ten2 = $this->input->post('ten2');
		$sapxep = $this->input->post('sapxep');
		$mota = $this->input->post('mota');
		$mota2 = $this->input->post('mota2');
		$lienket = $this->input->post('lienket');
		$lienket2 = $this->input->post('lienket2');
		
		if($this->input->post('trangthai') == null)
			$trangthai = 0;
		else
			$trangthai = 1;
		
		$data = array(
			'ten' 		    => $ten,
			'ten2' 		    => $ten2,
			'mota' 		    => $mota,
			'mota2' 		=> $mota2,
			'lienket' 		=> $lienket,
			'lienket2' 		=> $lienket2,
			'hinhdaidien' 	=> $hinhdaidien,
			'loai' 			=> 4,
			'sapxep' 		=> $sapxep,
			'trangthai'		=> $trangthai
		);
		$this->db->insert('banner',$data);
		return $this->db->insert_id();
	}
	function suabanner($id,$hinhdaidien){
		$ten = $this->input->post('ten');
		$ten2 = $this->input->post('ten2');
		$sapxep = $this->input->post('sapxep');
		$mota = $this->input->post('mota');
		$mota2 = $this->input->post('mota2');
		$lienket = $this->input->post('lienket');
		$lienket2 = $this->input->post('lienket2');
		
		if($this->input->post('trangthai') == null)
			$trangthai = 0;
		else
			$trangthai = 1;
		if($hinhdaidien=='') $hinhdaidien = $this->tool_model->get_element_table_where('hinhdaidien','banner',"id=$id");	
		
		$data = array(
			'ten' 		    => $ten,
			'ten2' 		    => $ten2,
			'mota' 		    => $mota,
			'mota2' 		=> $mota2,
			'lienket' 		=> $lienket,
			'lienket2' 		=> $lienket2,
			'hinhdaidien' 	=> $hinhdaidien,
			'loai' 			=> 4,
			'sapxep' 		=> $sapxep,
			'trangthai'		=> $trangthai
		);
		$this->db->where('id',$id);
		$this->db->update('banner',$data);
	}
	function xoabanner($id){
		$this->db->delete('banner',array('id' => $id));
	}
	function themmenu($hinhdaidien){
		$ten = $this->input->post('ten');
		$ten2 = $this->input->post('ten2');
		$sapxep = $this->input->post('sapxep');
		$danhmuccha = $this->input->post('danhmuccha');
		if($this->input->post('trangthai') == null)
			$trangthai = 0;
		else
			$trangthai = 1;
		
		$data = array(
			'tenmenu' 		=> $ten,
			'tenmenu2' 		=> $ten2,
			'danhmuccha'  	=> $danhmuccha,
			'lienket' 		=> $this->encode_url($ten),
			'lienket2' 		=> $this->encode_url($ten2),
			'img' 			=> $hinhdaidien,
			'sapxep' 		=> $sapxep,
			'trangthai'		=> $trangthai
		);
		$this->db->insert('menu',$data);
		return $this->db->insert_id();
	}
	function update_routes($old, $new){
	    $routes_path = file_get_contents(APPPATH."config/routes.php");
	    $routes = str_replace("route['".$old,"route['".$new,$routes_path);
	    $file = fopen(APPPATH."config/routes.php","w");
        fwrite($file,$routes);
        fclose($file);
	}
	function suamenu($id,$hinhdaidien){
		$ten = $this->input->post('ten');
		$ten2 = $this->input->post('ten2');
		$sapxep = $this->input->post('sapxep');
		$danhmuccha = $this->input->post('danhmuccha');
		if($this->input->post('trangthai') == null)
			$trangthai = 0;
		else
			$trangthai = 1;
		if($hinhdaidien=='') $hinhdaidien = $this->tool_model->get_element_table_where('img','menu',"id=$id");
		$data = array(
			'tenmenu' 		=> $ten,
			'tenmenu2' 		=> $ten2,
			'danhmuccha'  	=> $danhmuccha,
			'lienket' 		=> $this->encode_url($ten),
			'lienket2' 		=> $this->encode_url($ten2),
			'img' 			=> $hinhdaidien,
			'sapxep' 		=> $sapxep,
			'trangthai'		=> $trangthai
		);
		$this->db->where('id',$id);
		$this->db->update('menu',$data);
		// cap nhat file routes
		//$this->update_routes();
		
	}
	function xoamenu($id){
		if($this->tool_model->count_row_table_where('menu',"id=$id") > 0){
			$this->db->delete('menu',array('id' => $id));
			return 1;
		}else{
			return -1;
		}
	}
	function laymaxsapxepmenu(){
		$sql = "select max(sapxep) as maxsapxep from menu";
		$kq=$this->db->query($sql);
        return $kq->row()->maxsapxep+1;
	}
	
	function themtintuc($hinhdaidien,$loai){
		$ten = $this->input->post('ten');
		$mota = $this->input->post('mota');
		$noidung = $this->input->post('noidung');
		$ten2 = $this->input->post('ten2');
		$mota2 = $this->input->post('mota2');
		$noidung2 = $this->input->post('noidung2');
		
		$sapxep = $this->input->post('sapxep');
		if($this->input->post('trangthai') == null)
			$trangthai = 0;
		else
			$trangthai = 1;
		$ngaydang = date("Y-m-d H:i:s");

		$data = array(
			'ten' 			=> $ten,
			'mota'  		=> $mota,
			'noidung' 		=> $noidung,
			'ten2' 			=> $ten2,
			'mota2'  		=> $mota2,
			'noidung2' 		=> $noidung2,
			'hinhdaidien' 	=> $hinhdaidien,
			'sapxep' 		=> $sapxep,
			'loai' 			=> $loai,
			'ngaydang' 		=> $ngaydang,
			'trangthai'		=> $trangthai,
			'lienket'		=> $this->tool_model->encode_url($ten,$sapxep),
			'lienket2'		=> $this->tool_model->encode_url($ten2,$sapxep)
		);
		$this->db->insert('tintuc',$data);
	}
	function suatintuc($id,$hinhdaidien){
		$ten = $this->input->post('ten');
		$mota = $this->input->post('mota');
		$noidung = $this->input->post('noidung');
		
		$ten2 = $this->input->post('ten2');
		$mota2 = $this->input->post('mota2');
		$noidung2 = $this->input->post('noidung2');
		$sapxep = $this->input->post('sapxep');
		if($this->input->post('trangthai') == null)
			$trangthai = 0;
		else
			$trangthai = 1;
		
		if($hinhdaidien=='') $hinhdaidien = $this->tool_model->get_element_table_where('hinhdaidien','tintuc',"id=$id");

		$data = array(
			'ten' 			=> $ten,
			'mota'  		=> $mota,
			'noidung' 		=> $noidung,
			'ten2' 			=> $ten2,
			'mota2'  		=> $mota2,
			'noidung2' 		=> $noidung2,
			'hinhdaidien' 	=> $hinhdaidien,
			'sapxep' 		=> $sapxep,
			'trangthai'		=> $trangthai,
			'lienket'		=> $this->tool_model->encode_url($ten,$sapxep),
			'lienket2'		=> $this->tool_model->encode_url($ten2,$sapxep)
		);
		$this->db->where('id',$id);
		$this->db->update('tintuc',$data);
	}
	function xoatintuc($id){
		$this->db->delete('tintuc',array('id' => $id));
	}
	
	
	function themdichvu($hinhdaidien,$loai){
		$ten = $this->input->post('ten');
		$mota = $this->input->post('mota');
		$noidung = $this->input->post('noidung');
		$ten2 = $this->input->post('ten2');
		$mota2 = $this->input->post('mota2');
		$noidung2 = $this->input->post('noidung2');
		
		$sapxep = $this->input->post('sapxep');
		if($this->input->post('trangthai') == null)
			$trangthai = 0;
		else
			$trangthai = 1;
		$ngaydang = date("Y-m-d H:i:s");

		$data = array(
			'ten' 			=> $ten,
			'mota'  		=> $mota,
			'noidung' 		=> $noidung,
			'ten2' 			=> $ten2,
			'mota2'  		=> $mota2,
			'noidung2' 		=> $noidung2,
			'hinhdaidien' 	=> $hinhdaidien,
			'sapxep' 		=> $sapxep,
			'loai' 			=> $loai,
			'ngaydang' 		=> $ngaydang,
			'trangthai'		=> $trangthai,
			'lienket'		=> $this->tool_model->encode_url($ten,$sapxep),
			'lienket2'		=> $this->tool_model->encode_url($ten2,$sapxep)
		);
		$this->db->insert('dichvu',$data);
	}
	function suadichvu($id,$hinhdaidien){
		$ten = $this->input->post('ten');
		$mota = $this->input->post('mota');
		$noidung = $this->input->post('noidung');
		
		$ten2 = $this->input->post('ten2');
		$mota2 = $this->input->post('mota2');
		$noidung2 = $this->input->post('noidung2');
		$sapxep = $this->input->post('sapxep');
		if($this->input->post('trangthai') == null)
			$trangthai = 0;
		else
			$trangthai = 1;
		
		if($hinhdaidien=='') $hinhdaidien = $this->tool_model->get_element_table_where('hinhdaidien','dichvu',"id=$id");

		$data = array(
			'ten' 			=> $ten,
			'mota'  		=> $mota,
			'noidung' 		=> $noidung,
			'ten2' 			=> $ten2,
			'mota2'  		=> $mota2,
			'noidung2' 		=> $noidung2,
			'hinhdaidien' 	=> $hinhdaidien,
			'sapxep' 		=> $sapxep,
			'trangthai'		=> $trangthai,
			'lienket'		=> $this->tool_model->encode_url($ten,$sapxep),
			'lienket2'		=> $this->tool_model->encode_url($ten2,$sapxep)
		);
		$this->db->where('id',$id);
		$this->db->update('dichvu',$data);
	}
	function xoadichvu($id){
		$this->db->delete('dichvu',array('id' => $id));
	}
	
	public function get_danhmuc_by_id($id){
		$sql = "select danhmuccha from danhmucsanpham where id = '$id' ";
		$kq=$this->db->query($sql);
		return $kq->row()->danhmuccha;
	}
	public function get_all_category_by_link($link,$language){
		$result =array();
		$iddanhmuc = $this->get_element_table_where('id','danhmucsanpham', "lienkettrong='$link'");
		if($language=='en') $iddanhmuc = $this->get_element_table_where('id','danhmucsanpham', "lienkettrong2='$link'");
		$ck=true;
		while($ck){
			$iddanhmuc = $this->get_danhmuc_by_id($iddanhmuc);
			if($iddanhmuc)
				array_push($result,$iddanhmuc);
			else
				$ck=false;
		}
		return $result;
	}
	
	public function debug($data=""){
		if(isset($data)){
			if($data != ""){	
				if( is_array($data) ){
					echo "<pre>";
					print_r($data);
					echo "</pre>";
				}else{
					echo "<font color='red' >Error - Day la 1 chuoi .</font>";
				}	
			}else{
				echo "<font color='red' >Error - Bien rong .</font>";
			}
		}else{
			echo "<font color='red' >Error - Bien nay chua ton tai .</font>";
		}
	}

	public function get_all_table_where_array($table, $where){
		$sql = "select * from $table where $where";
		$kq=$this->db->query($sql);
		return $kq->result_array();
	}
	public function get_element_table_where_array($element, $table, $where){
        $sql = "select $element from $table where $where";
        $kq=$this->db->query($sql);
        if($kq->num_rows() > 0){
        	$data = $kq->row_array();
        	return $data[$element];
        }
	}
	public function save_contact($name,$tel,$email,$content){
		$date = 
		$data = array(
			'name' 		=> $name,
			'tel' 		=> $tel,
			'email' 	=> $email,
			'content'	=> $content,
			'ip'		=> $this->get_client_ip(),
			'date'		=> date("Y-m-d h:i:s")
		);
		$this->db->insert('contact',$data);
	}
	public function update_element_table_where($ele,$value,$table,$id){
		$data = array(
			$ele => $value
		);
		$this->db->where('id',$id);
		$this->db->update($table,$data);
	}
}
?>
