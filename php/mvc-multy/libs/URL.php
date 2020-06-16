<?php 
	class URL {
		public static function createLink($module,$controller, $action, $params = NULL){
			$result = "index.php?module=$module&controller=$controller&action=$action";
      if(!empty($params)) {
        foreach($params as $key => $value) {
          $result .= "&$key=$value";
        }
      }
      return $result;
		}
	}
?>