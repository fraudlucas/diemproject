<?php 
	//require_once('../config.php');
	require_once DIR_MOD.'clothingLookPieces.php';
	require_once DIR_CON.'clothingLookPiecesController.php';


/**
* 
*/
class ClothingLookPiecesView{
	private $clothingLookPiecesController;

	function __construct() {
		$this->clothingLookPiecesController = new ClothingLookPiecesController();
	}

	public function add($clothingLooks) {
		//$postController = new PostController();

		$test = $this->clothingLookPiecesController->add($clothingLooks);

		return $test;
	}
	
	public function listAll() {
		$clothingLooksLists = $this->clothingLookPiecesController->listAll();

		return $clothingLooksLists;
	}
	
	public function search($param,$value,$type) {
		$clothingLooksLists = $this->clothingLookPiecesController->search($param,$value,$type);

		return $clothingLooksLists;
	}
}

 ?>