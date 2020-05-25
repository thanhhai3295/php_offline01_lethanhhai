<?php 
	include './database/MysqliDb.php';
	include './libs/HTML.php';
	$db = new MysqliDb ('localhost', 'root', '', 'test_crud');

	if(isset($_GET['status']) && isset($_GET['id'])) {
		$status = $_GET['status'];
		$id = $_GET['id'];
		$xhtml='';
		$check = 0;
		if($status == 'active') {
			$check = 0;
		}else if($status == 'inactive') {
			$check = 1;
		}
		$xhtml = HTML::showStatus($check,$id);

		
		$params = array($check, $id);
		$users = $db->rawQuery('UPDATE users SET status = ? WHERE id = ?', $params);
		echo $xhtml;
	}
?>	