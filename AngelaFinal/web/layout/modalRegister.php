
<?php 

$recoveryAction = ($flag_header_action ? '../../' : '');

?>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
		<form class="" action="<?php echo $recoveryAction; ?>src/handlers/userHandler.php?a=registration" method="post">
			<div class="modal-body">					
				
					<label class="control-label" for="firstName">First Name</label>
					<input type="text" class="form-control" id="firstName" required name="firstName" aria-describedby="inputSuccess4Status">				
				 
					<label class="control-label" for="lastName">Last Name</label>
					<input type="text" class="form-control" id="lastName" required name="lastName" aria-describedby="inputSuccess4Status">
				  
					<label class="control-label" for="email">Email</label>
					<input type="email" class="form-control" id="email" required name="email" aria-describedby="inputSuccess4Status">
				
					<label class="control-label" for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password"aria-describedby="inputSuccess4Status" onkeydown="checkPass();" required="TRUE">

					<label class="control-label" for="password2">Confirm password</label>
					<input type="password" class="form-control" id="password2" name="password2"aria-describedby="inputSuccess4Status" onkeyup="checkPass(); return false;" value="" required="TRUE">
			
			</div>
			
			<center><p><b>Captcha:</b></p></center>
			<center><img src="<?php echo $recoveryAction; ?>web/layout/captcha.php" /></center>
			<center><p><b>Please, type the code:</b><br><input type="text" name="codigo" required ></p></center>
			<br>
			   		<center><button type="submit" class="btn btn-info">Register</button></center>
			   <br>
			</div>
		</form>
      </div>
      
    </div>
  </div>

<script>
function checkPass()
{
    
	var button =  document.getElementById('Update');
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password2');
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

}

</script>


