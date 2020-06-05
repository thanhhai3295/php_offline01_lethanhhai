<?php 
  if(!empty($_SESSION)) {
    foreach($_SESSION as $key => $value) {
      $stage = ($key != 'error') ? 'success' : 'danger';
      echo '<div class="alert alert-'.$stage.'" role="alert">'.$value.'</div>';
    }
  }
  session_destroy();
?>
