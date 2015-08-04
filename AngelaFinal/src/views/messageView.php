<?php 

require_once DIR_MOD.'message.php';
require_once DIR_MOD.'user.php';
require_once DIR_CON.'messageController.php';

/**
* 
*/
class MessageView
{
	
	private $messageController;

	function __construct() {
		$this->messageController = new messageController();
	}

	public function send($message) {
		$test = $this->messageController->add($message);
		return $test;
	}

	public function listByFromUserID($userID) {
		$result = $this->messageController->searchByFromUser($userID);
		return $result;
	}
}

 ?>