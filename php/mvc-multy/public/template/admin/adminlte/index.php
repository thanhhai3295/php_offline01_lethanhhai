<!DOCTYPE html>
<html>
<head>
  <?php echo $this->_metaHTTP;?>
  <?php echo $this->_metaName;?>
  <?php echo $this->_title;?>
  <?php echo $this->_cssFiles;?>
  

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <?php  include 'html/message.php' ?>
      <!-- Notifications Dropdown Menu -->
      <?php  include 'html/notifications.php' ?>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'html/aside.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php
    require_once APPLICATION_PATH. $this->_moduleName . DS . 'views' . DS .  $this->_fileView . '.php';
    
  ?>
    <!-- Content Header (Page header) -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'html/footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php //  include 'html/script.php';?>
<?php echo $this->_jsFiles;?>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
</body>
</html>
