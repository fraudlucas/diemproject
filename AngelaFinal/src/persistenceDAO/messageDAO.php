<?php 

interface MessageDAO {

	public function add($message);

	public function search($param, $value);

	public function read($messageID, $wasRead);

	public function unreadByToUserID($userID);

}
 
 ?>