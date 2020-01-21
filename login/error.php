<?php
session_start();
include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Erreur</title>
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
                <span style="color:#ffffff;padding-right:5%;float:right;"><a href="form.php">Enregister</a></span>
			</div>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/bg.jpg)">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Erreur
					</span>
				</div>

				
				<p style="text-align: center;margin: 20px;margin-bottom: 10px; padding: 0px">Oops! <br>nous avons rencontré une erreur !<br>Merci de réessayer ou de consulter l'aide.</p>
                <div style="margin: 0px; margin-bottom: 20px"><img src="images/error.png" style="padding: 10px;margin-left: auto;margin-right: auto;display: block;" width="75px" height="75px"></div>
				
			</div>
		</div>
	</div>
<!--===============================================================================================-->

<!-- <?php if(isset($_GET['er'])){
					switch($_GET['er']){
						case 1:
							echo "ERROR CODE: Not able to connect to database.";
							break;
						case 2:
							echo "ERROR CODE: Not able to execute request.";
							break;
						case 3:
							echo "ERROR CODE: Not able to delete file.";
							break;
						case 4:
							echo "ERROR CODE: Not able to disconnect from database.";
							break;
						case 5:
							echo "ERROR CODE: Not able to find phrases to pronounce.";
							break;
					}
				}
				?> -->

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