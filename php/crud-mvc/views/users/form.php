<!doctype html>

<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>PHP CRUD</title>


	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
   	<div class="container">

		<h1 class="my-3"><a href="#">MVC CRUD</a></h1>

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>
			<?php echo (isset($_GET['id'])? 'Edit User' : 'Add User')	?>
			</strong></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

					<form method="post" action="">

						<div class="form-group ">

							<label>Name <span class="text-danger">*</span></label>
							<div class="position-relative">
								<?php 
									HTML::input('text','name',isset($this->name)?$this->name:'','Enter Name');
									HTML::error(isset($this->error['name']) ? $this->error['name'] : '');  
								?>
							</div>
							
							
						</div>
					

						<div class="form-group">

							<label>Status <span class="text-danger">*</span></label>
							<?php HTML::select(isset($this->status) ? $this->status : '') ?>
						</div>

						<div class="form-group">

							<label>Ordering <span class="text-danger">*</span></label>
							<div class="position-relative">
								<?php 
									HTML::input('text','ordering',isset($this->ordering)?$this->ordering:'','Enter ordering'); 
									HTML::error(isset($this->error['ordering']) ? $this->error['ordering'] : ''); 
								?>
							</div>

						</div>

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> <?php echo (isset($_GET['id'])? 'Edit User' : 'Add User')	?></button>
							
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