<?php 
  $xhtmlBreadCrumb = '';
  $countBreadCrumb = count($currentBreadCrumb);

  switch ($countBreadCrumb) {
    case '1':
      if ($menuCurrent == 'index') {
        $xhtmlBreadCrumb .= '<span>Home</span>';
      }else {
        $xhtmlBreadCrumb .= '<a href="index.php">Home</a>
                            <span> > </span>
                            <span>'.$currentBreadCrumb[0]['name'].'</span>';
      }
      break;
    
    case '2':
      $xhtmlBreadCrumb .= '<a href="index.php">Home</a>
                          <span> > </span>
                          <a href="'.$currentBreadCrumb[0]['link'].'">'.$currentBreadCrumb[0]['name'].'</a>
                          <span> > </span>
                          <span>'.$currentBreadCrumb[1]['name'].'<span>';

      break;

    case '3':
      $xhtmlBreadCrumb .= '<a href="index.php">Home</a>
                          <span> > </span>
                          <a href="'.$currentBreadCrumb[0]['link'].'">'.$currentBreadCrumb[0]['name'].'</a>
                          <span> > </span>
                          <a href="'.$currentBreadCrumb[1]['link'].'">'.$currentBreadCrumb[1]['name'].'</a>
                          <span> > </span>
                          <span>'.$currentBreadCrumb[2]['name'].'<span>';


      break;
  }
?>
<div class="breadcrumb">
  <?php echo $xhtmlBreadCrumb; ?>
</div>

