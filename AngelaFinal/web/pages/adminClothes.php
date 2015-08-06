<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'messageView.php');
	$session = new Session();

	$currentUser = $_SESSION['userID'];

	$messageView = new MessageView();
	$amountUnreadMessages = $messageView->amountUnreadMessagesByToUserID($currentUser);
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
						<img src="../assets/images/profilepicture.jpg" class="img-responsive" width="300px" height="400px"> 
					  <li role="presentation"><a href="../pages/adminHome.php">Profile</a></li>
					  <li role="presentation" ><a href="../pages/adminManagement.php">Manage Website</a></li>
					  <li role="presentation" ><a href="../pages/adminClients.php">Clients</a></li>
					  <li role="presentation" class="active"><a href="../pages/adminClothes.php">Clothes</a></li>
					  <li role="presentation"><a href="../pages/adminStaff.php">Staff</a></li>
					  <li role="presentation"><a href="../pages/adminMessages.php">Messages <span class="badge"><?php echo $amountUnreadMessages; ?></a></li>
					</ul>
				</nav>
			</div>		
			<div class="row">
				<div class="container">
					<div class="col-xs-18 col-md-12">
						<h4>Clothes</h4>
						<ul class="nav nav-tabs">
							<li class="active"><a href="#list" data-toggle="tab"><i class="icon-briefcase"></i>Clothes List</a></li>
							<li><a href="#add" data-toggle="tab">Add Clothes</a></li>
							<li><a href="#listTag" data-toggle="tab">List Tags</a></li>
							<li><a href="#addTag" data-toggle="tab">Add Tags</a></li>
						</ul>
						<div class="tab-content" >
							<div class="tab-pane fade in active" id="list">
								<div class="col-xs-18 col-md-12" style="height:100% overflow-y:auto">
									<div class="row">
										<?php include( DIR_LAY.'listClothes.php') ;?>
									</div>
								</div>
							</div>
							
							<div class="tab-pane" id="add">
								<div class="row">
									<div class="col-xs-18 col-md-12">
										<form role="form" action="../../src/handlers/userHandler.php?a=updateUser" method="post">
											<div class="row">
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
													  <label for="code">Code:</label>
													  <input type="text" class="form-control" id="code" name="code">
													</div>
												</div>
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
													  <label for="price">Price:</label>
													  <input type="text" class="form-control" id="price" name="price">
													</div>
												</div>
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
													  <label for="fileToUpload">File:</label>
													  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
														<label for="tag">Tags:</label>
														<select class="form-control" id="tag">
															<?php include( DIR_LAY.'listTags.php') ;?>
														</select>
													</div>
												</div>
												<div class="col-xs-6 col-md-4">
													<div class="form-group">
														<label for="customized">Customized:</label>
														<select class="form-control" id="customized">
															<option>Yes</option>
															<option>No</option>
														</select>
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
							<div class="tab-pane" id="listTag">
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
							<div class="tab-pane" id="addTag">
								<div class="row">
									<div class="col-xs-18 col-md-12">
										<form role="form" action="../../src/handlers/tagsHandler.php?a=tagsAdd" method="post">
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
	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
	<script src="../assets/js/editor.js"></script>
</body>
</html>
 