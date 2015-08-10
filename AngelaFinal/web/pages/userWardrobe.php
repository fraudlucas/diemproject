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
						<img src="../assets/images/profilepicture.jpg" class="img-responsive" width="300px" height="400px"> 
					  <li role="presentation" ><a href="../pages/userHome.php">Profile</a></li>
					  <li role="presentation" class="active"><a href="../pages/userWardrobe.php">Wardrobe</a></li>
					  <li role="presentation"><a href="../pages/userLooks.php">Create Looks</a></li>
					  <li role="presentation"><a href="#">My Wish List</a></li>
					</ul>
				</nav>
			</div>	
			<div class="row">
				<div class="container">
					<div class="col-xs-18 col-md-12">
						<div class="row">

							<div class="col-lg-12">
								<h1 class="page-header">Wardrobe</h1>
							</div>
							<?php include( DIR_LAY.'tabWardrobe.php') ?>
           
						</div>
					</div>
				</div>
			</div>
		</div>		
	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
</body>
</html>
 