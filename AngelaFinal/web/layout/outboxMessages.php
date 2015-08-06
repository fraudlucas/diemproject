<?php 

require_once('../../src/config.php');
// require_once('../../src/Session.php');
require_once (DIR_VIE.'messageView.php');

// $outboxSession = new Session();

$outboxUser = $_SESSION['userID'];

$outboxMessageView = new MessageView();
$outboxList = $outboxMessageView->listByFromUserID($outboxUser);
$outboxTBody = '';

foreach ($outboxList as $msg) {
	$outSendFromUser = $msg->getFromUser()->getFirstName() . " " . $msg->getFromUser()->getLastName();
	$outSendToUser = $msg->getToUser()->getFirstName() . " " . $msg->getToUser()->getLastName();
	$outRole = $msg->getToUser()->getAdministratorID();
	switch ($outRole) {
		case '2':
			$outRole = "Client";
			break;
		default:
			$outRole = "Staff";
			break;
	}
	$outId = $msg->getId();
	$outTopic = $msg->getTopic();
	$outContent = $msg->getContent();
	$outMessageDate = $msg->getMessageDate();
	// $outRead = $msg->getRead();
	// $outReadOp = false;
	$outClass = '';
	// $outGlyphRead = 'circle';

	/*if (!$outRead) {
		$outClass = 'class="active"';
		$outGlyphRead = 'sign';
		$outReadOp = true;
	}*/

	/*<td>
		<a href="../../src/handlers/messageHandler.php?a=read&m='.$outId.'&r='.$outRead.'&p=adminHome">
			<span class="glyphicon glyphicon-ok-'.$outGlyphRead.'"></span>
		</a>
	</td>*/

	$outboxTBody = $outboxTBody . '<tr '.$outClass.'>
			<td><a href="#" id="sendToUser'.$outId.'" data-toggle="modal" data-target="#outboxReadMessageModal" data-value="'.$outId.'">'.$outSendToUser.'</a></td>
			<td><a href="#" id="role'.$outId.'" data-toggle="modal" data-target="#outboxReadMessageModal" data-value="'.$outId.'">'.$outRole.'</a></td>
			<td><a href="#" id="topic'.$outId.'" data-toggle="modal" data-target="#outboxReadMessageModal" data-value="'.$outId.'">'.$outTopic.'</a></td>
			<td><a href="#" id="messageDate'.$outId.'" data-toggle="modal" data-target="#outboxReadMessageModal" data-value="'.$outId.'">'.$outMessageDate.'</a></td>
			<td>&nbsp;</td>
			<input type="hidden"  id="outContent'.$outId.'" value="'.$outContent.'">
			<input type="hidden"  id="sendFromUser'.$outId.'" value="'.$outSendFromUser.'">
		</tr>
		';
}


?>

<table class="table table-hover table-responsive user-list">
	<thead>
		<tr>
		<th><span>To</span></th>
		<th><span>Type</span></th>
		<th><span>Topic</span></th>
		<th><span>Date&Time</span></th>
		<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $outboxTBody; ?>
	</tbody>
</table>


<script>
	$(document).ready(function(){
		$('#outboxReadMessageModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('value')
			
			// var txt = button.text()
			// modal.find('#readSendFrom').val(txt)

			var sfu = $('#sendFromUser'+id).val()
			var stu = $('#sendToUser'+id).text()
			var t = $('#topic'+id).text()
			var md = $('#messageDate'+id).text()
			var c = $('#outContent'+id).val()

			var modal = $(this)
			// modal.find('.modal-title').text('New message to ' + recipient)
			modal.find('#readSendFrom').val(sfu)
			modal.find('#readSendTo').val(stu)
			modal.find('#readTopic').val(t)
			modal.find('#readContent').text(c)
			modal.find('#readMessageDate').text(md)
		})
	});
</script>

<!-- Modal -->
<div id="outboxReadMessageModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Message</h4>
			</div>
			<div class="modal-body">
				<?php include( DIR_LAY.'formReadMessage.php');?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div> 	