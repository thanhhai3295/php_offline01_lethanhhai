<!doctype html>

<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>PHP CRUD</title>

	

	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->


</head>

<body>

<?php 
include './database/MysqliDb.php';
include './modal/UserModel.php';
$UserModel = new UserModel();
	if(isset($_GET['id'])) { 
		$params['id'] = $_GET['id'];
		$UserModel->db->where ("id", $params['id']);
		$users = $UserModel->db->get('users');
		if(empty($users)) header('Location: index.php');
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

					$UserModel->getItem($params);			
					
					if($execute) header('location: index.php');
				// }
				// else {
				// 	$error['name']  = 'Same Name Exist';
				// }
			}
		}
?>
   	<div class="container">

		<h1 class="my-3"><a href="#">PHP CRUD</a></h1>

	

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Edit User</strong></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

					<form method="post" action="">

						<div class="form-group ">

							<label>Name <span class="text-danger">*</span></label>
							<div class="position-relative">
								<input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php  
									if(isset($params['name'])) {
										echo $params['name'];
									}else {
										echo '';
									}
								?>">
		
								
								<p class="text-danger position-absolute" style="top:50%;transform:translateY(-50%);right:-30%;"><?php if (isset($error['name'])) echo $error['name']; ?></p>
							</div>
							
							
						</div>

						<div class="form-group">

							<label>Status <span class="text-danger">*</span></label>

							<select class="custom-select" name="chkStatus">
								<option value="1" <?php 
									if(isset($params['status']) && $params['status'] == 1) {
										echo 'selected';
									}
									else {
										echo '';
									}
								?> >Active</option>
								<option value="0" <?php 
									if(isset($params['status']) && $params['status'] == 0) {
										echo 'selected';
									}
									else {
										echo '';
									}
								?> >Inactive</option>
							</select>

						</div>

						<div class="form-group">

							<label>Ordering <span class="text-danger">*</span></label>
							<div class="position-relative">
								<input type="text" name="ordering" class="form-control" placeholder="Enter Ordering" value="<?php 
									if(isset($params['ordering'])) {
										echo $params['ordering'];
									}else {
										echo '';
									}
								?>">
								<p class="text-danger position-absolute" style="top:50%;transform:translateY(-50%);right:-34%;"><?php if (isset($error['ordering'])) echo $error['ordering']; ?></p>
							</div>

						</div>

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Edit User</button>
							
						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>


    

</body>

</html>