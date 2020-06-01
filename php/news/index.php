<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
  <body>
  <?php include './define.php'; ?>
  <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>Most Read</h2>
								</div>
							</div>
						
              <?php include './news.php'; 
                $str = '';
                foreach($newsArr as $key => $value) {
                  foreach($value as $key02 => $value02) {
                    $str .= '<div class="col-md-12">
                    <div class="post post-row">
                      <a class="post-img" href="'.$value02['link'].'"><img src="'.$value02['image'].'" alt=""></a>
                      <div class="post-body">
                        <div class="post-meta">
                          <a class="post-category cat-3" href="'.$value02['link'].'">'.$value02['category'].'</a>
                          <span class="post-date">'.$value02['pubDate'].'</span>
                        </div>
                        <h3 class="post-title"><a href="'.$value02['link'].'">'.$value02['title'].'</a></h3>
                        <p>'.$value02['description'].'</p>
                      </div>
                    </div>
                  </div>';
                  }
                }
                echo $str;
              ?>
							
							<!-- /post -->
							
							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">

						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title" style="margin-bottom:0;">
								<h2>Gia Vang</h2>
							</div>
							<div class="category-widget">
								<table class="table">
                  <thead>
                    <tr>
                      <th>Loai Vang</th>
                      <th>Mua Vao</th>
                      <th>Ban Ra</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php include './gold-price.php'; 
                      $str = '';
                      foreach($goldArr as $key => $value) {
                        $str .= '<tr>
                                  <td scope="row" style="width:200px;">'.$value['name'].'</td>
                                  <td>'.$value['buy'].'</td>
                                  <td>'.$value['sell'].'</td>
                                </tr>';
                      }
                      echo $str;
                    ?>
                  </tbody>
                </table>
							</div>
						</div>
						<!-- /catagories -->
            
            <div class="aside-widget">
							<div class="section-title" style="margin-bottom:0;">
								<h2>Gia Coin</h2>
							</div>
							<div class="category-widget">
                      <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                          <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Change</th>
                          </tr>
                          </thead>
                          <tbody>
                            
                          <?php include './coin.php'; 
                            $str = '';
                            
                            foreach($coinArr as $key => $value) {
                              $str .= '<tr>
                                        <td scope="row" style="width:150px;">'.$value['name'].'</td>
                                        <td>'.$value['price'].'</td>
                                        <td>'.substr($value['change'],0,5).'%'.'</td>
                                      </tr>';
                            }
                            echo $str;
                          ?>
                          </tbody>
                      </table>
                  
                  </tbody>
                </table>
							</div>
						</div>
						<!-- /catagories -->


					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
  </body>
  <script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
