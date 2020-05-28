<?php 
	include '../database/MysqliDb.php';
	include '../modal/UserModel.php';
	if (isset($_GET['id'])) {
		$params['id'] = $_GET['id'];
		$UserModel = new UserModel();
		$UserModel->deleteItem($params);
		session_start();
		$_SESSION['msgDelete'] = '<div class="alert alert-success" role="alert">Delete User Success!</div>';
		header('location: ../index.php');
	}
	
?>