<?php 
  $search = '';
  if(isset($_GET['search'])) $search = '&search='.$_GET['search'];
  header("location: index.php?controller=users&action=index$search"); 
?>