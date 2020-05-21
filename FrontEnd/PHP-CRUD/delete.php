<?php 
	include './database/connectDB.php';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$db->where('id', $id);
		if($db->delete('users')) header('location: index.php');
	}
?>