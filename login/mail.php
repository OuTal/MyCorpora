<?php
include 'dbcon.php';
$link = dbcon();
 
// Check connection
if($link === false){
    header("Location: error.php?er=1");
}
 
// Escape user inputs for security
$nom = mysqli_real_escape_string($link, $_REQUEST['name']);
$mail = mysqli_real_escape_string($link, $_REQUEST['mail']);
$comment = mysqli_real_escape_string($link, $_REQUEST['comment']);
$msg=$nom."\n".$mail."\n".$comment;
$subj="contact from: ".$nom;

// attempt insert query execution
$sql = "INSERT INTO contact (subj,msg) VALUES ('$subj','$msg')";
if(mysqli_query($link, $sql)){
    mail("contact@mycorpora.dx.am",$subj,$msg);
	header('Location: ok.html');
} else{
    header("Location: error.php?er=2");
}
 
// close connection
mysqli_close($link);
?>