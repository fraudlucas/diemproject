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

	 <!--header end-->
        <!--breadcrumbs start-->
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
        <!--breadcrumbs end-->
        <div class="container" tyle="margin-top:30px">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="pf-detail">
                        <H5 ALIGN="justify"><SIZE="2">The Ready to Wear Collections that Angela now designs and manufacturers
                            reflects the attention to detail and the fit that has become distinctive
                            of her label. The result is beautiful clothing that can be purchased off
                            the rack and looks and feels like it has been custom made!</h5>
                    </div>
					<!-- Sequence Modern Slider -->
					<div class="container">
						<div class="row mar-b-50">
							<div class="col-md-12">
								<center><div id="carousel-example" style="width:30%; height: 30%;" data-interval="7000" class="carousel slide"
								data-ride="carousel">
									<div class="carousel-inner">
										
										
										<div class="item active">
											<img src="../assets/images/business.jpg">
											<div class="carousel-caption">
												<h3>Resort wear</h3>
											</div>
										</div>
										
									</div>
									<a class="left carousel-control" href="#carousel-example" data-slide="prev"><i class="icon-prev  fa fa-angle-left"></i></a>
									<a class="right carousel-control" href="#carousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
								</div></center>
								<!--feature end-->
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
        
        <!--container start-->
        <!--footer start-->
   	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
</html>