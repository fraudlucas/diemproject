<?php 

require_once DIR_PER.'messageDAO.php';
require_once DIR_MOD.'message.php';
require_once DIR_MOD.'user.php';
require_once DIR_PDO.'connectionDAOPdo.php';
require_once DIR_PDO.'userDAOPdo.php';

/**
* 
*/
class MessageDAOPdo implements MessageDAO {

	public function add($message) {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();

		$stmt = $con->prepare("INSERT INTO messages (fromUserID, toUserID, topic, content)"
			. " VALUES (:fromUserID, :toUserID, :topic, :content)");
		
		$stmt->bindParam(':fromUserID', $message->getFromUser()->getIdUser());
		$stmt->bindParam(':toUserID', $message->getToUser()->getIdUser());
		$stmt->bindParam(':topic', $message->getTopic());
		$stmt->bindParam(':content', $message->getContent());

		$test = $stmt->execute();

		return 'Sucesso - ' . $test;
	}

	public function search($param, $value) {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();
		$query = 'SELECT * FROM messages WHERE '.$param.' = :value ORDER BY messageDate DESC';
		$stmt = $con->prepare($query);
		$stmt->bindParam(':value', $value);
		$stmt->execute();
		$results = $stmt->fetchAll();

		$userDAOPdo = new UserDAOPdo();

		$messagesList = new ArrayObject();

		foreach ($results as $row) {

			$message = new Message();
				
			$message->setId($row['id']);
			$message->setTopic($row['topic']);
			$message->setContent($row['content']);
			$message->setMessageDate($row['messageDate']);
			$message->setRead($row['read']);

			$fromUser = $userDAOPdo->searchUsers('id', $row['fromUserID'], 1);
			$toUser = $userDAOPdo->searchUsers('id', $row['toUserID'], 1);

			$message->setFromUser($fromUser);
			$message->setToUser($toUser);

			$messagesList->append($message);
		}

		return $messagesList;

	}

	public function read($messageID, $wasRead){
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();
		// $bool = $wasRead ? 'FALSE' : 'TRUE';
		$bool = $wasRead ? 0 : 1;
		// $sql = 'UPDATE messages SET read = FALSE WHERE id = :id';
		$sql = 'UPDATE messages SET read = FALSE WHERE id = '.$messageID;
		$sql = "UPDATE `messages` SET `read` = '0' WHERE `messages`.`id` = ".$messageID;

		if ($bool) {
			// $sql = 'UPDATE messages SET read = TRUE WHERE id = '.$messageID;
			$sql = "UPDATE `messages` SET `read` = '1' WHERE `messages`.`id` = ".$messageID;
		}

		$stmt = $con->prepare($sql);
		// $stmt->bindParam(':bool', $bool, PDO::PARAM_BOOL);
		// $stmt->bindParam(':id', $messageID);
		$res = $stmt->execute();
		
		if($res == false){
			return false;
		}else{
			return true;
		}
	}

	public function unreadByToUserID($userID) {
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();
		$query = 'SELECT COUNT(*) AS unread FROM messages WHERE toUserID = :userID AND messages.read = 0';
		$stmt = $con->prepare($query);
		$stmt->bindParam(':userID', $userID);
		$stmt->execute();

		$row = $stmt->fetch();

		return $row['unread'];
	}

}

 ?>