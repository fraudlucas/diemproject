<html>

<head>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
		<form class="" action="./src/handlers/userHandler.php?a=registration" method="post">
			<div class="modal-body">					
				<div class="row">
				  <div class="col-xs-6 form-group">
					<label class="control-label" for="firstName">First Name</label>
					<input type="text" class="form-control" id="firstName" name="firstName" aria-describedby="inputSuccess4Status">				
				  </div>				 
				  <div class="col-xs-6 form-group">
					<label class="control-label" for="lastName">Last Name</label>
					<input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="inputSuccess4Status">
				  </div>
				</div>
				<div class="row">
					<div class="col-xs-12 form-group">
						<label class="control-label" for="lastName">Email</label>
						<input type="email" class="form-control" id="email" name="email" aria-describedby="inputSuccess4Status">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 form-group">
						<label class="control-label" for="lastName">Password</label>
						<input type="password" class="form-control" id="password" name="password"aria-describedby="inputSuccess4Status">
					</div>
				</div>
			</div>
			<center><div class="g-recaptcha" data-sitekey="6Lef-AoTAAAAAGuq8NANMj1uX-T-VcKwvk1k23lb"></div></center><br>
			<div class="modal-footer form-group">
			   <center><button type="submit" class="btn btn-default" >Register</button></center>
			</div>
		</form>
      </div>
      
    </div>
  </div>

  </html>
