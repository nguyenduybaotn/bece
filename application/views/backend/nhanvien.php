
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Quản lý nhân viên</li>
    </ol>
</nav>
<div class="row m-0">
    <!-- danh sach menu -->
    <p>
        <!-- Button trigger modal -->
        <a href='<?php echo base_url('backend/themnhanvien');?>' class="btn btn-success btn-sm" >
            <i class="fa fa-plus"></i>&nbsp;&nbsp;Thêm nhân viên
        </a>
    </p>
    <!-- load danh sach menu tu controler -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Tên đăng nhập</th>
                <th>Vai trò</th>
                <th>Sắp xếp</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody class='table_danhsachtintuc'>
            <?php 
            $numberperpage = 10;
            $page=0;
            $total = count($this->tool_model->get_all_table_where('nhanvien',"id!=1"));
            if(!isset($_GET['page'])){
                $page = 0;
                $limit_s = 0;
                $limit_e = $numberperpage;    
            }else{
                $limit_s = intval($_GET['page'])*$numberperpage;
                $limit_e = $numberperpage;
                $page = $_GET['page'];
            }

            $i=1;
            foreach($this->tool_model->get_all_table_where('nhanvien',"id!=1 limit $limit_s,$limit_e") as $row){
                $loai = "Nhân viên";
				if($row->loai) $loai ="Admin";
                $row->trangthai ? $trangthai = "<i class='btn btn-success btn-sm'>Kích hoạt</i>" : $trangthai = "<i class='btn btn-danger btn-sm'>Ẩn</i>";
                $stt = ($numberperpage*$page)+$i;
                echo "<tr>
                    <td>".$stt."</td>
                    <td>".$row->hoten."</td>
                    <td>".$row->tendangnhap."</td>
                    <td><small class='btn btn-xs btn-primary'>".$loai."</small></td>
                    <td>$trangthai</td>
                    <td>
                    <button type='button' class='btn btn-info btn-sm '><a style='color:white;text-decoration:none;' href='".base_url('backend/suanhanvien/').$row->id."'><i class='fa fa-edit'></i>&nbsp;&nbsp;Cập nhật</a></button>
                    <!--<button type='button' class='btn btn-danger btn-sm'><a style='color:white;text-decoration:none;' href='".base_url('backend/xoanhanvien/').$row->id."'><i class='fa fa-remove'></i>&nbsp;&nbsp;Xóa</a></button>-->";
                    echo "</td>
                </tr>";
                $i++;
            }?>
        </tbody>
    </table>
    <p class='paginationx mt-5'>
        <?php  if($limit_s==0 && ($limit_e+$limit_s) <= $total) { ?>
                    <a href="<?php echo base_url()."backend/nhanvien?page=".++$page; ?>">Next</a>
        <?php }elseif($limit_s>0 && ($limit_e+$limit_s) < $total ){ $pn = $page+1; $pp = $page-1; ?>
                    <a href="<?php echo base_url()."backend/nhanvien?page=".$pp; ?>">Preview</a>
                    <a href="<?php echo base_url()."backend/nhanvien?page=".$pn; ?>">Next</a>
        <?php }else if(($limit_e+$limit_s) >= $total && $total>=$numberperpage) { ?>
                    <a href="<?php echo base_url()."backend/nhanvien?page=".--$page; ?>">Preview</a>
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