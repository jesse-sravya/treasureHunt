		<?php 
			include 'session.php';
			 if(isset($_POST['email']) && isset($_POST['password'])){
				 $email = mysqli_real_escape_string($mysql_connect,$_POST['email']);
				 $password = mysqli_real_escape_string($mysql_connect,$_POST['password']);
				 $password_hash = md5($password);
				 $query = "select * from users where email='$email' and password ='$password_hash' ";
				 
					if($query_run = mysqli_query($mysql_connect, $query)) {
						$query_run = mysqli_query($mysql_connect, $query);
						$query_num_rows = mysqli_num_rows($query_run);
							if($query_num_rows == 0) {
								echo '<br/> <p class="text-center error-text"> 
											Invalid username/password.
										</p>';
							}
							else if($query_num_rows == 1) {
								$query_row = mysqli_fetch_assoc($query_run);
									$user_id = $query_row['userId'];
									$_SESSION['user_id'] = $user_id;
									header('Location: index.php');
									
								}
					}	
			 }
		?>
				