<?php
require 'config.php';


$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
	$http_referer = $_SERVER['HTTP_REFERER'];
}

function loggedin() {
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
		return true;
	} else {
		return false;
	}
}

function getuserfield($field) {
	if(isset($_SESSION['user_id'])){
		global $mysql_connect;
		$query = "SELECT ".$field." FROM users WHERE userId='".$_SESSION['user_id']."'";
		
		if($query_run = mysqli_query($mysql_connect, $query)) {
			$query_run = mysqli_query($mysql_connect, $query);
			if(mysqli_num_rows($query_run)>0){
				$query_row = mysqli_fetch_assoc($query_run);
				$return_field = $query_row[$field];
				return $return_field;
			}
			
			else{
				return 'something went wrong';
			}
		}	
		else{
		return 'something went wrong';
		}
	}
}

function getNumberOfQuestions() {
	global $mysql_connect;
	$query = "SELECT COUNT(*) AS count FROM levels";
	
	if($query_run = mysqli_query($mysql_connect, $query)) {
		$query_run = mysqli_query($mysql_connect, $query);
		$query_row = mysqli_fetch_assoc($query_run);
		$return_field = $query_row['count'];
		return $return_field;
		
	}	
}

function getQuestion($levelNo) {
	global $mysql_connect;
	$query = "SELECT question  FROM levels where levelNo = $levelNo";
	
	if($query_run = mysqli_query($mysql_connect, $query)) {
		$query_run = mysqli_query($mysql_connect, $query);
		$query_row = mysqli_fetch_assoc($query_run);
		$return_field = $query_row['question'];
		return $return_field;
		
	}	
}

function getAnswer($levelNo) {
	global $mysql_connect;
	$query = "SELECT answer FROM levels where levelNo = $levelNo";
	
	if($query_run = mysqli_query($mysql_connect, $query)) {
		$query_run = mysqli_query($mysql_connect, $query);
		$query_row = mysqli_fetch_assoc($query_run);
		$return_field = $query_row['answer'];
		return $return_field;
		
	}	
}


?>
