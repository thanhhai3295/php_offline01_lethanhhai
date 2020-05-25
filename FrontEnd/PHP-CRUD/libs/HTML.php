<?php 
	class HTML {
		
		public static function showStatus($status, $id) {
			$xhtml = '';
			if($status == 0) {
				$xhtml = '<a href="#" id="'.$id.'" status="inactive" class="btn btn-danger text-white w-50">Inactive</a>';
			}else {
				$xhtml = '<a href="#" id="'.$id.'" status="active" class="btn btn-primary text-white w-50">Active</a>';
			}
		return $xhtml;
		}

	}	
?>