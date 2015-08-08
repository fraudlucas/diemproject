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
		
			<form role="form" action="../../src/handlers/userHandler.php?a=updateUser" method="post">
				
						
						  <label for="firstName">First Name:</label>
						  <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo  $user->getFirstName();?> " required="TRUE">
					
					
						  <label for="lastName">Last Name:</label>
						  <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo  $user->getLastName();?> "  required="TRUE">
				
						  <label for="address">Email:</label>
						  <input type="email" class="form-control" id="email" name="email" value="<?php echo  $user->getEmail();?> " onkeydown="checkPass();" required="TRUE">

						  <label for="address">Comfirm Email:</label>
						  <input type="email" class="form-control" id="email2" name="email2" placeholder="Comfirm Email" onkeyup="checkPass(); return false;" value="" required="TRUE">
						  <span id="confirmMessage" class="confirmMessage"></span>

						  <label for="address">Address:</label>
						  <input type="text" class="form-control" id="address" name="address" placeholder="<?php echo  $user->getAddress();?> " value="" required="TRUE">
						
			
						  <label for="pcode">Postal Code:</label>
						  <input type="text" class="form-control" id="pcode" name="pcode" placeholder="<?php echo  $user->getPostalCode();?> " value="" required="TRUE">
					
				
				
						  <label for="city">City:</label>
						  <input type="text" class="form-control" id="city" name="city" placeholder="<?php echo  $user->getCity();?> " value="" required="TRUE">
						
						  <label for="province">Province:</label>
						  <input type="text" class="form-control" id="provin" name="province" placeholder="<?php echo  $user->getProvince();?> " value="" required="TRUE">
					
						
						 <br>
						 <input type="submit" id="Update" name="Update" value="Update" class="btn btn-info pull-right disabled ">
						
								
			</form>								
				
	
<script>
function checkPass()
{
    
	var button =  document.getElementById('Update');
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('email');
    var pass2 = document.getElementById('email2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(email.value == email2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
       /* message.innerHTML = "Correct Email!"*/
       	button.className = "btn btn-info pull-right enable ";
    	
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        button.className = "btn btn-info pull-right disabled ";
        //message.innerHTML = "Passwords Do Not Match!"
       
    }
// minhas alteracoes
}

</script>

