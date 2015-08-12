<?php 
	//require_once('../config.php');
	require_once DIR_MOD.'user.php';
	require_once DIR_CON.'userController.php';


/**
* 
*/
class UserView
{
	
	private $userController;

	function __construct() {
		$this->userController = new UserController();
	}

	public function registration($user) {
		// $postController = new PostController();
		$result = $this->userController->registration($user);
		return $result;
	}
	
	public function updateUser($user) {
		// $postController = new PostController();
		$test = $this->userController->updateUser($user);
		return $test;
	}
	
	public function user($user) {
		// $postController = new PostController();
		$test = $this->userController->add($user);
		return $test;
	}

	public function listUsers() {
		$usersLists = $this->userController->listAll();
		return $usersLists;
	}
	
	public function searchUsers($param,$value,$type) {
		$usersLists = $this->userController->searchUsers($param,$value,$type);
		return $usersLists;
	}
	
	public function deleteUser($id) {
		$deleteUser = $this->userController->deleteUser($id);
		return $deleteUser;
	}

	public function undeleteUser($id) {
		$activateUser = $this->userController->activateUser($id);
		return $activateUser;
	}	
	public function recoveryPassword($user){
		$result = $this->userController->recoveryPassword($user);
		return $result;
	}
}

 ?>