<?php 
	//require_once('src/config.php');
	require_once DIR_MOD.'managementContent.php';
	require_once DIR_CON.'managementContentController.php';


/**
* 
*/
class ManagementContentView{
	
	private $managementContentController;

	function __construct() {
		$this->managementContentController = new ManagementContentController();
	}

	public function searchContent($param,$value,$type) {
		$result = $this->managementContentController->searchContent($param,$value,$type);
		return $result;
	}
	
	public function addContent($management){
		$result = $this->managementContentController->addContent($management);
		return $result;
	}
	
	public function updateContent($management){
		$result = $this->managementContentController->updateContent($management);
		return $result;
	}
	
	public function updateColor($color){
		$result = $this->managementContentController->updateColor($color);
		return $result;
	}
	
	public function searchColor(){
		$result = $this->managementContentController->searchColor();
		return $result;
	}

	public function updateLogo($logo){
		$result = $this->managementContentController->updateLogo($logo);
		return $result;
	}
	
	public function searchLogo(){
		$result = $this->managementContentController->searchLogo();
		return $result;
	}
}

 ?>