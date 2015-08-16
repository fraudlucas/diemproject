<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'messageView.php');
	require_once (DIR_VIE.'userView.php');
	$session = new Session();
	$userView = new UserView();
	$user = $userView->searchUsers("id",$_SESSION['userID'],'1');

	$currentUser = $_SESSION['userID'];

	$messageView = new MessageView();
	$amountUnreadMessages = $messageView->amountUnreadMessagesByToUserID($currentUser);

	$pageToReturn = 'userLooks'; // Will be used by the adminMessages

	$activeTab = isset($_GET['t']) ? $_GET['t'] : 0; // Indicate which tab must be activated
	$activeClass2 = '';
	$activeClass3 = '';
	switch ($activeTab) {
		case 3:
			$activeClass3 = 'active';
			break;
		default:
			$activeClass2 = 'active';
			break;
	}
?>
<html lang="en">
<head>
	<?php include( DIR_LAY.'headPages.php');?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head> 
<body>  
	<?php include( DIR_LAY.'modalBook.php');?>
	<div id="wrapper">
		<?php 
		if(isset($_SESSION['role'])){
			if ($_SESSION['role']==1){
				header('Location: ../../index.php') ;
			}elseif($_SESSION['role']==2){
				include( DIR_LAY.'headerUserPages.php') ;
			}
		}else{
			header('Location: ../../index.php') ;
		}
		?>
		
		
	<!-- Begin Drag and Drop -->
        <style>
            #div1, #div2 {width:350px;height:230px;padding:3px;border:1px solid #aaaaaa;}
        </style>
        <script>
			var looks;
			var aux=0;
            function allowDrop(ev) {
				ev.preventDefault();
			}
		
			function drag(ev) {
				ev.dataTransfer.setData("text", ev.target.id);
			}
		
			function drop(ev) {
				ev.preventDefault();
				var data = ev.dataTransfer.getData("text");
				ev.target.appendChild(document.getElementById(data));
				if (aux==0){
					$("#clothe1").val(data);
					aux=1;
				}else{
					$("#clothe2").val(data);
					aux=0;
				}
				
			}
			
			function drop2(ev) {
				ev.preventDefault();
				var data = ev.dataTransfer.getData("text");
				ev.target.appendChild(document.getElementById(data));
				looks = jQuery.grep(y, function(value) {
				  return value != data;
				});	
			}
			
			
		</script>
        <!--Drag and Drop End -->
        <!--header end-->
       <section id="inner-headline">
		<div class="container" style="margin-top:100px">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
						<li><a href="#">User</a><i class="icon-angle-right"></i></li>
						<li class="active">Wardrobe</li>
					</ul>
				</div>
			</div>
		</div>
		</section>
		<div class="row" style="margin-top:30px">
			<div class="col-xs-3 col-md-2">
				<nav class="navbar-default"  role="navigation">
					<ul class="nav nav-pills nav-stacked">
					  <li>
						<img src="../../<?php echo $user->getPicture(); ?>" class="img-responsive" width="300px" height="400px"> 
						<li role="presentation"><a href="../pages/userHome.php">Profile</a></li>
						<li role="presentation"><a href="../pages/userWardrobe.php">Wardrobe</a></li>
						<li role="presentation"><a href="../pages/userCollections.php">Collections</a></li>
						<li role="presentation" class="active"><a href="../pages/userLooks.php">Create Looks</a></li>
						<!-- <li role="presentation"><a href="#">My Wish List</a></li> -->
						<li role="presentation"><a href="../pages/userStylists.php">Stylists</a></li>
						<li role="presentation"><a href="../pages/userMessages.php">Messages <span class="badge"><?php echo $amountUnreadMessages; ?></a></li>
					</ul>
				</nav>
			</div>	
			<div class="row">
				<div class="container">
					<div class="col-xs-18 col-md-12">
						<div class="row">

							<div class="col-lg-12">
								<h1 class="page-header">Looks</h1>
							</div>
        <!--container start-->
        <!-- privacy -->
        <div class="section">
            <div class="container">
                <div class="row">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#create" data-toggle="tab"><i class=""></i>Create Looks</a></li>
						<li class=""><a href="#list" data-toggle="tab">Looks List</a></li>
					</ul>
					<div class="tab-content" >
						<div class="tab-pane fade in active" id="create">					
							<div class="col-md-12">
								<div class="section">
									<div class="container">
										<div class="row">
											<div class="col-md-5">
												<div class="col-md-12">
													<!-- Drag and drop begins -->
													<center>
														<p class="lead text-center text-muted">Top</p>
														<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
														<br>
														<p class="lead text-center text-muted">Bottom</p>
														<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
													   <form method="POST" action="../../src/handlers/looksHandler.php?a=clothesAdd">
															<input type="hidden" name="clothe1" id="clothe1" value="">
															<input type="hidden" name="clothe2" id="clothe2" value="">
														   <center>
																<input type="Submit" class="btn btn-primary" value ="Save">
																<!-- Begins drag and drop -->
															</center>
														</form>
													</center>
													<div class="col-md-12 text-right">
														<center>
															<a  href="userLooks.php" class="btn btn-danger">Clear</a>
															<!-- Begins drag and drop -->
														</center>
													</div>
													<br>
												</div>
											</div>
											<div class="col-md-7">
												<p class="lead text-center text-muted">Top Pieces</p>
												<div class="row">
													<ul class="nav nav-tabs">
														<li class="active"><a href="#Wardrobe" data-toggle="tab"><i class=""></i>Wardrobe</a></li>
														<li class=""><a href="#Collections" data-toggle="tab">New Collections</a></li>
													</ul>
													<div class="tab-content" >
														<div class="tab-pane fade in active" id="Wardrobe">						
															<div class="mThumbnailScroller" id="my-thumbs-list" data-mts-axis="x">
																<!-- Axis horizontal. Change to y to make it vertical-->
																<div id="my-thumbs-list" ondrop="drop2(event)" ondragover="allowDrop(event)">
																	<ul>
																		<!-- TOP clothes' pictures list -->
																	   <?php include( DIR_LAY.'tabLooksTop.php');?>
																	</ul>
																	<!-- List style's -->
																	<style>
																		#my-thumbs-list{
																		  overflow: auto;
																		  width: 650px;
																		  height: 150px; }
																	</style>
																</div>
															</div>												
														</div>
													</div>			                          
												</div>
											 
												<p class="lead text-center text-muted">Bottom Pieces</p>
												<div class="row">
													<ul class="nav nav-tabs">
														<li class="active"><a href="#Wardrobe2" data-toggle="tab"><i class=""></i>Wardrobe</a></li>
														<li class=""><a href="#Collections2" data-toggle="tab">New Collections</a></li>
													</ul>
													<div class="tab-content">
														<div class="tab-pane fade in active" id="Wardrobe2">		
															<div id="my-thumbs-list" class="mThumbnailScroller" data-mts-axis="x">
																<div id="my-thumbs-list" ondrop="drop2(event)" ondragover="allowDrop(event)">
																	<ul>
																		<!-- BOTTOM clothes' pictures list -->
																	   <?php include( DIR_LAY.'tabLooksBottom.php');?>
																	</ul>
																	<!-- again, style -->
																	<style>
																		#my-thumbs-list{
																		  overflow: auto;
																		  width: 650px;
																		  height: 150px; }
																	</style>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="list">	
							<div>
								<?php include( DIR_LAY.'tabLooksList.php');?>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
		</div>
                </div>
            </div>
        </div>
        <!--container end-->
       
       <!--footer start-->
        <?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
		<!--footer ends-->
		</body>

</html>