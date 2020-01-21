<?php

function showadmin(){
	if(isset($_SESSION['username'])){
		echo '<span style="color:#ffffff;padding-right:5%;float:right;"><a href="menu.php">Menu</a></span>
<span style="color:#ffffff;padding-right:5%;float:right;"><a style="color:#ff0000" href="logout.php">Logout</a></span>
<span style="color:#ffffff;padding-right:1%;float:right;"><a>Welcome '.$_SESSION["username"].'</a></span>
';
	}else{
		echo '<span style="color:#ffffff;padding-right:5%;float:right;"><a style="color:#57b846" href="index.php">Admin Login</a></span>
';
	}
}
?>