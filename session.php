<?php
   require 'core.inc.php';
   session_start();
   
   $user_check = $_SESSION['user_id'];
 
   if(!isset($_SESSION['user_id'])){
      header("location:treasureForm.php");
   }
 
?>