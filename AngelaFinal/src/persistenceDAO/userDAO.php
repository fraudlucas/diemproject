<?php 

interface UserDAO {
	public function add($user);
	public function registration($user);
	public function updateUser($user);
	public function listAll();
	public function searchUsers($param,$value,$type);
	public function deleteUser($id);
}

?>