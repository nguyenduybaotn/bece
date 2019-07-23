<?php //$this->tool_model->update_routes("xy-z","baotn");?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Quản lý menu</li>
    </ol>
</nav>
<div class="row m-0">
    <p>
        <!-- Button trigger modal -->
        <a href='<?php echo base_url('backend/themmenu');?>' class="btn btn-success btn-sm" >
            <i class="fa fa-plus"></i>&nbsp;&nbsp;Thêm menu
        </a>
    </p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Trại thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody class=''>
            <?php 
			$danhsachmenu = $this->tool_model->get_all_table_where('menu',"1");
			$result = "";
			$i=1;
			// lap qua danh sach
			foreach($danhsachmenu as $menu){
				$menu->trangthai ? $trangthai = "<i class='btn btn-success btn-sm'>Kích hoạt</i>" : $trangthai = "<i class='btn btn-danger btn-sm'>Ẩn</i>";
				$menu->danhmuccha ? $danhmuccha=$this->tool_model->get_element_table_where('tenmenu','menu',"id=$menu->danhmuccha"):$danhmuccha = 'Gốc';
				
				$result .= "<tr>
						<td scope='row'>".$i."</td>
						<td><b>".$menu->tenmenu2."</b> </br> $menu->tenmenu</td>
						<td>".$danhmuccha."</td>
						<td>".$trangthai."</td>
						<td>
							<a href='".base_url()."backend/suamenu/$menu->id"."' class='btn btn-info btn-sm btn-suamenu'><i class='fa fa-edit'></i>&nbsp;&nbsp;Sửa</a>
							<a href='".base_url()."backend/xoamenu/$menu->id"."' class='btn btn-danger btn-sm btn-xoamenu'><i class='fa fa-remove'></i>&nbsp;&nbsp;Xóa</button>
						</td>
					</tr>";
				$i++;
			}
			echo $result;
			?>
        </tbody>
    </table>
</div>