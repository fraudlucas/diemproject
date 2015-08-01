<?php	
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'userView.php');
	
	$userView = new UserView();

	$code = '';
	$count = 0;
	foreach ($list as $row) {
		$path = $row->getPathPhoto();
		$id = $row->getIdPhoto();
		$subtitle = $row->getSubtitle();	
		$status = $row->getActive();
		
		if($status == 1){
			$code .='<div class="col-md-4">
						<div class="radio">
						<label><input type="radio"  id="'.$id.'" name="opt"></label>
						<a href="#" class="thumbnail">
							<label for="'.$id.'"><img class="img-responsive" src="../../'.$path.'" style="width:150px;height:150px"></label>
						</a>
						</div>
					</div>';
		}elseif($status==0){
			$code .='<div class="col-md-4">
						<input type="checkbox"  id="'.$id.'" name="opt" style="margin-left: 70px; " value="Yes" checked>
						<a href="#" class="thumbnail">
							<label for="'.$id.'"><img class="img-responsive" src="../../'.$path.'" style="width:150px;height:150px; opacity: 0.4;"></label>
						</a>
					</div>';
		}
		
	}
?>	
	<form role="form" action="../../src/handlers/userHandler.php?a=updateUser" method="post">
				<div class="row">
					<div class="col-xs-9 col-md-6">
						<div class="form-group">
						  <label for="firstName">First Name:</label>
						  <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $_SESSION['fname'];?> ">
						</div>
					</div>
					<div class="col-xs-9 col-md-6">
						<div class="form-group">
						  <label for="lastName">Last Name:</label>
						  <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $_SESSION['lname'];?> ">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-4">
						<div class="form-group">
						  <label for="address">Address:</label>
						  <input type="text" class="form-control" id="address" name="address">
						</div>
					</div>
					<div class="col-xs-6 col-md-4">
						<div class="form-group">
						  <label for="pcode">Postal Code:</label>
						  <input type="text" class="form-control" id="pcode" name="pcode">
						</div>
					</div>
					<div class="col-xs-4 col-md-2">
						<div class="form-group">
						  <label for="city">City:</label>
						  <input type="text" class="form-control" id="city" name="city">
						</div>
					</div>
					<div class="col-xs-2 col-md-2">
						<div class="form-group">
						  <label for="province">Province:</label>
						  <input type="text" class="form-control" id="provin" name="province">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-16 col-md-10"></div>
					<div class="col-xs-2 col-md-2">
						<button type="submit"  class="btn btn-theme pull-right">Next</button>
					</div>
				</div>
			</form>