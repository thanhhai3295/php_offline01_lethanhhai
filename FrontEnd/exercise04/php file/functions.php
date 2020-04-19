<?php 
	function checkEmpty($str) {
		$flag = false;
		if(trim($str) == "" || !isset($str)) $flag = true;
		return $flag;
	}

	function checkLength($str,$min,$max) {
		$flag = false;
		if(strlen($str) < $min || strlen($str) > $max) $flag = true;
		return $flag;
	}

	function randomString($length = 5){
		$arrCharacter = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$arrCharacter = implode('',$arrCharacter);
		$arrCharacter = str_shuffle($arrCharacter);
		return substr($arrCharacter,0,$length);
	}

	function convertSize($size, $totalDigit = 2, $ditance = ' '){
		$units	= array('B', 'KB', 'MB', 'GB', 'TB');
	
		$length	= count($units);
		for($i = 0; $i < $length; $i++){
			if($size > 1024) {
				$size	= $size / 1024;
			}else {
				$unit	= $units[$i];
				break;
			}
		}
	
		$result = round($size, $totalDigit) . $ditance . $unit;
		return $result;
	}

	function checkImage($str){
		$ext = strtolower(pathinfo($str,PATHINFO_EXTENSION));
		if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') return true;
		else return false;
	}
?>