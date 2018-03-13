<?php
session_start();

$con=mysqli_connect("localhost","root","","bookstore");
$uid_fk=$_SESSION['uid'];
$date=date("Y-m-d");
$res=mysqli_query($con,"insert into orders (uid_fk,eta) values ($uid_fk,'$date')");
$oid=mysqli_insert_id($con);
echo "the oid is:".$oid."  ";
echo "<h1 style='text-align: center'>your order is placed successfully</h1>";
echo "<body style='background-color:#E6E6FA'>";

foreach($_SESSION["cart"] as $array)
{
	//echo join(',',$array);
	//echo "<br/>";
	$pid=$array['product_id'];
	$quantity=$array['item_quantity'];
	$res=mysqli_query($con,"insert into cart (oid,pid,quantity) values ($oid,$pid,$quantity)");
}

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
mysqli_close($con);
$con=mysqli_connect("localhost","root","","bookstore");
$result=mysqli_query($con,"call totalcost($oid)") or die($con);
$rowrr=mysqli_fetch_array($result,MYSQLI_ASSOC);
$cost=$rowrr['subtotal'];
echo "total cost".$cost;
echo '<br/><br/><br/>';
mysqli_close($con);
$con=mysqli_connect("localhost","root","","bookstore");
echo "<a href='allorders.php' ><button >press me</button></a>";
?>
<head>
<style> 
button{
	
	 background-color: #4CAF50; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; 
    transition-duration: 0.4s;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
text-align:center;	
}

  </style>
</head>