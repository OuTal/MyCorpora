<?php
session_start();
include 'dbcon.php';
if(!isset($_SESSION['username'])){header("location:index.php");}
$id=$_GET['id'];
//unlink($lien);

$link = dbcon();
 
// Check connection
if($link === false){
    header("location: error.php?er=1");
}

$query="SELECT * from enregistrement WHERE enregistrement.ID_rec=".$id."";
$res = mysqli_query($link,$query);
$row = mysqli_fetch_assoc($res);
$lien=$row['Lien'];
try{@unlink($lien);}
catch(Exception $e){}
finally{
	$query="DELETE from enregistrement WHERE enregistrement.ID_rec=".$id."";
	$res = mysqli_query($link,$query);
	if (!$res){header("Location: error.php?er=2");}
	if (!isset($_GET['all']))
		header("Location: readp.php?Phrase=".$row['ID_Phrase']."&conf=1");
	else
		header("Location: readp.php?all=1&conf=1");
}


?>