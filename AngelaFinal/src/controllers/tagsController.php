<?php 

	require_once DIR_PER.'factoryDAO.php';
	require_once DIR_FAC.'factoryDAOPdo.php';
	require_once DIR_PER.'tagsDAO.php';


class TagsController {

	private $factory;
	private $persistenceTag;

	public function __construct() {
		$this->factory = FactoryDAOPdo::getInstance();
		$this->persistenceTag = $this->factory->createTagsPersistence();
	}

	public function add($tags) {
		// $persistencePost = $this->factory->createPostPersistence();
		
		$test = $this->persistenceTag->add($tags);

		return $test;
	}
	
	public function listAll() {
		// $persistencePost = $this->factory->createPostPersistence();
		
		$clothesList = $this->persistenceTag->listAll();

		return $clothesList;
	}

	public function searchTag($tagID) {
		$result = $this->persistenceTag->searchTag($tagID);

		return $result;
	}

}

 ?>