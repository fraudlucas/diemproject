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
	<div id="wrapper">
		<?php 
		if (!$session->isLoggedIn()){
			include( DIR_LAY.'header.php') ;
		}else{
			include( DIR_LAY.'headerUser.php') ;
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
						<?php include( DIR_LAY.'slider.php') ?>					
					</div>					
				</div>
			</div>			
		</section>		
	</div>		
	<?php include( DIR_LAY.'footer.php') ?>
	<?php include( DIR_LAY.'jsIncludes.php') ?>
</body>
</html>