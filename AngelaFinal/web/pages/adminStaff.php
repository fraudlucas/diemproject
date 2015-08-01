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
						<li class="active">Clients</li>
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
						<img src="../assets/images/profilepicture.jpg" class="img-responsive" width="300px" height="400px"> 
					  <li role="presentation"><a href="../pages/adminHome.php">Profile</a></li>
					  <li role="presentation" ><a href="../pages/adminManagement.php">Manage Website</a></li>
					  <li role="presentation" class="active"><a href="../pages/adminClients.php">Clients</a></li>
					  <li role="presentation"><a href="../pages/adminClothes.php">Clothes</a></li>
					  <li role="presentation"><a href="#">Staff</a></li>
					</ul>
				</nav>
			</div>		
			<div class="row">
				<div class="container">
					<div class="col-xs-18 col-md-12">
						<h4>Clients</h4>
						<ul class="nav nav-tabs">
							<li class="active"><a href="#list" data-toggle="tab"><i class="icon-briefcase"></i>Client List</a></li>
							<li><a href="#search" data-toggle="tab">Search</a></li>
						</ul>
						<div class="tab-content" >
							<div class="tab-pane fade in active" id="list">
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
									<tbody>
										<?php include( DIR_LAY.'listStaff.php');?>
									</tbody>
								</table>
							</div>
							<div class="tab-pane" id="search">
								
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
 