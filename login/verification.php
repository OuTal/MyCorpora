<?php
session_start();
include 'dbcon.php';
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db = dbcon();
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT * FROM admin where 
              user = '".$username."'";
        $exec_requete = mysqli_query($db,$requete);
        $reponse= mysqli_fetch_array($exec_requete);
		if($reponse['pw'] == sha1($password)) // nom d'utilisateur et mot de passe correctes
        {
           
		   $_SESSION['username'] = $username;
           header('Location: menu.php');
        }
        else
        {
           header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
	   
       header('Location: index.php?errreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: index.php');
}
mysqli_close($db); // fermer la connexion
?>