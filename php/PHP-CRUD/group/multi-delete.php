<?php 
  include '../database/MysqliDb.php';
  include '../modal/UserModel.php';
  session_start();
  if (isset($_POST['checkbox'])) {
    $params['id'] = $_POST['checkbox'];
    $count = count($params['id']);
    $UserModel = new UserModel();
    $UserModel->multiDeleteItem($params);
    
    $_SESSION['msgMultiDelete'] = '<div class="alert alert-success" role="alert">Delete '.$count.' User Success!</div>';
      
		header('location: ../index.php');
  } else {
    $_SESSION['msgMultiDelete'] = '<div class="alert alert-danger" role="alert">Delete Failed</div>';
    header('location: ../index.php');
  }
?>