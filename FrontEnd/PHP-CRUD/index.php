<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PHP CRUD</title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<style>
		.anima {
			animation:blink 0.35s ease-in;
		}
		@keyframes blink {
			0% {
				opacity: 0;
			}
			100% {
				opacity: 1;
			}
		}
	</style>
</head>

<body>
	
  <div class="container">
		<h1 class="my-3"><a href="#">PHP CRUD</a></h1>
		<div class="card">
			<div class="card-header"><i class="fas fa-hammer"></i><strong> Action</strong></div>
			<div class="card-body">
				<div class="col-sm-12">
					<form method="get" class="clearfix mb-0">			
						<div class="float-right">
							<a href="add.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add User</a>
							<a href="#" id="multi-delete" class="btn btn-danger"><i class="fas fa-times"></i> Delete User</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th class="text-center">
							<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1"></label>
							</div>
						</th>
						<th class="text-center">ID</th>
						<th class="text-center" style="width:30%;">Name</th>
						<th class="text-center">Status</th>
						<th class="text-center">Ordering</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody class="anima">
					<form action="multi-delete.php" id="main-form" method="POST">

					<?php include './list.php'; ?>
					</form>
				</tbody>
			</table>

			<nav aria-label="..." class="clearfix">
				<ul class="pagination float-right">
						<li class="page-item disabled">
							<span class="page-link">Previous</span>
						</li>
						
						<?php  
							include './pagination.php';
						?>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
				</ul>
			</nav>

		</div> <!--/.col-sm-12-->
		
	</div>
	
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
	<script>
		$( "#multi-delete" ).click(function() {
 		$( "#main-form" ).submit();
		});
	</script>
    
</body>
</html>
