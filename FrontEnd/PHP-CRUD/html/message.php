<?php 
  session_start();
  // if(isset($_SESSION['msgStatus'])) {
  //   echo $_SESSION['msgStatus'];
  // }
  // if(isset($_SESSION['msgDelete'])) {
  //   echo $_SESSION['msgDelete'];
  // }
  // if(isset($_SESSION['msgMultiDelete'])) {
  //   echo $_SESSION['msgMultiDelete'];
  // }
  if(!empty($_SESSION)) {
    foreach($_SESSION as $key => $value) {
      echo $value;
    }
  } 
  session_destroy();
?>