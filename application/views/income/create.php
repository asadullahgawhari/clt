<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ایجاد عواید
        <small>عواید</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>income/index">عواید</a></li>
        <li class="active">ایجاد عواید</li>
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
              <h3 class="box-title">اضافه کردن عواید</h3>
            </div>

            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('income/create'); ?>
              <div class="box-body">

                <div class="form-group col-sm-4">
                  <label>اسم مشتری <span style="color:red;">*</span></label>
                  <input type="text" name="customer_name" class="form-control" placeholder="اسم مشتری">
                </div>

                <div class="form-group col-sm-4">
                  <label>اسم پروژه</label>
                  <input type="text" name="project_name" class="form-control" placeholder="اسم پروژه">
                </div>

                <div class="form-group col-sm-4">
                  <label>مقدار پروژه</label>
                  <input type="text" name="project_quantity" class="form-control" placeholder="مقدار پروژه">
                </div>

                <div class="form-group col-sm-4">
                  <label>تعداد</label>
                  <input type="text" name="quantity" class="form-control" placeholder="تعداد">
                </div>

                <div class="form-group col-sm-4">
                  <label>قیمت </label>
                  <input type="text" name="price" class="form-control" placeholder="قیمت ">
                </div>

                <!-- <div class="form-group col-sm-4">
                  <label>مجموع </label>
                  <input type="text" name="total" class="form-control" placeholder="مجموع ">
                </div> -->

                <div class="form-group col-sm-4">
                  <label>تاریخ شروع</label>
                  <input type="date" name="project_date" class="form-control" placeholder="تاریخ شروع">
                </div>

                <div class="form-group col-sm-4">
                  <label>حالت</label>
                  <select class="form-control" name="status">
                    <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">موفق</option>
                    <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">ناموفق</option>
                </select>
                </div>

                <div class="form-group col-sm-4">
                  <label>عکس جنس</label>
                  <input type="file" name="userfile">
                </div>

                <div class="form-group col-sm-12">
                  <label>معلومات</label>
                  <div class="row" >
                      <div class="box-body pad">
                          <textarea name="info" id="mytextarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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

