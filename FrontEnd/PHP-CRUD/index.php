<?php 
	include './html/header.php';
	include './database/MysqliDb.php';
	include './modal/UserModel.php';
	include 'libs/HTML.php';
	$userModal = new UserModel();
?>
<body>
  <div class="container">
		<h1 class="my-3"><a href="#">PHP CRUD</a></h1>
		<?php 
			include './html/message.php';
			include './html/filter.php'; 
			include './html/action.php';
		?>
		<div>
	<?php 
		include './html/list.php';
		include './html/pagination.php';	
	?>
		</div> <!--/.col-sm-12-->
	</div>
	<?php include './html/script.php'; ?>
</body>
</html>
