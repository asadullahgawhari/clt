  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Flash Message -->
    <?php if($this->session->flashdata('category_created')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('category_created').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('category_deleted')) : ?>
      <div class="box-body">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('category_deleted').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('category_updated')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('category_updated').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          <a href="<?php base_url(); ?>categories/create" class="btn btn-primary">ایجاد کتگوری جدید</a>
     
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-dashboard"></i> خانه</a></li>
        <!-- <li><a href="<?php echo base_url(); ?>/posts">جدول</a></li> -->
        <li class="active">کتگوری</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">جدول اطلاعات لیست کد نمبر ها (<?php echo $count; ?>)</h3>
            </div>
              <div class="box-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>اسم</th>
                    <th>تاریخ</th>
                    <th>تاریخ تصحیح</th>
                    <th>بخش ها</th>
                    <th>عملیه ها</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  <?php foreach($categories as $category) : ?>
                    
                  <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['category_name']; ?></td>
                    <td><?php echo $category['created_at']; ?></td>
                    <td><?php echo $category['updated_at']; ?></td>
                    <td>
                        <a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['category_name']; ?></a>
                    </td>

                    <td style="min-width: 100px;">
                      <a href="categories/edit/<?php echo $category['id']; ?>" class="btn btn-primary btn-sm fa fa-edit"></a>
                      <a href="categories/delete/<?php echo $category['id']; ?>" class="btn btn-danger btn-sm fa fa-close"></a>
                    </td>
                    
                  </tr>
                    
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>