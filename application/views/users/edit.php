<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تصحیح یوزر
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>users">یوزر</a></li>
        <li class="active">تصحیح یوزر</li>
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
              <h3 class="box-title">تصحیح کردن یوزر</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php echo validation_errors(); ?>

            <?php echo form_open_multipart('users/update'); ?>
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
              <div class="box-body">

                <div class="form-group col-sm-6">
                  <label>اسم</label>
                  <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control">
                </div>

                <div class="form-group col-sm-6">
                  <label>تخلص</label>
                  <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" class="form-control" placeholder="تخلص">
                </div>

                <div class="form-group col-sm-6">
                  <label>ایمیل</label>
                  <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control" placeholder="ایمیل">
                </div>

                <div class="form-group col-sm-6">
                  <label>وظیفه</label>
                  <input type="text" name="task" value="<?php echo $user['task']; ?>" class="form-control">
                </div>

                <div class="form-group col-sm-6">
                  <label>اسم یوزر</label>
                  <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control" placeholder="اسم یوزر">
                </div>

                <!-- <div class="form-group col-sm-6">
                  <label>پسورد</label>
                  <input type="password" name="password" value="<?php echo $user['password']; ?>" class="form-control" placeholder="پسورد">
                </div>

                <div class="form-group col-sm-6">
                  <label>تکرار پسورد</label>
                  <input type="password" name="password2" value="<?php echo $user['password']; ?>" class="form-control" placeholder="تکرار پسورد">
                </div> -->
                
                <div class="form-group col-sm-6">
                  <label>عکس</label>
                  <input type="hidden" name="old_user_image" value="<?php echo $user['user_image']; ?>" />
                  <img img src="<?php echo site_url(); ?>assets/dist/img/users/<?php echo $user['user_image']; ?>" style="height:200px; width:50%; border-radius:4px;">
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