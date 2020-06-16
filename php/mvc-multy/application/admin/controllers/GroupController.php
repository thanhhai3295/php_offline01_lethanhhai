<?php
class GroupController extends Controller{
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function listAction(){
		$this->_view->_title = 'GROUP :: LIST';
		$this->_model->listItems();
		$this->_view->render('index/list');
	}
	public function formAction(){
		$this->_view->render('index/form');
	}
	
	public function addAction(){
		echo '<h3>' . __METHOD__ . '</h3>';
		
		$this->_view->render('index/index');
	}
}