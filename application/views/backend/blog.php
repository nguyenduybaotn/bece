<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Quản lý blog</li>
    </ol>
</nav>
<div class="row m-0">
    <!-- danh sach menu -->
    <p>
        <!-- Button trigger modal -->
        <a href='<?php echo base_url("ckfinder/created_ses_ck.php?ses=login_ck&redirect=".base_url('backend/themblog')); ?>' class="btn btn-success btn-sm" >
            <i class="fa fa-plus"></i>&nbsp;&nbsp;Thêm blog
        </a>
    </p>
    <!-- load danh sach menu tu controler -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Ngày đăng</th>
                <th>Sắp xếp</th>
                <th>Trại thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody class='table_danhsachblog'>
            <?php 
            $numberperpage = 10;
            $page=0;
            $total = count($this->tool_model->get_all_table_where('blog',"1 order by sapxep desc"));
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
            foreach($this->tool_model->get_all_table_where('blog',"1 order by sapxep desc limit $limit_s,$limit_e") as $row){
                $dt= date_create($row->ngaydang); 
                $row->trangthai ? $trangthai = "<i class='btn btn-success btn-sm'>Kích hoạt</i>" : $trangthai = "<i class='btn btn-danger btn-sm'>Ẩn</i>";
                $stt = ($numberperpage*$page)+$i;
                $url_ses = base_url("ckfinder/created_ses_ck.php?ses=login_ck&redirect=".base_url('backend/suablog/'));
                if($row->hinhdaidien == '')
                    $image = "https://via.placeholder.com/150";
                else 
                    $image = base_url($row->hinhdaidien);
                echo "<tr>
                    <td>".$stt."</td>
                    <td><img style='height:50px;width:auto;' src='".$image."' /></td>
                    <td>".$row->ten2."</td>
                    <td>".$dt->format("d/m/Y H:i:s")."</td>
                    <td>".$row->sapxep."</td>
                    <td>$trangthai</td>
                    <td>
                    <button type='button' class='btn btn-info btn-sm '><a style='color:white;text-decoration:none;' href='".$url_ses.$row->id."'><i class='fa fa-edit'></i>&nbsp;&nbsp;Sửa</a></button>
                    <button type='button' class='btn btn-danger btn-sm'><a style='color:white;text-decoration:none;' href='".base_url('backend/xoablog/').$row->id."'><i class='fa fa-remove'></i>&nbsp;&nbsp;Xóa</a></button>
                    ";
                    echo "</td>
                </tr>";
                $i++;
            }?>
        </tbody>
    </table>
    <p class='paginationx mt-5'>
        <?php  if($limit_s==0 && ($limit_e+$limit_s) <= $total) { ?>
                    <a href="<?php echo base_url()."backend/blog?page=".++$page; ?>">Next</a>
        <?php }elseif($limit_s>0 && ($limit_e+$limit_s) < $total ){ $pn = $page+1; $pp = $page-1; ?>
                    <a href="<?php echo base_url()."backend/blog?page=".$pp; ?>">Preview</a>
                    <a href="<?php echo base_url()."backend/blog?page=".$pn; ?>">Next</a>
        <?php }else if(($limit_e+$limit_s) >= $total && $total>=$numberperpage) { ?>
                    <a href="<?php echo base_url()."backend/blog?page=".--$page; ?>">Preview</a>
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