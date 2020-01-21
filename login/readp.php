<?php
session_start();
include 'admin_login.php';
include 'dbcon.php';
if(!isset($_SESSION['username'])){header("location:index.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ecouter Enregistrements</title>
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
	function del(id,all){
		if(confirm("Etes-vous surs de vouloir supprimer l'enregistrement n°"+id+"?")){
			if(all==1){
				window.location.assign("delete_script.php?id="+id+"&all=1");
			}else{
			window.location.assign("delete_script.php?id="+id);
			}
	}
	}
</script>

</head>
<body >
		<?php
		$link = dbcon();
 
// Check connection
if($link === false){
    header("location: error.php?er=1");
}

$phr = $_GET['Phrase'];

if(isset($_GET['all'])){$query="SELECT * from enregistrement WHERE ID_form!=0";}
else{$query="SELECT * from enregistrement WHERE enregistrement.ID_phrase=$phr AND ID_form!=0";}
$res = mysqli_query($link,$query);
if (!$res){header("location: error.php?er=2");}
if(isset($_GET['conf'])){echo "<script>alert('suppression effectuée avec succès');</script>";}
?>



			<div style="align:center;width:100%;background:#000000;padding:10px;">
				<a href="../index.html"><span style="color:#ffffff;padding-left:5%">My</span><span style="color:#1aff66;font-weight: bold;">Corpora</span></a>
				<a href="help.php" style="color:#3aafbd;"><span style="padding-right:5%;float:right;">Aide?</span></a>
				<span style="color:#ffffff;padding-right:5%;float:right;"><a href="contact.html">Nous Contacter</a></span>
                <span style="color:#ffffff;padding-right:5%;float:right;"><a href="form.php">Enregistrer</a></span>
				<?php showadmin();?>
			</div>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/bg.jpg)">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Parcours des enregistrements
					</span>
				</div>
				<form class="login100-form" style="height:400px;overflow-y:scroll">
				
				<?php
						while ($row = mysqli_fetch_assoc($res))
						{	
							$lien=$row["Lien"];
							$id_rec=$row["ID_rec"];
							echo '<div class="wrap-input100">
							<span class="label-input100">n°'.$id_rec.'</span>';
							echo '<div class="input100"><audio style="width:80%;" src = "'.$lien.'" controls></audio>';
							echo '<span><a onclick="del('.$id_rec.",";
							if(isset($_GET['all']))
								echo "1";
							else
								echo "0";
							echo ')" style="cursor:pointer;" title="Supprimer enregistrement n°'.$id_rec.'" ><img src="./images/icons/del.png" ></a>';
							echo '<a href="inf.php?id='.$id_rec.'" title="Infos enregistrement n°'.$id_rec.'" ><img src="./images/icons/info.png" ></a></span></div>';
							echo '</div>
							';
						}
						?>
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