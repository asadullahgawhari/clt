<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تصحیح وبلاگ
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>posts/index">جدول</a></li>
        <li class="active">تصحیح وبلاگ</li>
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
              <h3 class="box-title">تصحیح کردن وبلاگ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('posts/update'); ?>
            
            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
              <div class="box-body">

                <div class="form-group col-sm-6">
                  <label>کود نمبر <span style="color:red;">*</span></label>
                  <input type="text" name="code" value="<?php echo $post['code']; ?>" class="form-control" placeholder="کود نمبر">
                </div>

                <div class="form-group col-sm-6">
                  <label>اسم جنس</label>
                  <input type="text" name="name" value="<?php echo $post['name']; ?>" class="form-control" placeholder="اسم جنس">
                </div>

                <div class="form-group col-sm-6">
                  <label>مدل جنس</label>
                  <input type="text" name="model" value="<?php echo $post['model']; ?>" class="form-control" placeholder="مدل جنس">
                </div>

                <div class="form-group col-sm-6">
                  <label>حالت جنس</label>
                  <select class="form-control" name="status">
                    <option <?php echo $post['status']  == 0 ? 'selected' : '' ?> value="0">موجود</option>
                    <option <?php echo $post['status']  == 1 ? 'selected' : '' ?> value="1">ناموجود</option>
                </select>
                </div>

                <div class="form-group col-sm-12">
                  <label>مشخصات جنس</label>
                  <div class="row" >
                      <div class="box-body pad">
                          <textarea name="body" id="mytextarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $post['body']; ?></textarea>
                      </div>
                  </div>
                </div> 

                <div class="form-group col-sm-6">
                  <label>قیمت جنس</label>
                  <input type="text" name="price" value="<?php echo $post['price']; ?>" class="form-control" placeholder="قیمت جنس">
                </div>

                <div class="form-group col-sm-6">
                  <label>کتگوری</label>
                  <select name="category_id" class="form-control">
                    <?php foreach($categories as $category): ?>

                      <option value="<?php echo $category['id']; ?>" 
                        <?php echo ($category['category_name'] == $post['category_name']) ? 'selected' : ''; ?>>
                        <?php echo $category['category_name']; ?>
                      </option>
                      
                    </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group col-sm-12">
                  <label>معلومات جنس</label>
                  <div class="row" >
                      <div class="box-body pad">
                          <textarea name="info" id="mytextarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $post['info']; ?></textarea>
                      </div>
                  </div>
                </div> 

                <div class="form-group col-sm-6">
                  <label>مقدار جنس</label>
                  <input type="text" name="amount" value="<?php echo $post['amount']; ?>" class="form-control">
                </div>
                
                <div class="form-group col-sm-6">
                  <label>عکس جنس</label>

                  <input type="hidden" name="old_post_image" value="<?php echo $post['post_image']; ?>" />

                  <img src="<?php echo site_url(); ?>assets/dist/img/posts/<?php echo $post['post_image']; ?>" style="height:200px; width:50%; border-radius:4px;">

                  <br>
                  <br>
                  <input type="file" name="userfile" >
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