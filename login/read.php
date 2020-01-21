<?php
session_start();
include 'dbcon.php';
include 'admin_login.php';
if(!isset($_SESSION['username'])){header("location:index.php");}
$link = dbcon();
// Check connection
if($link === false){
    header("location: error.php?er=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Selectionner Phrase</title>
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
<script>
function opt(val,txt){
	return "<option value = "+val+">"+txt+"</option>";
}
function upd() {
	cat = document.getElementById("Categorie").value;
	reg = document.getElementById("Region").value;
	phrases = document.getElementById("Phrase");
	phrases.disabled=false;
	
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			phrases.innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","getres.php?cat="+document.getElementById("Categorie").value+"&reg="+document.getElementById("Region").value,true);
	xmlhttp.send();
}
	function en_reg(){
		document.getElementById("Region").disabled=false;
		upd();
	}
</script>

</head>
<body >
			<div style="align:center;width:100%;background:#000000;padding:10px;">
				<a href="../index.html"><span style="color:#ffffff;padding-left:5%">My</span><span style="color:#1aff66;font-weight: bold;">Corpora</span></a>
				<a href="help.php" style="color:#3aafbd;"><span style="padding-right:5%;float:right;">Aide?</span></a>
				<span style="color:#ffffff;padding-right:5%;float:right;"><a href="contact.html">Nous Contacter</a></span>
                <span style="color:#ffffff;padding-right:5%;float:right;"><a href="form.php">Enregistrer</a></span>
				<?php showadmin(); ?>
				
			</div>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/bg.jpg)">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Parcours des enregistrements
					</span>
				</div>

				<form class="login100-form validate-form" action="readp.php" method="get">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Categorie</span>
						<select onchange="en_reg()" name = 'Categorie' ID = 'Categorie' style='width: inherit'>
						<?php
						$query = "SELECT * FROM categorie";

						$res = mysqli_query($link,$query);
						while ($row = mysqli_fetch_assoc($res))
						{
							echo "<option value = ".$row['ID_cat']."";
							echo ">".$row['cat']."</option>";
						}
						echo "</select>"; ?>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Region</span>
						<select onchange='upd()' name = 'Region' ID = 'Region' style='width: inherit'>
						<?php
						$query = "SELECT * FROM regions";
						
						$res = mysqli_query($link,$query);
						while ($row = mysqli_fetch_assoc($res))
						{
							echo "<option value = ".$row['ID_region']."";
							echo ">".$row['Nom_region']."</option>";
						}
						 ?>
						</select>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Phrase</span>
						<select name = 'Phrase' ID = 'Phrase' style='width: inherit;' disabled>
							<option disabled>-</option>
						</select>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Afficher
						</button>
					</div>
				
				  					<div style="margin-bottom: 2%;margin-top: 2%;width:100%">
						<span>
						<a href="readp.php?all=1" style="color:red;text-align:center;float:center">
						Lire tous les enregistrements !
						</a>
						</span>
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