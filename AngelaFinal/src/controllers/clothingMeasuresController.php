<?php 

	require_once DIR_PER.'factoryDAO.php';
	require_once DIR_FAC.'factoryDAOPdo.php';
	require_once DIR_PER.'clothingMeasuresDAO.php';


class ClothingMeasures {

	private $factory;
	private $persistenceClothes;

	public function __construct() {
		$this->factory = FactoryDAOPdo::getInstance();
		$this->persistenceClothes = $this->factory->createClothingLookPiecePersistence();
	}

	public function add($clothingMeasures) {
		// $persistencePost = $this->factory->createPostPersistence();
		
		$test = $this->persistenceClothes->add($clothingMeasures);

		return $test;
	}
	
	public function listAll() {
		// $persistencePost = $this->factory->createPostPersistence();
		
		$clothingMeasures = $this->persistenceClothes->listAll();

		return $clothingMeasures;
	}

}

 ?>