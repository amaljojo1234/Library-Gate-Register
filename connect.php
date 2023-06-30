<?php
$servername='localhost';
$username='root';
$password='';
$dbname='lbr1';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
	die("connection failed:" .mysql_connect_error());
?>