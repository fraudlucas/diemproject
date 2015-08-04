<?php 

require_once('../../src/config.php');
require_once (DIR_VIE.'messageView.php');
require_once (DIR_VIE.'userView.php');


/*$messageView = new MessageView();
$messagesList = $messageView->listByFromUser();*/
$userView = new UserView();
$list = $userView->searchUsers('administratorID','2','2');

$options = "";
foreach ($list as $key) {
	# code...
	$options = $options . '<option value="'.$key->getIdUser().'">'.$key->getFirstName().' '.$key->getLastName().'</option>';
}

 ?>



<form action="../../src/handlers/messageHandler.php?a=send&p=adminClients	" method="post">

	<!-- <label id="lb_toUser" for="to">Email to:</label>
	<input type="text" id="to" maxlength="50" name="to" class="to"> -->
	<label for="toUser">Send to</label>
	<select id="toUser" name="to">
		<?php echo $options; ?>
	</select> <br>
	
	<label id="lb_topic" for="topic">Topic</label>
	<input type="text" id="topic" maxlength="50" name="topic"> <br>

	<label id="lb_topic" for="content">Message</label> <br>
	<textarea name="content"></textarea>

	<input type="submit" name="send" value="Send">

</form>
