<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'managementPhotosView.php');
	require_once (DIR_VIE.'managementContentView.php');
	$manegementPhotosView = new ManagementPhotosView();
	$managementContentView = new ManagementContentView();
	$managementPhotos = $manegementPhotosView->searchPhotos('pageId','6','1');
	$managementContent = $managementContentView->searchContent('pageId','6','1');
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
                            <li class="./web/pages/ourTeam.php">Our Team</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs end-->

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="pf-img">
                   <div class="wrapper">  
					<!-- image -->  
					<img class="img-responsive" src="<?php echo '../../'.$managementPhotos->getPathPhoto();?>" style=""/>  
					<!-- description div -->  
					<div class="description">  
						<!-- description content -->  
						<center><p class="description_content"><?php echo $managementPhotos->getSubtitle(); ?></p></center>
						<!-- end description content -->  
					</div>  
					<!-- end description div -->  
				</div>
                </div>
            </div>
        </div>
    </div>
    <!--container start-->
    <div class="container">
        <div class="row">
            <!--portfolio-single start-->
            <div class="col-lg-10 ">
                <?php echo $managementContent->getContent(); ?>
            </div>
        </div>
    </div>
	

    <!--container end-->

    <!--footer start-->
       <?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
  </body>
</html>
