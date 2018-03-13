<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		#he{
			font-family: "Arial Black",Gadget,sans-serif;
			font-style: bold;
			font-size:50px;
		}
	</style>
	<title>sign up</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>
<body>
	<?php
		$con=mysqli_connect('localhost','root','','bookstore');
		if(isset($_POST['submit']))
		{
			$User_name=$_POST['User_name'];
			$phoneno = $_POST['phoneno'];
			$password=$_POST['password'];
			$email_id=$_POST['email_id'];
			$address=$_POST['address'];
			$row=mysqli_query($con,"insert into user(name,phone,email,password,address) values ('$User_name','$phoneno','$email_id','$password','$address')");
			if($row)
			{
				echo 'signed in successfully';
				header("Location:http://localhost/akhilesh/login.php");
			}
			else
			{
				echo 'please enter details again';
			}
			
		}
	?>
	<h1></h1>
	<div class="container-fluid text-center">
		<div class="container col-sm-4">
		</div>
		<div class="container col-sm-4 text-center ">
			<form action="" method="post">
				<div class="form-group text-center"><h1 id="he">create account</h1></div>
				<div class="form-group"><input type="text" placeholder="username" name="User_name" class="form-control"></div>
				<div class="form-group"><input type="text" placeholder="phoneno" name="phoneno" class="form-control"></div>
				<div class="form-group"><input type="text" placeholder="email" name="email_id" class="form-control"></div>
				<div class="form-group"><input type="password" placeholder="password" name="password" class="form-control"></div>
				<div class="form-group"><input type="text" placeholder="address" name="address" class="form-control"></div>
				<div class="form-group"><input type="submit" name="submit" value="create account" class="btn btn-success"></div>	
			</form>
		</div>
	</div>
</body>
</html>