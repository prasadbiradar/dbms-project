$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

if(mysqli_connect_error()){
	die('connect eroor('.mysqli_connect_error().') '. mysqli_connect_error());
}