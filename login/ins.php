<?php
include 'dbcon.php';
$link = dbcon();
if(!isset($_SESSION['username'])){header("location:index.php");}
// Check connection
if($link === false){
    header("location: error.php?er=1");
}
 
// Escape user inputs for security
$sexe = mysqli_real_escape_string($link, $_REQUEST['Sexe']);
$age = mysqli_real_escape_string($link, $_REQUEST['Age']);
$environnement = mysqli_real_escape_string($link, $_REQUEST['Environnement']);
$profession = mysqli_real_escape_string($link, $_REQUEST['Profession']);
$ville = mysqli_real_escape_string($link, $_REQUEST['Ville']);
 
// attempt insert query execution
$sql = "INSERT INTO meta_donnees (Sexe,Age,Environnement,Profession,Ville) VALUES ('$sexe','$age','$environnement','$profession','$ville')";
if(mysqli_query($link, $sql)){
	header('Location: Demo/vue/nv_index.php');
} else{
    header("Location: error.php?er=2");
}
 
// close connection
mysqli_close($link);
?>