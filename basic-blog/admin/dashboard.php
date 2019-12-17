<?php
	  session_start();
	  if($_SESSION['username']=="" || $_SESSION['username']==null)
      {
          header('location: ../user/login.php');
	   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
    <h1><?php echo "Welcome ".$_SESSION['username']; ?></h1><br>
	<button><a href="../">Home</a></button>
	<button><a href="insert.php">Insert Article</a></button>
    <table border="1">
    	<tr>
    		<th>ID</th>
            <th>Heading</th>
    		<th>Article</th>
    		<th>Delete</th>
    		<th>Update</th>
    	<tr>
    	<?php
    	$id=$_SESSION['user_id'];
        $sno=1;
    	$conn=mysqli_connect('localhost','root','','login');
        $query="SELECT * FROM posts WHERE user_id='$id'";
        $result=mysqli_query($conn, $query);
        while ($row=mysqli_fetch_assoc($result)) { ?>
        <tr>
    		<td><?php echo $sno++ ?></td>
            <td><?php echo $row['heading'] ?></td>
    		<td><?php echo $row['article'] ?></td>
    		<td><button><a href="delete.php?id=<?php echo $row['post_id'] ?>">Delete</a></button></td>
    		<td><button><a href="update.php?id=<?php echo $row['post_id'] ?>">Update</a></button></td>
    	<tr>
       <?php } ?>
    </table>
    
    <button><a href="logout.php">Logout</a></button>
</body>
</html>