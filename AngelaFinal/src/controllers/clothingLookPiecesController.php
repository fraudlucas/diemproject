<?php 

	require_once DIR_PER.'factoryDAO.php';
	require_once DIR_FAC.'factoryDAOPdo.php';
	require_once DIR_PER.'clothingLookPiecesDAO.php';


class ClothingLookPiecesController {

	private $factory;
	private $persistenceClothes;

	public function __construct() {
		$this->factory = FactoryDAOPdo::getInstance();
		$this->persistenceClothes = $this->factory->createClothingLookPiecePersistence();
	}

	public function add($clothingLookPieces) {
		// $persistencePost = $this->factory->createPostPersistence();
		
		$test = $this->persistenceClothes->add($clothingLookPieces);

		return $test;
	}
	
	public function listAll() {
		// $persistencePost = $this->factory->createPostPersistence();
		
		$clothingLookPiecesList = $this->persistenceClothes->listAll();

		return $clothingLookPieces;
	}

}

 ?>