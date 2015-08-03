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
                <div class="col-md-12 text-justify">
                    <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-justify">
                                        <p ALIGN="justify"><SIZE="2">Angela Mark Fashion Designs collects the following personal information
                                        from you when you use the feedback form on our web site: </p>
										<b>-Your name;</b><br><b>-Your email address;</b><br><b>-And/or your telephone number.</b></li> </p><br>
										<p ALIGN="justify"><SIZE="2">We require this information in order to respond to your inquiry or comment. By completing our feedback form, you are giving your consent for Angela Mark Fashion Designs to use
                                        this information only for the purpose of contacting you.We will not use your personal information for any other purpose. We will not sell your
                                        personal information or share it with a third party unless required to
                                        do so by law. </p>
										<p ALIGN="justify"><SIZE="2">If you choose to be added to our mailing list, we will retain
                                        your email address on file so that we can send you periodic announcements
                                        of interest. You can request to be removed from our mailing list at any
                                        time. We respect and value your privacy. If you have any questions or concerns
                                        about our privacy policy or the way we use your personal information, please
                                        contact:</p>
                                </div>
                            </div>
                        </div>
						<p>&nbsp;</p>
                    <H5 ALIGN="center"><b>Privacy Officer</b></h5>
                   <H5 ALIGN="center">Angela Mark Fashion Designs
                        <br>Peterborough Office
                        <br>231 King Street
                        <br>Peterborough, ON K9J 2R8
                        <br>Tel (705) 742-7315
                        <br>Email: privacy@angelamark.com</h5>
                    <p>&nbsp;</p>
                </div>
            </div>
      </div>
        <!--footer start-->
     	<?php include( DIR_LAY.'footerPages.php') ?>
		<?php include( DIR_LAY.'jsIncludesPages.php') ?>
		<script src="../assets/js/editor.js"></script>
</html>