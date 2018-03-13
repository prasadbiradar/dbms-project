<?php
	session_start();
	session_unset();
	echo date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>
<body>
	<?php
		$con=mysqli_connect('127.0.0.1','root','','bookstore');
		if(isset($_POST['submit']))
		{
			$name=$_POST['name'];
			$password=$_POST['password'];
			$row=mysqli_query($con,"select id from user where name='$name' and password='$password'");
			$res=mysqli_num_rows($row);
			if($res==1)
			{
				echo 'logged in successfully';
				echo '<br/>';
				$res=mysqli_fetch_assoc($row);
				$_SESSION["uid"]=$res['id'];
				header("location:index.php");
			}
			else
			{
				echo 'invalid username or password';
			}

		}
	?>
	<div class="jumbotron text-center">
	<h1>login page</h1>
	</div>
	<div class="container-fluid text-center">
	<div class="container col-sm-4"></div>
	<div class="container col-sm-4 text-center ">
		<form action="" method="post">
		  <div class="form-group">
		    <input type="text" class="form-control" id="email" name="name" placeholder="name">
		  </div>
		  <div class="form-group">
		    <input type="password" class="form-control" id="pwd" name="password" placeholder="password">
		  </div>
		  <button type="submit" name="submit" class="btn btn-success">Submit</button>
		</form>
		<a href="signin.php">not a user? sign in  </a><br/>
		<a href="admin.php">login as admin</a>
	</div>
	</div>
</body>
</html>>