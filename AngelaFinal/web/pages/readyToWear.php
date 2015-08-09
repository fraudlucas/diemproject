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
                                <a href="#">Collections</a>
                            </li>
                            <li class="./web/pages/readyToWear.php">Ready to wear</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs end-->
        <div class="container">
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
                                <img src="images/70165-1-e1370195310277.jpg">
                                <div class="carousel-caption">
                                    <h3>Career wear</h3>
                                </div>
                            </div>
							
                            <div class="item">
                                <img src="images/70067-a-2-kiwi.jpg">
                                <div class="carousel-caption">
                                    <h3>Smart casual</h3>
                                </div>
                            </div>
						
							 <div class="item">
                                <img src="images/70091-blk.jpg">
                                <div class="carousel-caption">
                                    <h3>Special ocasion</h3>
                                </div>
                            </div>
							
							<div class="item">
                                <img src=".../web/assets/images/business.jpg">
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
        </div>
        <!--container start-->
        <!--footer start-->
   	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
</html>