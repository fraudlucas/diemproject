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

	$pageToReturn = 'staffStylists';

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
			if ($_SESSION['role']==3){
				include( DIR_LAY.'headerStaffPages.php') ;
			}else{
				header('Location: ../../index.php') ;
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
						<li><a href="#">Staff</a><i class="icon-angle-right"></i></li>
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
						<li role="presentation"><a href="../pages/staffHome.php">Profile</a></li>
						<li role="presentation"><a href="../pages/staffWardrobe.php">Wardrobe</a></li>
						<li role="presentation"><a href="../pages/staffCollections.php">Collections</a></li>
						<li role="presentation"><a href="../pages/staffLooks.php">Create Looks</a></li>
						<!-- <li role="presentation"><a href="#">My Wish List</a></li> -->
						<li role="presentation" class="active"><a href="../pages/staffStylists.php">Stylists</a></li>
						<li role="presentation"><a href="../pages/staffMessages.php">Messages <span class="badge"><?php echo $amountUnreadMessages; ?></span></a></li>
					</ul>
				</nav>
			</div>		
			<div class="row">
				<div class="container">
					<div class="col-xs-18 col-md-12">
						<h4>Staff</h4>
						<ul class="nav nav-tabs">
							<li class="<?php echo $activeClass2; ?>"><a href="#list" data-toggle="tab"><i class="icon-briefcase"></i>Staff List</a></li>
							<li class="<?php echo $activeClass3; ?>"><a href="#search" data-toggle="tab">Search</a></li>
						</ul>

						<div class="tab-content" >

							<div class="tab-pane fade in <?php echo $activeClass2; ?>" id="list">
								
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
							<div class="tab-pane <?php echo $activeClass3; ?>" id="search">
								
							</div>							
						</div>
					</div>
				</div>			
			</div>
		</div>
	</div>

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
 