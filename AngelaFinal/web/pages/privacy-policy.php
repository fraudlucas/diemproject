<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'managementContentView.php');
	$managementContentView = new ManagementContentView();
	$managementContent = $managementContentView->searchContent('pageId','7','1');
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
?>

<br>
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
                            <li class="./web/pages/privacy-policy.php"> Privacy policy</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs end-->
        <!--breadcrumbs end-->
        <!--container start-->
        <!-- privacy -->
        <div class="container privacy-terms">
            <div class="row">
                <?php echo $managementContent->getContent(); ?>
            </div>
      </div>
        <!--footer start-->
     	<?php include( DIR_LAY.'footerPages.php') ?>
		<?php include( DIR_LAY.'jsIncludesPages.php') ?>
		<script src="../assets/js/editor.js"></script>
</html>