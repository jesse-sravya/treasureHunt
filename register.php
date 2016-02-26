   <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div class="form-group">
				<label class="control-label col-sm-4" for="fname">First Name:</label>
				<div class="col-sm-6"> 
					<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" required />
				</div>
			</div>
								
			<div class="form-group">
				<label class="control-label col-sm-4" for="lname">Last Name:</label>
					<div class="col-sm-6"> 
						<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your Last name" required />
					</div>
			</div>
								
			<div class="form-group">
				<label class="control-label col-sm-4"  for="email1">Email:</label>
					<div class="col-sm-6"> 
						<input type="email" class="form-control" name="emailR" id="email1" placeholder="Enter email" required />
					</div>
			</div>				
								
			<div class="form-group">
				<label class="control-label col-sm-4" for="passwordR">Password:</label>
					<div class="col-sm-6"> 
						<input type="password" class="form-control" name="passwordR" id="passwordR" required />
					</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-4" for="confirmPassword">Confirm Password:</label>
					<div class="col-sm-6"> 
						<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required />
					</div>
			</div>
							
			<button type="submit" class="btn center-block" name="submit"/>	REGISTER </button>	
		    <p class="text-center">
				
			</p>
	  </form>
	  
 <?php
	$fname = $lname = $emailR = $passwordR ='';
	if(!loggedin()) {
		if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['emailR'])  && isset($_POST['passwordR'])  && isset($_POST['confirmPassword'])) {
		 
			 $fname = mysqli_real_escape_string($mysql_connect,$_POST['fname']);
		     $lname = mysqli_real_escape_string($mysql_connect,$_POST['lname']);
		     $emailR = mysqli_real_escape_string($mysql_connect,$_POST['emailR']);
			$passwordR = mysqli_real_escape_string($mysql_connect,$_POST['passwordR']);
			$passwordR = md5($passwordR);
		
		/* check if user already exists */ 
		 $query = "SELECT * FROM users WHERE email = '$emailR'";
			if($query_run = mysqli_query($mysql_connect, $query)) {
				$query_num_rows = mysqli_num_rows($query_run);
				
				if($query_num_rows > 0) {
					echo '<br/> <p class="text-center error-text"> 
									user Already exists.
									</p>';
				}
				/*  if not register him*/ 	
				else { 
					$query = "insert into users (userId,fname,lname,email,password,level) values ('','$fname','$lname','$emailR','$passwordR','1')";
					
					if($query_run = mysqli_query($mysql_connect, $query)) {
						echo '<br/> <p class="text-center error-text"> 
									you have been registered
									</p>';
					} 
					
					else{
					  echo '<br/> <p class="text-center error-text"> 
									couldnot register,please try later
									</p>';
					 }
				}
			} 

		}	
 }

?>

