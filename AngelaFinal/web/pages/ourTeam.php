<!DOCTYPE html>
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

<html>

<html lang="en">
<head>
	<?php 
		if ($_SESSION['role']==2){
			include (DIR_LAY.'headerUserPages.php') ;
		}elseif($_SESSION['role']==1){
			include( DIR_LAY.'headerAdminPages.php') ;
		}else{
			include( DIR_LAY.'headerPages.php') ;
		}
		?>
</head>
<body>

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
        <div class="col-lg-5">
          <div class="about-carousel wow fadeInLeft">
            <div id="myCarousel" class="carousel slide">
              <!-- Carousel items -->
              <div class="carousel-inner">
                <div class="active item">
				<!-- <img src="html5.gif" alt="HTML5 Icon" style="width:128px;height:128px;"> -->
				
                  <img src="images/angela.png" alt="" style="width:650px;height:510px; height="42" width="42">
                  <div class="carousel-caption">
                    <p>
                      Angela Mark<br>
					  CEO, Angela Mark Fashion Designs.
                    </p>
                  </div>
                </div>
				
              </div>
              <!-- Carousel nav -->
              
            </div>
          </div>
        </div>
        <div class="col-lg-7 about wow fadeInRight">
<!-- Quotes, stories and data of 1st person -->
          <h5 ALIGN="justify"><b>FAVOURITE QUOTE:</b></h5>
			<h5 ALIGN="justify">“Lorem ipsum dolor sit amet, consectetur adipiscing elit.” - Jane Doe</h5><br>
			
			<h5 ALIGN="justify"><b>THREE CHARACTERISTICS YOU’RE BOUND TO LEARN QUICKLY:</b></h5>
			<h5 ALIGN="justify">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5><br>
			
				<h5 ALIGN="justify"><b>MY STORY:</b></h5>
				<h5 ALIGN="justify">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</h5><br>

					<h5 ALIGN="justify"><b>I LOVE:</b></h5>
					<h5 ALIGN="justify">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</h5><br>
				<ul class="list-unstyled"></ul>
			<!-- End of quotes, stories and data of 1st person -->
        </div> 
      </div>
      <!-- End container -->
    </div>
	

    <!--container end-->

    <!--footer start-->
       <?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
  </body>
</html>
