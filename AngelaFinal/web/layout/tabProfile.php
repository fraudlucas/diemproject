<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once DIR_MOD.'user.php';
	require_once DIR_VIE.'userView.php';
	
	$userView = new UserView();
	$value = $_SESSION['userID'];
	$user = $userView->searchUsers("id",$value,'1');
	$status  = $user->getAdministratorID();
	//var_dump($user);
	$status =  "1";
	
	switch ($status) {
		case '1':
			$role = "Administrator";
			break;
		case '2':
			$role= "Client";
			break;
		case '3':
			$role = "Staff";
			break;
	}

?>

<div class="row">
	<div class="container">
		<div class="tab-pane fade in active" id="profile">						
			<form role="form" action="../../src/handlers/userHandler.php?a=updateUser" method="post">
				<div class="row">
					<div class="col-xs-6 col-md-4">
						<div class="form-group">
						  	<h3 id="fullName"><?php echo  $user->getFirstName() . $user->getLastName()?></h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 col-md-4">
						<div class="form-group">
						  <label for="address">Email:</label>
						  <p id="adress"><?php echo  $user->getEmail();?></p>
						</div>
					</div>
					<div class="col-xs-2 col-md-4">
						<div class="form-group">
						  <label for="address">Address:</label>
						  <p id="adress"><?php echo  $user->getAddress();?></p>
						</div>
					</div>
					<div class="col-xs-2 col-md-4">
						<div class="form-group">
						  <label for="pcode">Postal Code:</label>
						  <p id="postalCode"><?php echo  $user->getPostalCode();?></p>
						</div>
					</div>
					<div class="col-xs-2 col-md-2">
						<div class="form-group">
						  <label for="city">City:</label>
						 <p id="city"><?php echo  $user->getCity();?></p>
						</div>
					</div>
					<div class="col-xs-2 col-md-2">
						<div class="form-group">
						  <label for="province">Province:</label>
						  <p id="province"><?php echo  $user->getProvince();?></p>
						</div>
					</div>
					<div class="col-xs-2 col-md-2">
						<div class="form-group">
						  <label for="province">Status:</label>
						 <p id="status"><?php echo $role;?></p>
						</div>
					</div>
				</div>
			</form>								
			<div>
				<a href="#" data-toggle="modal" data-target="#editUserProfileModal">
					<span class="fa-stack">
						<i class="fa fa-square fa-stack-2x"></i>
						<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			</div>

		</div>	
	</div>
</div>	

<!-- button edit -->
<!-- Modal -->
<div id="editUserProfileModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Message</h4>
			</div>
			<div class="modal-body">
				<?php include( DIR_LAY.'formUpdateUser.php');?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div> 	
