<?php 
  $str = '';
  $active = '';
  for($i = 1; $i <= $totalPage; $i++) {
    if(isset($_GET['page']) && $i == $_GET['page']) {
      $active = 'active';
    }else if(!isset($_GET['page']) && $i == 1 ){
      $active = 'active';
    }else {
      $active = '';
    }
    $str .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
  }
  echo $str;
?>