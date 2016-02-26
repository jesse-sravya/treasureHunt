<!DOCTYPE html>
<html lang="en">
<head>
  <title>Treasure Hunt </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/style2.css" /> 
  
  
  <style>

	.container,body{
		background-color:#414141;
		overflow:auto;
	}
	
	.container{
		color:#ffffcc;
	}
	.footerNav{
		background-color:transparent;
		border:none;
	}	

	.footerNav a,.navbar-nav li{
		transition:0.4s;
	}
	
	.socialIcons{
		margin-top:50px;
	}
	.socialIcons li{
		display:inline;
		margin: 0 auto;
		margin-right:5%;
		font-size:20px;
	}
	.socialIcons li a:hover{
		color:#F93B00;
	}
  </style>
 
</head>

<body>
<?php
require 'config.php';
require 'core.inc.php';

if(loggedin()){
	header("location:index.php");
}

?>
<nav class="header navbar-default ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Treasure Hunt</a>
    </div>
   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://www.csequest.com"><span class="glyphicon glyphicon-home"></span></a></li>
      </ul>
    
  </div>
</nav>

<div class="container">
<div class="row center-block">
	
	<div class="col-md-6">
		<h1 class="text-center">Have an Account? </h1>
		<div class="row">
			<div class="col-md-3 col-md-offset-4">
				<br><a href="" class="btn btn-block button">LOGIN </a>
				<br><a href=""class="btn btn-block button">REGISTER </a>
			</div>
		</div>
	</div> 
 
	<div class="col-md-6">
		<?php include('leaderboard.php') ?>
	</div>
  
 </div> 
</div>

 <nav class="navbar navbar-default footerNav center-block text-center">
	<div class="text-center">
	<ul class=" socialIcons ">
		<li><a href="" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
		<li><a href="https://www.youtube.com/channel/UCYN3jXfAKL5lWhm-ZI8Zz4Q" target="_blank"><i class="fa fa-lg fa-youtube"></i></a></li>
		<li><a href="" target="_blank"><i class="fa fa-lg fa-google-plus"></i></a></li>
	</ul>	
	</div>
</nav>

</body>
</html>
