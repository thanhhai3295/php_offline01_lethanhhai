<?php 
	include '../database/MysqliDb.php';
	include '../modal/UserModel.php';
	$db = new MysqliDb ('localhost', 'root', '', 'test_crud');

	if(isset($_GET['status']) && isset($_GET['id'])) {
		$status = $_GET['status'];
		$params['id'] = $_GET['id'];
		if($status == 1) {
			$params['status'] = 0;
		}else if($status == 0) {
			$params['status'] = 1;
		}

		$userModel = new UserModel();
		$userModel->changeStatus($params);
		session_start();
		$_SESSION['msgStatus'] = '<div class="alert alert-success" role="alert">Update Status Success!</div>';
		header('Location: ../index.php');
	}
?>	