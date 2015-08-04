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
		$query = 'SELECT * FROM messages Where '.$param.' = :value';
		$stmt = $con->prepare($query);
		$stmt->bindParam(':value', $value);
		$stmt->execute();
		$results = $stmt->fetchAll();

		$userDAOPdo = new UserDAOPdo();

		if (is_array($results)) {
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

		} else {
			$message->setId($row['id']);
			$message->setTopic($row['topic']);
			$message->setContent($row['content']);
			$message->setMessageDate($row['messageDate']);
			$message->setRead($row['read']);

			$fromUser = $userDAOPdo->searchUsers('id', $row['fromUserID'], 1);
			$toUser = $userDAOPdo->searchUsers('id', $row['toUserID'], 1);

			$message->setFromUser($fromUser);
			$message->setToUser($toUser);

			return $message;
		}
	}

	public function read($messageID, $wasRead){
		$className = 'ConnectionDAOPdo';
		$con = $className::getConnection();
		$stmt = $con->prepare("UPDATE messages SET read = ". $wasRead ." WHERE id = :id");
		$stmt->bindParam(':id', $messageId);
		$res = $stmt->execute();
		
		if($res == false){
			return false;
		}else{
			return true;
		}
	}

}

 ?>