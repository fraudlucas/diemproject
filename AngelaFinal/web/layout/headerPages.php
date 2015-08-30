<?php 
require_once('../../src/config.php');
require_once (DIR_VIE.'managementContentView.php');

$layoutManagementContentView = new ManagementContentView();
$logo = $layoutManagementContentView->searchLogo()->getLogo();
$flag_header_action = true;

$blog = $layoutManagementContentView->searchContent('pageId','11','1')->getContent();

$msg =  "";
if (!empty($action)) {
  //  $msg = $action;
    $msg = '<div class="alert alert-danger"><strong>'. $action .'</strong></div>  ';
}
?>
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../../index.php">
						<img src="../../<?php echo $logo; ?>">
					</a>
                </div>
                <div class="navbar-collapse collapse " id="navbar-main">
					<div>
						<button class="btn btn-theme" Style=" transform: rotate(90deg); cursor: pointer; right:-57px; top:0px; margin-top:350px; z-index:999997; position:fixed;" data-direction='left' data-toggle="modal" data-target="#myBook">Book Appointment</button> 
					</div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="../../index.php">Home</a></li>
                        <li class="dropdown" >
                            <a href="#" id="dropdownactive" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">About <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../pages/aboutUS.php">About US</a></li>
                                <li><a href="../pages/ourTeam.php">Our Team</a></li>
								<li><a href="../pages/testimonials.php">Testimonials</a></li>
								<li><a href="../pages/privacy-policy.php">Privacy Policy</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" >
                            <a href="#" id="dropdownactive" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Collections <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../pages/readyToWear.php">Ready to Wear</a></li>
                                <li><a href="../pages/madeToMeasure.php">Made to Measure</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo $blog; ?>" >Blog</a></li>
                        <li><a href="../pages/contact.php">Contact</a></li>
						<li>
							<form class="navbar-form navbar-right"   action="../../src/handlers/userHandler.php?a=login" method="post">
								<div class="form-group" >
									<input type="email" class="form-control" style="width:150px" name="email" required placeholder="email">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" style="width:150px" name="password" required placeholder="Password">
								</div>
								<div class="form-group">
									<button type="submit" style="width:80px" class="btn btn-theme">Sign In</button>
								</div>
								<div class="form-group">
									<div data-toggle="modal" data-target="#myModal">
										<button type="button" style="width:80px" class="btn btn-theme">Register</button>
									</div>
								</div>
							</form>
						</li>
                        <li class="dropdown" >
                            <a href="#" title="Forgot your password?" data-toggle="modal" data-target="#myRecovery">
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="" href="#" data-toggle="modal" data-target="#myRecovery">Forgot your Password?</a></li>
                            </ul>
                        </li>
                    </ul>					
                </div>
                <?php echo $msg; $_SESSION['msgUser'] = ""; ?>
            </div>
        </div>
		</div>
	</header>
	<!-- end header -->


<?php include (DIR_LAY.'modalRecoveryPassword.php'); ?>
<?php include( DIR_LAY.'modalRegister.php');?>