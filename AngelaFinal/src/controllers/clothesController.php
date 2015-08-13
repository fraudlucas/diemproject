<?php 

	require_once DIR_PER.'factoryDAO.php';
	require_once DIR_FAC.'factoryDAOPdo.php';
	require_once DIR_PER.'clothesDAO.php';


class ClothesController {

	private $factory;
	private $persistenceClothes;

	public function __construct() {
		$this->factory = FactoryDAOPdo::getInstance();
		$this->persistenceClothes = $this->factory->createClothesPersistence();
	}

	public function add($clothes) {
		// $persistencePost = $this->factory->createPostPersistence();
		
		$test = $this->persistenceClothes->add($clothes);

		return $test;
	}
	
	public function listAll() {
		// $persistencePost = $this->factory->createPostPersistence();
		
		$clothesList = $this->persistenceClothes->listAll();

		return $clothesList;
	}
	
	public function searchClothes($param,$value,$type){
		// $persistencePost = $this->factory->createPostPersistence();
		
		$clothesList = $this->persistenceClothes->searchClothes($param,$value,$type);

		return $clothesList;
	}

	public function updateClothes($clothes) {
		$test = $this->persistenceClothes->updateClothes($clothes);

		return $test;
	}

}

 ?>