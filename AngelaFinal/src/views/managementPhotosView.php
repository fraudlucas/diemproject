<?php 
	//require_once('src/config.php');
	require_once DIR_MOD.'managementPhotos.php';
	require_once DIR_CON.'managementPhotosController.php';


/**
* 
*/
class ManagementPhotosView{
	
	private $managementPhotosController;

	function __construct() {
		$this->managementPhotosController = new ManagementPhotosController();
	}

	public function searchPhotos($param,$value,$type) {
		$result = $this->managementPhotosController->searchPhotos($param,$value,$type);
		return $result;
	}
	
	public function addPhotos($management){
		$result = $this->managementPhotosController->addPhotos($management);
		return $result;
	}
	
	public function updatePhotos($management){
		$result = $this->managementPhotosController->updatePhotos($management);
		return $result;
	}
	
	public function deletePhotos($id){
		$result = $this->managementPhotosController->deletePhotos($id);
		return $result;
	}
	
	public function desactivePhotos($id){
		$result = $this->managementPhotosController->desactivePhotos($id);
		return $result;
	}
	
	public function activePhotos($id){
		$result = $this->managementPhotosController->activePhotos($id);
		return $result;
	}
	
	public function resize($path){
		$result = $this->managementPhotosController->resize($path);
		return $result;
	}

}

 ?>