<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($_SESSION['lang'])){
	$url=$this->uri->segment(1);
	if($url==''){
		$_SESSION['lang']='2';
	}else{
		if(count($this->tool_model->get_all_table_where("menu","lienket2='$url'"))){
			$_SESSION['lang']='2';
		}else if(count($this->tool_model->get_all_table_where("menu","lienket='$url'"))){
			$_SESSION['lang']='';
		}else{
			$urlx=$this->uri->segment(2);
			if(count($this->tool_model->get_all_table_where("menu","lienket2='$urlx'"))){
    			$_SESSION['lang']='2';
    		}else if(count($this->tool_model->get_all_table_where("menu","lienket='$urlx'"))){
    			$_SESSION['lang']='';
    		}
		}
	}
}else{
	$url=$this->uri->segment(1);
	if($url==''){
		$_SESSION['lang']='2';
	}else{
		if(count($this->tool_model->get_all_table_where("menu","lienket2='$url' and lienket!='$url'"))){
			$_SESSION['lang']='2';
		}else if(count($this->tool_model->get_all_table_where("menu","lienket='$url' and lienket2!='$url'"))){
			$_SESSION['lang']='';
		}else if(count($this->tool_model->get_all_table_where("menu","lienket='$url' and lienket2='$url'"))){
		    
		}else{
			$urlx=$this->uri->segment(2);
			if(count($this->tool_model->get_all_table_where("menu","lienket2='$urlx'"))){
    			$_SESSION['lang']='2';
    		}else if(count($this->tool_model->get_all_table_where("menu","lienket='$urlx'"))){
    			$_SESSION['lang']='';
    		}
		}
	}
}
if(isset($_POST['language_vie'])){
	$_SESSION['lang']='';
	$url=$this->uri->segment(1);
    if($url=='') $url ='undefine';
	//echo $url;
	//return false;
	if(count($this->tool_model->get_all_table_where("menu","lienket2='$url' and lienket!='$url'"))){

		$segs = $this->uri->segment_array();
		$url='';
		$i=1;
		foreach ($segs as $segment){
			if($i==1) $url.= $this->tool_model->get_element_table_where("lienket",'menu',"lienket2='$segment'");
			else $url.= "/".$this->tool_model->get_element_table_where("lienket",'menu',"lienket2='$segment'");
			$i++;
		}
		$url = base_url($url);
		echo $url;
		header("Location: $url");
		exit;
	}
}
if(isset($_POST['language_eng'])){
	$_SESSION['lang']='2';
	$url=$this->uri->segment(1);
    if($url=='') $url ='undefine';
	if(count($this->tool_model->get_all_table_where("menu","lienket='$url' and lienket2!='$url'"))){
		$segs = $this->uri->segment_array();
		$url='';
		$i=1;
		foreach ($segs as $segment){
			if($i==1) $url.= $this->tool_model->get_element_table_where("lienket2",'menu',"lienket='$segment'");
			else $url.= "/".$this->tool_model->get_element_table_where("lienket2",'menu',"lienket='$segment'");
			$i++;
		}
		$url = base_url($url);
		header("Location: $url");
		exit;
	}
}

$ten ='tenmenu'.$_SESSION['lang'];
$lienket ='lienket'.$_SESSION['lang'];
$title = "New Galaxy Power ";
$description = "New Galaxy Power ";
if($this->tool_model->get_element_table_where($ten,'menu',"$lienket='$url'")){
	$title = $this->tool_model->get_element_table_where($ten,'menu',"$lienket='$url'")." | New Galaxy Power";
}
if(isset($title_f)) $title = $title_f;
if(isset($description_f)) $description = $description_f;

$logo = $this->tool_model->get_element_table_where('logo','cauhinh','id=1');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicon');?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicon');?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicon');?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url('favicon');?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo base_url('favicon');?>/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
	
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('favicon');?>/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('favicon');?>/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('favicon');?>/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('favicon');?>/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('favicon');?>/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('favicon');?>/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('favicon');?>/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('favicon');?>/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicon');?>/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('favicon');?>/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicon');?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('favicon');?>/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicon');?>/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url('favicon');?>/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url('favicon');?>/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<!-- META FOR FACEBOOK -->
	<meta content="Tin nhanh VnExpress" property="og:site_name"/>
	<meta property="og:url" itemprop="url" content="<?php echo base_url();?>"/>
	<meta property="og:image" itemprop="thumbnailUrl" content="<?php echo $logo; ?>"/>
	<meta content="<?php echo $title;?>" itemprop="headline" property="og:title"/>
	<meta content="<?php echo $description;?>" itemprop="description" property="og:description"/>
	<!-- END META FOR FACEBOOK -->
	
	<title><?php echo $title;?></title>
	<link rel="stylesheet" href="<?php echo base_url('themes/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('themes/css/animate.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php if(isset($css)) $this->load->view($css);?>
	<link rel="stylesheet" href="<?php echo base_url('themes/css/master.css');?>">
	
</head>
<body>
	
	<div class="container-fluid body p-0">
	<?php 
	if(isset($view)) $this->load->view($view); 
	$this->load->view("footer");
	?>
	</div>
	<!-- end body -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo base_url('themes/js/popper.js');?>" ></script>
	<script src="<?php echo base_url('themes/js/bootstrap.min.js');?>" ></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="<?php echo base_url('themes/slick/slick.js');?>" ></script>
	
    <script type="text/javascript" src="<?php echo base_url('themes/js/blockUI.js');?>"></script>

    <?php if(isset($js)) $this->load->view($js); ?>
    
</body>
</html>

