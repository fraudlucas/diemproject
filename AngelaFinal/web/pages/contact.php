<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'managementContentView.php');
	$managementContentView = new ManagementContentView();
	$managementContent = $managementContentView->searchContent('pageId','9','1');
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
                                <a href="../../index.php">Home</a></li>
                            
                            <li class="active">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs end-->
		
        <!--container start-->
        <div class="container">
            <div class="row">
                <div class="">
                    <p class="lead text-justify">To contact Angela Mark Fashion Designs, please call us using the information
                        below, or you can use our convenient online form. Before using the form,
                        please read our privacy policy.</p>
                </div>
            </div>
                <div class="col-lg-5 col-sm-5 address">
                	<?php echo $managementContent->getContent(); ?>
                </div>
                <div class="col-lg-7 col-sm-7 address">
                    <h4 class="text-center">Drop us a line so that we can hear from you</h4>
                    
					<center><div>
					<?php
					// If user press SUBMIT check bellow functions
					if(isset($_POST['submit'])) {
						
						// Check if all fields were complete.
						if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['mensagem']) && !empty($_POST['codigo'])) {
							
							if($_POST['codigo'] == $_SESSION['rand_code']) {
							
								// Sends message confirming.
								$ok = "Thanks by your message! We will reply it soon.";
							// Error message
							} else {
							
								$erro = "Sorry, the code is incorrect.";
							
							}
						// Error in case something is missing
						} else {
						
							$erro = "Please, fill all the form fields.";
						
						}

					}

					?>
					<style type="text/css">
					form {
						margin:0;
						padding:0;
					}
					input {
						padding:2px;
						width:350px;
					}
					textarea {
						padding:2px 130px 2px 2px;
						width:400px;
						height:100px;
					}
					.button {
						width:60px;
					}
					p {
						margin:0 0 5px 0;
						padding:0;
					}
					.erro {
						color:#FF0000;
						margin:0 0 10px 0;
					}
					.ok {
						color:#339966;
						margin:0 0 10px 0;
					}
					</style>

					<?php if(!empty($erro)) echo '<div class="erro">'.$erro.'</div>'; ?>
					<?php if(!empty($ok)) echo '<div class="ok">'.$ok.'</div>'; ?>

					<!-- Contact form itself-->
					<form action="../../src/handlers/userHandler.php?a=contactMessage&p=contact" method="post">
						<p><b>Name: </b> <input class="form-control" type="text" name="name" required> </p>
						<p><b>E-mail: </b><input class="form-control" type="email" name="email" required></p>
						<p><b>Message: </b><textarea class="form-control" name="message" required rows="4"></textarea></p>						 
						<img src="../../web/layout/captcha.php">
						<p><b>Please, type the code:</b><input class="form-control" type="text" id="code" name="code" required style="width:150px;"></p>
						<input type="submit" name="submit" value="Send" class="btn btn-info" style="width:150px" />
						<br>
						<br>
					</form>
					</div></center>
                    </div>
                </div>
            </div>
        </div>
        <!--container end-->
		
        <!--Google maps start-->
        <center class="responsive">
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <div style="overflow:hidden;height:350px;width:970px;">
                <div id="gmap_canvas" style="height:350px;width:800px;"></div>
                <style>
                    #gmap_canvas img{max-width:none!important;background:none!important}
                </style>
                <a class="google-map-code" href="http://premium-wordpress-themes.org"
                id="get-map-data">http://premium-wordpress-themes.org</a>
            </div>
            <script type="text/javascript">
                function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(44.3018873,-78.32311449999997),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(44.3018873, -78.32311449999997)});infowindow = new google.maps.InfoWindow({content:"<b>Angela Mark Fashion Design</b><br/>231 King Street<br/>K9J 2R8 Peterborough" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
            </script>
        </center> <!--Google maps end-->
		
        <br>
		<br>
		<br>
        
        <!--footer starts-->
     
	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
	<?php 

	$rand_code = $_SESSION['rc'];

	?>

	<input type="hidden" id="rc" value="<?php echo $rand_code; ?>">
	<script>

	</script>
        <!-- footer end -->
        <!--small footer start -->
        <!--small footer end-->
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="./assets/js/jquery.js">
</script>
        <script src="./assets/js/bootstrap.min.js">
</script>
        <script type="text/javascript" src="./assets/js/hover-dropdown.js">
</script>
        <script type="text/javascript" src="./assets/bxslider/jquery.bxslider.js">
</script>
    </body>

</html>