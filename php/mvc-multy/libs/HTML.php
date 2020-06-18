<?php 
	class HTML {
		
		public static function showStatus($status, $id=null) {
			$xhtml = '';
			$url = URL::createLink('admin','group','status',['id' => $id, 'status' => $status]);
			if($status == 0) {
				$xhtml = '<a href="'.$url.'" class="btn btn-block btn-warning status"><i class="fas fa-exclamation"></i> Inactive</a>';
			}else {
				$xhtml = '<a href="'.$url.'" class="btn btn-block btn-success status"><i class="fas fa-check"></i> Active</a>';
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

		public static function countStatus($status){
			$db = new Model();
			$db->where('status',$status);
			echo count($db->get("`group`"));
		}
		public static function currentURL(){
			$url = "$_SERVER[REQUEST_URI]";
			$url = explode('/', $url);
			return $url[2];
		}

		public static function holdStatus($check){
			if(isset($_GET['filter'])){
				if($_GET['filter'] == 0 && $check == 0) {
					echo 'h-inactive';
				}else if($_GET['filter'] == 1 && $check == 1){
					echo 'h-active';
				}else {
					echo '';
				}
			} 
		}
		public static function disablePagination($totalPage = NULL){
			$disabled = false;
			if ($totalPage == NULL && !isset($_GET['page'])) $disabled = true;
			if ($totalPage == NULL && isset($_GET['page']) && $_GET['page'] == 1)  $disabled = true;
			if (isset($_GET['page']) && $totalPage == $_GET['page']) $disabled = true;
			echo ($disabled ? 'disabled' : '');
		}
		public static function plusPagination($num) {
			$page = 1;
			if(isset($_GET['page'])) $page = $_GET['page'];
			$page += $num;
			$url = URL::createLink('admin','group','list',['page' => $page]);
			foreach($_GET as $key => $value) {
				if($key == 'search' || $key == 'filter') {
					$url .= "&$key=$value";
				}
			}
			echo $url;
		}
		public static function input($type, $name, $value, $placeholder){	
			$xhtml = '<input type="'.$type.'" name="'.$name.'" class="form-control" value="'.$value.'" placeholder="'.$placeholder.'" />';
			echo $xhtml;
		}
		public static function error($error) {
			echo '<p class="text-danger position-absolute" style="top:50%;transform:translateY(-50%);right:-34%;width:160px">'.$error.'</p>';
		}
		public static function select($option) {
			$data = ['1' => 'active', '0' => 'inactive'];
			$xhtml = '<select class="form-control" style="width: 100%;" name="status">';
			foreach($data as $key => $value) {
				$select = ($option == $key) ? 'selected' : '';
				$xhtml .= '<option value="'.$key.'"'.$select.'>'.ucfirst($value).'</option>';
			}
			$xhtml .= '</select>';
			echo $xhtml;
		}
		public static function dateFormat($date) {
			$date=date_create($date);
			return date_format($date,"d/m/Y");
		}
		public static function successMSG($message){
			$str = '';
			if(!empty($message)) {
				foreach($message as $key => $value) {
					$str = $value;
				}
			}
			session_destroy();
			$xhtml = '<div class="card message shadow-none">
									<div class="alert alert-success alert-dismissible mb-0">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h5><i class="icon fas fa-check"></i>'.$str.'</h5>
									</div>
								</div>';
			echo $xhtml;
		}
		public static function stat($tableName){
			$db = new Model();
			echo count($db->get("`$tableName`"));
		}
	}	

	
?>