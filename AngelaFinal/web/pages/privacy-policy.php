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

<!DOCTYPE html>

<html lang="en">
<head>
	<?php include( DIR_LAY.'headPages.php');?>
</head>
<body>
	<?php 
	 echo $_SESSION['role'];
		if ($_SESSION['role']==2){
			include (DIR_LAY.'headerUserPages.php') ;
		}elseif($_SESSION['role']==1){
			include( DIR_LAY.'headerAdminPages.php') ;
		}else{
			include( DIR_LAY.'headerPages.php') ;
		}
		?>
        <!-- privacy -->
        <div class="container privacy-terms" style="margin-top:130px">
            <div class="row">
                <div class="col-md-12 text-justify">
                    <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-justify">
                                        <H4 ALIGN="justify"><SIZE="2">Angela Mark Fashion Designs collects the following personal information
                                        from you when you use the feedback form on our web site: </h4>
										<b>-Your name;</b><br><b>-Your email address;</b><br><b>-And/or your telephone number.</b></li> </h4><br>
										<H4 ALIGN="justify"><SIZE="2">We require this information in order to respond to your inquiry or comment. By completing our feedback form, you are giving your consent for Angela Mark Fashion Designs to use
                                        this information only for the purpose of contacting you.We will not use your personal information for any other purpose. We will not sell your
                                        personal information or share it with a third party unless required to
                                        do so by law. </h4>
										<H4 ALIGN="justify"><SIZE="2">If you choose to be added to our mailing list, we will retain
                                        your email address on file so that we can send you periodic announcements
                                        of interest. You can request to be removed from our mailing list at any
                                        time. We respect and value your privacy. If you have any questions or concerns
                                        about our privacy policy or the way we use your personal information, please
                                        contact:</h4>
                                </div>
                            </div>
                        </div>
						<p>&nbsp;</p>
                    <H4 ALIGN="center"><b>Privacy Officer</b></h4>
                   <H4 ALIGN="center">Angela Mark Fashion Designs
                        <br>Peterborough Office
                        <br>231 King Street
                        <br>Peterborough, ON K9J 2R8
                        <br>Tel (705) 742-7315
                        <br>Email: privacy@angelamark.com</h4>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
        <!--container end-->
		
        <!--footer start-->

       <?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
        
    </body>

</html>