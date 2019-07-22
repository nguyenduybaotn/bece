
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <li class="breadcrumb-item " aria-current="page">Thêm hình cho sản phẩm: <b><?php echo $this->tool_model->get_element_table_where('ten','sanpham',"id=$id");?></b></li>
    </ol>
</nav>
<div class="row m-0">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <form style="    width: 100%;" role="form" method="post" name="upload_form" id="upload_form" enctype="multipart/form-data" action="">
        
        <div class="form-group">
            <label for="">Hình</label>
            <input type="file" class="form-control" name="files[]" id="file" multiple="multiple" aria-describedby="helpId" placeholder="" />
        </div>
        <div class="form-group">
            <label for="">Sắp xếp(số lớn lên trên)</label>
            <input type="text" class="form-control" name="sapxep" id="sapxep" 
            value="<?php echo $this->tool_model->get_max('album',"loai=$id");?>" aria-describedby="helpId" placeholder="" />
        </div>
        <div class="form-group pl-4">
            <input type="checkbox" class="form-check-input" name="trangthai" id="trangthai" value='1' checked>
             Hiển thị
        </div>
        <div class="form-group mt-5">
            <button name="" id="" class="btn btn-success btn-sm btn-luuartwork1" type='submit'>
            <i class="fa fa-save"></i>&nbsp;&nbsp;Lưu lại</button>
        </div>
        </form>
    </div>
</div>
