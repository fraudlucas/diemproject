<?php 

	require_once DIR_PER.'factoryDAO.php';
	require_once DIR_FAC.'factoryDAOPdo.php';
	require_once DIR_PER.'wardrobeDAO.php';


class WardrobeController {

	private $factory;
	private $persistenceWardrobe;

	public function __construct() {
		$this->factory = FactoryDAOPdo::getInstance();
		$this->persistenceWardrobe = $this->factory->createWardrobePersistence();
	}

	public function add($wardrobe) {
		// $persistencePost = $this->factory->createPostPersistence();		
		$test = $this->persistenceWardrobe->add($wardrobe);
		return $test;
	}
	
	public function listAll() {
		// $persistencePost = $this->factory->createPostPersistence();		
		$wardrobeList = $this->persistenceWardrobe->listAll();
		return $wardrobeList;
	}
	
	public function searchWardrobe($param,$value,$type) {
		// $persistencePost = $this->factory->createPostPersistence();		
		$wardrobeList = $this->persistenceWardrobe->searchWardrobe($param,$value,$type);
		return $wardrobeList;
	}

	public function checkClothesInWardrobe($clothesId,$userId) {
		// $persistencePost = $this->factory->createPostPersistence();
		$param = 'userId = ' . $userId . ' AND clothesId';
		$wardrobeList = $this->persistenceWardrobe->searchWardrobe($param,$clothesId,'1');
		if (empty($wardrobeList)) {
			return false;
		}
		return true;
	}

}

 ?>