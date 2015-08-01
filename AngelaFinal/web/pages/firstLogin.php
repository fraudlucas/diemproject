<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	$session = new Session();
?>
<html lang="en">
<head>
	<?php include( DIR_LAY.'headPages.php');?>
</head>
<body>
	<div id="wrapper">
		<?php 
			if (!$session->isLoggedIn()){
				header('Location: ../../index.php') ;
			}else{
				include( DIR_LAY.'headerUserPages.php') ;
			}
		?>
		<div class="row">
			<div class="container">
				<div class="col-xs-18 col-md-12">
				  <h2>Form control: input</h2>
				  <p>The form below contains two input elements; one of type text and one of type password:</p>
				  
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
				</div>
			</div>
		</div>
	</div>		
	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
</body>
</html>
 