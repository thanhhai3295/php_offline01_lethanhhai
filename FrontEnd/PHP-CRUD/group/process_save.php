<?php 
include '../database/MysqliDb.php';
include '../modal/UserModel.php';
$UserModel = new UserModel();
$action = 'Add';
	if(isset($_GET['id'])) { 
    $action = 'Edit';
		$params['id'] = $_GET['id'];
		$UserModel->db->where ("id", $params['id']);
		$users = $UserModel->db->get('users');
		if(empty($users)) header('Location: ../index.php');
		foreach ($users as $key => $value) {
			$params['name'] 		= $value['name'];
			$params['status'] 	= $value['status'];
			$params['ordering'] = $value['ordering'];
		}	
	}

	if(isset($_POST['submit'])) {
    $params['name']			= $_POST['name'];
    $params['status'] 	= $_POST['chkStatus'];
    $params['ordering'] = $_POST['ordering'];
    $error 		= [];
    if(trim($params['name']) == '') 		$error['name'] 		 = 'Please Enter Name';
    if(trim($params['ordering']) == '') $error['ordering'] = 'Please Enter Ordering';
    
    if(empty($error)) {
      // $params = array($name, $id);
      // $users = $db->rawQuery('SELECT * FROM users WHERE name = ? AND id != ?', $params);
      // if(empty($users)) {

        $UserModel->processItem($params);			
        session_start();
        $_SESSION['msgProcess'] = '<div class="alert alert-success" role="alert">'.$action.' User Success!</div>';
        header('location: ../index.php');
      // }
      // else {
      // 	$error['name']  = 'Same Name Exist';
      // }
    }
	}
?>