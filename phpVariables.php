<?php 		// to enter questions with multiple lines use <br> in insert
			/* -----------------question answer arrays -------------------*/
				
						$start = $_SESSION['start'];
						$end = $_SESSION['end'];
						$query = "select question,answer from levels where levelNo >= '$start' and levelNo <= '$end'";
						if($query_run = mysqli_query($mysql_connect, $query)) {
							$query_run = mysqli_query($mysql_connect, $query);
							if(mysqli_num_rows($query_run)>0){
								$i=0;
								while($query_row = mysqli_fetch_assoc($query_run)){
									$quesArr[$i]= $query_row['question'];
									$answersArr[$i]= $query_row['answer'];
									$i++;
								}
								$i=0;
							}
						}	
				
?>			