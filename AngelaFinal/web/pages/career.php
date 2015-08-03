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
		if(isset($_SESSION['role'])){
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
                                <a href="#">Our Company</a>
                            </li>
                            <li class="./web/pages/career.php">Work with us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    <!--breadcrumbs end-->


		
				<!--container start-->
		
    <div class="container">

	<p> </p>
      <div class="row">
        <div class="col-lg-5 col-sm-5 address">
		<br></br>
          <section class="contact-infos">
            <h4 class="title custom-font text-black">
              ADDRESS
            </h4>
            <address>
              231 King Street,
              <br>
              Peterborough, CA
              <br>
              ON K9J 2R8
            </address>
          </section>
          <section class="contact-infos">
            <h4 class="title custom-font text-black">
              BUSINESS HOURS
            </h4>
            <p>
              Monday - Friday 8am to 4pm
              <br>
              Saturday - 7am to 6pm
              <br>
              Sunday- Closed
              <br>
            </p>
          </section>
          <section class="contact-infos">
            <h4>
              TELEPHONE
            </h4>
            <p>
              <i class="icon-phone">
              </i>
              +1 705-742-7315
            </p>
         

          </section>
        </div>
		
			<br><br>
        <div class="col-lg-7 col-sm-7 address">
          <h4>
				  Work with us
          </h4>
          <div class="contact-form">
            <form role="form">
              <div class="form-group">
                <label for="name">
                  Name
                </label>
                <input type="text" placeholder="" id="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">
                  Email
                </label>
                <input type="text" placeholder="" id="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="phone">
                  Phone
                </label>
                <input type="text" id="phone" class="form-control">
              </div>
              <div class="form-group">
                <label for="phone">
                  Message
                </label>
                <textarea placeholder="" rows="5" class="form-control">
                </textarea>
              </div>
              <button class="btn btn-info" type="submit">
                Submit
              </button>
            </form>

          </div>
        </div>
      </div>

    </div>
   		
      </div>
      <!-- End container -->
    </div>
	<br><br><br>

    <!--container end-->

      <!--footer start-->
       
	</div>
	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
</body>
</html>