<nav aria-label="..." class="clearfix">
        <ul class="pagination float-right">
            <li class="page-item <?php HTML::disablePagination() ?>">
              <a href="<?php HTML::plusPagination(-1) ?>" class="page-link">Previous</a>
            </li>
            
<?php 
  
  $xhtml = '';
  $active = '';
  $totalPage = $this->totalPage;
  
  // $start = 1;
  // $end = 3;
  // if(isset($_GET['page']) && $_GET['page'] != 1) {
  //   $end = $_GET['page'] + 1;
  //   $start = $_GET['page'] - 1;
  //   if($_GET['page'] == $totalPage) {
  //     $start = $totalPage - 2;
  //     $end = $totalPage;
  //   }
  //   if($_GET['page'] > $totalPage){
  //     header('location: index.php?controller=users&action=index&page='.$totalPage);
  //   }
  // }
  for($i = 1; $i <= $totalPage; $i++) {
    
    if(isset($_GET['page']) && $i == $_GET['page']) {
      $active = 'active';
    }else if(!isset($_GET['page']) && $i == 1 ){
      $active = 'active';
    }else {
      $active = '';
    }
    //$url = 'index.php?controller=users&action=index&page='.$i; 
    $url = URL::setURL('users','index',['page' => $i]);
    foreach($_GET as $key => $value) {
      if($key == 'search' || $key == 'filter') {
        $url .= "&$key=$value";
      }
    }
    $xhtml .= '<li class="page-item '.$active.'"><a class="page-link" href="'.$url.'">'.$i.'</a></li>';
  }
  
  echo $xhtml;
?>

      <li class="page-item <?php HTML::disablePagination($totalPage) ?>">
        <a class="page-link" href="<?php HTML::plusPagination(+1) ?>">Next</a>
      </li>
  </ul>
</nav>
</div>