<?php 
	//require_once('../config.php');
	require_once DIR_PER.'factoryDAO.php';
	require_once DIR_FAC.'factoryDAOPdo.php';
	require_once DIR_PER.'userDAO.php';


class UserController {

	private $factory;
	private $persistenceUser;

	public function __construct() {
		$this->factory = FactoryDAOPdo::getInstance();
		$this->persistenceUser = $this->factory->createUserPersistence();
	}

	public function add($user) {	
		$test = $this->persistenceUser->add($user);
		return $test;
	}
	
	public function registration($user) {
		$result = $this->persistenceUser->registration($user);
		return $result;
	}
	
	public function updateUser($user) {
		$result = $this->persistenceUser->updateUser($user);
		return $result;
	}
	
	
	public function listAll() {
		$usersList = $this->persistenceUser->listAll();
		return $usersList;
	}
	
	public function searchUsers($param,$value,$type) {	
		$usersList = $this->persistenceUser->searchUsers($param,$value,$type);
		return $usersList;
	}
	
	public function deleteUser($id) {
		$deleteUser = $this->persistenceUser->deleteUser($id);
		return $deleteUser;
	}

	public function activateUser($id) {
		$activateUser = $this->persistenceUser->activateUser($id);
		return $activateUser;
	}
	
	public function recoveryPassword($user){
		$result  = $this->persistenceUser->recoveryPassword($user);
		return $result;
	}

	//SELECT * FROM `users` WHERE firstName OR lastName OR email LIKE '%ago%'
	public function searching($info) {
		$param = 'firstName OR lastName OR email';
		$value = '%'.$info.'%';
		$type = '2';
		$usersList = $this->searchUsers($param,$value,$type);
		return $usersList;
	}

}

 ?>