<?php
	session_start();
	  if($_SESSION['username']=="" || $_SESSION['username']==null){
          header('location: ../user/login.php');
	   }
	   else
	   {
	   	header('location: dashboard.php');
	   }
?>