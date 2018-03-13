
<?php
session_start();

$con=mysqli_connect("localhost","root","","bookstore");
$uid_fk=$_SESSION['uid'];
echo "the uid is : ".$uid_fk;
$names=mysqli_query($con,"select * from orders where uid_fk=$uid_fk");
while($ind=mysqli_fetch_array($names,MYSQLI_ASSOC))
{
	$oid=$ind['oid'];
	$res=mysqli_query($con,"call orderdetails($oid)") or die($con);
	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
	{
		$p_name=$row['p_name'];
		$quantity=$row['quantity'];
		$price=$row['price'];
		$subtotal=$row['subtotal'];
		$eta=$row['eta'];
		echo '<br/>p_name:'.$p_name.'  quantity:'.$quantity.'  price:'.$price.'  subtotal:'.$subtotal.'   eta:'.$eta;
		echo '<br/>';
	}
	echo "<body style='background-color:#E6E6FA'>";
	mysqli_close($con);
	$con=mysqli_connect("localhost","root","","bookstore");
	$result=mysqli_query($con,"call totalcost($oid)") or die($con);
	$rowrr=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$cost=$rowrr['subtotal'];
	echo "total cost".$cost;
	echo '<br/><br/><br/>';
	mysqli_close($con);
	$con=mysqli_connect("localhost","root","","bookstore");
	
}
?>
