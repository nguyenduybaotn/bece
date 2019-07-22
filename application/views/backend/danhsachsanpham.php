<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Danh mục sách phẩm</li>
    </ol>
</nav>
<div class="row m-0">
    <!-- danh sach menu -->
    <p>
        <!-- Button trigger modal -->
        <a href='<?php echo base_url("ckfinder/created_ses_ck.php?ses=login_ck&redirect=".base_url('backend/themsanpham')); ?>' class="btn btn-success btn-sm" >
            <i class="fa fa-plus"></i>&nbsp;&nbsp;Thêm sản phẩm
        </a>
    </p>
    <!-- load danh sach menu tu controler -->
    <table style='width:100%' id='table_b' class="table table-bordered" >
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Sắp xếp</th>
                <th>Trại thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody class='table_danhsachtintuc'>
            <?php
			$page=0;
			$numberperpage=100;
            $total = count($this->tool_model->get_all_table_where('sanpham',"1"));
            if(!isset($_GET['page'])){
                $page = 0;
                $limit_s = 0;
                $limit_e = $numberperpage;    
            }else{
                $limit_s = intval($_GET['page'])*$numberperpage;
                $limit_e = $numberperpage;
                $page = $_GET['page'];
            }
			$limit = "limit $limit_s,$limit_e";
			if(isset($_GET['bao'])){
				$limit = "";
			}
            $i=1;
            foreach($this->tool_model->get_all_table_where('sanpham',"1 order by sapxep desc") as $row){
                $row->trangthai ? $trangthai = "<i class='btn btn-success btn-sm'>Kích hoạt</i>" : $trangthai = "<i class='btn btn-danger btn-sm'>Ẩn</i>";
                $stt = ($numberperpage*$page)+$i;
				$btn_gallery = "<button type='button' class='btn btn-primary btn-sm' >
                        <i class='fa fa-list'></i>&nbsp;&nbsp;<a style='color:white;text-decoration:none;' href='".base_url('backend/hinhsanpham/').$row->id."'>Danh sách hình</a></button>";
                $sohinh = count($this->tool_model->get_all_table_where('album',"loai=$row->id"));
                $url_ses=base_url("ckfinder/created_ses_ck.php?ses=login_ck&redirect=".base_url('backend/suasanpham/'));
				echo "<tr>
                    <td>".$stt."</td>
                    <td><img style='height:50px;'  src='".base_url($row->hinhdaidien)."' /></td>
                    <td><b>".$row->ten2." - $row->ma</b><br /> $row->ten<br /><small class='btn btn-primary btn-sm'>".$this->tool_model->get_danhmuc_cha2(0,$row->danhmuccha,'danhmucsanpham')."</small></td>
                    <td>".$row->sapxep."</td>
                    <td>$trangthai</td>
                    <td>
                    <button type='button' class='btn btn-info btn-sm '><a style='color:white;text-decoration:none;' href='".$url_ses.$row->id."'><i class='fa fa-edit'></i>&nbsp;&nbsp;Sửa</a></button>
                    <button type='button' class='btn btn-danger btn-sm'><a style='color:white;text-decoration:none;' href='".base_url('backend/xoasanpham/').$row->id."'><i class='fa fa-remove'></i>&nbsp;&nbsp;Xóa</a></button>
                    <button type='button' class='btn btn-primary btn-sm' ><i class='fa fa-list'></i>&nbsp;&nbsp;<a style='color:white;text-decoration:none;' href='".base_url('backend/hinhsanpham/').$row->id."'>Danh sách hình ($sohinh)</a></button>";
					echo "</td>
                </tr>";
                $i++;
            }?>
        </tbody>
    </table>
    <p class='paginationx mt-5'>
        <?php  if($limit_s==0 && ($limit_e+$limit_s) <= $total) { ?>
                    <a href="<?php echo base_url()."backend/danhsachsanpham?page=".++$page; ?>">Next</a>
        <?php }elseif($limit_s>0 && ($limit_e+$limit_s) < $total ){ $pn = $page+1; $pp = $page-1; ?>
                    <a href="<?php echo base_url()."backend/danhsachsanpham?page=".$pp; ?>">Preview</a>
                    <a href="<?php echo base_url()."backend/danhsachsanpham?page=".$pn; ?>">Next</a>
        <?php }else if(($limit_e+$limit_s) >= $total && $total>=$numberperpage) { ?>
                    <a href="<?php echo base_url()."backend/danhsachsanpham?page=".--$page; ?>">Preview</a>
        <?php }?>
    </p>
    <style>
        .paginationx{
            font-size: 20px; text-align: center; width: 100%;
        }
        .paginationx a{
            color: black;
            border: solid 1px #17a2b8;
            padding:5px 10px;
        }.paginationx a:hover{ text-decoration: none; }
    </style>
</div>