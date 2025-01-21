  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <!-- Flash Message -->
  <?php if($this->session->flashdata('inventory_created')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('inventory_created').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('inventory_deleted')) : ?>
      <div class="box-body">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('inventory_deleted').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('inventory_updated')) : ?>
      <div class="box-body">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('inventory_updated').'</p>'; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="form-group col-md-3">
        <a href="<?php echo base_url(); ?>inventory/create" class="btn btn-primary"> ایجاد موجودی جدید</a>
    </div>

    <div class="form-group col-md-6">
        <form action="<?php echo site_url('inventory/index'); ?>" method="get">
          <div class="input-group input-group-sm">
            <span class="input-group-btn">
              <a href="<?= base_url(); ?>inventory/index" class="btn btn-danger btn-flat"><i class="fa fa-table"></i></a>
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
        <li class="active">موجودی</li>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">جدول اطلاعات لیست موجودی ها (<?php echo $count; ?>) مجموع قیمت ها (<?php echo $sum; ?>)</h3>
            </div>
              <div class="box-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>شماره</th>
                    <th>کود جنس</th>
                    <th>عکس جنس</th>
                    <th>اسم جنس</th>
                    <th>تعداد</th>
                    <th>نوعیت</th>
                    <th>مودل</th>
                    <th>سریال نمبر</th>
                    <th>قیمت</th>
                    <th>تاریخ خرید</th>
                    <th>حالت</th>
                    <th>تاریخ</th>
                    <th>تاریخ تصحیح</th>
                    <th>معلومات</th>
                    <th>عملیه</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(isset($inventory)&&!empty($inventory)) : ?>
                    <?php foreach($inventory as $inventory) : ?>
                      
                    <tr>
                      <td><?php echo $inventory['id']; ?></td>
                      <td><?php echo $inventory['asset_code']; ?></td>
                      <td><img src="<?php echo site_url(); ?>assets/dist/img/inventory/<?php echo $inventory['asset_image']; ?>" style="height:50px; width:100%; border-radius:4px;"></td>
                      <td><?php echo $inventory['asset_name']; ?></td>
                      <td><?php echo $inventory['quantity']; ?></td>
                      <td><?php echo $inventory['specification']; ?></td>
                      <td><?php echo $inventory['model']; ?></td>
                      <td><?php echo $inventory['serial']; ?></td>
                      <td><?php echo $inventory['price']; ?></td>
                      <td><?php echo $inventory['purchase_date']; ?></td>
                      <td><?php echo $inventory['status'] == 0 ? 'قابل استفاده' : 'غیر قابل استفاده'; ?></td>
                      <td><?php echo $inventory['created_at']; ?></td>
                      <td><?php echo $inventory['updated_at']; ?></td>
                      <td><?php echo $inventory['info']; ?></td>
                      <td style="min-width: 140px;">
                          <a href="<?php echo base_url(); ?>inventory/edit/<?php echo $inventory['id']; ?>" class="btn btn-primary fa fa-edit"></a>
                          <a href="<?php echo base_url(); ?>inventory/delete/<?php echo $inventory['id']; ?>" class="btn btn-danger fa fa-close"></a>
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