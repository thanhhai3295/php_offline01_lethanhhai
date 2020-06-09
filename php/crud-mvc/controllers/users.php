<?php
class Users extends Controller{
	public function __construct(){
		parent::__construct();
		Session::init(); 
	}
	
	public function index() {
		$params['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		if(isset($_GET['search'])) $params['search'] = $_GET['search'];
		if(isset($_GET['filter'])) $params['filter'] = (int)$_GET['filter'];
		$this->view->items = $this->db->list($params);
		$this->view->totalPage = $this->db->totalPages;
		$this->view->render($this->name.'/index');
	}

	public function status(){
		if(isset($_GET['id'])) $params['id'] = $_GET['id'];
		if(isset($_GET['status'])) $params['status'] = ((int)$_GET['status'] == 0) ? 1 : 0;
		$this->db->changeStatus($params);
		Session::set('msg','Change Status Success!');
		$this->redirect($this->name,'index');
	}

	public function form() {
		if(isset($_GET['id'])) { 
			$this->view->id = $_GET['id'];
			$item = $this->db->getItem($this->view->id);
			if(empty($item)) $this->redirect($this->name,'index');		
			$this->view->name 		= $item[0]['name'];
			$this->view->status 	= $item[0]['status'];
			$this->view->ordering = $item[0]['ordering'];
		}
		if(isset($_POST['submit'])) {
			$val = new validate();
			$val->name('name')->value($_POST['name'])->required();
			$val->name('ordering')->value($_POST['ordering'])->required();
			if($val->isSuccess()){
				$this->view->name			= $_POST['name'];
				$this->view->status 	= $_POST['chkStatus'];
				$this->view->ordering = $_POST['ordering'];
				$this->db->processItem((array)$this->view);		
				Session::set('msgProcess',isset($_GET['id']) ? 'Edit User Success!' : 'Add User Success!');
				$this->redirect($this->name,'index');
			} else {
				$this->view->error = $val->getErrors();
			}
		}
		$this->view->render($this->name.'/form'); 
	}
	public function delete() {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$this->db->deleteUser($id);
			Session::set('msgDelete','Delete User Success!');
			$this->redirect($this->name,'index');
		}
	}

	public function multiDelete() {
		if (isset($_POST['checkbox']))  {
			$arrayID = $_POST['checkbox'];
			$this->db->multiDeleteUser($arrayID);
			Session::set('msgDelete','Delete '.count($arrayID).' User Success!');
		} else {
			Session::set('error','Failed To Delete Users');
		}
		$this->redirect($this->name,'index');
	}
}