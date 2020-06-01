<?php 
	class UserModel {
		public $tableName = 'users';
		public $db;
		public function __construct(){
			$this->db = new MysqliDb ('localhost', 'root', '', 'test_crud');
		}
		public function listItem($params) {
			if(isset($params['search'])) {
				$this->db->where ("name", '%'.$params['search'].'%', 'like');
			}
			if(isset($params['filter'])) {
				if($params['filter'] == 'active') {
					$this->db->where('status',1);
				}else {
					$this->db->where('status',0);
				}
			}
			$this->db->pageLimit = 4;
		  $this->db->orderBy("id","Desc");
		  $items = $this->db->arraybuilder()->paginate($this->tableName, $params['page']);
		  return $items;
		}

		public function processItem($params) {
			$data = Array ( "name" 		 => $params['name'],
											"status" 	 => (int) $params['status'],
               				"ordering" => $params['ordering']
										);
			if(isset($params['id'])) {
				$this->db->where ('id', $params['id']);
				$execute = $this->db->update ('users', $data);			
			}else {
				$execute = $this->db->insert ('users', $data);
			}
		}

		public function deleteItem($params) {
			$id = $params['id'];
			$this->db->where('id', $id);
			$this->db->delete('users');
		}
		public function multiDeleteItem($params) {
			foreach ($params['id'] as $key => $value) {
      $id = $value;
      $this->db->where('id', $id);
      $this->db->delete('users');
    	}
		}
		public function changeStatus($params) {
			$id = $params['id'];
			$status = $params['status'];
			$params = array($status, $id);
			$this->db->rawQuery('UPDATE users SET status = ? WHERE id = ?', $params);
		}

		public function countStatus($status){
			$this->db->where ('status', $status);
			$result = $this->db->get($this->tableName);
			echo count($result);
		}
	}
?>