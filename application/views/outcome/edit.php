<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تصحیح مصارف
        <small>مصارف</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>outcome/index">مصارف</a></li>
        <li class="active">تصحیح مصارف</li>
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
              <h3 class="box-title">تصحیح کردن مصارف</h3>
            </div>

            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('outcome/update'); ?>

            <input type="hidden" name="id" value="<?php echo $outcome['id']; ?>">
              <div class="box-body">

                <div class="form-group col-sm-4">
                  <label>نمبر بل </label>
                  <input type="text" name="bill_no" value="<?php echo $outcome['bill_no']; ?>" class="form-control" placeholder="نمبر بل">
                </div>

                <div class="form-group col-sm-4">
                  <label>اسم <span style="color:red;">*</span></label>
                  <input type="text" name="name" value="<?php echo $outcome['name']; ?>" class="form-control" placeholder="اسم ">
                </div>

                <div class="form-group col-sm-4">
                  <label>مربوط</label>
                  <input type="text" name="belongs" value="<?php echo $outcome['belongs']; ?>" class="form-control" placeholder="مربوط">
                </div>

                <div class="form-group col-sm-4">
                  <label>بخش</label>
                  <input type="text" name="category" value="<?php echo $outcome['category']; ?>" class="form-control" placeholder="بخش">
                </div>

                <div class="form-group col-sm-4">
                  <label>تعداد</label>
                  <input type="text" name="quantity" value="<?php echo $outcome['quantity']; ?>" class="form-control" placeholder="تعداد">
                </div>

                <div class="form-group col-sm-4">
                  <label>قیمت </label>
                  <input type="text" name="price" value="<?php echo $outcome['price']; ?>" class="form-control" placeholder="قیمت ">
                </div>

                <!-- <div class="form-group col-sm-4">
                  <label>مجموع </label>
                  <input type="text" name="total" value="<?php echo $outcome['total']; ?>" class="form-control" placeholder="مجموع ">
                </div> -->

                <div class="form-group col-sm-4">
                  <label>تاریخ بل</label>
                  <input type="date" name="date" value="<?php echo $outcome['date']; ?>" class="form-control" placeholder="تاریخ بل">
                </div>

                <div class="form-group col-sm-4">
                  <label>بل</label>

                  <input type="hidden" name="old_bill_image" value="<?php echo $outcome['bill_image']; ?>" />

                  <img src="<?php echo site_url(); ?>assets/dist/img/outcome/<?php echo $outcome['bill_image']; ?>" style="height:200px; width:50%; border-radius:4px;">

                  <br>
                  <br>
                  <input type="file" name="userfile" >
                </div>

                <div class="form-group col-sm-12">
                  <label>معلومات</label>
                  <div class="row" >
                      <div class="box-body pad">
                          <textarea name="info" id="mytextarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $outcome['info']; ?></textarea>
                      </div>
                  </div>
                </div> 

              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">تصحیح</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

