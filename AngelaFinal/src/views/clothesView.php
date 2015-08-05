<?php 

	require_once DIR_MOD.'clothes.php';
	require_once DIR_CON.'clothesController.php';


/**
* 
*/
class ClothesView
{
	
	private $clothesController;

	function __construct() {
		$this->clothesController = new ClothesController();
	}

	public function add($clothes) {
		//$postController = new PostController();

		$test = $this->clothesController->add($clothes);

		return $test;
	}
	
	public function listAll() {
		$clothesLists = $this->clothesController->listAll();

		return $clothesLists;
	}
	
	public function searchClothes($param,$value,$type) {
		$clothesLists = $this->clothesController->searchClothes($param,$value,$type);

		return $clothesLists;
	}
	

}

 ?>