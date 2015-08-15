<?php 
require_once('../config.php');
require_once('../Session.php');	
require_once DIR_MOD.'user.php';
require_once DIR_VIE.'userView.php';
require_once DIR_MOD.'message.php';
require_once DIR_VIE.'messageView.php';
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE);

$session = new Session();
$action = isset($_GET['a']) ? $_GET['a'] : '';
$pageToReturn = isset($_GET['p']) ? $_GET['p'] : '';

$param = isset($_GET['param']) ? $_GET['param'] : '';
$param_value = isset($_GET[$param]) ? $_GET[$param] : '';
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

			$message->setFromUser($fromUser);
			$message->setToUser($toUser);
			$message->setTopic($topic);
			$message->setContent($content);


			// // var_dump($message);

			$test = $messageView->send($message);

			// echo $test;

			// $to      = 'marcus_lucas12@outlook.com';
			// $subject = 'the subject';
			// $message = 'hello';
			// $headers = 'From: webmaster@example.com' . "\r\n" .
			//     'Reply-To: webmaster@example.com' . "\r\n" .
			//     'X-Mailer: PHP/' . phpversion();

			// if (!mail($to, $subject, $message, $headers))
			// 	{ echo "Failure"; }

			

		break;

		case 'read':
			
			$messageID = $_GET['m'];
			$wasRead = $_GET['r']; // 1 is read and 0 is not read

			$messageView->read($messageID, $wasRead);

			break;
	}

	if (!empty($pageToReturn)) {
		$header = "Location:  ../../web/pages/". $pageToReturn .".php";

		// var_dump($param);

		if (isset($param)) {
			$header = $header . '?' . $param;
			// var_dump($header);
		}

		header($header);
		die();
	}
}

 ?>