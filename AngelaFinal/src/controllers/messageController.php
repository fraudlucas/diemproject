<?php 

require_once DIR_FAC.'factoryDAOPdo.php';
require_once DIR_PER.'messageDAO.php';
require_once DIR_MOD.'message.php';

/**
* 
*/
class MessageController
{
	private $factory;
	private $persistenceMessage;
			
	function __construct()
	{
		$this->factory = FactoryDAOPdo::getInstance();
		$this->persistenceMessage = $this->factory->createMessagePersistence();	
	}

	public function add($message) {
		$test = $this->persistenceMessage->add($message);
		return $test;
	}

	public function searchByFromUser($fromUserID) {
		$result = $this->persistenceMessage->search('fromUserID', $fromUserID);
		return $result;
	}

	public function searchByToUser($toUserID) {
		$result = $this->persistenceMessage->search('toUserID', $toUserID);
		return $result;
	}

	public function searchByID($id) {
		$result = $this->persistenceMessage->search('id', $id)[0];
		return $result;
	}

	public function read($id, $wasRead) {
		$result = $this->persistenceMessage->read($id, $wasRead);
		return $result;
	}
}

 ?>