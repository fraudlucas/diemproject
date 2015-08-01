<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	$session = new Session();
?>
<html lang="en">
<head>
	<?php include( DIR_LAY.'headPages.php');?>
	
  
</head>
<body>
<?php include( DIR_LAY.'modalBook.php');?>
	<div id="wrapper">
		<?php 
		if ($_SESSION['role']==2){
			header('Location: ../../index.php') ;
		}elseif($_SESSION['role']==1){
			include( DIR_LAY.'headerAdminPages.php') ;
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
						<img src="../assets/images/profilepicture.jpg" class="img-responsive" width="300px" height="400px"> 
					  <li role="presentation" ><a href="../pages/adminHome.php">Profile</a></li>
					  <li role="presentation" class="active"><a href="../pages/adminManagement.php">Manage Website</a></li>
					  <li role="presentation" ><a href="../pages/adminClients.php">Clients</a></li>
					  <li role="presentation"><a href="../pages/adminClients.php">Clothes</a></li>
					  <li role="presentation"><a href="#">Staff</a></li>
					</ul>
				</nav>
			</div>		
			<div class="row">
				<div class="container">
					<div class="col-xs-18 col-md-12 ">
						
						<ul class="nav nav-tabs">
							<li class="active"><a href="#home" data-toggle="tab"><i class="icon-briefcase"></i>Home</a></li>
							<li><a href="#about" data-toggle="tab">About Us</a></li>
							<li><a href="#testimonials" data-toggle="tab">Testimonials</a></li>
							<li><a href="#rdytowear" data-toggle="tab">Ready To Wear</a></li>
							<li><a href="#mdtomeasure" data-toggle="tab">Made To Measure</a></li>
							<li><a href="#colors" data-toggle="tab">Colors</a></li>
						</ul>
						<div class="tab-content" >
							<div class="tab-pane fade in active" id="home">						
								<?php include( DIR_LAY.'tabHome.php') ;?>												
							</div>
							<div class="tab-pane" id="about">
								<?php include( DIR_LAY.'tabAbout.php') ;?>
							</div>	
							<div class="tab-pane" id="testimonials">
								<?php include( DIR_LAY.'tabTestimonials.php') ;?>
							</div>	
							<div class="tab-pane" id="colors">
								<?php include( DIR_LAY.'tabColors.php') ;?>
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
 