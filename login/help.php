<?php
	session_start();
	include 'dbcon.php';
	include 'admin_login.php';
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aide</title>
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
				<a href="help.php" style="color:#3aafbd;"><span style="padding-right:5%;float:right;">Aide?</span></a>
				<span style="color:#ffffff;padding-right:5%;float:right;"><a href="contact.html">Nous contacter</a></span>
                <span style="color:#ffffff;padding-right:5%;float:right;"><a href="form.php">Enregistrer</a></span>
				<?php showadmin(); ?>
			
			</div>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/bg.jpg)">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Aide
					</span>
				</div>
				<br>
				<h4 style="text-align:center;margin:2%	">Voici les étapes qui montrent comment effectuer les enregistrements :</h4><br>
                <p style="text-align:center;margin:2%	">
				1) Autoriser l'utilisation du micro par votre navigateur.<br>
                    <img src="images/enr0.PNG" width="50%"><br><br><br>
				2) Cliquer sur l'icone micro <img src="images/enr1.PNG" width="7%">  pour commencer l'enregistrement.
				 Dès que le micro commence à clignoter,<img src="images/enr3.PNG" width="5%"> prononcer la phrase affichée dans votre interface<br>
				 puis cliquer sur <img src="images/enr4.PNG" width="5%"> pour arrêter l'enregistrement .<br><br><br>
				<strong style="font-size:30px">!</strong>(facultatif) votre enregistrement va s'afficher dans un lecteur en dessous,relir pour confirmer <img src="images/enr5.jpg" width="30%"><br> <br>
				3) Appuyez sur <img src="images/enr6.PNG" width="5%"> pour upload votre fichier et allez vers l'étape suivante<br><br>
				4) Continuer jusqu'à atteindre l'interface finale de remerciement<br>
                    <img src="images/thanks.PNG" width="60%"><br>
				<strong>PS: n'hésitez pas à aller vers la page de <a href="contact.html">contact</a> pour nous atteindre avec<br>
				toute remarque ou signaler toute anomalie.<br>
				Nous vous remercions encore pour votre collaboration !<br>.</strong></p>
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