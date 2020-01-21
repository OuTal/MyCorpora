<?php
session_start();
include "dbcon.php";
require_once 'Demo/controleur/Mobile_Detect.php';
$detect = new Mobile_Detect;

if ( $detect->isMobile() ) {
     header('location: Demo/vue/error_rec.php');
} elseif ( $detect->isTablet() ) {
     header('location: Demo/vue/error_rec.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Formulaire</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body >
		


			<div style="align:center;width:100%;background:#000000;padding:10px;">
				<a href="../index.html"><span style="color:#ffffff;padding-left:5%">My</span><span style="color:#1aff66;font-weight: bold;">Corpora</span></a>
				<a href="../../help.php" style="color:#3aafbd;"><span style="padding-right:5%;float:right;">Aide?</span></a>
				<span style="color:#ffffff;padding-right:5%;float:right;"><a href="contact.html">Nous Contacter</a></span>
                <span style="color:#ffffff;padding-right:5%;float:right;"><a href="form.php">Enregistrer</a></span>
			
			</div>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/bg.jpg)">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Formulaire
					</span>
				</div>

				<form class="login100-form validate-form" action="Demo/controleur/regxml.php" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="">
						<span class="label-input100">Age</span>
						<input class="input100" type="number" name="Age" style="height: 30px">
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="">
						<span class="label-input100">Sexe</span>
						<input type="radio" name="Sexe" value="m" checked style="margin-right: 5px" > <span>Male</span><input type="radio" name="Sexe" value="f" style="margin-right: 5px;margin-left: 10px" > <span>Female</span>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "" style="border-bottom: 0px">
						<span class="label-input100" style="left:-35%;">Environnement</span>
						<select name="Environnement" style="width: inherit" ><option value="calme">Calme</option><option value="bruyant">Bruyant</option><option value="turbulent">Turbulent</option></select>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "" style="border-bottom: 0px">
						<span class="label-input100">Profession</span>
						<select name="Profession" size="1" style="width:inherit">
                        <OPTION>Hotellerie, Restauration</OPTION>
                        <OPTION>Transport, Logistique</OPTION>
                        <OPTION>Agriculture, Pêche, Elevage</OPTION>
                        <OPTION>Commerce, Vente</OPTION>
                        <OPTION>Banque, Assurance</OPTION>
                        <OPTION>Arts, Spectacle</OPTION>
                        <OPTION>Communication, Media</OPTION>
                        <OPTION>Construction, Batiments, Travaux publics</OPTION>
                        <OPTION>Ingenieurie</OPTION>
                        <OPTION>Medecine</OPTION>
                        <OPTION>Technicien</OPTION>
                        <OPTION selected>Etudiant</OPTION>
                        <OPTION>Enseignement</OPTION>
                        <OPTION>Retraité</OPTION>
                        <OPTION>Femme au foyer</OPTION>
                        <OPTION>Autres..</OPTION>
       	                </select>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "">
						<span class="label-input100">Region</span>
						
					<?php
						
						$link = dbcon();
 
						if($link === false){
							header("Location: error.php?er=1");
						}
						
						$query = "SELECT * FROM regions ORDER by ID_region";

						$res = mysqli_query($link,$query);
						echo "<select name = 'Ville' style='width: inherit'>";
						while ($row = mysqli_fetch_assoc($res))
						{
							echo "<option value = '{$row['ID_region']}'";
							echo ">{$row['Nom_region']}</option>";
						}
						echo "</select>"; ?>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "" style="border-bottom: 0px">
						<span class="label-input100">Categorie</span>
						<select name="Categorie" style="width: inherit"><option value="1">Nombre</option><option value="2">Commande</option><option value="3">Telephone</option><option value="4">Application</option></select>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Confirmer">
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>