<?php
class Users_Model extends Model{
	
	public function __construct(){
		parent::__construct();
	}
	public function list($params) {
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
		$result = $this->arraybuilder()->paginate("users", $params['page']);
		return $result;
	}

	public function changeStatus($params){
			$arr = array($params['status'], $params['id']);
			$this->rawQuery('UPDATE users SET status = ? WHERE id = ?', $arr);
	}

	public function processItem($params) {
		$data = Array ( "name" 		 => $params['name'],
											"status" 	 => (int) $params['status'],
               				"ordering" => $params['ordering']
										);
			if(isset($params['id'])) {
				$this->where ('id', $params['id']);
				$execute = $this->update ('users', $data);			
			}else {
				$execute = $this->insert ('users', $data);
			}
	}
	public function deleteUser($id){
		$this->where('id', $id);
		$this->delete('users');
	}
	public function multiDeleteUser($arrayID){
		$this->where('id', $arrayID, 'IN');
		$this->delete('users');
	}
	public function getItem($id) {
		$this->where ("id", $id);
		return $this->get('users');
	}
}