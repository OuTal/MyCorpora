<?php
session_start();
include 'admin_login.php';
include 'dbcon.php';
if(!isset($_SESSION['username'])){header("location:index.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Modifier Phrase</title>
	<meta charset="utf8_bin">
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
		<?php
		$link = dbcon();
 
// Check connection
if($link === false){
    header("location: error.php?er=1");
}
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
						Modifier une phrase
					</span>
				</div>

				<form class="login100-form validate-form" action="upd.php" method="post">					
					<div class="wrap-input100 validate-input m-b-18" data-validate = "" style="border-bottom: 0px">
						<span class="label-input100">Region</span>
						<select name="Region" style="width: inherit">
                            <option value="1">
                                <?php
                                    $_SESSION['ph_id'] = $_GET['Id_phrase'];
                                    $query = "SELECT * FROM phrases,regions where phrases.ID_region=regions.ID_region 
                                        and phrases.id=".$_GET['Id_phrase'];

                                        $res = mysqli_query($link,$query);

                                        while ($row = mysqli_fetch_assoc($res)){
                                            echo $row['Nom_region'];
                                        }
                                ?>
                            </option>
                            <?php
                                    $query = "SELECT * FROM regions";

                                        $res = mysqli_query($link,$query);

                                        while ($row = mysqli_fetch_assoc($res)){
                                            echo '<option value='.$row['ID_region'].'>'.$row['Nom_region'].'</option>';
                                        }
                                ?>
                        </select>
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "" style="border-bottom: 0px">
						<span class="label-input100">Categorie</span>
						<select name="Categorie" style="width: inherit">
                            <option value=
                                <?php
                                    $query = "SELECT * FROM phrases,categorie where phrases.ID_cat=categorie.ID_cat 
                                        and phrases.id=".$_GET['Id_phrase'];

                                        $res = mysqli_query($link,$query);

                                        while ($row = mysqli_fetch_assoc($res)){
                                            echo "'".$row['ID_cat']."'>".$row['cat'];
                                        }
                                ?>
                                    
                            </option>
                            <?php
                                    $query = "SELECT * FROM categorie";

                                        $res = mysqli_query($link,$query);

                                        while ($row = mysqli_fetch_assoc($res)){
                                            echo '<option value='.$row['ID_cat'].'>'.$row['cat'].'</option>';
                                        }
                                ?>
                        </select>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "">
						<span class="label-input100">Phrase</span>
						<input type="text" name="Phrase" style="width: inherit;" 
                               value="<?php
                                    $query = "SELECT * FROM phrases,categorie where phrases.ID_cat=categorie.ID_cat 
                                        and phrases.id=".$_GET['Id_phrase'];

                                        $res = mysqli_query($link,$query);

                                        while ($row = mysqli_fetch_assoc($res)){
                                            echo $row['phrase'];
                                        }
                                ?>">
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "">
						<span class="label-input100">Phrase En Arabe</span>
						<input type="text" name="Phrasear" style="width: inherit;" 
                               value="<?php
                                      
                                    $query = "SELECT * FROM phrases,categorie where phrases.ID_cat=categorie.ID_cat 
                                        and phrases.id=".$_GET['Id_phrase'];
                                        
                                        $res = mysqli_query($link,$query);

                                        while ($row = mysqli_fetch_assoc($res)){
                                            echo $row['phrase_ar'];
                                        }
                                ?>">
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