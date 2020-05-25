<?php 
	include 'database/MysqliDb.php';
	include 'modal/UserModel.php';
	if (isset($_GET['id'])) {
		$params['id'] = $_GET['id'];
		$UserModel = new UserModel();
		$UserModel->deleteItem($params);
	}

?>