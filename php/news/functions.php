<?php 
  function getCategory($str) {
    $str = trim($str);
    $slash = strrpos($str,'/');
    $str = substr($str, $slash + 1, strlen($slash) - 6);
    return str_replace('-', ' ',$str);
  }
?>