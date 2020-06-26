<?php
class GroupController extends Controller{
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->name = $this->_arrParam['controller'];
		Session::init();
	}
  
	public function listAction(){
		$this->_view->_title	 = strtoupper($this->name).' / LIST';
		$totalItems						 = $this->_model->countItem($this->_arrParam);
		$configPagination 		 = array('totalItemsPerPage'	=> 4, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->items			  = $this->_model->listItems($this->_arrParam);
		$this->_view->countStatus = $this->_model->countStatus($this->_arrParam);
		$this->_view->render($this->name.'/list');

	}
	public function formAction(){
		$this->_view->_title	 = strtoupper($this->name).' / ADD';
		if(isset($this->_arrParam['id'])){
			$this->_view->_title	 		= strtoupper($this->name).' / EDIT';
			$this->_arrParam['form']	= $this->_model->infoItem($this->_arrParam);
			if(empty($this->_arrParam['form'])) $this->redirect('admin',$this->name,'list');	
		}
		if(isset($this->_arrParam['submit'])) {
			$this->_arrParam['form']['name']		 = $_POST['form']['name'];
			$this->_arrParam['form']['status'] 	 = $_POST['form']['status'];
			$this->_arrParam['form']['ordering'] = $_POST['form']['ordering'];
			$validate = new Validate($this->_arrParam['form']);
			$validate->addRule('name', 'string', array('min' => 3, 'max' => 255))
					->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
					->addRule('status', 'status', array('deny' => array('default')));
			$validate->run();
			$this->_arrParam['form'] = $validate->getResult();
			if($validate->isValid() == false){
				$this->_view->errors = $validate->getError();
			} else {
				$this->_model->saveItem($this->_arrParam);		
				Session::set('msgSuccess',isset($this->_arrParam['id']) ? 'Edit User Success!' : 'Add User Success!');
				$this->redirect('admin',$this->name,'list');		
			}
		}
		$this->_view->arrParam = $this->_arrParam;
		$this->_view->render($this->name.'/form');
	}
	public function statusAction(){
		$params['id'] = $this->_arrParam['id'];
		$params['status'] = ($this->_arrParam['status'] == 'active') ? 'inactive' : 'active';
		$this->_model->changeStatus($params);
		Session::set('msgSuccess','Change Status Success!');
		$this->redirect('admin',$this->name,'list');
	}

	public function deleteAction() {
		$id = $this->_arrParam['id'];
		$this->_model->deleteItem($id);
		Session::set('msgSuccess','Delete Item Success!');
		$this->redirect('admin',$this->name,'list');
	}
} 