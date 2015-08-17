<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'messageView.php');
	require_once (DIR_VIE.'userView.php');
	$session = new Session();
	$userView = new UserView();
	$user = $userView->searchUsers("id",$_SESSION['userID'],'1');

	$currentUser = $_SESSION['userID'];

	$messageView = new MessageView();
	$amountUnreadMessages = $messageView->amountUnreadMessagesByToUserID($currentUser);

	$pageToReturn = 'staffWardrobe'; // Will be used by the adminMessages

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
						<li class="active">Wardrobe</li>
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
						<li role="presentation" ><a href="../pages/staffHome.php">Profile</a></li>
						<li role="presentation" class="active"><a href="../pages/staffWardrobe.php">Wardrobe</a></li>
						<li role="presentation"><a href="../pages/staffCollections.php">Collections</a></li>
						<li role="presentation"><a href="../pages/staffLooks.php">Create Looks</a></li>
						<li role="presentation"><a href="../pages/staffClients.php">Clients</a></li>
						<li role="presentation"><a href="../pages/staffStylists.php">Stylists</a></li>
						<li role="presentation"><a href="../pages/staffMessages.php">Messages <span class="badge"><?php echo $amountUnreadMessages; ?></span></a></li>
					</ul>
				</nav>
			</div>	
			<div class="row">
				<div class="container responsive">
					<div class="col-xs-18 col-md-12">
						<div class="row">
							<div class="col-lg-12">
								<h1 class="page-header">Wardrobe</h1>
							</div>
						
							<select name="filter" id="filter" class="form-control">
								<option value="0">All</option>}
								<?php include( DIR_LAY.'listTags.php') ;?>
							</select>
						</div>
						<div class="row">
							<?php include( DIR_LAY.'tabWardrobe.php') ?>
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
 