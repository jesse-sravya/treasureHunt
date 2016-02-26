<?php
    include("config.php");
	include("session.php");

   
   if(session_destroy()) {
		unset($_SESSION['user_id']);
		unset($_SESSION['user_fname']);
		unset($_SESSION['user_lname']);
		unset($_SESSION['userRound']);
		unset($_SESSION['currRound']);
		unset($_SESSION['user_ext']); 
		unset($_SESSION['user_int']);
		unset($_SESSION['curr_int']); 
		unset($_SESSION['curr_ext']); 
		unset($_SESSION['start']); 
		unset($_SESSION['end']); 
      header("Location: treasureForm.php");
   }
?>