  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <!-- Flash Message -->
  <?php if($this->session->flashdata('outcome_created')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('outcome_created').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('outcome_deleted')) : ?>
      <div class="box-body">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('outcome_deleted').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('outcome_updated')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('outcome_updated').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="form-group col-md-3">
        <a href="<?php echo base_url(); ?>outcome/create" class="btn btn-primary"> ایجاد مصارف جدید</a>
    </div>

    <div class="form-group col-md-6">
        <form action="<?php echo site_url('outcome/index'); ?>" method="get">
          <div class="input-group input-group-sm">
            <span class="input-group-btn">
              <a href="<?= base_url(); ?>outcome/index" class="btn btn-danger btn-flat"><i class="fa fa-table"></i></a>
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
        <li class="active">مصارف</li>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">جدول اطلاعات لیست مصارف (<?php echo $count; ?>)  </h3>
            </div>
              <div class="box-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>شماره</th>
                    <th>بل نمبر</th>
                    <th>اسم</th>
                    <th>مربوط</th>
                    <th>بخش</th>
                    <th>تعداد</th>
                    <th>قیمت</th>
                    <th>مجموع</th>
                    <th>تاریخ بل</th>
                    <th>تاریخ</th>
                    <th>تاریخ تصحیح</th>
                    <th>معلومات</th>
                    <th>بل</th>
                    <th>عملیه</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(isset($outcome)&&!empty($outcome)) : ?>
                    <?php foreach($outcome as $outcome) : ?>
                      
                    <tr>
                      <td><?php echo $outcome['id']; ?></td>
                      <td><?php echo $outcome['bill_no']; ?></td>
                      <td><?php echo $outcome['name']; ?></td>
                      <td><?php echo $outcome['belongs']; ?></td>
                      <td><?php echo $outcome['category']; ?></td>
                      <td><?php echo $outcome['quantity']; ?></td>
                      <td><?php echo $outcome['price']; ?></td>
                      <td><?php echo $outcome['quantity'] * $outcome['price']; ?></td>
                      <td><?php echo $outcome['date']; ?></td>
                      <td><?php echo $outcome['created_at']; ?></td>
                      <td><?php echo $outcome['updated_at']; ?></td>
                      <td><?php echo $outcome['info']; ?></td>
                      <td>
                      <img src="<?php echo site_url(); ?>assets/dist/img/outcome/<?php echo $outcome['bill_image']; ?>" style="height:50px; width:100%; border-radius:4px;">
                      </td>
                      <td style="min-width: 140px;">
                          <a href="<?php echo base_url(); ?>outcome/edit/<?php echo $outcome['id']; ?>" class="btn btn-primary fa fa-edit"></a>
                          <a href="<?php echo base_url(); ?>outcome/delete/<?php echo $outcome['id']; ?>" class="btn btn-danger fa fa-close"></a>
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