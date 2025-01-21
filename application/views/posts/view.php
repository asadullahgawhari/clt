  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        معولومات کامل وبلاگ
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>posts/index">وبلاگ</a></li>
        <li class="active">معلومات کامل</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              
              <div class="box-header">
                <h3 class="box-title"><?php echo $post['name']; ?></h3>
              </div>
              <div class="form-group col-sm-6">
                
                
                  <small class="post-date"><b>کود نمبر:</b> <?php echo $post['code'] ?></small>
                  <small class="post-date"><b>مودل:</b> <?php echo $post['model'] ?></small>
                  <small class="post-date"><b>کتگوری:</b> <?php echo $post['category_name'] ?></small>
                  <small class="post-date"><b>قیمت:</b> <?php echo $post['price'] ?></small>
                  <small class="post-date"><b>حالت:</b> <?php echo $post['status'] == 0 ? 'موجود' : 'ناموجود'; ?></small>
                  <small class="post-date"><b>مقدار:</b> <?php echo $post['amount'] ?></small>
                  <small class="post-date"><b>تاریخ:</b> <?php echo $post['created_at'] ?></small>
                  <small class="post-date"><b>تاریخ تصحیح:</b> <?php echo $post['updated_at'] ?></small>

                  <br>
                  <div class="post-body">
                      <?php echo $post['body']; ?>
                  </div>
                  
                  <br>
                  <div class="panel box">
                    </div>

                  <div class="post-body">
                      <?php echo $post['info']; ?>
                  </div>

                </div>

                <div class="form-group col-sm-6">
                <img img src="<?php echo site_url(); ?>assets/dist/img/posts/<?php echo $post['post_image']; ?>" style="height:500px; width:100%; border-radius:10px;">
                </div>

              </div>
            <!-- /.box-body -->


              <hr>
              <div class="box-body">
                <div class="box-header">
                  <h3>نظریه ها</h3>
                </div>

                <?php if($comments) : ?>
                  <?php foreach($comments as $comment) : ?>
                    <div class="well">
                      <h5><?php echo $comment['body']; ?> [توسط <strong><?php echo $comment['name']; ?></strong>]</h5>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <p>هیچ نظریه‌ای داده نشده است</p>
                <?php endif; ?>


                <hr>
                <div class="box-header">
                  <h3>افزودن نظریه ها</h3>
                </div>
                

                <?php echo validation_errors(); ?>
                <?php echo form_open('comments/create/'.$post['id']); ?>
                  <div class="form-group col-sm-12">
                      <label>اسم و تخلص<span style="color:red;">*</span></label>
                      <input type="text" name="name" class="form-control" placeholder="اسم و تخلص">
                  </div>

                  <div class="form-group col-sm-12">
                      <label>ایمیل</label>
                      <input type="text" name="email" class="form-control" placeholder="ایمیل">
                  </div>

                  <div class="form-group col-sm-12">
                      <label>نظریه <span style="color:red;">*</span></label>
                      <textarea type="text" name="body" class="form-control"></textarea>
                  </div>

                  <div class="box-footer">
                  <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>

                </form>
              </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        


      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->