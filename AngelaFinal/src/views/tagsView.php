<?php 
	//require_once('../config.php');
	require_once DIR_MOD.'tags.php';
	require_once DIR_CON.'tagsController.php';


/**
* 
*/
class TagsView{
	private $tagsController;

	function __construct() {
		$this->tagsController = new TagsController();
	}

	public function add($tags) {
		//$postController = new PostController();

		$test = $this->tagsController->add($tags);

		return $test;
	}
	
	public function listAll() {
		$tagsLists = $this->tagsController->listAll();

		return $tagsLists;
	}

	public function searchTag($tagID) {
		$result = $this->tagsController->searchTag($tagID);

		return $result;
	}
	
	public function removeTag($tagID) {
		$result = $this->tagsController->removeTag($tagID);

		return $result;
	}

}

 ?>