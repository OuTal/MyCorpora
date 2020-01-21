<?php
session_start();
include '../../dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Merci</title>
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
<?php

include_once('../modele/connexion_sql.php');
include_once('../modele/get_prompts.php');
if(!isset($_GET['next'])){
	$prompts = get_prompt(0, 3);
	$_SESSION['pt']=$prompts;
}
else{
	$prompts=$_SESSION['pt'];
}
foreach($prompts as $cle => $prompt)
{
$prompts[$cle]['Id'] = htmlspecialchars($prompt['Id']);
$prompts[$cle]['phrase'] =
nl2br(htmlspecialchars($prompt['phrase']));
}
// On affiche la page (vue)
?>
  		<?php
		 if(isset($_GET['next']))
		{
		$cle = (int)$_GET['next'];
		$subc=$cle;
		} 
		else
		 {$phrase = $prompts[0]['phrase']; 
		 $cle=1;
		 $subc=$cle;
		 $_SESSION['sub']=(int)0;
		}?>
		</head>
<body >
		<?php 
		$link = dbcon();
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$idd=$_SESSION['id'];
		if ($cle!=1 || $subc>0){
			$lienrec="Demo/recordings/$idd/".$_SESSION['form']."_audio_".$prompts[$subc-1]['phrase']."_".$cle.".wav";
			$_SESSION['sub']++;
			$sql = "SELECT max(ID_form) as ID_form FROM meta_donnees";
			$result = mysqli_query($link, $sql);

			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$id_form=$row['ID_form'];
					}
			} else {
				$id_form=1;
			}
			$sql = "INSERT INTO enregistrement (Lien,ID_form,ID_Phrase) VALUES ('$lienrec',$id_form,".($prompts[$subc-1]['Id']).")";
			if(!mysqli_query($link, $sql)){
				header("location: ../../error.php?er=2");
			}
			unset($_SESSION['pt']);
			mysqli_close($link);
		} ?>


			<div style="align:center;width:100%;background:#000000;padding:10px;">
				<a href="../../../index.html"><span style="color:#ffffff;padding-left:5%">My</span><span style="color:#1aff66;font-weight: bold;">Corpora</span></a>
				<a href="../../help.php" style="color:#3aafbd;"><span style="padding-right:5%;float:right;">Aide?</span></a>
				<span style="color:#ffffff;padding-right:5%;float:right;"><a href="../../contact.html">Nous Contacter</a></span>
                <span style="color:#ffffff;padding-right:5%;float:right;"><a href="../../form.php">Enregistrer</a></span>
			</div>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/bg.jpg)">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Thank you
					</span>
				</div>

				
				<p style="text-align: center;margin: 20px;margin-bottom: 10px; padding: 0px">Vos enregistrements ont été insérés avec succès, <br>nous vous remercions pour votre collaboration !</p>
                <div style="margin: 0px; margin-bottom: 20px"><img src="images/check.jpg" style="padding: 10px;margin-left: auto;margin-right: auto;display: block;" width="75px" height="75px"></div>
				
				
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