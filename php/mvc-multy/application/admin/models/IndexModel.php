<?php
class IndexModel extends Model{

	public function listItems(){
		echo '<h3>' . __METHOD__ . '</h3>';
	}

	public function countItem($tableName){
		$sql = "SELECT count(id) as `count` FROM `$tableName`";
		$count = $this->rawQueryOne ($sql);
		return $count['count'];
	}
}