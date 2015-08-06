<?php 
require_once('../config.php');
require_once('../Session.php');	
require_once DIR_MOD.'user.php';
require_once DIR_VIE.'userView.php';
require_once DIR_MOD.'message.php';
require_once DIR_VIE.'messageView.php';

$session = new Session();
$action = $_GET['a'];
$pageToReturn = $_GET['p'];

$param = $_GET['param'];
$param_value = $_GET[$param];
$param = $param . '=' . $param_value;


if (!empty($action)) {
	$userView = new UserView();
	$messageView = new MessageView();
	$message = new Message();

    switch ($action) {
		case 'send':

			$fromUserId = $_SESSION['userID']; // getting the fromUserID from the Session.
			$toUserId = $_POST['to'];
			$topic = $_POST['topic'];
			$content = $_POST['content'];

			$fromUser = $userView->searchUsers('id',$fromUserId,'1');
			$toUser = $userView->searchUsers('id',$toUserId,'1');

			$message->setToUser($fromUser);
			$message->setFromUser($toUser);
			$message->setTopic($topic);
			$message->setContent($content);


			var_dump($message);

			$test = $messageView->send($message);

			echo $test;

		break;

		case 'read':
			
			$messageID = $_GET['m'];
			$wasRead = $_GET['r']; // 1 is read and 0 is not read

			$messageView->read($messageID, $wasRead);

			break;
	}

	if (!empty($pageToReturn)) {
		$header = "Location:  ../../web/pages/". $pageToReturn .".php";

		var_dump($param);

		if (isset($param)) {
			$header = $header . '?' . $param;
			var_dump($header);
		}

		header($header);
		die();
	}
}

 ?>