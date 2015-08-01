<?php 

interface FactoryDAO {
	public function createUserPersistence();
	public function createClothesPersistence();
	public function createManagementPhotosPersistence();
	public function createManagementContentPersistence();
	public function createTagsPersistence();
}

?>