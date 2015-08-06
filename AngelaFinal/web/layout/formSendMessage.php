<?php 

require_once('../../src/config.php');
require_once (DIR_VIE.'messageView.php');
require_once (DIR_VIE.'userView.php');


/*$messageView = new MessageView();
$messagesList = $messageView->listByFromUser();*/
$userView = new UserView();

$list = $userView->searchUsers('administratorID', '2','2');

$options = "";
foreach ($list as $key) {
	# code...
	$options = $options . '<option value="'.$key->getIdUser().'">'.$key->getFirstName().' '.$key->getLastName().'</option>';
}


?>

<script>
 	$(document).ready(function(){
 		$('#sendMessageModal').on('show.bs.modal', function (event) {
 			var button = $(event.relatedTarget) // Button that triggered the modal
 			var recipient = button.data('value') // Extract info from data-* attributes
 			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
 			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
 			var modal = $(this)
 			// modal.find('.modal-title').text('New message to ' + recipient)
 			modal.find('#toUser').val(recipient)
 		})

 	});
</script>



<form action="../../src/handlers/messageHandler.php?a=send&p=adminClients" method="post" class="form-horizontal">

	<!-- <label id="lb_toUser" for="to">Email to:</label>
	<input type="text" id="to" maxlength="50" name="to" class="to"> -->
	<label for="toUser">Send to</label>
	<select id="toUser" name="to" class="form-control">
		<?php echo $options; ?>
	</select> <br>
	
	<label id="lb_topic" for="topic">Topic</label>
	<input type="text" id="topic" maxlength="50" name="topic" class="form-control" placeholder="Topic"> <br>

	<label id="lb_topic" for="content">Message</label> <br>
	<textarea name="content" class="form-control" rows="4" maxlength="250"></textarea> <br>

	<input type="submit" name="send" value="Send" class="btn btn-info pull-right">

</form>
