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
	<?php
	      $post_id=$_GET['id'];
        $conn=mysqli_connect('localhost','root','','login');
        $query="SELECT * FROM posts WHERE post_id='$post_id'";
        $result=mysqli_query($conn, $query);
        $row=mysqli_fetch_assoc($result) ?>
        <h1>Update Article</h1>
				<form method="post">
				    Title<input type="text" name="title" value="<?php echo $row['heading'] ?>"><br>
					Post<input type="text" name="article" value="<?php echo $row['article'] ?>"><br>
					<input type="submit" name="submit" value="Update" >
				</form>

<?php
if(isset($_POST['submit']))
{
  $heading=$_POST['title'];
  $article=$_POST['article'];
  $db=mysqli_connect('localhost','root','','login');
  $query="UPDATE posts SET heading='$heading', article='$article' WHERE post_id='$post_id'";
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