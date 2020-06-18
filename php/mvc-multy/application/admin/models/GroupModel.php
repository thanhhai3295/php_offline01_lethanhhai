<?php
class GroupModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable(TBL_GROUP);
	}
	public function listItems($params) {
		if($params['page'] <= 0) header('location: index.php');
		$this->pageLimit = 4;
		if(isset($params['search'])) {
			$search = $params['search'];
			$this->where ("name", "%$search%", 'like');
		}
		if(isset($params['filter'])) {
			$filter = $params['filter'];
			$this->where ('status',$filter);
		}
		$this->orderBy("id","desc");
		$result = $this->arraybuilder()->paginate("`$this->table`", $params['page']);
		return $result;
	}

	public function changeStatus($params){
			$arr = array($params['status'], $params['id']);
			$this->rawQuery("UPDATE `$this->table` SET status = ? WHERE id = ?", $arr);
	}

	public function processItem($params) {
		$data = Array ( "name" 		 => $params['name'],
										"status" 	 => (int) $params['status'],
										"ordering" => $params['ordering'],
										"created"	 => $params['created']
									);
			if(isset($params['id'])) {
				unset($data['created']);
				$this->where ('id', $params['id']);
				$execute = $this->update ("`$this->table`", $data);			
			}else {
				$execute = $this->insert ("`$this->table`", $data);
			}
	}
	public function deleteUser($id){
		$this->where('id', $id);
		$this->delete("`$this->table`");
	}
	public function multiDeleteUser($arrayID){
		$this->where('id', $arrayID, 'IN');
		$this->delete("`$this->table`");
	}
	public function getItem($id) {
		$this->where ("id", $id);
		return $this->get("`$this->table`");
	}
}