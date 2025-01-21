<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ایجاد وبلاگ
        <small>پوست ها</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>posts/index">وبلاگ</a></li>
        <li class="active">ایجاد وبلاگ</li>
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
              <h3 class="box-title">اضافه کردن وبلاگ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php echo validation_errors(); ?>

            <?php echo form_open_multipart('posts/create'); ?>
              <div class="box-body">

                <div class="form-group col-sm-6">
                  <label>کود نمبر <span style="color:red;">*</span></label>
                  <input type="text" name="code" class="form-control" placeholder="کود نمبر">
                </div>

                <div class="form-group col-sm-6">
                  <label>اسم جنس</label>
                  <input type="text" name="name" class="form-control" placeholder="اسم جنس">
                </div>

                <div class="form-group col-sm-6">
                  <label>مدل جنس</label>
                  <input type="text" name="model" class="form-control" placeholder="مدل جنس">
                </div>

                <div class="form-group col-sm-6">
                  <label>حالت جنس</label>
                  <select class="form-control" name="status">
                    <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">موجود</option>
                    <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">ناموجود</option>
                </select>
                </div>

                <div class="form-group col-sm-12">
                  <label>مشخصات جنس</label>
                  <div class="row" >
                      <div class="box-body pad">
                          <textarea name="body" id="mytextarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                  </div>
                </div> 

                <div class="form-group col-sm-6">
                  <label>قیمت جنس</label>
                  <input type="text" name="price" class="form-control" placeholder="قیمت جنس">
                </div>

                <div class="form-group col-sm-6">
                  <label>کتگوری</label>
                  <select name="category_id" class="form-control">
                    <?php foreach($categories as $category): ?>
                      <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group col-sm-12">
                  <label>معلومات جنس</label>
                  <div class="row" >
                      <div class="box-body pad">
                          <textarea name="info" id="mytextarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                  </div>
                </div> 

                <div class="form-group col-sm-6">
                  <label>مقدار جنس</label>
                  <input type="text" name="amount" class="form-control" placeholder="مقدار جنس">
                </div>

                <div class="form-group col-sm-6">
                  <label>عکس جنس</label>
                  <input type="file" name="userfile">
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

