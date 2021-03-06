<?php
class Controller{
	
	// View Object
	public $_view;
	
	// Model Object
	public $_model;
	
	// Template object
	public $_templateObj;
	
	// Params (GET - POST)
	public $_arrParam;
	
	protected $_pagination	= array(
		'totalItemsPerPage'	=> 3,
		'pageRange'			=> 2,
	);

	
	public function __construct($arrParams){
		
		$this->setModel($arrParams['module'], $arrParams['controller']);
		$this->setTemplate($this);
		$this->setView($arrParams['module']);
		$this->_pagination['currentPage']	= (isset($arrParams['filter_page'])) ? $arrParams['filter_page'] : 1;
		
		$arrParams['pagination'] = $this->_pagination;
		$this->setParams($arrParams);
		$this->setValidate($arrParams);
		$this->_view->arrParam = $arrParams;
		
	}
	
	// SET MODEL
	public function setModel($moduleName, $modelName){
		
		$modelName = ucfirst($modelName) . 'Model';
		$path = APPLICATION_PATH . $moduleName . DS . 'models' .  DS . $modelName . '.php';
		if(file_exists($path)){
			require_once $path;
			$this->_model	= new $modelName();
		}
	}
	
	// GET MODEL
	public function getModel(){
		return $this->_model;
	}
	
	// SET VIEW
	public function setView($moduleName){
		$this->_view = new View($moduleName);
	}
	
	// GET VIEW
	public function getView(){
		return $this->_view;
	}
	
	// SET TEMPLATE
	public function setTemplate(){
		$this->_templateObj = new Template($this);	
	}
	
	// GET TEMPLATE
	public function getTemplate(){
		return $this->_templateObj;
	}
	
	// GET PARAMS
	public function setParams($arrParam){
		$this->_arrParam= $arrParam;
	}
	
	// GET PARAMS
	public function getParams($arrParam){
		$this->_arrParam= $arrParam;
	}
	public function redirect($module='admin',$controller = 'index', $action = 'dashboard'){
		header("location: index.php?module=$module&controller=$controller&action=$action");
		exit();
	}
	public function setValidate($arrParams){
		$validateName = ucfirst($arrParams['controller']) . 'Validate';
		$path = APPLICATION_PATH . $arrParams['module'] . DS . 'validate' .  DS . $validateName . '.php';
		if(file_exists($path)){
			require_once $path;
		}
	}
	public function setPagination($config){
		$this->_pagination['totalItemsPerPage'] = $config['totalItemsPerPage'];
		$this->_pagination['pageRange']			= $config['pageRange'];
		$this->_arrParam['pagination']			= $this->_pagination;
		$this->_view->arrParam							= $this->_arrParam;
	}
	
}