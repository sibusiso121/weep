<?php
$servername = 'localhost';
$username = 'root';
$password ='';
$dbname = 'customers';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	
	echo 'Connection Error'.mysqli_connect_error();
	
}
?>