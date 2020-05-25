<?php 
  include './database/MysqliDb.php';
  include './modal/UserModel.php';
  if (isset($_POST['checkbox'])) {
    $params['id'] = $_POST['checkbox'];
    $UserModel = new UserModel();
    $UserModel->multiDeleteItem($params);
  } else {
    header('location: index.php');
  }
?>