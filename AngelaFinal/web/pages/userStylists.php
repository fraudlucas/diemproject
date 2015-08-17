<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'messageView.php');
	require_once (DIR_VIE.'userView.php');
	$session = new Session();
	$userView = new UserView();
	$user = $userView->searchUsers("id",$_SESSION['userID'],'1');

	$users_type = '3';

	$currentUser = $_SESSION['userID'];

	$messageView = new MessageView();
	$amountUnreadMessages = $messageView->amountUnreadMessagesByToUserID($currentUser);

	$pageToReturn = 'userStylists';

	$flag_button = false;

	$activeTab = isset($_GET['t']) ? $_GET['t'] : 0; // Indicate which tab must be activated
	$activeClass2 = '';
	$activeClass3 = '';
	switch ($activeTab) {
		case 3:
			$activeClass3 = 'active';
			break;
		default:
			$activeClass2 = 'active';
			break;
	}
?>
<html lang="en">
<head>
	<?php include( DIR_LAY.'headPages.php');?>
</head>
<body>
<?php include( DIR_LAY.'modalBook.php');?>
	<div id="wrapper">
		<?php 
		if(isset($_SESSION['role'])){
			if ($_SESSION['role']==1){
				header('Location: ../../index.php') ;
			}elseif($_SESSION['role']==2){
				include( DIR_LAY.'headerUserPages.php') ;
			}
		}else{
			header('Location: ../../index.php') ;
		}
		?>
		<section id="inner-headline">
		<div class="container" style="margin-top:100px">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
						<li><a href="#">User</a><i class="icon-angle-right"></i></li>
						<li class="active">Stylists</li>
					</ul>
				</div>
			</div>
		</div>
		</section>
		<div class="row" style="margin-top:30px">
			<div class="col-xs-3 col-md-2">
				<nav class="navbar-default"  role="navigation">
					<ul class="nav nav-pills nav-stacked">
					  <li>
						<img src="../../<?php echo $user->getPicture(); ?>" class="img-responsive" width="300px" height="400px"> </li>
						<li role="presentation"><a href="../pages/userHome.php">Profile</a></li>
						<li role="presentation"><a href="../pages/userWardrobe.php">Wardrobe</a></li>
						<li role="presentation"><a href="../pages/userCollections.php">Collections</a></li>
						<li role="presentation"><a href="../pages/userLooks.php">Create Looks</a></li>
						<!-- <li role="presentation"><a href="#">My Wish List</a></li> -->
						<li role="presentation" class="active"><a href="../pages/userStylists.php">Stylists</a></li>
						<li role="presentation"><a href="../pages/userMessages.php">Messages <span class="badge"><?php echo $amountUnreadMessages; ?></span></a></li>
					</ul>
				</nav>
			</div>		
			<div class="row">
				<div class="container responsive">
					<div class="col-xs-18 col-md-12">
						<h4>Staff</h4>
						<ul class="nav nav-tabs responsive">
							<li class="<?php echo $activeClass2; ?>"><a href="#list" data-toggle="tab"><i class="icon-briefcase"></i>Staff List</a></li>
							<li class="<?php echo $activeClass3; ?>"><a href="#search" data-toggle="tab">Search</a></li>
						</ul>

						<div class="tab-content responsive" >

							<div class="tab-pane responsive fade in <?php echo $activeClass2; ?>" id="list">
								
								<table class="table user-list">
									<thead>
										<tr>
										<th><span> Full name</span></th>
										<th>&nbsp;</th>
										<th>&nbsp;</th>
										<th><span>Email</span></th>
										<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<?php include( DIR_LAY.'listUsers.php');?>
									</tbody>
								</table>
							</div>
							<div class="tab-pane responsive <?php echo $activeClass3; ?>" id="search">
								<div class="row">
									<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
								</div>
								<table class="table user-list">
									<thead>
										<tr>
										<th><span> Full name</span></th>
										<th><span> Created</span></th>
										<th class="text-center"><span>Status</span></th>
										<th><span>Email</span></th>
										<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody id="srch-tbody">
										<?php include( DIR_LAY.'listUsers.php');?>
									</tbody>
								</table>
							</div>							
						</div>
					</div>
				</div>			
			</div>
		</div>
	</div>

	<input type="hidden" id="fb" value="<?php echo $flag_button; ?>">
	<input type="hidden" id="ptr" value="<?php echo $pageToReturn; ?>">
	<input type="hidden" id="ut" value="<?php echo $users_type; ?>">

	<script>
	$(document).ready(function() {
		$('#srch-term').keyup(function(event) {
			/* Act on the event */
			var input = $('#srch-term')
			var info = input.val()
			var ptr = $('#ptr').val()
			var fb = $('#fb').val()
			var ut = $('#ut').val()

			$.get('../layout/usersSearchFeature.php', {i: info, f: fb, p: ptr, t: ut}, function(data) {
				/*optional stuff to do after success */
				$('#srch-tbody').html(data)
			})
		})
	});
	</script>

	<!-- Modal -->
	<div id="sendMessageModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<?php include( DIR_LAY.'formSendMessage.php');?>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div> 

	<script>
		$(document).ready(function() {
			$('#modalUserView').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var value = button.data('value')

				$.get('../layout/adminContentUserView.php', {a: value}, function(data) {
					$('#modalBodyUserView').html(data)
				})
			})
		});
	</script>

	<!-- Modal -->
	<div id="modalUserView" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Staff Profile</h4>
				</div>
				<div id="modalBodyUserView" class="modal-body">
										
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
</body>
</html>
 