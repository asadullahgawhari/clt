<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        فرم های عمومی
        <small>مثال ها</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>/posts">جدول</a></li>
        <li class="active">ایجاد کتگوری</li>
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
              <h3 class="box-title">ایجاد کردن کتگوری</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php echo validation_errors(); ?>

            <?php echo form_open_multipart('categories/create'); ?>
              <div class="box-body">

                <div class="form-group col-sm-12">
                  <label>اسم کتگوری<span style="color:red;">*</span></label>
                  <input type="text" name="category_name" class="form-control" placeholder="اسم کتگوری">
                </div>

              </div>
              <!-- /.box-body -->

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

