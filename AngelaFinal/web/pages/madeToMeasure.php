<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'managementPhotosView.php');
	require_once (DIR_VIE.'managementContentView.php');
	$manegementPhotosView = new ManagementPhotosView();
	$managementContentView = new ManagementContentView();
    $pageId = '4';
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
<link href="<?php echo DIR_AST; ?>css/one-page-wonder.css" rel="stylesheet">
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
            }elseif($_SESSION['role']==3){
                include( DIR_LAY.'headerStaffPages.php') ;
            }
        }else{
            include( DIR_LAY.'headerPages.php') ;
        }
		?>
        <!--header end-->
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
                                <a href="#">Collections</a>
                            </li>
                            <li class="./web/pages/madeToMeasure.php">Made to measure</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs end-->
        <!--breadcrumbs end-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pf-img">
                        <img class="img-responsive" src="../../<?php echo $managementPhotos->getPathPhoto(); ?>" >
                    </div>
                </div>
            </div>
        </div>
        <!--container start-->
        <div class="container">
            <div class="row">
                <!--portfolio-single start-->
                <div class="col-lg-9 ">
                    <?php echo $managementContent->getContent(); ?>
                </div>
                <div class="col-lg-3">
                    <div class="title">
                        <h4 class="text-center">How it works:</h4>
                        <hr>
                    </div>
                    <ul class="lead list-unstyled pf-list">
                        <li>
                            <i class="fa fa-arrow-circle-right pr-5"></i>
                            <b>Consultation</b>
                        </li>
                        <li>
                            <i class="fa fa-arrow-circle-right pr-10"></i>
                            <b>Selection of Fabric and Details</b>
                        </li>
                        <li>
                            <i class="fa fa-arrow-circle-right pr-10"></i>
                            <b>Measurement</b>
                        </li>
                        <li>
                            <i class="fa fa-arrow-circle-right pr-10"></i>
                            <b>Fitting</b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--<div class="container">
            <!--recent work start-->
            <!--<div class="row">
                <div class="col-lg-12 recent">
                    <h3>Related Work</h3>
                    <p>Some of our work we have done earlier</p>
                    <div id="owl-demo" class="owl-carousel owl-theme wow fadeIn">
                        <div class="item view view-tenth">
                            <img src="img/works/img8.jpg" alt="work Image">
                            <div class="mask">
                                <a href="portfolio-single-image.html" class="info" data-toggle="tooltip"
                                data-placement="top" title="Details">

                        <i class="fa fa-link"></i>

                        </a>
                            </div>
                        </div>
                        <div class="item view view-tenth">
                            <img src="img/works/img9.jpg" alt="work Image">
                            <div class="mask">
                                <a href="portfolio-single-image.html" class="info" data-toggle="tooltip"
                                data-placement="top" title="Details">

                        <i class="fa fa-link"></i>

                        </a>
                            </div>
                        </div>
                        <div class="item view view-tenth">
                            <img src="img/works/img10.jpg" alt="work Image">
                            <div class="mask">
                                <a href="portfolio-single-image.html" class="info" data-toggle="tooltip"
                                data-placement="top" title="Details">

                        <i class="fa fa-link"></i>

                        </a>
                            </div>
                        </div>
                        <div class="item view view-tenth">
                            <img src="img/works/img11.jpg" alt="work Image">
                            <div class="mask">
                                <a href="portfolio-single-image.html" class="info" data-toggle="tooltip"
                                data-placement="top" title="Details">

                        <i class="fa fa-link"></i>

                        </a>
                            </div>
                        </div>
                        <div class="item view view-tenth">
                            <img src="img/works/img12.jpg" alt="work Image">
                            <div class="mask">
                                <a href="blog_detail.html" class="info" data-toggle="tooltip" data-placement="top"
                                title="Details">

                        <i class="fa fa-link"></i>

                        </a>
                            </div>
                        </div>
                        <div class="item view view-tenth">
                            <img src="img/works/img13.jpg" alt="work Image">
                            <div class="mask">
                                <a href="blog_detail.html" class="info" data-toggle="tooltip" data-placement="top"
                                title="Details">

                        <i class="fa fa-link"></i>

                        </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--recent work end-->
        </div>
        <!--footer start-->
     	<?php include( DIR_LAY.'footerPages.php') ?>
		<?php include( DIR_LAY.'jsIncludesPages.php') ?>
		<script src="../assets/js/editor.js"></script>
</html>