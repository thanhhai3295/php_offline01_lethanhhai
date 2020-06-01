<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE - ADD</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cancel-button').click(function(){
			window.location = 'index.php';
		});
	});
</script>
</head>
<body>
<?php
	include 'functions.php';
	$errorTitle 			= '';
	$errorDescription = '';
	$errorImage = '';
	$result = '';
	if (isset($_POST["submit"])) {

		$title = $_POST["title"];
		$description 	= $_POST["description"];
		if(checkEmpty($title)) {
			$errorTitle .= '<p class="error">Khong Bo Trong Title</p>';
		} 
		if(checkLength($title,5,100)){
			$errorTitle .= '<p class="error">Chieu dai title khong dung</p>';
		}

		if(checkEmpty($description)) {
			$errorDescription .= '<p class="error">Khong Bo Trong description</p>';
		} 
		if(checkLength($description,10,1000)) {
			$errorDescription .= '<p class="error">Chieu dai description khong dung</p>';;
		}

		$files = $_FILES['uploadFile'];
		if(!checkImage($files['name'])) $errorImage .= '<p class="error">xin chon file anh</p>'; 

		if($errorTitle == '' && $errorDescription == '' && $errorImage == '')  {
			$data = $title.'||'.$description.'||'.time().$files['name'];
			$name = randomString(5);
			$filename = './files/'.$name.'.txt';
			move_uploaded_file($files['tmp_name'],'./images/'.time().$files['name']);
			if (file_put_contents($filename,$data)) {
				$title = '';
				$description = '';
				$result = 'Them Thanh Cong';
			}
		}
	}
?>
	<div id="wrapper">
    <div class="title">PHP FILE - ADD</div>
        <div id="form">   
			<form action="#" method="post" name="add-form" enctype="multipart/form-data">
				<div class="row">
					<p>Title</p>
					<input type="text" name="title" value="<?php if(isset($title)) echo $title; ?>">
					<?php echo $errorTitle; ?>
				</div>
				
				<div class="row">
					<p>Description</p>
					<textarea name="description" rows="5" cols="100"><?php if(isset($title)) echo $description; ?></textarea>
					<?php echo $errorDescription; ?>
				</div>
				<div class="row">
				<p>Upload Image</p>
				<input type="file" name="uploadFile">
				<?php echo $errorImage; ?>
				</div>
				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
					
				</div>
				

				<?php echo $result; ?>				
			</form>    
        </div>
        
    </div>
</body>
</html>
