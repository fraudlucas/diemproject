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

	$pageToReturn = 'adminManagement'; // Will be used by the adminManagement

	$activeTab = isset($_GET['t']) ? $_GET['t'] : 0; // Indicate which tab must be activated
	$array = array('active', 'active', 'active', 'active', 'active', 'active', 'active', 'active', 'active', 'active');

	// Now delete every item, but leave the array itself intact:
	foreach ($array as $i => $value) {
		if (!($i == $activeTab))
			$array[$i] = '';
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
			if ($_SESSION['role']==2){
				header('Location: ../../index.php') ;
			}elseif($_SESSION['role']==1){
				include( DIR_LAY.'headerAdminPages.php') ;
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
						<li><a href="#">Administration</a><i class="icon-angle-right"></i></li>
						<li class="active">WebSite Management</li>
					</ul>
				</div>
			</div>
		</div>
		</section>
		
		<div class="row" style="margin-top:30px">

			<div class="col-xs-3 col-md-2 ">
				<nav class="navbar-default"  role="navigation">
					<ul class="nav nav-pills nav-stacked">
					  <li>
						<img src="../../<?php echo $user->getPicture(); ?>" class="img-responsive" width="300px" height="400px"> </li>
					  <li role="presentation" ><a href="../pages/adminHome.php">Profile</a></li>
					  <li role="presentation" class="active"><a href="../pages/adminManagement.php">Manage Website</a></li>
					  <li role="presentation" ><a href="../pages/adminClients.php">Clients</a></li>
					  <li role="presentation"><a href="../pages/adminClothes.php">Clothes</a></li>
					  <li role="presentation"><a href="../pages/adminStaff.php">Staff</a></li>
					  <li role="presentation"><a href="../pages/adminMessages.php">Messages <span class="badge"><?php echo $amountUnreadMessages; ?></span></a></li>
					</ul>
				</nav>
			</div>		
			<div class="row">
				<div class="container responsive">
					<div class="col-xs-18 col-md-12 ">
						
						<ul class="nav nav-tabs responsive">
							<li class="<?php echo $array[0] ?>"><a href="#home" data-toggle="tab"><i class="icon-briefcase"></i>Home</a></li>
							<li class="<?php echo $array[1] ?>"><a href="#about" data-toggle="tab">About Us</a></li>
							<li class="<?php echo $array[2] ?>"><a href="#ourteam" data-toggle="tab">Our Team</a></li>
							<li class="<?php echo $array[3] ?>"><a href="#testimonials" data-toggle="tab">Testimonials</a></li>
							<li class="<?php echo $array[7] ?>"><a href="#privacypolicy" data-toggle="tab">Privacy-Policy</a></li>
							<li class="<?php echo $array[4] ?>"><a href="#rdytowear" data-toggle="tab">Ready To Wear</a></li>
							<li class="<?php echo $array[5] ?>"><a href="#mdtomeasure" data-toggle="tab">Made To Measure</a></li>
							<li class="<?php echo $array[8] ?>"><a href="#contact" data-toggle="tab">Contact</a></li>
							<li class="<?php echo $array[9] ?>"><a href="#career" data-toggle="tab">Career</a></li>
							<li class="<?php echo $array[6] ?>"><a href="#layout" data-toggle="tab">Layout</a></li>
							
						</ul>
						<div class="tab-content responsive" >
							<div class="tab-pane responsive fade in <?php echo $array[0] ?>" id="home">						
								<?php include( DIR_LAY.'tabHome.php') ;?>												
							</div>
							<div class="tab-pane responsive <?php echo $array[1] ?>" id="about">
								<?php include( DIR_LAY.'tabAbout.php') ;?>
							</div>
							<div class="tab-pane responsive <?php echo $array[2] ?>" id="ourteam">
								<?php include( DIR_LAY.'tabOurTeam.php') ;?>
							</div>
							<div class="tab-pane responsive <?php echo $array[3] ?>" id="testimonials">
								<?php include( DIR_LAY.'tabTestimonials.php') ;?>
							</div>
							<div class="tab-pane responsive <?php echo $array[4] ?>" id="rdytowear">
								<?php include( DIR_LAY.'tabReadyToWear.php') ;?>
							</div>
							<div class="tab-pane responsive <?php echo $array[5] ?>" id="mdtomeasure">
								<?php include( DIR_LAY.'tabMadeToMeasure.php') ;?>
							</div>
							<div class="tab-pane responsive <?php echo $array[6] ?>" id="layout">
								<?php include( DIR_LAY.'tabColors.php') ;?>
							</div>
							<div class="tab-pane responsive <?php echo $array[7] ?>" id="privacypolicy">
								<?php include( DIR_LAY.'tabPrivacyPolicy.php') ;?>
							</div>
							<div class="tab-pane responsive <?php echo $array[8] ?>" id="contact">
								<?php include( DIR_LAY.'tabContact.php') ;?>
							</div>
							<div class="tab-pane responsive <?php echo $array[9] ?>" id="career">
								<?php include( DIR_LAY.'tabCareer.php') ;?>
							</div>
						</div>
					</div>
				</div>			
			</div>
		</div>
	</div>
	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
</body>
</html>
 