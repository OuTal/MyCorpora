<?php 
session_start();
include 'dbcon.php';
if(!isset($_SESSION['username'])){header("location:index.php");}
$base = dbcon();
$phrase = mysqli_real_escape_string($base, $_REQUEST['Phrase']);
$phrasear = mysqli_real_escape_string($base, $_REQUEST['Phrasear']);
$region = mysqli_real_escape_string($base, $_REQUEST['Region']);
$categorie = mysqli_real_escape_string($base, $_REQUEST['Categorie']);
if ($base) { 
   $sql = "UPDATE phrases SET phrase = '$phrase', phrase_ar= '$phrasear', ID_region = '$region', ID_cat = '$categorie' WHERE Id = '".$_SESSION['ph_id']."'"; 
   // Exécution de la requête 
   $resultat = mysqli_query($base, $sql); 
   if ($resultat == FALSE) { 
      header("Location: error.php?er=2");
   } 
   else { 
      $nombre_personne = mysqli_affected_rows($base); 
       header('Location: readphrase.php');
   }
 
   if (mysqli_close($base)) { 
       header('Location: readphrase.php');
   } 
   else { 
      header("Location: error.php?er=4");
   } 
 
} 
else { 
   header("Location: error.php?er=1");
} 
?>