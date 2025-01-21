<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تصحیح پروژه
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>project/index">پروژه</a></li>
        <li class="active">تصحیح پروژه</li>
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
              <h3 class="box-title">تصحیح کردن پروژه ها
              </h3>
            </div>

            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('project/update'); ?>

            <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
              <div class="box-body">

                <div class="form-group col-sm-6">
                  <label>اسم پروژه <span style="color:red;">*</span></label>
                  <input type="text" name="project_name" value="<?php echo $project['project_name']; ?>" class="form-control" placeholder="اسم پروژه">
                </div>

                <div class="form-group col-sm-6">
                  <label>اسم مشتری</label>
                  <input type="text" name="customer_name" value="<?php echo $project['customer_name']; ?>" class="form-control" placeholder="اسم مشتری">
                </div>

                <div class="form-group col-sm-6">
                  <label>حالت </label>
                  <select class="form-control" name="status">
                    <option <?php echo $project['status']  == 0 ? 'selected' : '' ?> value="0">تکمیل</option>
                    <option <?php echo $project['status']  == 1 ? 'selected' : '' ?> value="1">ناتکمیل</option>
                </select>
                </div>

                <div class="form-group col-sm-6">
                  <label>قیمت پروژه</label>
                  <input type="text" name="price" value="<?php echo $project['price']; ?>" class="form-control" placeholder="قیمت پروژه">
                </div>

                <div class="form-group col-sm-6">
                  <label>تاریخ شروع</label>
                  <input type="date" name="start_date" value="<?php echo $project['start_date']; ?>" class="form-control" placeholder="تاریخ شروع">
                </div>

                <div class="form-group col-sm-6">
                  <label>تاریخ ختم</label>
                  <input type="date" name="end_date" value="<?php echo $project['end_date']; ?>" class="form-control" class="form-control" placeholder="تاریخ ختم">
                </div>

                <div class="form-group col-sm-6">
                  <label>عکس پروژه</label>

                  <input type="hidden" name="old_bill_image" value="<?php echo $project['bill_image']; ?>" />

                  <img src="<?php echo site_url(); ?>assets/dist/img/project/<?php echo $project['bill_image']; ?>" style="height:200px; width:50%; border-radius:4px;">

                  <br>
                  <br>
                  <input type="file" name="userfile" >
                </div>

                <div class="form-group col-sm-12">
                  <label>معلومات</label>
                  <div class="row" >
                      <div class="box-body pad">
                          <textarea name="info" id="mytextarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $project['info']; ?></textarea>
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
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

