<?php
	session_start();
	include "dbcon.php";
	$link=dbcon();
	$cat=$_GET['cat'];
	$reg=$_GET['reg'];
	$query = "SELECT * FROM phrases WHERE ID_cat=".$cat." AND ID_region=".$reg;
	$res = mysqli_query($link,$query);
	while ($row = mysqli_fetch_assoc($res))
	{
		echo "<option value = '".$row['Id']."'";
		echo ">".$row['phrase']."</option>";
	}
?>