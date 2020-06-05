<?php
class Users extends Controller{

	public function __construct(){
		parent::__construct();
		Session::init(); 
	}
	
	public function index() {
		$page = 1;
		if(isset($_GET['page'])) $page = $_GET['page'];
		if(isset($_GET['search'])) {
			$search = $_GET['search'];
			$this->db->where ("name", "%$search%", 'like');
		}

		if(isset($_GET['filter'])) {
			$filter = (int)$_GET['filter'];
			$this->db->where ('status',$filter);
		}
		
		$this->view->items = $this->db->list($page);
		$this->view->totalPage = $this->db->totalPages;
		$this->view->render('users/index');
	}

	public function status(){
		if(isset($_GET['id'])) $id = $_GET['id'];
		if(isset($_GET['status'])) $status = ((int)$_GET['status'] == 0) ? 1 : 0;
		$this->db->changeStatus($id,$status);
		$_SESSION['msg'] = 'Change Status Success!';
		$this->redirect('users','index');
	}

	public function form() {
		$action = 'Add';
		if(isset($_GET['id'])) { 
    $action = 'Edit';
		$this->view->id = $_GET['id'];
		$this->db->where ("id", $this->view->id);
		$users = $this->db->get('users');
		if(empty($users)) $this->redirect('users','index');		
		$this->view->name 		= $users[0]['name'];
		$this->view->status 	= $users[0]['status'];
		$this->view->ordering = $users[0]['ordering'];
	}
	if(isset($_POST['submit'])) {
    $this->view->name			= $_POST['name'];
    $this->view->status 	= $_POST['chkStatus'];
    $this->view->ordering = $_POST['ordering'];
    if(trim($this->view->name) == '') 		$this->view->error['name'] 		 = 'Please Enter Name';
    if(trim($this->view->ordering) == '') $this->view->error['ordering'] = 'Please Enter Ordering';
    if(empty($this->view->error)) {
        $this->db->processItem((array)$this->view);			
        $_SESSION['msgProcess'] = (isset($_GET['id']) ? 'Edit User Success!' : 'Add User Success!');
        $this->redirect('users','index');
    }
	}
		$this->view->action = $action;
		$this->view->render('users/form'); 
	}
	public function delete() {
			if (isset($_GET['id'])) $id = $_GET['id'];
			$this->db->where('id', $id);
			$this->db->delete('users');
			$_SESSION['msgDelete'] = 'Delete User Success!';
			$this->redirect('users','index');
	}

	public function multiDelete() {
		if (isset($_POST['checkbox']))  {
			$arrayID = $_POST['checkbox'];
			$this->db->where('id', $arrayID, 'IN');
			$this->db->delete('users');
			$_SESSION['msgMultiDelete'] = 'Delete '.count($arrayID).' User Success!';
		} else {
			$_SESSION['error'] = 'Failed To Delete Users';
		}
		$this->redirect('users','index');
	}
}