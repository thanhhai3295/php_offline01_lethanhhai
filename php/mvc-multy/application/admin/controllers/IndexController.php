<?php
class IndexController extends Controller{
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	public function dashboardAction(){
		$this->_view->countGroup = $this->_model->countItem(TBL_GROUP);
		$this->_view->render('index/dashboard');
	}
	
}