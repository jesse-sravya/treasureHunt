<div class="leaderboard">
      <h1 class="text-center"> Leaderboard </h1>
	   <table class="table">
		<thead>
		  <tr>
			<th>Rank</th>
			<th>name</th>
			<th>level</th>
		  </tr>
		</thead>
		<tbody>
		<?php

			$query = "select fname,lname,level from users order by level desc,time ASC  limit 10";
			if($query_run = mysqli_query($mysql_connect, $query)) {
				$rows = mysqli_num_rows($query_run);
				if($rows > 0) {
					for($i=0;$i<$rows;$i++){
						$query_row = mysqli_fetch_assoc($query_run);
						$fname = $query_row['fname'];
						$lname = $query_row['lname'];
						$level = $query_row['level'];

						echo '<tr>
								<td>'.($i+1).'</td>
								<td>'.$fname.' '.$lname.'</td>
								<td>'.$level.'</td>
							</tr>';
					}
					
					if(loggedin()){
						$u_fname = getuserfield('fname');
						$u_lname = getuserfield('lname');
						$u_level = getuserfield('level');
						$userId  = $_SESSION['user_id'];
						
						$query = 	"SELECT 
									RANK() OVER ( ORDER BY level desc,time ASC ) as rank
									FROM users where userId ='$userId' ";
						
						/*
						$query = "SELECT FIND_IN_SET( score, ( SELECT GROUP_CONCAT( score ORDER BY score DESC ) 
							FROM scores )
							) AS rank
							FROM users
							WHERE userId =  $userId";*/
						if($query_run = mysqli_query($mysql_connect, $query)) {
							$rows = mysqli_num_rows($query_run);
							
							if($rows>0){
								$query_row = mysqli_fetch_assoc($query_run);
								$u_rank = $query_row['rank'];
								echo '<tr style="background-color:#ccffff">
										<td>'.$u_rank.'</td>
										<td>'.$u_fname.' '.$u_lname.'</td>
										<td>'.$u_level.'</td>
									</tr>';
							}	
						}
						
						else{
							//echo 'hi';
						}
					}
					
				}
			}
			
			
	    ?>
		</tbody>
	  </table>
	</div>