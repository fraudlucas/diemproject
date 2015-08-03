<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'managementPhotosView.php');
	require_once (DIR_VIE.'managementContentView.php');
	$manegementPhotosView = new ManagementPhotosView();
	$managementContentView = new ManagementContentView();
	$managementPhotos = $manegementPhotosView->searchPhotos('pageId','2','1');
	$managementContent = $managementContentView->searchContent('pageId','2','1');
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
			if ($_SESSION['role']==2){
				include (DIR_LAY.'headerUserPages.php') ;
			}elseif($_SESSION['role']==1){
				include( DIR_LAY.'headerAdminPages.php') ;
			}
		}else{
			include( DIR_LAY.'headerPages.php') ;
		}
		?>
		<section id="inner-headline">
		<div class="container" style="margin-top:100px">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
						<li><a href="#">About</a><i class="icon-angle-right"></i></li>
						<li class="active">Testimonials</li>
					</ul>
				</div>
			</div>
		</div>
		</section>
		<!--
		<section id="featured">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
										
					</div>					
				</div>
			</div>			
		</section>	 -->
		
		<!-- Slider has been changed -->
		<div class="container">
            <div class="row mar-b-50">
                <div class="col-md-12">
                    <div id="carousel-example" data-interval="6000" class="carousel slide"
                    data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <!-- <img src="images/url.jpg"> -->
								<?php include( DIR_LAY.'slider2.php') ?>
                                <div class="carousel-caption">
                                    <h2>Kathy</h2>
                                    <p>“Angela,  Just wanted to thank you for my beautiful suit, the wonderful service & an amazing shopping experience.”
									</p>
                                </div>
                            </div>
						<div class="item">
                                <?php include( DIR_LAY.'slider2.php') ?>
                                <div class="carousel-caption">
                                    <h2>Rhonda Barnet</h2>
                                    <p> Sent us this image of her looking stunning and professional in her Angela Mark creation!</p>
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example" data-slide="prev"><i class="icon-prev  fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href="#carousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
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
 