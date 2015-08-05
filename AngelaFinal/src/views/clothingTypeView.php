<?php 
	//require_once('../config.php');
	require_once DIR_MOD.'clothingType.php';
	require_once DIR_CON.'clothingTypeController.php';


/**
* 
*/
class clothingTypeView{
	private $clothingTypeController;

	function __construct() {
		$this->clothingTypeController = new ClothingTypeController();
	}

	public function add($clothingType) {
		//$postController = new PostController();

		$test = $this->clothingTypeController->add($clothingType);

		return $test;
	}
	
	public function listAll() {
		$clothingTypeLists = $this->clothingTypeController->listAll();

		return $clothingTypeLists;
	}
	

}

 ?>