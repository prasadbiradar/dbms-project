<?php

$User_name = filter_input(INPUT_POST,'User_name');
$phoneno = filter_input(INPUT_POST,'phoneno');
$email_id = filter_input(INPUT_POST,'email_id');
$password = filter_input(INPUT_POST,'password');
$address = filter_input(INPUT_POST,'address');

if(!empty($User_name))
{
	$conn=new mysqli('localhost','root','','prasad');
	
	if(mysqli_connect_error()){
	die('connect error('.mysqli_connect_error().') '. mysqli_connect_error());
}
	
	else
	{
	$sql="insert into contacts(User_name,phoneno,email_id,password,address) 
	values('$User_name','$phoneno','$email_id','$password','$address')";
	
	if($conn->query($sql))
	{
	
//You need to redirect
header("Location:http://localhost/akhilesh/index.php");
exit();
 }	
	else{
	echo "sorry";
	}
	}
	
$conn->close();

}

else{
echo "username should not be empty";
}

?>