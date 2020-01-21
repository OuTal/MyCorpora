<?php
session_start();
include 'dbcon.php';
if(!isset($_SESSION['username'])){header("location:index.php");}
$link = dbcon();

// Check connection
if($link === false){
    header("Location: error.php?er=1");
}
$_SESSION['ph_id'] = $_GET['Id_phrase'];
			
$sql = "DELETE FROM phrases WHERE Id = '".$_SESSION['ph_id']."'";
if(mysqli_query($link, $sql)){
    $sql = "DELETE FROM enregistrement WHERE ID_Phrase = '".$_SESSION['ph_id']."' AND ID_form = 0";
	if(mysqli_query($link, $sql)){
		header('Location: readphrase.php?conf=1');

} else{
    header("Location: error.php?er=3");
}

} else{
    header("Location: error.php?er=3");
}
 
// close connection
mysqli_close($link);
?>