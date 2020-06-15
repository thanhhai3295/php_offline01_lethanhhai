<?php
class IndexController extends Controller{
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	public function indexAction(){
		$this->_view->render('index/index');
	}
	
	public function addAction(){
		echo '<h3>' . __METHOD__ . '</h3>';
		
		$this->_view->render('index/index');
	}
}