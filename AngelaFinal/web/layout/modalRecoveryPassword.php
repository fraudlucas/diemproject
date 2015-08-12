<?php
	//require_once('src/config.php');
	//require_once('src/Session.php');
	require_once DIR_MOD.'user.php';
	require_once DIR_VIE.'userView.php';
	

?>

<div class="modal fade" id="myRecovery" role="dialog">
    <div class="modal-dialog">		
			<form role="form" action="../../src/handlers/userHandler.php?a=recoveryPassword" method="post">
				
				<label for="address">Email:</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo  $user->getEmail();?> " onkeydown="checkPass();" required="TRUE">

				<label for="address">Confirm Email:</label>
				<input type="email" class="form-control" id="email2" name="email2" placeholder="Confirm Email" onkeyup="checkPass(); return false;" value="" required="TRUE">
				<span id="confirmMessage" class="confirmMessage"></span>		
						
				<br>
				<input type="submit" id="Update" name="Update" value="Send Email" class="btn btn-info pull-right disabled ">

			</form>
	</div>
</div>			
	
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
    if(pass1.value == pass2.value){
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

