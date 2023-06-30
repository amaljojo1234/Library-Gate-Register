<?php
	session_start();


		unset($_SESSION['admin']);
		unset($_SESSION['faculty']);
		unset($_SESSION['student']);


	header('location:index.php');


?>
