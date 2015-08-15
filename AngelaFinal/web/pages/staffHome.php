<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'messageView.php');
	require_once (DIR_VIE.'userView.php');
	$session = new Session();
	$userView = new UserView();
	$user = $userView->searchUsers("id",$_SESSION['userID'],'1');

	/*
	 * This block of code is important for the message feature to work. 
	*/
	$pageTargetMoreMessages = 'staffMessages.php';
	$inboxParamTargetMoreMessages = '?t=2';
	$outboxParamTargetMoreMessages = '?t=3';

	$currentUser = $_SESSION['userID'];

	$limitMessages = true;
	$amountToShow = 10;

	$messageView = new MessageView();
	$amountUnreadMessages = $messageView->amountUnreadMessagesByToUserID($currentUser);

	$pageToReturn = 'staffHome'; // Will be used by the inboxMessages

	$activeTab = isset($_GET['t']) ? $_GET['t'] : 0; // Indicate which tab must be activated
	$activeClass1 = '';
	$activeClass2 = '';
	$activeClass3 = '';
	switch ($activeTab) {
		case 2:
			$activeClass2 = 'active';
			break;
		case 3:
			$activeClass3 = 'active';
			break;
		default:
			$activeClass1 = 'active';
			break;
	}
	/*
	*
	*/
?>
<html lang="en">
<head>
	<?php include( DIR_LAY.'headPages.php');?>
	<style>

</style>
</head>
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
						<li><a href="#">Staff Area</a><i class="icon-angle-right"></i></li>
						<li class="active">Home</li>
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
						<li role="presentation" class="active"><a href="../pages/staffHome.php">Profile</a></li>
						<li role="presentation"><a href="../pages/staffWardrobe.php">Wardrobe</a></li>
						<li role="presentation"><a href="../pages/staffCollections.php">Collections</a></li>
						<li role="presentation"><a href="../pages/staffLooks.php">Create Looks</a></li>
						<!-- <li role="presentation"><a href="#">My Wish List</a></li> -->
						<li role="presentation"><a href="../pages/staffStylists.php">Stylists</a></li>
						<li role="presentation"><a href="../pages/staffMessages.php">Messages <span class="badge"><?php echo $amountUnreadMessages; ?></span></a></li>
					</ul>
				</nav>
			</div>	
			<div class="row">
				<div class="container">
					<div class="col-xs-18 col-md-12">
						<h4>Tab</h4>
						<ul class="nav nav-tabs">
							<li class="<?php echo $activeClass1; ?>"><a href="#tabProfile" data-toggle="tab"><i class="icon-briefcase"></i>Profile</a></li>
							<li class="<?php echo $activeClass2; ?>"><a href="#inbox" data-toggle="tab">InBox <span class="badge"><?php echo $amountUnreadMessages; ?></span></a></li>
							<li class="<?php echo $activeClass3; ?>"><a href="#outbox" data-toggle="tab">Outbox</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane <?php echo $activeClass1; ?>" id="tabProfile">
								<?php include( DIR_LAY.'tabProfile.php');?>
							</div>
							<div class="tab-pane <?php echo $activeClass2; ?>" id="inbox">
								<?php include( DIR_LAY.'inboxMessages.php');?>
							</div>
							<div class="tab-pane <?php echo $activeClass3; ?>" id="outbox">
								<?php include( DIR_LAY.'outboxMessages.php');?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
</body>
</html>
 
