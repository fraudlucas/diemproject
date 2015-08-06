<?php 

	require_once DIR_PER.'factoryDAO.php';
	require_once DIR_FAC.'factoryDAOPdo.php';
	require_once DIR_PER.'clothingDAO.php';


class ClothingLookController {

	private $factory;
	private $persistenceClothes;

	public function __construct() {
		$this->factory = FactoryDAOPdo::getInstance();
		$this->persistenceClothes = $this->factory->createClothingLookPersistence();
	}

	public function add($clothingLooks) {
		// $persistencePost = $this->factory->createPostPersistence();
		
		$test = $this->persistenceClothes->add($clothingLooks);

		return $test;
	}
	
	public function listAll() {
		// $persistencePost = $this->factory->createPostPersistence();
		
		$clothesLooksList = $this->persistenceClothes->listAll();

		return $clothesLooksList;
	}

}

 ?>