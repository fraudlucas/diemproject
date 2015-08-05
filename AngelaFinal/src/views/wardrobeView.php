<?php 

	require_once DIR_MOD.'wardrobe.php';
	require_once DIR_CON.'wardrobeController.php';


/**
* 
*/
class WardrobeView
{
	
	private $wardrobeController;

	function __construct() {
		$this->wardrobeController = new WardrobeController();
	}

	public function add($wardrobe){
		//$postController = new PostController();
		$test = $this->wardrobeController->add($wardrobe);
		return $test;
	}
	
	public function listAll(){
		$wardrobeList = $this->wardrobeController->listAll();
		return $wardrobeList;
	}
	
	public function searchWardrobe($param,$value,$type){
		$wardrobeList = $this->wardrobeController->searchWardrobe($param,$value,$type);
		return $wardrobeList;
	}
	

}

 ?>