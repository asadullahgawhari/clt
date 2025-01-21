  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Flash Message -->
    <?php if($this->session->flashdata('user_deleted')) : ?>
      <div class="box-body">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('user_deleted').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('user_updated')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('user_updated').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>
  
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          <a href="<?php base_url(); ?>users/register" class="btn btn-primary">ایجاد یوزر جدید</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <!-- <li><a href="<?php echo base_url(); ?>/posts">جدول</a></li> -->
        <li class="active">یوزر ها</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">جدول اطلاعات لیست یوزر ها</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>شماره</th>
                    <th>عکس</th>
                    <th>اسم</th>
                    <th>تخلص</th>
                    <th>ایمیل</th>
                    <th>وظیفه</th>
                    <th>اسم یوزر</th>
                    <th>تاریخ</th>
                    <th>عملیه ها</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <?php foreach($users as $user) : ?>
                  <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td>
                      
                    <img src="<?php echo site_url(); ?>assets/dist/img/users/<?php echo $user['user_image']; ?>" style="height:40px; width:60%; border-radius:200px;">
                    
                    </td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['task']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['register_date']; ?></td>
                    <td style="min-width: 100px;">
                      <a href="users/edit/<?php echo $user['id']; ?>" class="btn btn-primary btn-sm fa fa-edit"></a>
                      <a href="users/delete/<?php echo $user['id']; ?>" class="btn btn-danger btn-sm fa fa-close"></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <!-- /.box-body -->
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