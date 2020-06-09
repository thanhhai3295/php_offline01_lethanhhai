<?php 
  class URL {
    public static function setURL($controller, $action, $params = NULL) {
      $result = "index.php?controller=$controller&action=$action";
      if(!empty($params)) {
        foreach($params as $key => $value) {
          $result .= "&$key=$value";
        }
      }
      return $result;
    }
  }
?>