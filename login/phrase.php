<?php
session_start();
include 'dbcon.php';
$link = dbcon();
 	if(!isset($_SESSION['username'])){header("location:index.php");}

// Check connection
if($link === false){
    header("location: error.php?er=1");
}
 
// Escape user inputs for security
$phrase = mysqli_real_escape_string($link, $_REQUEST['Phrase']);
$phrase_ar = mysqli_real_escape_string($link, $_REQUEST['Phrase_ar']);
$region = mysqli_real_escape_string($link, $_REQUEST['Region']);
$categorie = mysqli_real_escape_string($link, $_REQUEST['Categorie']);
$username=$_SESSION['username'];
// attempt insert query execution
$sql = "SELECT max(Id) as Id FROM phrases";
			$result = mysqli_query($link, $sql);

			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$idd=$row['Id']+1;
					}
			} else {
				$idd=1;
			}
			
$sql = "INSERT INTO phrases (phrase,phrase_ar,Username,ID_region,ID_cat) VALUES ('$phrase','$phrase_ar','$username','$region','$categorie');
";
if(mysqli_query($link, $sql)){
	$sql = "INSERT INTO enregistrement (Lien,ID_form,ID_Phrase) VALUES ('#',0,$idd)";
		if(mysqli_query($link, $sql)){
			header('Location: readphrase.php');
		} else{
			header("location: error.php?er=2");
		}
} else{
    header("location: error.php?er=2");
}
 
// close connection
mysqli_close($link);
?>