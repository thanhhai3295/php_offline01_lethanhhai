<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Index Menu Level 2</title>
    <link rel="stylesheet" href="./css/styles.css" />
  </head>
  <body>
  <?php 

    include '../data.php';
  ?>

    <div class="menuBackground">
        <div class="center">
          <ul class="dropDownMenu">
          <?php foreach($arrMenu as $key => $value) {
              if ($key == 'about') {
                echo '<li class="active"><a href="'.$key.'.php">'.$value["name"].'</a></li>';
              }else {
                echo '<li><a href="'.$key.'.php">'.$value["name"].'</a></li>';
              }
              
          } ?>
          </ul>
        </div>
    </div>
    <div class="breadcrumb">
    <a href="index.php">Home</a>
    <span> > </span>
    <span>About</span>
    </div>

    <h3>About</h3>
  </body>
</html>