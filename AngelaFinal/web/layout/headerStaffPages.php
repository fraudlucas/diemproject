<?php 
// require_once('../../src/config.php');
require_once (DIR_VIE.'managementContentView.php');

$layoutManagementContentView = new ManagementContentView();
$logo = $layoutManagementContentView->searchLogo()->getLogo();

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
					
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="../../index.php">Home</a></li>
						<li><a href="../../web/pages/staffHome.php">Profile</a></li>
                        <li class="dropdown" >
                            <a href="#" id="dropdownactive" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">About <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../../web/pages/aboutUs.php">About US</a></li>
                                <li><a href="../../web/pages/ourTeam.php">Our Team</a></li> <!-- There is no page -->
								<li><a href="../../web/pages/testimonials.php">Testimonials</a></li>
								<li><a href="../../web/pages/privacy-policy.php">Privacy Policy</a></li> <!-- There is no page -->
                            </ul>
                        </li>
                        <li class="dropdown" >
                            <a href="#" id="dropdownactive" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Collections <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../../web/pages/readyToWear.php">Ready to Wear</a></li>
                                <li><a href="../../web/pages/madeToMeasure.php">Made to Measure</a></li>
                            </ul>
                        </li>
                        <li><a href="http://projectblog.byethost12.com/wp/" >Blog</a></li>
                        <li><a href="../../web/pages/contact.php" >Contact</a></li>
						<li>
							<form class="navbar-form"  action="../../src/handlers/userHandler.php?a=logout" method="post">
								<div class="form-group">
									<div>
										<button type="Submit" class="btn btn-theme">Logout</button>
									</div>
								</div>
							</form>
							
						</li>
                    </ul>					
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
