<?php 



?>

<script>
	
</script>


<!-- Modal -->
	<div id="addStaffModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Staff</h4>
				</div>
				<div class="modal-body">
					<form action="../../src/handlers/userHandler.php?a=addStaff&p=<?php echo $pageToReturn; ?>" method="post" class="form-horizontal">

						<label for="firstName">First Name:</label>
						<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required="TRUE">
						
						<label for="lastName">Last Name:</label>
						<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required="TRUE">
						
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="TRUE">

						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="TRUE">

						<label for="password2">Confirm Password:</label>
						<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" onkeyup="checkPass(); return false;" required="TRUE">
						<span id="confirmPasswordMessage" class="confirmMessage"></span>

						<br>
						<input type="submit" id="add" name="add" value="Add" class="btn btn-info pull-right disabled">

					</form>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<script>

	function checkPass()
	{
	    
		var button =  document.getElementById('add');
	    //Store the password field objects into variables ...
	    var pass1 = document.getElementById('password');
	    var pass2 = document.getElementById('password2');
	    //Store the Confimation Message Object ...
	    var message = document.getElementById('confirmPasswordMessage');
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
	       	button.className = "btn btn-info pull-right enable";
	    	
	    }else{
	        //The passwords do not match.
	        //Set the color to the bad color and
	        //notify the user.
	        pass2.style.backgroundColor = badColor;
	        message.style.color = badColor;
	        button.className = "btn btn-info pull-right disabled";
	        //message.innerHTML = "Passwords Do Not Match!"
	       
	    }
	// minhas alteracoes
	}

	</script>