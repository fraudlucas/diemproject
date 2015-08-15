<?php 

require_once('../../src/config.php');
require_once (DIR_VIE.'messageView.php');


$inboxUser = $_SESSION['userID'];

$inboxMessageView = new MessageView();
$inboxList = $inboxMessageView->listByToUserID($inboxUser);
$inboxTBody = '';

$inboxCount = 0;

foreach ($inboxList as $msg) {
	$inSendFromUser = $msg->getFromUser()->getFirstName() . " " . $msg->getFromUser()->getLastName();
	$inSendToUser = $msg->getToUser()->getFirstName() . " " . $msg->getToUser()->getLastName();
	$inRole = $msg->getFromUser()->getAdministratorID();
	switch ($inRole) {
		case '2':
			$inRole = "Client";
			break;
		default:
			$inRole = "Staff";
			break;
	}
	$inId = $msg->getId();
	$inTopic = $msg->getTopic();
	$inContent = $msg->getContent();
	$inMessageDate = $msg->getMessageDate();
	$inRead = $msg->getRead();
	$inReadOp = false;
	$inClass = '';
	$inGlyphRead = 'circle';
	$inTitle = 'Mark as unread';

	if (!$inRead) {
		$inClass = 'class="active"';
		$inGlyphRead = 'sign';
		$inTitle = 'Mark as read';
		$inReadOp = true;
	}

	$inboxTBody = $inboxTBody . '<tr id="inTr'.$inId.'" '.$inClass.'>
			<td><a href="#" id="sendFromUser'.$inId.'" data-toggle="modal" data-target="#inboxReadMessageModal" data-value="'.$inId.'">'.$inSendFromUser.'</a></td>
			<td><a href="#" id="role'.$inId.'" data-toggle="modal" data-target="#inboxReadMessageModal" data-value="'.$inId.'">'.$inRole.'</a></td>
			<td><a href="#" id="topic'.$inId.'" data-toggle="modal" data-target="#inboxReadMessageModal" data-value="'.$inId.'">'.$inTopic.'</a></td>
			<td><a href="#" id="messageDate'.$inId.'" data-toggle="modal" data-target="#inboxReadMessageModal" data-value="'.$inId.'">'.$inMessageDate.'</a></td>
			<td>
				<a title="'.$inTitle.'" id="inGlyph'.$inId.'" href="../../src/handlers/messageHandler.php?a=read&m='.$inId.'&r='.$inRead.'&p='.$pageToReturn.'&param=t&t=2">
					<span class="glyphicon glyphicon-ok-'.$inGlyphRead.'"></span>
				</a>
			</td>
			<input type="hidden"  id="inContent'.$inId.'" value="'.$inContent.'">
			<input type="hidden"  id="sendToUser'.$inId.'" value="'.$inSendToUser.'">
		</tr>
		';

	$inboxCount++;
	if ($limitMessages && $inboxCount == $amountToShow) break;
}

if ($limitMessages && $inboxCount == $amountToShow) {
	$inboxTBody = $inboxTBody . '<tr>
			<td></td>
			<td></td>
			<td><a href="'.$pageTargetMoreMessages.''.$inboxParamTargetMoreMessages.'" class="btn btn-default">More Messages</a></td>
			<td></td>
			<td></td>
		</tr>
		';
}

?>

<table class="table table-hover table-responsive user-list">
	<thead>
		<tr>
		<th><span>From</span></th>
		<th><span>Type</span></th>
		<th><span>Topic</span></th>
		<th><span>Date&Time</span></th>
		<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $inboxTBody; ?>
		<input type="hidden" id="pageToReload" value="<?php echo $pageToReturn; ?>.php?t=2">

	</tbody>
</table>


<script>
	$(document).ready(function(){
		$('#inboxReadMessageModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('value')
			
			// var txt = button.text()
			// modal.find('#readSendFrom').val(txt)

			var sfu = $('#sendFromUser'+id).text()
			var stu = $('#sendToUser'+id).val()
			var t = $('#topic'+id).text()
			var md = $('#messageDate'+id).text()
			var c = $('#inContent'+id).val()

			var modal = $(this)
			// modal.find('.modal-title').text('New message to ' + recipient)
			modal.find('#readSendFrom').val(sfu)
			modal.find('#readSendTo').val(stu)
			modal.find('#readTopic').val(t)
			modal.find('#readContent').text(c)
			modal.find('#readMessageDate').text(md)

			// $.get("../../src/handlers/messageHandler.php?a=read&m="+id+"r=0")
			// .get( "../../src/handlers/messageHandler.php", { m: id, r: 0 })
			// .done(function() {
			$.ajax({
				type: 'GET',
				url: '../../src/handlers/messageHandler.php',
				data: 'a=read&m=' + id + "&r=0",
				success: function(msg){
					$('#inGlyph'+id).html('<span class="glyphicon glyphicon-ok-circle"></span>')
					$('#inTr'+id).attr('class','')
				}
			})
			// })
		})
		
		$('#inboxReadMessageModal').on('hidden.bs.modal', function (event) {
			// location.reload()
			var redirecTo = $('#pageToReload').val();
			window.location.replace(redirecTo);
		})
	});
</script>

<!-- Modal -->
<div id="inboxReadMessageModal" class="modal fade" role="dialog">
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
