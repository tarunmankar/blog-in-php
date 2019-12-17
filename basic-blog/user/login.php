<?php
	session_start();
	  if(isset($_SESSION['username']))
       {
          header('location: ../admin/dashboard.php');
	   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
    <button><a href="../">Home Page</a></button>
    <fieldset>
        <legend><h1>LOGIN PAGE</h1></legend>
        	<form method="post">
        		Username<input type="text" name="username"><br>
        		Password<input type="text" name="password"><br>
                <input type="submit" name="submit" value="Login">
        	</form>
   </fieldset><br>
   
	<button><a href="register.php">Register Here</a></button>
	
    <?php
     if(isset($_POST['submit']))
     {
     	$username=$_POST['username'];
     	$password=$_POST['password'];
        
        $conn=mysqli_connect('localhost','root','','login');
        $query="SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result=mysqli_query($conn, $query);
        
        $numrows = mysqli_num_rows($result);
     		if($numrows ==1)
     		{
     			while($row = mysqli_fetch_assoc($result))
     				{
     					session_start();
     					$_SESSION['user_id']=$row['user_id'];
     					$_SESSION['username']=$row['username'];
     					header("Location: ../admin/dashboard.php");
     				}
            }
            else
            {
            	echo "username or password wrong";
            }
     }
?>
</body>
</html>