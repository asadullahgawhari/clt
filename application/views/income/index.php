  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <!-- Flash Message -->
  <?php if($this->session->flashdata('income_created')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('income_created').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('income_deleted')) : ?>
      <div class="box-body">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('income_deleted').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('income_updated')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('income_updated').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="form-group col-md-3">
        <a href="<?php echo base_url(); ?>income/create" class="btn btn-primary"> ایجاد عواید جدید</a>
    </div>

    <div class="form-group col-md-6">
        <form action="<?php echo site_url('income/index'); ?>" method="get">
          <div class="input-group input-group-sm">
            <span class="input-group-btn">
              <a href="<?= base_url(); ?>income/index" class="btn btn-danger btn-flat"><i class="fa fa-table"></i></a>
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
        <li class="active">عواید</li>
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
                    <th>اسم مشتری</th>
                    <th>اسم پروژه</th>
                    <th>مقدار پروژه</th>
                    <th>تعداد</th>
                    <th>قیمت</th>
                    <th>مجموع</th>
                    <th>تاریخ شروع</th>
                    <th>حالت</th>
                    <th>تاریخ</th>
                    <th>تاریخ تصحیح</th>
                    <th>معلومات</th>
                    <th>بل</th>
                    <th>عملیه</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(isset($income)&&!empty($income)) : ?>
                    <?php foreach($income as $income) : ?>
                      
                    <tr>
                      <td><?php echo $income['id']; ?></td>
                      <td><?php echo $income['customer_name']; ?></td>
                      <td><?php echo $income['project_name']; ?></td>
                      <td><?php echo $income['project_quantity']; ?></td>
                      <td><?php echo $income['quantity']; ?></td>
                      <td><?php echo $income['price']; ?></td>
                      <td><?php echo $income['quantity'] * $income['price']; ?></td>
                      <td><?php echo $income['project_date']; ?></td>
                      <td><?php echo $income['status'] == 0 ? 'موفق' : 'ناموفق'; ?></td>
                      <td><?php echo $income['created_at']; ?></td>
                      <td><?php echo $income['updated_at']; ?></td>
                      <td><?php echo $income['info']; ?></td>
                      <td>
                      <img src="<?php echo site_url(); ?>assets/dist/img/income/<?php echo $income['bill_image']; ?>" style="height:50px; width:100%; border-radius:4px;">
                      </td>
                      <td style="min-width: 140px;">
                          <a href="<?php echo base_url(); ?>income/edit/<?php echo $income['id']; ?>" class="btn btn-primary fa fa-edit"></a>
                          <a href="<?php echo base_url(); ?>income/delete/<?php echo $income['id']; ?>" class="btn btn-danger fa fa-close"></a>
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