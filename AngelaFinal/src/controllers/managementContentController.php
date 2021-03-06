<?php 
	//require_once('../config.php');
	require_once DIR_SRC.'htmLawed.php';	
	require_once DIR_PER.'factoryDAO.php';
	require_once DIR_FAC.'factoryDAOPdo.php';
	require_once DIR_PER.'managementContentDAO.php';

class ManagementContentController {

	private $factory;
	private $persistenceManagement;

	public function __construct() {
		$this->factory = FactoryDAOPdo::getInstance();
		$this->persistenceManagement = $this->factory->createManagementContentPersistence();
	}
	
	public function addContent($management){
		$result = $this->persistenceManagement->addContent($management);
		return $result;
	}
	
	public function updateContent($management){
		$result = $this->persistenceManagement->updateContent($management);
		return $result;
	}
	
	
	
	public function searchContent($param,$value,$type){
		$result = $this->persistenceManagement->searchContent($param,$value,$type);
		return $result;
	}

	public function updateColor($color){
		$result = $this->persistenceManagement->updateColor($color);
		return $result;
	}
	
	public function searchColor(){
		$result = $this->persistenceManagement->searchColor();
		return $result;
	}

	public function updateLogo($logo){
		$result = $this->persistenceManagement->updateLogo($logo);
		return $result;
	}
	
	public function searchLogo(){
		$result = $this->persistenceManagement->searchLogo();
		return $result;
	}

	public function updateEmail($email, $emailID) {
		$result = $this->persistenceManagement->updateEmail($email, $emailID);
		return $result;
	}

	public function searchEmail($emailID) {
		$result = $this->persistenceManagement->searchEmail($emailID);
		return $result;
	}
	
}

 ?>