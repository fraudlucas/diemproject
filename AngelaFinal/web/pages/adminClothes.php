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

	$pageToReturn = 'adminClothes';

	$activeTab = isset($_GET['t']) ? $_GET['t'] : 0; // Indicate which tab must be activated
	$activeClass1 = '';
	$activeClass2 = '';
	$activeClass3 = '';
	$activeClass4 = '';
	switch ($activeTab) {
		case 2:
			$activeClass2 = 'active';
			break;
		case 3:
			$activeClass3 = 'active';
			break;
		case 4:
			$activeClass4 = 'active';
			break;
		default:
			$activeClass1 = 'active';
			break;
	}
	/*
	*
	*/
?>
<html lang="en">
<head>
	<?php include( DIR_LAY.'headPages.php');?>
</head>
<body>
<?php include( DIR_LAY.'modalBook.php');?>
	<div id="wrapper">
		<?php 
		if(isset($_SESSION['role'])){
			if ($_SESSION['role']==2){
				header('Location: ../../index.php') ;
			}elseif($_SESSION['role']==1){
				include( DIR_LAY.'headerAdminPages.php') ;
			}
		}else{
			header('Location: ../../index.php') ;
		}
		?>
		<section id="inner-headline">
		<div class="container" style="margin-top:100px">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
						<li><a href="#">Administration</a><i class="icon-angle-right"></i></li>
						<li class="active">Clothes</li>
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
						<img src="../../<?php echo $user->getPicture(); ?>" class="img-responsive" width="300px" height="400px"> </li>
					  <li role="presentation"><a href="../pages/adminHome.php">Profile</a></li>
					  <li role="presentation" ><a href="../pages/adminManagement.php">Manage Website</a></li>
					  <li role="presentation" ><a href="../pages/adminClients.php">Clients</a></li>
					  <li role="presentation" class="active"><a href="../pages/adminClothes.php">Clothes</a></li>
					  <li role="presentation"><a href="../pages/adminStaff.php">Staff</a></li>
					  <li role="presentation"><a href="../pages/adminMessages.php">Messages <span class="badge"><?php echo $amountUnreadMessages; ?></span></a></li>
					</ul>
				</nav>
			</div>		
			<div class="row">
				<div class="container responsive">
					<div class="col-xs-18 col-md-12">
						<h4>Clothes</h4>
						<ul class="nav nav-tabs responsive">
							<li class="test-class <?php echo $activeClass1; ?>"><a href="#list" data-toggle="tab"><i class="icon-briefcase"></i>Clothes List</a></li>
							<li class="test-class <?php echo $activeClass2; ?>"><a href="#add" data-toggle="tab">Add Clothes</a></li>
							<li class="test-class <?php echo $activeClass3; ?>"><a href="#listTag" data-toggle="tab">List Tags</a></li>
							<li class="test-class <?php echo $activeClass4; ?>"><a href="#addTag" data-toggle="tab">Add Tags</a></li>
						</ul>
						<div class="tab-content responsive" >
							<div class="tab-pane responsive fade in <?php echo $activeClass1; ?>" id="list">
								<div class="col-xs-18 col-md-12" style="height:100% overflow-y:auto">
									<div class="row">
										<select name="filter" id="filter" class="form-control pull-right">
											<option value="0">All</option>}
											<?php include( DIR_LAY.'listTags.php') ;?>
										</select>
									</div>
									<div class="row">
										<?php include( DIR_LAY.'listClothes.php') ;?>
									</div>
								</div>
							</div>
							
							<div class="tab-pane responsive <?php echo $activeClass2; ?>" id="add">
								<div class="row">
									<div class="col-xs-18 col-md-12">
										<form role="form" action="../../src/handlers/clothesHandler.php?a=clothesAdd&p=<?php echo $pageToReturn; ?>&param=t&t=2" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
													  <label for="code">Code:</label>
													  <input type="text" class="form-control" id="code" name="code" required>
													</div>
												</div>
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
													  <label for="price">Price:</label>
													  <input type="text" class="form-control" id="price" name="price" required>
													</div>
												</div>
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
													  <label for="fileToUpload">File:</label>
													  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
														<label for="tag">Tags:</label>
														<select class="form-control" id="tag" name="tag">
															<?php include( DIR_LAY.'listTags.php') ;?>
														</select>
													</div>
												</div>
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
														<label for="customized">Customized:</label>
														<select class="form-control" name="customized" id="customized">
															<option value="1">Yes</option>
															<option value="2">No</option>
														</select>

													</div>
												</div>
												<div class="col-xs-6 col-md-3">
													<div class="form-group">
														<label for="type">Type:</label>
														<select class="form-control" name="type" id="type">
															<option value="1">Top</option>
															<option value="2">Bottom</option>
															<option value="3">Dress</option>
														</select>

													</div>
												</div>
												<div class="col-xs-2 col-md-1">
												<!-- 	<input type="hidden" name="target_dir" id="target_dir" class="form-control" value="web/assets/img/clothes/"> -->
													<button type="submit"  style="margin-top: 30px;"class="btn btn-theme pull-right" id="upload">Upload</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>	
							<div class="tab-pane responsive <?php echo $activeClass3; ?>" id="listTag">
								<table class="table user-list">
									<thead>
										<tr>
											<th><span> Tag Name</span></th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<?php include( DIR_LAY.'listTags2.php');?>
									</tbody>
								</table>
							</div>
							<div class="tab-pane responsive <?php echo $activeClass4; ?>" id="addTag">
								<div class="row">
									<div class="col-xs-18 col-md-12">
										<form role="form" action="../../src/handlers/tagsHandler.php?a=tagsAdd&p=<?php echo $pageToReturn; ?>&param=t&t=4" method="post">
											<div class="row">
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
														<label for="tagName">Tag Name:</label>
														<input type="text" class="form-control" id="tagName" name="tagName">
													</div>
												</div>
												<div class="col-xs-2 col-md-2">
													<button type="submit"  style="margin-top: 30px;"class="btn btn-theme pull-right" id="customized">Add</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>			
			</div>
		</div>
	</div>
	<script>
		(function($) {
			fakewaffle.responsiveTabs(['xs', 'sm']);
		})(jQuery);
	</script>
	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
	<script src="../assets/js/responsive-tabs.js"></script>
</body>
</html>
 