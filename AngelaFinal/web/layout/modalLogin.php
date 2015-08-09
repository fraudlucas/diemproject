<!-- Modal -->
  <div class="modal fade" id="loginmodal" role="dialog">
    <div class="modal-dialog">
    
    
     <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
		    </div>
		<form class="" action="./src/handlers/userHandler.php?a=registration" method="post">
			<div class="modal-body">					
				<div class="row">
					<div class="col-xs-12 form-group">
						<label class="control-label" for="login">Login</label>
						<input type="login" class="form-control" id="login" required name="login" aria-describedby="inputSuccess4Status">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 form-group">
						<label class="control-label" for="password">Password</label>
						<input type="password" class="form-control" id="password" required name="password"aria-describedby="inputSuccess4Status">
					</div>
				</div>
			</div>
			<div class="modal-footer form-group">
			   <button type="submit" class="btn btn-default" >Log in!</button>
			</div>
		</form>
      </div>
      
    </div>
  </div>


      
		
	<form class="navbar-form navbar-right"   action="./src/handlers/userHandler.php?a=login" method="post">
		<div class="modal-body">					
				<div class="row">
				  <div class="col-xs-6 form-group">
					<label class="control-label" for="login">Login</label>
					<input type="text" class="form-control" id="login" name="login" aria-describedby="inputSuccess4Status">				
				   </div>
				</div>
				<div class="row">				 
				  <div class="col-xs-6 form-group">
					<label class="control-label" for="password">Password</label>
					<input type="text" class="form-control" id="password" name="password" aria-describedby="inputSuccess4Status">
				 </div>
				</div>
			</div>
			<div class="modal-footer form-group">
			   <button type="submit" class="btn btn-default" >Log in!</button>
			</div>
		</form>
      </div>
      
    </div>
  </div>
