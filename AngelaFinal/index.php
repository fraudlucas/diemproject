<?php
	require('src/config.php');
	require_once('src/Session.php');
	$session = new Session();
?>

<html lang="en">
<head>
	<?php include( DIR_LAY.'head.php');?>
</head>
<body>	
	
	<?php include( DIR_LAY.'modalBook.php');?>
	<?php include( DIR_LAY.'modalRegister.php');?>
	<div id="wrapper">
		<?php 
		if($session->isLoggedIn()){
			if ($_SESSION['role']==2){
				include (DIR_LAY.'headerUser.php') ;
			}elseif($_SESSION['role']==1){
				include( DIR_LAY.'headerAdmin.php') ;
			}
		}else{
			include( DIR_LAY.'header.php') ;
		}
		?>
		<br><br>
		<br><br>
		<br><br>
		<br>
		<section id="featured">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="carousel-example" data-interval="6000" class="carousel slide"
                    data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <!-- <img src="images/url.jpg"> -->
								<?php include( DIR_LAY.'slider.php') ?>
                            </div>
						<div class="item">
                                <?php include( DIR_LAY.'slider.php') ?>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example" data-slide="prev"><i class="icon-prev  fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href="#carousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
                    </div>
				</div>			
			</div>					
				</div>
			</div>			
		</section>		
	</div>		
	<?php include( DIR_LAY.'footer.php') ?>
	<?php include( DIR_LAY.'jsIncludes.php') ?>
</body>
</html>
