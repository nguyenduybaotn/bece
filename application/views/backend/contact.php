
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Quản lý danh sách liên hệ</li>
    </ol>
</nav>
<div class="row m-0">
    <!-- load danh sach menu tu controler -->
    <table style='width:100%' id='table_b' class="table table-bordered" >
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Tel</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody class='table_danhsachtintuc'>
            <?php 
            $numberperpage = 10;
            $page=0;
            $total = count($this->tool_model->get_all_table_where('contact',"1"));
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
            foreach($this->tool_model->get_all_table_where('contact',"1 order by date desc limit $limit_s,$limit_e") as $row){
                
                $stt = ($numberperpage*$page)+$i;
                echo "<tr>
                    <td>".$stt."</td>
                    <td>".$row->name."</td>
                    <td>".$row->tel."</td>
                    <td>".$row->email."</td>
                    <td>
                    <button type='button' class='btn btn-primary btn-sm' onclick='xemchitiet($row->id)' data-backdrop='static' data-keyboard='false' data-toggle='modal' data-target='#xemchitiet'><i class='fa fa-list'></i>&nbsp;&nbsp;Xem chi tiết</button>
                    ";
                    echo "</td>
                </tr>";
                $i++;
            }?>
        </tbody>
    </table>
	<!-- Modal -->
        <div class="modal fade" id="xemchitiet" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelTitleId">Chi tiết liên hệ</h4>
                    </div>
                    <div class="modal-body">
						
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary " data-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <p class='paginationx mt-5'>
        <?php  if($limit_s==0 && ($limit_e+$limit_s) <= $total) { ?>
                    <a href="<?php echo base_url()."backend/contact?page=".++$page; ?>">Next</a>
        <?php }elseif($limit_s>0 && ($limit_e+$limit_s) < $total ){ $pn = $page+1; $pp = $page-1; ?>
                    <a href="<?php echo base_url()."backend/contact?page=".$pp; ?>">Preview</a>
                    <a href="<?php echo base_url()."backend/contact?page=".$pn; ?>">Next</a>
        <?php }else if(($limit_e+$limit_s) >= $total && $total>=$numberperpage) { ?>
                    <a href="<?php echo base_url()."backend/contact?page=".--$page; ?>">Preview</a>
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