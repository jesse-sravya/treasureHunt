<?php require 'session.php';

$userRound = $currRound = $end = $start =  $noOfLevels = $totalLevels = $curr_int =$user_int = $user_ext = $cur_ext = $quesArr = $answersArr= '';
										
										$curr_ext = $user_ext = getuserfield('level');
										$totalLevels = getNumberOfQuestions();
										$noOfLevels = 7;
										$userRound = floor(($user_ext-1)/$noOfLevels)+1;
										$currRound = $userRound;
										
										if($user_ext>$totalLevels){
											$userRound = $currRound = $userRound-1;
										}
										
										$start = ($noOfLevels*($currRound-1))+1;
										$end = $start + $noOfLevels - 1;
										$user_int = $curr_int  = ($user_ext-$start)+1;
										
										if(isset($_GET['currRound'])){
											$inputround = mysqli_real_escape_string($mysql_connect,$_GET['currRound']);
											if($inputround<$currRound && $inputround>0 ){
												$currRound =$inputround;
												$curr_int = $noOfLevels;
												$start = ($noOfLevels*($currRound-1))+1;
												$curr_ext = $start + $curr_int -1;
												$end = $start + $noOfLevels - 1;
											}
										}
																			
										$_SESSION['userRound'] = $userRound;
										$_SESSION['currRound'] = $currRound;
										$_SESSION['user_ext'] = $user_ext ;
										$_SESSION['user_int'] = $user_int;
										$_SESSION['curr_int'] = $curr_int;
										$_SESSION['curr_ext'] = $curr_ext;
										$_SESSION['start'] = $start;
										$_SESSION['end'] = $end;
									?>