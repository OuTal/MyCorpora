<?php
	session_start();
	include 'admin_login.php';
	include 'dbcon.php';
	if(!isset($_SESSION['username'])){header("location:index.php");}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ajouter une phrase</title>
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
				<?php showadmin(); 
				dbcon();
				if(isset($_GET['er'])){
				if($_GET['er']==4){echo "<script>alert('Confirmation du nouveau mot de passe erronée ou nouveau mot de passe contient moins de 8 caractères');</script>";}}
?>
			
			</div>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/bg.jpg)">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Modifier mot de passe
					</span>
				</div>
				<p style="text-align:center;padding-top:3%">Nouveau mot de passe doit contenir au moins 8 caractères !</p>
				<form class="login100-form validate-form" action="modifp.php" method="post">
					<div class="wrap-input100 validate-input m-b-18" data-validate = "" style="margin-bottom: 48px;">
						<span class="label-input100" style="width:160px;left:-45%;">Nom d'utilisateur</span>
						<input type="text" name="user" value="<?php echo $_SESSION['username'];?>" style="width: inherit;" disabled>
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-18" data-validate = "" style="margin-bottom: 48px;">
						<span class="label-input100" style="width:160px;left:-45%">Ancien mot de passe</span>
						<input type="password" name="pw" placeholder="Votre ancien mot de passe ici" style="width: inherit;">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "" style="margin-bottom: 48px;">
						<span class="label-input100" style="width:160px;left:-45%">Nouveau mot de passe</span>
						<input type="password" name="npw" placeholder="Votre nouveau mot de passe ici" style="width: inherit;">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-18" data-validate = "" style="margin-bottom: 48px;">
						<span class="label-input100" style="width:160px;left:-45%">Confirmer nouveau mot de passe</span>
						<input type="password" name="nnpw" placeholder="Confirmer votre nouveau mot de passe ici" style="width: inherit;">
						<span class="focus-input100"></span>
					</div>
					


					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Ajouter">
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