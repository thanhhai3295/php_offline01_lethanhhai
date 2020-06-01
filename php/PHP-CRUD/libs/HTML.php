<?php 
	class HTML {
		
		public static function showStatus($status, $id) {
			$xhtml = '';
			if($status == 0) {
				$xhtml = '<a href="group/status.php?id='.$id.'&status='.$status.'" class="btn btn-danger text-white w-50">Inactive</a>';
			}else {
				$xhtml = '<a href="group/status.php?id='.$id.'&status='.$status.'" class="btn btn-primary text-white w-50">Active</a>';
			}
		return $xhtml;
		}
		public static function addSpan($str){
			if(isset($_GET['search'])) {
				$search = $_GET['search'];
				return str_replace($search, "<span class='red'>$search</span>", $str);
			}
			else {
				return $str;
			}
		}
		
	}	
?>