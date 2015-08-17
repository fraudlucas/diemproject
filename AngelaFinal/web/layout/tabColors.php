<?php 
require_once('../../src/config.php');
require_once (DIR_VIE.'managementContentView.php');

$layoutManagementContentView = new ManagementContentView();
$logo = $layoutManagementContentView->searchLogo()->getLogo();
$color = $layoutManagementContentView->searchColor()->getColor();
$email1 = $layoutManagementContentView->searchEmail(1);
$email2 = $layoutManagementContentView->searchEmail(2);
$email3 = $layoutManagementContentView->searchEmail(3);
$link1 = $layoutManagementContentView->searchContent('pageId','11','1')->getContent();
$link2 = $layoutManagementContentView->searchContent('pageId','12','1')->getContent();

?>

<!-- Color Picker Script - ColorCodeHex.COM 
<div style="font-family:Arial,Helvetica,sans-serif;border:solid 1px #cccccc;position:absolute;width:240px;height:326px;background: #ffffff;-moz-box-shadow:0 0 6px rgba(0,0,0,.25);-webkit-box-shadow: 0 0 6px rgba(0,0,0,.25);box-shadow:0 0 6px rgba(0,0,0,.25);-moz-border-radius: 5px;-webkit-border-radius:5px;border-radius:5px;"><div style="background-color:#2d6ab4;position:absolute;top:0px;left:0px; width:100%; height:22px;text-align:center;padding-top:2px;font-weight:bold;border-top-right-radius:5px;border-top-left-radius:5px;"><a style="text-decoration:none;color:#ffffff;" target="_blank" href="http://www.colorcodehex.com/">HTML Color Picker</a></div><script src="http://widget.colorcodehex.com/color-picker/abcdef.html" type="text/javascript"></script></div>-->
<script type="text/javascript" src="../assets/js/jscolor/jscolor.js"></script><!-- End of Color Picker Script --> 

<div class="panel panel-default" >
	<div class="panel-heading">Manage Color</div>
	<div class="panel-body">
		<div class="main-box no-header clearfix">
			<div class="main-box-body clearfix">
				<div class="table-responsive">
					<form name="colorSelec" action="../../src/handlers/managementContentHandler.php?a=changeColor&p=<?php echo $pageToReturn; ?>&param=t&t=6" method="post">
						Select a bacground color: <input class="color {hash:true}" value="<?php echo $color; ?>" name="color">
						<input type="submit" class="btn btn-info" value="change">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default" >
	<div class="panel-heading">Manage Logo</div>
	<div class="panel-body">
		<div class="main-box no-header clearfix">
			<div class="main-box-body clearfix">
				<div class="table-responsive">
					<form name="logoSelec" action="../../src/handlers/managementContentHandler.php?a=changeLogo&p=<?php echo $pageToReturn; ?>&param=t&t=6" method="post" enctype="multipart/form-data">
						<label for="file">File</label>
						<input type="file" name="fileToUpload" id="fileToUpload" class="form-control" style="width:75%">
						<img id="testimonialsImage" class="img-responsive pull-right" title="Current logo" src="../../<?php echo $logo; ?>" style="">
						<input type="hidden" name="target_dir" id="logo_target_dir" class="form-control" value="web/assets/img/logo/">
						<input type="submit" class="btn btn-info" value="change">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default" >
	<div class="panel-heading">Manage External links</div>
	<div class="panel-body">
		<div class="main-box no-header clearfix">
			<div class="main-box-body clearfix">
				<div class="table-responsive">
					<form name="linksSelec" action="../../src/handlers/managementContentHandler.php?a=changeLinks&p=<?php echo $pageToReturn; ?>&param=t&t=6" method="post">
						<label for="link1">Blog link </label>
						<input type="text" class="form-control" id="link1" name="link1" value="<?php echo $link1; ?>" required>
						<label for="link2">Appointment booking feature</label>
						<input type="text" class="form-control" id="link2" name="link2" value='<?php echo $link2; ?>' required>
						<input type="submit" class="btn btn-info" value="update">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default" >
	<div class="panel-heading">Manage Emails</div>
	<div class="panel-body">
		<div class="main-box no-header clearfix">
			<div class="main-box-body clearfix">
				<div class="table-responsive">
					<form name="emailsSelec" action="../../src/handlers/managementContentHandler.php?a=changeEmail&p=<?php echo $pageToReturn; ?>&param=t&t=6" method="post" enctype="multipart/form-data">
						<label for="email1">Who's going to send the emails? </label>
						<input type="email" class="form-control" id="email1" name="email1" value="<?php echo $email1; ?>" required>
						<label for="email2">Who's going to receive emails from the CONTACT form? </label>
						<input type="email" class="form-control" id="email2" name="email2" value="<?php echo $email2; ?>" required>
						<label for="email3">Who's going to receive emails from the CAREER form?</label>
						<input type="email" class="form-control" id="email3" name="email3" value="<?php echo $email3; ?>" required>
						<input type="submit" class="btn btn-info" value="update">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

