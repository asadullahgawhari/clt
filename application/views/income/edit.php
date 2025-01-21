<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تصحیح عواید
        <small>عواید</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>income/index">عواید</a></li>
        <li class="active">تصحیح عواید</li>
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
              <h3 class="box-title">تصحیح کردن عواید</h3>
            </div>

            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('income/update'); ?>

            <input type="hidden" name="id" value="<?php echo $income['id']; ?>">
              <div class="box-body">

                <div class="form-group col-sm-4">
                  <label>اسم مشتری <span style="color:red;">*</span></label>
                  <input type="text" name="customer_name" value="<?php echo $income['customer_name']; ?>" class="form-control">
                </div>

                <div class="form-group col-sm-4">
                  <label>اسم پروژه</label>
                  <input type="text" name="project_name" value="<?php echo $income['project_name']; ?>" class="form-control">
                </div>

                <div class="form-group col-sm-4">
                  <label>مقدار پروژه</label>
                  <input type="text" name="project_quantity" value="<?php echo $income['project_quantity']; ?>" class="form-control">
                </div>

                <div class="form-group col-sm-4">
                  <label>تعداد</label>
                  <input type="text" name="quantity" value="<?php echo $income['quantity']; ?>" class="form-control">
                </div>

                <div class="form-group col-sm-4">
                  <label>قیمت </label>
                  <input type="text" name="price" value="<?php echo $income['price']; ?>" class="form-control">
                </div>

                <!-- <div class="form-group col-sm-4">
                  <label>مجموع </label>
                  <input type="text" name="total" value="<?php echo $income['total']; ?>" class="form-control">
                </div> -->

                <div class="form-group col-sm-4">
                  <label>تاریخ شروع</label>
                  <input type="date" name="project_date" value="<?php echo $income['project_date']; ?>" class="form-control">
                </div>

                <div class="form-group col-sm-4">
                  <label>حالت </label>
                  <select class="form-control" name="status">
                    <option <?php echo $income['status']  == 0 ? 'selected' : '' ?> value="0">موفق</option>
                    <option <?php echo $income['status']  == 1 ? 'selected' : '' ?> value="1">ناموجود</option>
                </select>
                </div>

                <div class="form-group col-sm-4">
                  <label>بل</label>

                  <input type="hidden" name="old_bill_image" value="<?php echo $income['bill_image']; ?>" />

                  <img src="<?php echo site_url(); ?>assets/dist/img/income/<?php echo $income['bill_image']; ?>" style="height:200px; width:50%; border-radius:4px;">

                  <br>
                  <br>
                  <input type="file" name="userfile" >
                </div>

                <div class="form-group col-sm-12">
                  <label>معلومات</label>
                  <div class="row" >
                      <div class="box-body pad">
                          <textarea name="info" id="mytextarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $income['info']; ?></textarea>
                      </div>
                  </div>
                </div> 

              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
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

