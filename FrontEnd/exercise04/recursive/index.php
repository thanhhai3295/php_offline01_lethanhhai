<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.min.css">
	<title>Document</title>
</head>
<body>
<?php
	function showAll($path, &$newString, $count = 1){
		$data	= scandir($path);
		$newString .= '<ul>';
		foreach($data as $key => $value){
			if($value != '.' && $value != '..' && $value != 'css'){
				$dir	= $path . '/' . $value;
				if(is_dir($dir)){	
					$newString .= '<li><span class="relative"><span class="level-menu">'.$count.'</span><i class="far fa-folder"></i> '. $value.'</span>';
					showAll($dir, $newString, $count + 1);
					$newString .= '</li>';
					
				}else{
					$ext = strtolower(pathinfo($value,PATHINFO_EXTENSION));
					$arrExt = array(
						'far fa-file-alt' => ['txt','doc','ini'],
						'fab fa-youtube' => ['mp3','mp4','avi'],
						'far fa-image' => ['png','jpg','jpeg']
					);
					foreach($arrExt as $key => $v) {
						if(in_array($ext, $v)) {
							$newString .= '<li><i class="'.$key.'"></i> ' . $value . '</li>';
						}
					}
					
				}
			}
		}
		$newString .= '</ul>';		
	}
	
	showAll('.', $newString);
	echo $newString;
	
?>	
</body>
</html>
	
	
	
	

