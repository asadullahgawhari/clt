  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Flash Message -->
    <?php if($this->session->flashdata('post_created')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('post_created').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('post_updated')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('post_updated').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

      <!-- Flash Message -->
    <?php if($this->session->flashdata('post_deleted')) : ?>
      <div class="box-body">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('post_deleted').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="form-group col-md-3">
        <a href="<?php echo base_url(); ?>posts/create" class="btn btn-primary"> ایجاد بلاگ جدید</a>
    </div>

    <div class="form-group col-md-6">
        <form action="<?php echo site_url('posts/index'); ?>" method="get">
          <div class="input-group input-group-sm">
            <span class="input-group-btn">
              <a href="<?= base_url(); ?>posts/index" class="btn btn-danger btn-flat"><i class="fa fa-table"></i></a>
            </span>
            <input type="text" name="keyword" class="form-control" placeholder="جستجو...">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
              </span>
          </div>
        </form>
      </div>
      
      <div class="breadcrumb col-mx-3">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <!-- <li><a href="<?php echo base_url(); ?>/posts">جدول</a></li> -->
        <li class="active">وبلاگ</li>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">جدول اطلاعات لیست کد نمبر ها 
                <!-- This count the categories show errors and solve the future -->
                <!-- (<?php echo $count; ?>) -->
              </h3> 
            </div>
              <div class="box-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>شماره</th>
                    <th>عکس</th>
                    <th>کود نمبر</th>
                    <th>اسم</th>
                    <th>مودل</th>
                    <th>کتگوری</th>
                    <th>مشخصات</th>
                    <th>حالت</th>
                    <th>مقدار</th>
                    <th>قیمت</th>
                    <th>تاریخ</th>
                    <th>تاریخ تصحیح</th>
                    <th>معلومات</th>
                    <th>عملیه</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                    <?php if(isset($posts)&&!empty($posts)) : ?>
                    <?php foreach($posts as $post) : ?>
                      
                    <tr>
                      <td><?php echo $post['id']; ?></td>
                      <td>
                        
                      <img src="<?php echo site_url(); ?>assets/dist/img/posts/<?php echo $post['post_image']; ?>" style="height:50px; width:100%; border-radius:4px;">
                      
                      </td>
                      <td><?php echo $post['code']; ?></td>
                      <td><?php echo $post['name']; ?></td>
                      <td><?php echo $post['model']; ?></td>

                      <td><?php echo $post['category_name']; ?></td>

                      <td><?php echo word_limiter($post['body'], 3); ?><a href="<?php echo site_url('/posts/'.$post['slug']); ?>">بیشتر</a></td>
                      <td><?php echo $post['status'] == 0 ? 'موجود' : 'ناموجود'; ?></td>
                      <td><?php echo $post['amount']; ?></td>
                      <td><?php echo $post['price']; ?></td>
                      <td><?php echo $post['created_at']; ?></td>
                      <td><?php echo $post['updated_at']; ?></td>
                      <td><?php echo word_limiter($post['info'], 3); ?></td>
                      <td style="min-width: 160px;">
                        <a href="<?php echo site_url('/posts/'.$post['slug']); ?>" class="btn btn-success fa fa-list-alt"></a>
                        <!-- This comment is very important for this rows when solve the count of categories -->
                        <!-- <?php if($this->session->userdata('user_id')->id == $post['user_id']): ?> -->
                          <a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-primary fa fa-edit"></a>
                          <a href="<?php echo base_url(); ?>posts/delete/<?php echo $post['id']; ?>" class="btn btn-danger fa fa-close"></a>
                        <!-- <?php endif; ?> -->
                      </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                      <h4>جستجوی مورد نظر شما یافت نگردید</h4>
                    <?php endif; ?>
                  </tbody>
                </table>
                <?php echo $this->pagination->create_links(); ?>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>