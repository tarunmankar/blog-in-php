<?php
  session_start();
    if($_SESSION['username']=="" || $_SESSION['username']==null){
          header('location: ../user/login.php');
     }

$id=$_GET['id'];
$db=mysqli_connect('localhost','root','','login');
$query="delete from posts where post_id='$id'";
$runquery=mysqli_query($db, $query);
if($runquery)
  {
  	header('location: dashboard.php');
  }
  else {
  	echo "something went wrong";
  }
?>