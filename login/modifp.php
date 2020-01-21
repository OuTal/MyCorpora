<?php
session_start();
include 'dbcon.php';
	if(!isset($_SESSION['username'])){header("location:index.php");}

if( isset($_POST['pw']) && isset($_POST['npw']) && isset($_POST['nnpw']))
{
    // connexion à la base de données
    $db = dbcon();
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['pw']));
    
    if($password !== "")
    {
        $requete = "SELECT * FROM admin where 
              user = '".$_SESSION['username']."'";
        $exec_requete = mysqli_query($db,$requete);
        $reponse= mysqli_fetch_array($exec_requete);
		if($reponse['pw'] == sha1($password)) // nom d'utilisateur et mot de passe correctes
        {
			if($_POST['npw'] == $_POST['nnpw'] && strlen($_POST['npw'])>7){
				$sql = "UPDATE admin SET pw='".sha1($_POST['npw'])."' WHERE user='".$_SESSION['username']."'";
				if(mysqli_query($db, $sql)){
					header('Location: menu.php?conf=1');
				} else{
					header("Location: error.php?er=2");
				}
			}else{
				header('Location: mod.php?er=4');
			}
        }
        else
        {
           header('Location: mod.php?er=3'); // mot de passe incorrect
        }
    }
    else
    {
	   
       header('Location: mod.php?er=2'); // mot de passe vide
    }
}
else
{
   header('Location: mod.php?er=1');
}
mysqli_close($db); // fermer la connexion
?>