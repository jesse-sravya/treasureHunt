<!DOCTYPE html>
<html lang="en">
<head>
  <title>Treasure Hunt </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
	.header{
		padding:1%;
	}
	form{
		padding-top:5%;
	}
	.error-text{
		color:red;
	}
	.formContent{
		
	}
  </style>
  
	<script>
		$(function(){
		  var password = document.getElementById("passwordR");
		  var confirm_password = document.getElementById("confirmPassword");

		function validatePassword(){
		  if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		  } else {
			confirm_password.setCustomValidity('');
		  }
		}

		password.onchange = validatePassword;
		confirmPassword.onkeyup = validatePassword;
		});
	</script>
</head>

<body>
<?php
require 'core.inc.php';
?>

<nav class="header navbar">
<h1 class="text-center">
 Welcome to treasure hunt
</h1>
</nav>

<div class="container">
<div class="row center-block" style="margin-top:5%;">
 
  <div class="col-md-6 formContent" ">
	<h1 class="text-center">Have an Account? </h1>
	  <ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#login">login</a></li>
		<li><a data-toggle="tab" href="#register">register</a></li>
	  </ul>
	  
	  <div class="tab-content">
			<div id="login" class="tab-pane fade in active">	
			 <?php include("login.php") ?>
			</div>
			
			<div id="register" class="tab-pane fade">
				 <?php include("register.php") ?>
			</div>	
	  </div>
	 </div> 
 
  <div class="col-md-6">
	<?php include('leaderboard.php') ?>
  </div>
  
 </div> 
</div>

<nav class=" footer navbar" id="footer">
	<ul class="navbar-nav nav">
		<li><a href="https://www.facebook.com/treasureHunt">facebook</a></li>
		<li><a href="">facebook</a></li>
		<li><a href="">facebook</a></li>
		<li><a > QUEST 2K16 </a> </li>
	</ul>
</nav>

</body>
</html>
