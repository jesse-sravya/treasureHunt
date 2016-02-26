
<?php
			require 'session.php';
			require 'phpVariables.php';
			$message ='Something went wrong,please try again later';
  
			/* ----------------cleaning an input string -----------------*/
			function cleanInput($string){
				global $mysql_connect;
				$string = mysqli_real_escape_string($mysql_connect,$string);
				$string = str_replace(' ', '', $string);
				$string = trim($string);
				$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
				
				return $string;
			}
			
			function checkMatch($actual_answer,$input_answer){
				$delimiter = '*';
				$answerArr = explode($delimiter,$actual_answer);
				$arrCount = count($answerArr);
					for($i=0;$i<$arrCount;$i++){
						$answerArr[$i] = str_replace(' ', '', $answerArr[$i]);
						$answerArr[$i] = trim($answerArr[$i]);
						$answerArr[$i] = preg_replace('/[^A-Za-z0-9\-]/', '', $answerArr[$i]);
					}
					
					for($i=0;$i<$arrCount;$i++){
						if(strcasecmp($input_answer,$answerArr[$i])==0) {
							return true;
						}
					}
						return false;
			}
			
/* ----------------if input variables are posted then calls checkMatch function -----------------*/
			
	if(isset($_POST['answer']) && isset($_POST['level'])){
					
				$level_answered = $_POST['level'];
				$check_level = $_SESSION['curr_int']+1;
				
				if(mysqli_real_escape_string($mysql_connect,$_POST['answer'])==NULL){
					echo "null string";
					return;
				}
				
				if($level_answered>=1 && $level_answered<=$check_level){
					$input_answer =cleanInput( $_POST['answer'] );
					
					
					$actual_level = ($level_answered+$_SESSION['start'])-1;
				
					$actual_answer = '';
					$query = "select answer from  levels where levelNo = '$actual_level'";
					global $mysql_connect;
					
					if($query_run = mysqli_query($mysql_connect, $query)) {
						
						$query_run = mysqli_query($mysql_connect, $query);
						$query_row = mysqli_fetch_assoc($query_run);
						$actual_answer = $query_row['answer'];
						
						if(checkMatch($actual_answer,$input_answer)){
							$nextLevel = $level_answered+1;
								
							if((($level_answered+$_SESSION['start'])-1)==$_SESSION['user_ext']){
									
									$newLevel = $_SESSION['curr_ext'] =  $_SESSION['user_ext'] = $_SESSION['user_ext']+1;
									$newRound = floor(($newLevel-1)/7)+1;
									
									if($newRound == $_SESSION['currRound']){
										$_SESSION['curr_int']  = $_SESSION['user_int'] = ($_SESSION['user_ext']-$start)+1;
									}
										 // when level answered is 7,curr_int will be wrong as round is increased which means diff start value.
										//	but on next round -it reloads. is it a problem?				 
										
									$userID = $_SESSION['user_id'];
									$query = "update users  set level = '$newLevel',time=NOW() where userId = '$userID'";
									global $mysql_connect;
									$query_run = mysqli_query($mysql_connect, $query);
									
									if($query_run){
											if($newLevel<=getNumberOfQuestions()){
												$message  = $quesArr[$nextLevel-1];
											}
											else {
												$message  = "no more questions";
											}
										}
									else{
											$message = "update level failed";
									  }
							}
							else{
								$message  = 'correct';
							}
						}
						
						else{
							$message ='wrong';
						}	
									
					}
						else{
							$message = 'answer retrieval fail';
						}
					
				}
					
				else{
					$message = "please try again";
				}							
	}
	echo $message;
			
 
?>


