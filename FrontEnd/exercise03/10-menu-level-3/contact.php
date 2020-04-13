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
              // check active
              if ($key == 'contact') {
                echo '<li class="active"><a href="'.$key.'.php">'.$value["name"].'</a>';
              }else {
                echo '<li><a href="'.$key.'.php">'.$value["name"].'</a>';      
              }
              // menu lv 2
              if (!empty($value['child'])) {
                echo '<ul>';
                foreach($value["child"] as $key01 => $value01) {
                    echo '<li><a href="'.$key01.'.php">'.$value01["name"].'</a>';
                    // menu lv 3
                    if (!empty($value01['child'])) {
                      echo '<ul>';
                      foreach($value01["child"] as $key02 => $value02) {
                          echo '<li><a href="'.$key02.'.php">'.$value02["name"].'</a></li>';
                      }
                      echo '</ul>';
                    }
                    echo '</li>';
                }
                echo '</ul>';
              }
              echo '</li>';   
          } ?>
              <!-- <li ><a href="index.php">Home </a></li>
              <li class="active">
                <a href="data/about.php">About</a>
                <ul>
                    <li>
                      <a href="data/service.php">Service</a>
                      <ul>
                          <li><a href="data/sale.php">Sale</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="data/company.php">Company</a>
                      <ul>
                          <li><a href="data/toyota.php">Toyota</a></li>
                      </ul>
                    </li>
                </ul>
              </li>
              <li ><a href="data/contact.php">Contact </a></li> -->
          </ul>
        </div>
    </div>
    <div class="breadcrumb">
        <a href="index.php">Home</a>
        <span> > </span>
        <span>Contact</span>
    </div>
    <h3>Contact</h3>
  </body>
</html>