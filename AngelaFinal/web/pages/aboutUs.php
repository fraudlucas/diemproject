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
	<style>
div.wrapper{  
    float:left; /* important */  
    position:relative; /* important(so we can absolutely position the description div */ 
	
}  
div.description{  
    position:absolute; /* absolute position (so we can position it where we want)*/  
    bottombottom:0px; /* position will be on bottom */  
    left:0px;  
    width:100%;  
    /* styling bellow */  
    background-color:black;  
    font-family: 'tahoma';  
    font-size:15px;  
    color:white;  
    opacity:0.6; /* transparency */  
    filter:alpha(opacity=60); /* IE transparency */  
}  
p.description_content{  
    padding:10px;  
    margin:0px;  
}  
</style>
</head>
<body>
<?php include( DIR_LAY.'modalBook.php');?>
	<div id="wrapper">
		<?php 
		
		if ($_SESSION['role']==2){
			include (DIR_LAY.'headerUserPages.php') ;
		}elseif($_SESSION['role']==1){
			include( DIR_LAY.'headerAdminPages.php') ;
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
						<li class="active">About US</li>
					</ul>
				</div>
			</div>
		</div>
		</section>
		<div class="row" style="margin-top:30px; margin-bottom:30px;">
			<div class="container">	
			
					<div class="col-xs-4 col-md-2">
						<!-- wrapper div -->  
						<div class="wrapper">  
							<!-- image -->  
							<img src="<?php echo '../../'.$managementPhotos->getPathPhoto();?>" style="width:246px;height:463px;"/>  
							<!-- description div -->  
							<div class="description">  
								<!-- description content -->  
								<p class="description_content">The pack, the basic...</p>  
								<!-- end description content -->  
							</div>  
							<!-- end description div -->  
						</div>  
						<!-- end wrapper div 	-->
					</div> 
					<div class="col-xs-2 col-md-1">
					</div>
				<div class="row">
					<div class="container">
						<div class="col-xs-12 col-md-9" style="float:right;">
							<?php echo $managementContent->getContent();?>
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
 