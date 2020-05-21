<?php 
  include './database/connectDB.php';
  if (isset($_POST['checkbox'])) {
    $checkbox = $_POST['checkbox'];
    foreach ($checkbox as $key => $value) {
      $id = $value;
      $db->where('id', $id);
      $db->delete('users');
    }
    header('location: index.php');
  } else {
    header('location: index.php');
  }
?>