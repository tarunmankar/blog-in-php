<!DOCTYPE html>
<html>
<head>
	<title>HOME PAGE</title>
</head>
<body>
<h1>HOME PAGE</h1>
<?php
	  session_start();
	  if(isset($_SESSION['username']))
      { ?>
         <button><a href="admin/dashboard.php">Dashboard</a></button>
         <button><a href="user/logout.php">Logout</a></button>
	  <?php } 
	  else { ?>
         <button><a href="user/login.php">Login</a></button>
         <button><a href="user/register.php">Register</a></button>
	  <?php } 


    	$conn=mysqli_connect('localhost','root','','login');
        $query="select * from users join posts on users.user_id=posts.user_id ORDER BY posts.post_id desc;";
        $result=mysqli_query($conn, $query);
        while ($row=mysqli_fetch_assoc($result)) { ?>
    
    		<h1><?php echo $row['heading'] ?></h1>
    		<p><?php echo $row['article'] ?></p>
    		<p>Posted By <b><?php echo $row['name'] ?></b> | 
    		Username <b><?php echo $row['username'] ?></b></p><hr>
 
       <?php }  ?>
</body>
</html>