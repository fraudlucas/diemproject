
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
                    <a class="navbar-brand" href="index.php">
						<img src="web/assets/images/logo2.png">
					</a>
                </div>
                <div class="navbar-collapse collapse " id="navbar-main">
					
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
						<li><a href="./web/pages/adminHome.php">Profile</a></li>
                        <li><a href="http://projectblog.byethost12.com/wp/" >Blog</a></li>
                        <li><a href="./web/pages/contact.php" >Contact</a></li>
						<li>
							<form class="navbar-form"  action="src/handlers/userHandler.php?a=logout" method="post">
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
