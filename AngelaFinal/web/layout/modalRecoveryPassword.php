<?php
	//require_once('src/config.php');
	//require_once('src/Session.php');
	//require_once DIR_MOD.'user.php';
	//require_once DIR_VIE.'userView.php';
	
    $recoveryAction = ($flag_header_action ? '../../' : '');

?>

<div id="myRecovery" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Password Recovery</h4>
            </div>
            <div class="modal-body">
    			<form role="form" action="<?php echo $recoveryAction; ?>src/handlers/userHandler.php?a=recoveryPassword" method="post">
    				
    				<label for="address">Email:</label>
    				<input type="email" class="form-control" id="emailReco" name="email" value="" onkeydown="checkPassReco();" required="TRUE">

    				<label for="address">Confirm Email:</label>
    				<input type="email" class="form-control" id="email2Reco" name="email2" placeholder="Confirm Email" onkeyup="checkPassReco(); return false;" value="" required="TRUE">
    				<span id="confirmMessageReco" class="confirmMessage"></span>		
    						
    				<br>
    				<input type="submit" id="Update" name="Update" value="Send Email" class="btn btn-info pull-right disabled ">

    			</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
	</div>
</div>			
	
<script>
function checkPassReco()
{
    
	var button =  document.getElementById('Update');
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('emailReco');
    var pass2 = document.getElementById('email2Reco');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessageReco');
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

