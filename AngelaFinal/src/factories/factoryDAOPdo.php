<?php 
	//require_once('../config.php');
	require_once DIR_PER.'factoryDAO.php';
	require_once DIR_PDO.'userDAOPdo.php';
	require_once DIR_PDO.'managementPhotosDAOPdo.php';
	require_once DIR_PDO.'managementContentDAOPdo.php';
	require_once DIR_PDO.'clothesDAOPdo.php';
	require_once DIR_PDO.'tagsDAOPdo.php';
	require_once DIR_PDO.'messageDAOPdo.php';
	
class FactoryDAOPdo implements FactoryDAO {
	
	private static $instance = null;

	public static function getInstance() { 
		if (self::$instance == null) {
			self::$instance = new FactoryDAOPdo();
		}

		return self::$instance;
	}

	
	public function createUserPersistence() {
		return new UserDAOPdo();
	}
	
	public function createClothesPersistence() {
		return new ClothesDAOPdo();
	}
	
	public function createTagsPersistence() {
		return new TagsDAOPdo();
	}
	
	public function createManagementPhotosPersistence() {
		return new ManagementPhotosDAOPdo();
	}
	
	public function createManagementContentPersistence() {
		return new ManagementContentDAOPdo();
	}

	public function createMessagePersistence() {
		return new MessageDAOPdo();
	}


}

?>