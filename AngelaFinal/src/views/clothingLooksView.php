<?php 
	//require_once('../config.php');
	require_once DIR_MOD.'clothingLooks.php';
	require_once DIR_CON.'clothingLooksController.php';


/**
* 
*/
class clothingTypeView{
	private $clothingLooksController;

	function __construct() {
		$this->clothingLooksController = new ClothingLooksController();
	}

	public function add($clothingLooks) {
		//$postController = new PostController();

		$test = $this->clothingLooksController->add($clothingLooks);

		return $test;
	}
	
	public function listAll() {
		$clothingLooksLists = $this->clothingLooksController->listAll();

		return $clothingLooksLists;
	}
	

}

 ?>