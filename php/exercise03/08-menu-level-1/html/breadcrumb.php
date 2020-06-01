<?php 
  $breadcrumb = '';
  if ($menuCurrent == 'index') {
    $breadcrumb = '<span>Home</span>';
  }else {
    $breadcrumb = '<a href="index.php">Home</a>
                  <span> > </span>
                  <span>'.$currentBreadCrumb[0].'</span>';
  }
?>
<div class="breadcrumb">
  <?php echo $breadcrumb; ?>
</div>