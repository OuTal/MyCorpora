<?php
	session_start();
	if(!isset($_SESSION['username'])){header("location:index.php");}

	unset($_SESSION['username']);
	header("location: index.php");
?>