
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
                    <a class="navbar-brand" href="index.html">
						<img src="../assets/images/logo2.png">
					</a>
                </div>
                <div class="navbar-collapse collapse " id="navbar-main">
					<div>
						<button class="btn btn-theme" Style=" transform: rotate(90deg); cursor: pointer; right:-57px; top:0px; margin-top:350px; z-index:999997; position:fixed;" data-direction='left' data-toggle="modal" data-target="#myModal")">Book Appointment</button> 
					</div>
					
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
						<li><a href="index.php">Profile</a></li>
                        <li class="dropdown" >
                            <a href="#" id="dropdownactive" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">About <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="">About US</a></li>
                                <li><a href="">Our Team</a></li>
								<li><a href="">Testimonials</a></li>
								<li><a href="">Privacy Policy</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" >
                            <a href="#" id="dropdownactive" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Collections <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="typography.html">Ready to Wear</a></li>
                                <li><a href="components.html">Made to Measure</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html" >Blog</a></li>
                        <li><a href="contact.html" >Contact</a></li>
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
