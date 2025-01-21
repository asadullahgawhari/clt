<div class="content-wrapper">
    <section class="content-header">
      <h1>
        فرم های عمومی
        <small>مثال ها</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="<?php echo base_url(); ?>/posts">جدول</a></li>
        <li class="active">ایجاد کتگوری</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ایجاد کردن کتگوری</h3>
            </div>

            <?php echo validation_errors(); ?>
            <?php echo form_open('categories/update'); ?>
            <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
              <div class="box-body">
                <div class="form-group col-sm-12">
                  <label>اسم کتگوری</label>
                  <input type="text" name="category_name" class="form-control" value="<?php echo $category['category_name']; ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
  </div>

