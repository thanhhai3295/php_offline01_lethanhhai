<?php
class GroupController extends Controller{
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		Session::init();
	}

	public function listAction(){
		$params['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		if(isset($_GET['search'])) $params['search'] = $_GET['search'];
		if(isset($_GET['filter'])) $params['filter'] = (int)$_GET['filter'];
		$this->_view->items		 = $this->_model->listItems($params);
		$this->_view->totalPage = $this->_model->totalPages;
		$this->_view->_title	 = 'GROUP / LIST';
		$this->_view->render('index/list');

	}
	public function formAction(){
		
		$this->_view->_title	 = 'GROUP / ADD';
		if(isset($_GET['id'])) { 
			$this->_view->_title	 = 'GROUP / EDIT';
			$this->_view->id = $_GET['id'];
			$item = $this->_model->getItem($this->_view->id);
			if(empty($item)) $this->redirect('admin','group','list');		
			$this->_view->name 		= $item[0]['name'];
			$this->_view->status 	= $item[0]['status'];
			$this->_view->ordering = $item[0]['ordering'];
		}
		if(isset($_POST['submit'])) {
			// $val = new validate();
			// $val->name('name')->value($_POST['name'])->required();
			// $val->name('ordering')->value($_POST['ordering'])->required();
			$this->_view->name			= $_POST['name'];
			$this->_view->status 		= $_POST['status'];
			$this->_view->ordering	= $_POST['ordering'];
			$this->_view->created		= date_create('now')->format('Y-m-d');
			// if($val->isSuccess()){
		
				
			$this->_model->processItem((array)$this->_view);		
			Session::set('msgProcess',isset($_GET['id']) ? 'Edit User Success!' : 'Add User Success!');
			$this->redirect('admin','group','list');		
			// } else {
			// 	$this->view->error = $val->getErrors();
			// }
		}
		$this->_view->render('index/form');
	}
	public function statusAction(){
		if(isset($_GET['id'])) $params['id'] = $_GET['id'];
		if(isset($_GET['status'])) $params['status'] = ((int)$_GET['status'] == 0) ? 1 : 0;
		$this->_model->changeStatus($params);
		Session::set('msg','Change Status Success!');
		$this->redirect('admin','group','list');
	}
}