<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once DIR_MOD.'user.php';
	require_once DIR_VIE.'userView.php';
	$session = new Session();
	$userView = new UserView();
	$value = $_GET['a'];
	$user = $userView->searchUsers("id",$value,'1');
?>
<html lang="en">
<head>
	<?php include( DIR_LAY.'headPages.php');?>
</head>
<body>
<div class="row">
	<div class="container">
		<div class="col-xs-18 col-md-12 ">
			
			<ul class="nav nav-tabs">
				<li class="active"><a href="#profile" data-toggle="tab"><i class="icon-briefcase"></i>Profile</a></li>
				<li><a href="#bodym" data-toggle="tab">Body Measures</a></li>
				<li><a href="#wardrobe" data-toggle="tab">Wardrobe</a></li>
				<li><a href="#suggestion" data-toggle="tab">Send Suggestion</a></li>
				<li><a href="#message" data-toggle="tab">Messages</a></li>
			
			</ul>
			<div class="tab-content" >
				<div class="tab-pane fade in active" id="profile">						
							<form role="form" action="../../src/handlers/userHandler.php?a=updateUser" method="post">
				<div class="row">
					<div class="col-xs-6 col-md-4">
						<div class="form-group">
						  <label for="firstName">First Name:</label>
						  <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo  $user->getFirstName();?> ">
						</div>
					</div>
					<div class="col-xs-6 col-md-4">
						<div class="form-group">
						  <label for="lastName">Last Name:</label>
						  <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo  $user->getLastName();?> ">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-4">
						<div class="form-group">
						  <label for="address">Address:</label>
						  <input type="text" class="form-control" id="address" name="address" value="<?php echo  $user->getAddress();?> ">
						</div>
					</div>
					<div class="col-xs-6 col-md-4">
						<div class="form-group">
						  <label for="pcode">Postal Code:</label>
						  <input type="text" class="form-control" id="pcode" name="pcode" value="<?php echo  $user->getPostalCode();?> ">
						</div>
					</div>
					<div class="col-xs-4 col-md-2">
						<div class="form-group">
						  <label for="city">City:</label>
						  <input type="text" class="form-control" id="city" name="city" value="<?php echo  $user->getCity();?> ">
						</div>
					</div>
					<div class="col-xs-4 col-md-2">
						<div class="form-group">
						  <label for="province">Province:</label>
						  <input type="text" class="form-control" id="provin" name="province" value="<?php echo  $user->getProvince();?> ">
						</div>
					</div>
					<div class="col-xs-4 col-md-2">
						<div class="form-group">
						  <label for="province">User Role:</label>
						  <input type="text" class="form-control" id="provin" name="province" value="<?php echo  $user->getAdministratorID();?> ">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="container">
					<div class="col-xs-4 col-md-4"></div>
					<div class="col-xs-2 col-md-2">
						<button type="submit"  class="btn btn-theme pull-right">Update</button>
					</div>
				
					</div>
				</div>
			</form>								
				</div>
				<div class="tab-pane" id="bodym">
					
				</div>
				<div class="tab-pane" id="wardrobe">
					
				</div>	
				<div class="tab-pane" id="suggestion">
					
				</div>	
			</div>
		</div>
	</div>			
</div>
</body>
</html>