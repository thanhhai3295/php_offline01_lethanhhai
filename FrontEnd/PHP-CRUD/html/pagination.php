<nav aria-label="..." class="clearfix">
        <ul class="pagination float-right">
            <li class="page-item disabled">
              <span class="page-link">Previous</span>
            </li>
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

      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
  </ul>
</nav>