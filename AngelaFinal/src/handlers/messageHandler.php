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

if (!empty($action)) {
	$userView = new UserView();
	$messageView = new MessageView();
	$message = new Message();

    switch ($action) {
		case 'send':

			$fromUserId = 4; // admin2@test.com
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

			header("Location:  ../../web/pages/". $pageToReturn .".php");
			die();

		break;

		case 'read':
			# code...
			break;
	}
}

 ?>