<?php
class Users_Model extends Model{
	public $tableName = 'users';
	public function __construct(){
		parent::__construct();
	}
	public function list($page) {
		$this->pageLimit = 4;
		$this->orderBy("id","desc");
		$result = $this->arraybuilder()->paginate("$this->tableName", $page);
		return $result;
	}

	public function changeStatus($id, $status){
			$params = array($status, $id);
			$this->rawQuery('UPDATE users SET status = ? WHERE id = ?', $params);
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
}