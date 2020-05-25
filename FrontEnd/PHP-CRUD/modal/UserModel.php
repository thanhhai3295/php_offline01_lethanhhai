<?php 
	class UserModel {
		public $tableName = 'users';
		public $db;
		public function __construct(){
			$this->db = new MysqliDb ('localhost', 'root', '', 'test_crud');
		}
		public function listItem($params) {
			$this->db->pageLimit = 4;
		  $this->db->orderBy("id","Desc");
		  $items = $this->db->arraybuilder()->paginate($this->tableName, $params['page']);
		  return $items;
		}

		public function getItem($params) {
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
			
			if($execute) header('location: index.php');
		}

		public function deleteItem($params) {
			$id = $params['id'];
			$this->db->where('id', $id);
			if($this->db->delete('users')) header('location: index.php');
		}
		public function multiDeleteItem($params) {
			foreach ($params['id'] as $key => $value) {
      $id = $value;
      $this->db->where('id', $id);
      $this->db->delete('users');
      header('location: index.php');
    }
		 }
		// public static function changeStatus() {

		// }
	}
?>