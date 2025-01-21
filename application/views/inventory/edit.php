<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تصحیح موجودی
        <small>موجودی ها</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>inventory/index">موجودی</a></li>
        <li class="active">ایجاد موجودی</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">تصحیح کردن پروژه</h3>
            </div>

            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('inventory/update'); ?>

            <input type="hidden" name="id" value="<?php echo $inventory['id']; ?>">
                <div class="box-body">

                    <div class="form-group col-sm-4">
                    <label>کود جنس <span style="color:red;">*</span></label>
                    <input type="text" name="asset_code" value="<?php echo $inventory['asset_code']; ?>" class="form-control" placeholder="کود جنس">
                    </div>

                    <div class="form-group col-sm-4">
                    <label>اسم جنس <span style="color:red;">*</span></label>
                    <input type="text" name="asset_name" value="<?php echo $inventory['asset_name']; ?>" class="form-control" placeholder="اسم جنس">
                    </div>

                    <div class="form-group col-sm-4">
                    <label>تعداد جنس</label>
                    <input type="text" name="quantity" value="<?php echo $inventory['quantity']; ?>" class="form-control" placeholder="تعداد جنس">
                    </div>

                    <div class="form-group col-sm-4">
                    <label>نوعیت جنس</label>
                    <input type="text" name="specification" value="<?php echo $inventory['specification']; ?>" class="form-control" placeholder="نوعیت جنس">
                    </div>

                    <div class="form-group col-sm-4">
                    <label>مودل جنس</label>
                    <input type="text" name="model" value="<?php echo $inventory['model']; ?>" class="form-control" placeholder="مودل جنس">
                    </div>

                    <div class="form-group col-sm-4">
                    <label>سریال نمبر</label>
                    <input type="text" name="serial" value="<?php echo $inventory['serial']; ?>" class="form-control" placeholder="سریال نمبر">
                    </div>

                    <div class="form-group col-sm-3">
                    <label>قیمت</label>
                    <input type="text" name="price" value="<?php echo $inventory['price']; ?>" class="form-control">
                    </div>

                    <div class="form-group col-sm-3">
                    <label>تاریخ خرید</label>
                    <input type="date" name="purchase_date" value="<?php echo $inventory['purchase_date']; ?>" class="form-control" placeholder="تاریخ خرید">
                    </div>

                    <div class="form-group col-sm-3">
                    <label>حالت </label>
                    <select class="form-control" name="status">
                        <option <?php echo $inventory['status']  == 0 ? 'selected' : '' ?> value="0">قابل استفاده</option>
                        <option <?php echo $inventory['status']  == 1 ? 'selected' : '' ?> value="1">غیر قابل استفاده</option>
                    </select>
                    </div>

                    <div class="form-group col-sm-3">
                    <label>عکس جنس</label>

                    <input type="hidden" name="old_asset_image" value="<?php echo $inventory['asset_image']; ?>" />

                    <img src="<?php echo site_url(); ?>assets/dist/img/inventory/<?php echo $inventory['asset_image']; ?>" style="height:200px; width:50%; border-radius:4px;">

                    <br>
                    <br>
                    <input type="file" name="userfile" >
                    </div>

                    <div class="form-group col-sm-12">
                    <label>معلومات جنس</label>
                    <div class="row" >
                        <div class="box-body pad">
                            <textarea name="info" id="mytextarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $inventory['info']; ?></textarea>
                        </div>
                    </div>
                    </div> 

                    
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

