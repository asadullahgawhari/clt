  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Flash Message -->
    <?php if($this->session->flashdata('project_created')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('project_created').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('project_deleted')) : ?>
      <div class="box-body">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('project_deleted').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('project_updated')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('project_updated').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="form-group col-md-3">
        <a href="<?php echo base_url(); ?>project/create" class="btn btn-primary"> ایجاد پروژه جدید</a>
    </div>

    <div class="form-group col-md-6">
        <form action="<?php echo site_url('project/index'); ?>" method="get">
          <div class="input-group input-group-sm">
            <span class="input-group-btn">
              <a href="<?= base_url(); ?>project/index" class="btn btn-danger btn-flat"><i class="fa fa-table"></i></a>
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
        <li class="active">پروژه</li>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">جدول اطلاعات لیست پروژه ها (<?php echo $count; ?>) </h3>
            </div>
              <div class="box-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>شماره</th>
                    <th>اسم پروژه</th>
                    <th>اسم مشتری</th>
                    <th>قیمت</th>
                    <th>حالت</th>
                    <th>تاریخ شروع</th>
                    <th>تاریخ ختم</th>
                    <th>تاریخ</th>
                    <th>تاریخ تصحیح</th>
                    <th>معلومات</th>
                    <th>عکس بل</th>
                    <th>عملیه</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(isset($project)&&!empty($project)) : ?>
                    <?php foreach($project as $project) : ?>
                      
                    <tr>
                      <td><?php echo $project['id']; ?></td>
                      <td><?php echo $project['project_name']; ?></td>
                      <td><?php echo $project['customer_name']; ?></td>
                      <td><?php echo $project['price']; ?></td>
                      <td><?php echo $project['status'] == 0 ? 'تکمیل' : 'ناتکمیل'; ?></td>
                      <td><?php echo $project['start_date']; ?></td>
                      <td><?php echo $project['end_date']; ?></td>
                      <td><?php echo $project['created_at']; ?></td>
                      <td><?php echo $project['updated_at']; ?></td>
                      <td><?php echo $project['info']; ?></td>
                      <td>
                      <img src="<?php echo site_url(); ?>assets/dist/img/project/<?php echo $project['bill_image']; ?>" style="height:50px; width:100%; border-radius:4px;">
                      </td>
                      <td style="min-width: 140px;">
                          <a href="<?php echo base_url(); ?>project/edit/<?php echo $project['id']; ?>" class="btn btn-primary fa fa-edit"></a>
                          <a href="<?php echo base_url(); ?>project/delete/<?php echo $project['id']; ?>" class="btn btn-danger fa fa-close"></a>
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