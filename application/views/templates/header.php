<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>دشبورد | کنترول پینل کورلنکس</title>

  <!-- My Style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/style.css">
  <!-- Icon -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/dist/img/favicon/favicon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-theme.css">
  <!-- Bootstrap rtl -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/rtl.css">
  <!-- persian Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/persian-datepicker-0.4.5.min">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
 <!-- If you want to remove the fixed pages put just "fixed" after skin-blue -->
<body class="hold-transition skin-blue fixed sidebar-collapse sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">پینل</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>کنترول پینل کورلنکس</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


       <!-- Clock -->
       <a class="btn hidden-xs" style="margin:6px 10px;padding:9px 25px;background-color:#d61577;border-color:#ad0b5d;font-weight:bold;color:#FFF">

       <body onload="startTime()">

        <div id="txt"></div>

            <script>
            function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
            }

            function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
            }
            </script>

        </body>

       </a>
       <!-- End Clock-->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src="<?php echo base_url(); ?>assets/dist/img/users/<?= $this->session->userdata('user_id')->user_image; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php echo $this->session->userdata('user_id')->name . ' ' . $this->session->userdata('user_id')->last_name; ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/dist/img/users/<?= $this->session->userdata('user_id')->user_image; ?>" class="img-circle" alt="User Image">

                <p>
                    <?php echo $this->session->userdata('user_id')->name . ' ' . $this->session->userdata('user_id')->last_name; ?>
                  <small><?php echo $this->session->userdata('user_id')->task; ?></small>
                </p>
              </li>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="users/edit/<?php echo $this->session->userdata('user_id')->id; ?>" class="btn btn-default btn-flat">پروفایل </a>
                </div>
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>users/logout" class="btn btn-default btn-flat">خروج</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


  <!-- right side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image">
          
          <!-- <img src="<?php echo site_url(); ?>assets/dist/img/users/<?php echo $user['name']; ?>" class="img-circle" alt="User Image"> -->
          
          <img src="<?php echo base_url(); ?>assets/dist/img/users/<?php echo $this->session->userdata('user_id')->user_image; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-right info">
          <p>
          <?php echo $this->session->userdata('user_id')->name . ' ' . $this->session->userdata('user_id')->last_name; ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="جستجو">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">مینو</li> -->
        <li class="<?php echo ($this->uri->segment(1) == 'home') ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>home">
            <i class="fa fa-dashboard"></i> <span>دشبورد</span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(1) == 'posts') ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>posts">
            <i class="fa fa-th"></i> <span>وبلاگ</span>
            <span class="pull-left-container">
            </span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(1) == 'categories') ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>categories">
            <i class="fa fa-list-alt"></i> <span>کتگوری</span>
            <span class="pull-left-container">
            </span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(1) == 'project') ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>project">
            <i class="fa fa-file-text-o"></i> <span>پروژه ها</span>
            <span class="pull-left-container">
              <!-- <small class="label pull-left bg-yellow">12</small>
              <small class="label pull-left bg-green">8</small>
              <small class="label pull-left bg-primary">16</small> -->
            </span>
          </a>
        </li>

        <li class="treeview <?php echo ($this->uri->segment(1) == 'about') ? 'finance' : ''; ?>">
          <a href="#">
            <i class="fa fa-line-chart"></i>
            <span>مالی</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>income"><i class="fa fa-circle-o"></i> عواید</a></li>
            <li><a href="<?php echo base_url(); ?>outcome"><i class="fa fa-circle-o"></i> مصارف</a></li>
          </ul>
        </li>

        <li class="<?php echo ($this->uri->segment(1) == 'inventory') ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>inventory">
            <i class="fa fa-server"></i> <span>موجودی</span>
            <span class="pull-left-container">
            </span>
          </a>
        </li>

        <!-- <li class="<?php echo ($this->uri->segment(1) == 'archive') ? 'active' : ''; ?>">
          <a href="#">
            <i class="fa fa-pencil-square"></i> <span>بایگانی</span>
            <span class="pull-left-container">
            </span>
          </a>
        </li> -->

        <li class="<?php echo ($this->uri->segment(1) == 'users') ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>users">
            <i class="fa fa-user"></i> <span>لیست یوزر ها</span>
            <span class="pull-left-container">
            </span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(1) == 'about') ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>about">
            <i class="fa fa-edit"></i> <span>درباره ما</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>users/logout">
            <i class="fa  fa-sign-out"></i> <span>خروج</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
        