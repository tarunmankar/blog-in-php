<?php
  session_start();
    if($_SESSION['username']=="" || $_SESSION['username']==null){
          header('location: ../user/login.php');
     }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<form method="post">
  Title<input type="text" name="title"><br>
	Post<input type="text" name="article"><br>
	<input type="submit" name="submit">
</form>
<?php
if(isset($_POST['submit']))
{
  $heading=$_POST['title'];
  $article=$_POST['article'];
  $id=$_SESSION['user_id'];
  $db=mysqli_connect('localhost','root','','login');
  $query="insert into posts(heading, article, user_id) values('$heading','$article','$id')";
  $runquery=mysqli_query($db, $query);
  if($runquery)
  {
  	header('location: dashboard.php');
  }
  else{
    echo "some thing went wrong";
  }
}
?>
</body>
</html>