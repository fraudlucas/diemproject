<?php 
	//require_once('../config.php');
	require_once DIR_MOD.'clothingLookPieces.php';
	require_once DIR_CON.'clothingLookPiecesController.php';


/**
* 
*/
class clothingTypeView{
	private $clothingLookPiecesController;

	function __construct() {
		$this->clothingLookPiecesController = new ClothingLookPiecesController();
	}

	public function add($clothingLooks) {
		//$postController = new PostController();

		$test = $this->clothingLookPiecessController->add($clothingLookPieces);

		return $test;
	}
	
	public function listAll() {
		$clothingLooksLists = $this->clothingLookPiecesController->listAll();

		return $clothingLooksLists;
	}
	

}

 ?>