<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Process</title>
</head>
<body>
	<div id="wrapper">
		<div class="title">PROCESS</div>
        <div id="form">   
			<?php
				require_once 'functions.php';
				session_start();
				if(isset($_POST['save'])) {
					if(!empty($_POST['timeOut']) && is_numeric($_POST['timeOut'])) {
						$xmlString = '<?xml version="1.0" encoding="UTF-8"?>
													<session><timeout>'.$_POST['timeOut'].'</timeout></session>';
						$dom = new DOMDocument;
						$dom->preserveWhiteSpace = FALSE;
						$dom->loadXML($xmlString);
						$dom->save('./timeout.xml');
						echo '<p>Save Success!</p>';
					}
				}
				if(isset($_SESSION['flagPermission'])){	
					if($_SESSION['timeout'] > time()){
						if($_SESSION['fullName'] == 'Administrator') {
							include './adminLayout.php';				
						}else {
							echo '<h3>Xin chào: '.$_SESSION['fullName'].'</h3>';
							echo '<a href="logout.php">Đăng xuất</a>';
						}
						
					}else{
						session_unset();
						header('location: login.php');
					}
					
				}else{
					if(!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])){
						$username 	= $_POST['username'];
						$password 	= md5($_POST['password']);
						$data = file_get_contents('./users.json');
						$data = json_decode($data);
						$userInfo 	= explode('|', $data->$username) ;
						
						if($userInfo[0] == $username && $userInfo[1] == $password){							
							$_SESSION['fullName'] 		= $userInfo[2];
							$_SESSION['flagPermission'] = true;
							getTimeXML();
							$_SESSION['timeout'] 		= time() + $timeOut;
							if($_SESSION['fullName'] == 'Administrator') {
									include './adminLayout.php';							
							}else {
								echo '<h3>Xin chào: '.$_SESSION['fullName'].'</h3>';
								echo '<a href="logout.php">Đăng xuất</a>';
							}
						}else{
							header('location: login.php');
						}
					}else{
						header('location: login.php');
					}
				}
			?>
        </div>
        
    </div>
</body>
</html>
