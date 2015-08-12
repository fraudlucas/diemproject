<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'managementPhotosView.php');
	require_once (DIR_VIE.'managementContentView.php');
	$manegementPhotosView = new ManagementPhotosView();
	$managementContentView = new ManagementContentView();
	$pageId = '2';
	$managementPhotos = $manegementPhotosView->searchPhotos('pageId',$pageId,'1');
	$managementContent = $managementContentView->searchContent('pageId',$pageId,'1');
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
<?php include( DIR_LAY.'modalRegister.php');?>
	<div id="wrapper">
	<?php 
		if($session->isLoggedIn()){
			if ($_SESSION['role']==2){
				include (DIR_LAY.'headerUserPages.php') ;
			}elseif($_SESSION['role']==1){
				include( DIR_LAY.'headerAdminPages.php') ;
			}
		}else{
			include( DIR_LAY.'headerPages.php') ;
		}
		?>
<br>
<br>
<br>
<br>
<br>
        <!--breadcrumbs start-->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-4">
                        <h1></h1>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <ol class="breadcrumb pull-right">
                            <li>
                                <a href="../../index.php">Home</a>
                            </li>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li class="./web/pages/aboutUS.php">About us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs end-->
		
		<div class="row" style="margin-top:30px; margin-bottom:30px;">
			<div class="container">	
			
					<div class="col-xs-4 col-md-2">
						<!-- wrapper div -->  
						<div class="wrapper">  
							<!-- image -->  
							<img class="img-responsive" src="<?php echo '../../'.$managementPhotos->getPathPhoto();?>" style="width:350px;height:463px;"/>  
							<!-- description div -->  
							<div class="description">  
								<!-- description content -->  
								<center><p class="description_content">Angela Mark, CEO.</p></center>
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
	
<!--container 2 start-->
<!-- <div class="container">
    <div class="row">
		<div class="col-lg-7 about wow fadeInRight">
			<h3 ALIGN="justify"><b>Why choose us?</b></h3>
				<h4 ALIGN="justify"><b>The Fit</b></h4>
					<h5 ALIGN="justify">Our patterns have evolved by fine tuning them by working with individual clients for over 27 years. We are proud that many of our ready to wear pieces look and feel like they were made to measure!</h5><br>			
					<h4 ALIGN="justify"><b>We Offer Exclusivity</b></h4>
					<h5 ALIGN="justify">Our designs are only available to be purchased through our Angela Mark Showroom and Boutique, Angela Mark Stylists and our seasonal Angela Mark Trunk Shows.</h5><br>
					<h5>Current yet classic styling, beautiful fabrics and quality workmanship are distinctive  in each garment. </h5><br><br>
			
				<h4 ALIGN="justify"><b>Our Service is Second to None!</b></h4>
				<h5 ALIGN="justify">Your Angela Mark Stylist provides valuable insights into current and upcoming trends that will be a reflection of your attention to detail and image.</h5><br>

					<h4 ALIGN="justify"><b>We Provide Options</b></h4>
					<h5 ALIGN="justify">From fabric to style, Angela Mark will help you to choose the options to best suit you. Our website previews a fraction of the collection. To experience all of the options Angela Mark has to offer, please contact your personal Stylist.</h5>
				
			<blockquote>
            <h5>We look forward to getting to know you and working with you for years to come.</h5>
            <small>
              Angela Mark's team
            </small>
			</blockquote>
        </div>  -->
        <!-- <div class="col-lg-5">
			<div class="about-carousel wow fadeInLeft">
				<div id="myCarousel" class="carousel slide" data-interval="7000" class="carousel slide"  data-ride="carousel" Style= "width:350px; height:410px; margin-right:-30px; " > -->
				<!-- Carousel items -->
				<!-- <div class="carousel-inner">
					<div class="active item"> -->
						<!-- <img src="html5.gif" alt="HTML5 Icon" style="width:128px;height:128px;"> -->				
						<!-- <img src="../../web/assets/img/aboutUs/1.jpeg" alt="">
						<div class="carousel-caption">
						<p>
						Exclusivity
						</p>
					</div>
                </div>

            </div> -->
              <!-- Carousel nav -->
			  <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="icon-prev  fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
            </div> 
		</div> 
    </div>
</div>-->

	
	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
</body>
</html>
 