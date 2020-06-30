<?php 
  class AdminController extends Controller {
    public function __construct($arrParams){
      parent::__construct($arrParams);
      $this->_templateObj->setFolderTemplate('admin/adminlte/');
      $this->_templateObj->setFileTemplate('index.php');
      $this->_templateObj->setFileConfig('template.ini');
      $this->_templateObj->load();
      $this->nameController = $this->_arrParam['controller'];
      Session::init();
    }
  }
?>