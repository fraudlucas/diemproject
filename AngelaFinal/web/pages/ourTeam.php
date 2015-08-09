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
                                <a href="index.html">Home</a>
                            </li>
                            <li>
							<a href="about.html">About</a>
							</li>
							<li class="active">Our Team</li>
                        </ol>
                    </div>
                </div>
            </div>
    </div>
    <!--breadcrumbs end-->
	
    <!--container start-->
	<div class="container">
      <div class="row">
          <div class="col-xs-4 col-md-2">
						<!-- wrapper div -->  
						<div class="wrapper">  
							<!-- image -->  
							<img src="<?php echo '../../'.$managementPhotos->getPathPhoto();?>" style="width:246px;height:463px;"/>  
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
<!-- Quotes, stories and data of 1st person -->
          <h5 ALIGN="justify"><b>FAVOURITE QUOTE:</b></h5>
			<p ALIGN="justify">“Lorem ipsum dolor sit amet, consectetur adipiscing elit.” - Jane Doe</p><br>
			
			<h5 ALIGN="justify"><b>THREE CHARACTERISTICS YOU’RE BOUND TO LEARN QUICKLY:</b></h5>
			<p ALIGN="justify">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><br>
			
				<h5 ALIGN="justify"><b>MY STORY:</b></h5>
				<p ALIGN="justify">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p><br>

					<h5 ALIGN="justify"><b>I LOVE:</b></h5>
					<p ALIGN="justify">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p><br>
				<ul class="list-unstyled"></ul>
			<!-- End of quotes, stories and data of 1st person -->
        </div> 
      </div>
      <!-- End container -->
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
