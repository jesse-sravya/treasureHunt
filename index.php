<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Treasure Hunt </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="style/scrollpath.css" /> 
		<link href="http://fonts.googleapis.com/css?family=Terminal+Dosis&subset=latin" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="script/lib/prefixfree.min.js"></script>
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="submit.js"></script>
		
		 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
		 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="description" content="The plugin that lets you define custom scroll paths" />  
		<link rel="stylesheet" type="text/css" href="style/style2.css" /> 
		<title>jQuery Scroll Path</title>

	</head>
	<body>

		<?php			
			require 'sessionedVar.php';
			require 'phpVariables.php';
	
		?>
	

<nav class="header navbar-default  navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Treasure Hunt</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Rounds<span class="caret"></span></a>
          <ul class="dropdown-menu">

			<?php
				for($j=1; $j<=$_SESSION['userRound']; $j++) {
					echo '<li><a href="index.php?currRound='.$j.'"> Round '.$j.'</a></li>';
				}
			?>

          </ul>
        </li>
       <li><a href="#leaderboard" data-toggle="modal" data-target="#leaderboard">leaderboard</a></li> 
	  <li><a href="#instructions" data-toggle="modal" data-target="#instructions">instructions</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://www.csequest.com"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a><span class="glyphicon glyphicon-user"></span> <?php echo getuserfield('fname').' '.getuserfield('lname'); ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
	<div class="modal fade" id="leaderboard" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<?php 
						include("leaderboard.php");
					?>
				</div>
			</div>
		</div>	
	</div>
	
	<div class="modal fade" id="instructions" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<?php include "instructions.php"; ?>
				</div>
			</div>
		</div>	
	</div>
	<?php echo '<h2><span class="round-head">ROUND-'.$_SESSION['currRound'].'</span></h2>'; ?>
		
	
	
		<div class="wrapper">
			<?php	
					if($_SESSION['curr_int'] == 8){
						$_SESSION['curr_int']=7;
					}
					
					for($i=1;$i<=$_SESSION['curr_int'];$i++){
						$question = $quesArr[$i-1];
					
						echo '<script>updateQuestion('.$i.',\''.$question.'\');</script>';
					}
					
					$r = $_SESSION['currRound']+1;
				
					echo'<a href="index.php?currRound='.$r.'" id="next-round" class="next-round">Go to the next round.</a>';
			?>
		</div>
		
		<!--  Levels Menu -->
	<nav class="levelList">
		<ul>
		<?php		
					
					for($i=1; $i<=$_SESSION['curr_int']; $i++) {
						echo '<script>updateLevel('.$i.');</script>';
					}
		?>
		</ul>
	</nav>
	
	<ul class="footer">
		<li><a href="" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
		<li><a href="https://www.youtube.com/channel/UCYN3jXfAKL5lWhm-ZI8Zz4Q" target="_blank"><i class="fa fa-lg fa-youtube"></i></a></li>
		<li><a href="" target="_blank"><i class="fa fa-lg fa-google-plus"></i></a></li>
	</ul>
			
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
	<script type="text/javascript" src="script/lib/jquery.easing.js"></script>
	<script type="text/javascript" src="script/jquery.scrollpath.js"></script>
	<script type="text/javascript" src="script/demo.js"></script>
	</body>
</html>
