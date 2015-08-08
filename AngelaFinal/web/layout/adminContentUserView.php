<?php 
require_once('../../src/config.php');
require_once('../../src/Session.php');
require_once DIR_MOD.'user.php';
require_once DIR_VIE.'userView.php';
$session = new Session();
$userView = new UserView();
$value = isset($_GET['a']) ? $_GET['a'] : '';
$user = $userView->searchUsers("id",$value,'1');

$return = '<div class="row">
	<div class="container">
		<div class="col-xs-9 col-md-6 ">
			
			<ul class="nav nav-tabs">
				<li class="active"><a href="#profile" data-toggle="tab"><i class="icon-briefcase"></i>Profile</a></li>
				<li><a href="#wardrobe" data-toggle="tab">Wardrobe</a></li>
			
			</ul>
			<div class="tab-content" >
				<div class="tab-pane fade in active" id="profile">						
					<div class="row">
						<div class="col-xs-2 col-md-6">
							<div class="form-group">
							 	<label for="firstName">First Name:</label>
							 	<input type="text" class="form-control" id="firstName" name="firstName" value="'.$user->getFirstName().'">
							</div>
						</div>
						<div class="col-xs-2 col-md-6">
							<div class="form-group">
							  <label for="lastName">Last Name:</label>
							  <input type="text" class="form-control" id="lastName" name="lastName" value="'.$user->getLastName().'">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2 col-md-6">
							<div class="form-group">
							  <label for="address">Address:</label>
							  <input type="text" class="form-control" id="address" name="address" value="'.$user->getAddress().'">
							</div>
						</div>
						<div class="col-xs-2 col-md-6">
							<div class="form-group">
							  <label for="pcode">Postal Code:</label>
							  <input type="text" class="form-control" id="pcode" name="pcode" value="'.$user->getPostalCode().'">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2 col-md-6">
							<div class="form-group">
							  <label for="city">City:</label>
							  <input type="text" class="form-control" id="city" name="city" value="'.$user->getCity().'">
							</div>
						</div>
						<div class="col-xs-2 col-md-6">
							<div class="form-group">
							  <label for="province">Province:</label>
							  <input type="text" class="form-control" id="province" name="province" value="'.$user->getProvince().'">
							</div>
						</div>
					</div>								
				</div>

				<div class="tab-pane" id="wardrobe">
				</div>
			</div>
		</div>
	</div>			
</div>
';

echo $return;

?>