<?php 
$tensanpham = $this->tool_model->get_element_table_where('ten','sanpham',"id=$id");
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Quản lý hình của sản phẩm: <b><?php echo $tensanpham;?></b> </li>
    </ol>
</nav>
<div class="row m-0">
    <!-- danh sach menu -->
    <p>
        <!-- Button trigger modal -->
        <a href='<?php echo base_url('backend/themhinhsanpham/').$id;?>' class="btn btn-success btn-sm" >
            <i class="fa fa-plus"></i>&nbsp;&nbsp;Thêm hình
        </a>
        <a href='<?php echo base_url('backend/danhsachsanpham');?>' class="btn btn-danger btn-sm" >
            <i class="fa fa-reply"></i>&nbsp;&nbsp;Quay lại
        </a>
    </p>
    <!-- load danh sach menu tu controler -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Sắp xếp</th>
                <th>Trại thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody class='table_danhsachtintuc'>
            <?php 
            $numberperpage = 10;
            $page=0;
            $total = count($this->tool_model->get_all_table_where('album',"loai=$id"));
            if(!isset($_GET['page'])){
                $page = 0;
                $limit_s = 0;
                $limit_e = $numberperpage;    
            }else{
                $limit_s = intval($_GET['page'])*$numberperpage;
                $limit_e = $limit_s+$numberperpage;
                $page = $_GET['page'];
            }

            $i=1;
            foreach($this->tool_model->get_all_table_where('album',"loai=$id order by sapxep desc limit $limit_s,$limit_e") as $row){
                $row->trangthai ? $trangthai = "<i class='btn btn-success btn-sm'>Kích hoạt</i>" : $trangthai = "<i class='btn btn-danger btn-sm'>Ẩn</i>";
                $stt = ($numberperpage*$page)+$i;
                echo "<tr>
                    <td>".$stt."</td>
                    <td><img style='height:50px;' class='img-fluid' src='".base_url($row->hinh)."' /></td>
                    <td>".$row->sapxep."</td>
                    <td>$trangthai</td>
                    <td>
                        <button type='button' class='btn btn-info btn-sm btn-suamenu'>
                         <a style='color:white;text-decoration:none;' href='".base_url('backend/suahinhsanpham/').$row->id."/".$id."'><i class='fa fa-edit'></i>&nbsp;&nbsp;Sửa</a></button>
                        <button type='button' class='btn btn-danger btn-sm btn-xoaartwork'>
                        <a style='color:white;text-decoration:none;' href='".base_url('backend/xoahinhsanpham/').$row->id."/".$id."'><i class='fa fa-remove'></i>&nbsp;&nbsp;Xóa</a></button>";
                    echo "</td>
                </tr>";
                $i++;
            }?>
        </tbody>
    </table>
    
</div>