<!DOCTYPE html>
<html>
<head>
	<title>REGISTER PAGE</title>
</head>
<body>
    
    <fieldset>
        <legend><h1>REGISTER PAGE</h1></legend>
	<form method="post">
        Name<input type="text" name="name"><br>
		Username<input type="text" name="username"><br>
		Password<input type="text" name="password"><br>
        <input type="submit" name="submit" value="REGISTER">
	</form>
	</fieldset>
	<?php
     if(isset($_POST['submit']))
     {
        $name=$_POST['name'];
     	$username=$_POST['username'];
     	$password=$_POST['password'];
        
        $conn=mysqli_connect('localhost','root','','login');
        $query="SELECT * FROM users WHERE username='$username'";
        $result=mysqli_query($conn, $query);
        $numrows = mysqli_num_rows($result);

 		if($numrows==0)
 		{
 			$query="INSERT INTO users(name, username, password) VALUES('$name','$username','$password')";
            $result=mysqli_query($conn, $query);
            header('location: login.php');
        }
        else
        {
            echo "Username is already taken";
        }
     }
?>
</body>
</html>