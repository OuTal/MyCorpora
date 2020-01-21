<?php
session_start();
// Include and instantiate the class.
include '../../dbcon.php';
require_once 'id_generate.php';
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
     $platform = "Mobile";
}elseif( $detect->isTablet() ){
    $platform = "Tablette";
}else 
	 $platform = "Desktop"; 

// Generer date

setlocale(LC_TIME, 'fra_fra');
$date = strftime('%A %d %B %Y'); 

// Instance de la class DomDocument
$doc = new DOMDocument();
 
 $doc->formatOutput = true;
// Definition du prologue :  la version et l'encodage
$doc->version = '1.0';
$doc->encoding = 'UTF-8';
 
 
// Ajout la balise 'metadata' a la racine
$metadata = $doc->createElement('AppliWeb');
$doc->appendChild($metadata);
 
// Creation des elements "balise"
$md_env = $doc->createElement('Environnement',$_REQUEST['Environnement']);
$md_age = $doc->createElement('Age', $_REQUEST['Age']);
$md_sexe = $doc->createElement('Sexe', $_REQUEST['Sexe']);
$md_region = $doc->createElement('Region', $_REQUEST['Region']);
$md_prof = $doc->createElement('Profession', $_REQUEST['Profession']);
$md_date = $doc->createElement('Date', $date );
 
//Specifier que les elements sont dans 'metadata'
$metadata->appendChild($md_env);
$metadata->appendChild($md_age);
$metadata->appendChild($md_prof);
$metadata->appendChild($md_region);
$metadata->appendChild($md_sexe);
$metadata->appendChild($md_date);
 
// Sauvegarder le document XML
$id = unique_id(11);
$_SESSION['id'] = $id; 
mkdir("../recordings/".$id."", 0755);
$nomxml = $id.'_'.$_GET['Sexe'];
$doc->save('../recordings/'.$id.'/'.$nomxml.'.xml');
 
 //Redirection

if ( $detect->isMobile() ) {
     header('location: ../vue/nv_index.php');
}elseif( $detect->isTablet() ){
  header('location: ../vue/nv_index.php');
}else 
	 header('location: ../vue/nv_index.php');


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = dbcon();
 
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
$cat = mysqli_real_escape_string($link, $_REQUEST['Categorie']);
$_SESSION['cat']=$cat;
$_SESSION['ID_reg']=$ville;
// attempt insert query execution
$sql = "INSERT INTO meta_donnees (Sexe,Age,Environnement,Profession,Ville,ID_cat) VALUES ('$sexe','$age','$environnement','$profession','$ville','$cat')";
if(mysqli_query($link, $sql)){
	$_SESSION['maj']=1;
	header('Location: ../vue/nv_index.php?maj=1');
} else{
	header("location: error.php?er=2");
}
 
// close connection
mysqli_close($link);
?>