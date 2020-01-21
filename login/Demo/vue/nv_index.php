<?php
session_start();
include 'admin_iflogin.php';
include '../../dbcon.php';
?>
<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Tâche</title>
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

<style>
 .btnp{
      background: url(../images/record.png) no-repeat;
      width: 85px;
      height: 85px;
 } 
 .btnp1{
      background: url(../images/rec.gif) no-repeat;
      width: 85px;
      height: 85px;
 } 
  .btns{
      background: url(../images/STOP.png) no-repeat;
      width: 85px;
      height: 85px;
 } 
 ul { list-style: none; }
    #recordingslist audio { display: block; margin-bottom: 10px; }


</style>

  <?php

include_once('../modele/connexion_sql.php');
include_once('../modele/get_prompts.php');
$link = dbcon();
if($link === false){
	header("location: ../../error.php?er=1");
}

if($_SESSION['maj']==1){
	if(isset($_GET['n'])){
		$_SESSION['cat']=rand(1,4);
		}
	$prompts = get_prompt(0, 10);
	$_SESSION['pt']=$prompts;
	if(sizeof($prompts)==0){header("location: ../../error.php?er=5&i=".$_SESSION['cat']);}
			$sql = "SELECT max(ID_form) as ID_form FROM meta_donnees";
			$result = mysqli_query($link, $sql);

			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$_SESSION['form']=$row['ID_form'];
					}
			} else {
				$_SESSION['form']=1;
			}
			unset($_SESSION['maj']);
}
else{
	$prompts=$_SESSION['pt'];
}
foreach($prompts as $cle => $prompt)
{
$prompts[$cle]['Id'] = htmlspecialchars($prompt['Id']);
$prompts[$cle]['phrase'] =
nl2br(htmlspecialchars($prompt['phrase']));
    $prompts[$cle]['phrase_ar'] =
nl2br(htmlspecialchars($prompt['phrase_ar']));
}
// On affiche la page (vue)
?>
  		<?php
		 if(isset($_GET['next']) && !isset($_GET['n']))
		{
		$cle = (int)$_GET['next'];
		$phrase = $prompts[$cle]['phrase'];
        $phrase_ar = $prompts[$cle]['phrase_ar'];
		$cle++;
		$subc=$cle;
		} 
		else
		 {$phrase = $prompts[0]['phrase']; 
         $phrase_ar = $prompts[0]['phrase_ar'];
		 $cle=1;
		 $subc=$cle;
		 $_SESSION['sub']=(int)0;
		}?>
         <script>var __adobewebfontsappname__="dreamweaver"</script><script src="https://use.edgefonts.net/abel:n4:default.js" type="text/javascript"></script>
</head>
<body>
<div style="align:center;width:100%;background:#000000;padding:10px;">
        <a href="../../../index.html"><span style="color:#ffffff;padding-left:5%">My</span><span style="color:#1aff66;font-weight: bold;">Corpora</span></a>
		<a href="../../help.php" style="color:#3aafbd;"><span style="padding-right:5%;float:right;">Aide?</span></a>
        <span style="color:#ffffff;padding-right:5%;float:right;"><a href="../../contact.html">Nous Contacter</a></span>
        <span style="color:#ffffff;padding-right:5%;float:right;"><a href="../../form.php">Enregistrer</a></span>
		<?php showadmin(); ?>
      
      </div>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url(images/bg.jpg)">
      <div class="wrap-login100" >
			<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Phrase à lire :<br>
						   <h4>" <?php echo $phrase;?> "<br>
                                " <?php echo $phrase_ar;?> "
    <br>
    </h4>
					</span>
				</div>
	  <div>
      
    <div  align="center" id = "workspace" >
 
    <div id="prompt">
 
        </div>
    <h4 style="margin-top: 2%"> Categorie de phrases : " <?php
			$sql = "SELECT * FROM categorie where ID_cat=".$_SESSION['cat'];
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
			echo $row['cat']; ?> "</h4>
    <h3 style="margin-top: 1%">Phrase N°<br>
    <?php 
    if(isset($_GET['next']) && !isset($_GET['n']))
    {
       $cle = (int)$_GET['next'];
	   echo $subc;
	   $cle++;} 
    else
    {
	echo $subc;
    $cle=1;
	}
    ?>
        / <?php echo count($prompts);?>
    </h3>
        
    

  <button type="bouton" class="btnp" id="IRbuttonplay" onclick="startRecording(this);" style="padding-top:11%"><em id="ema"></em></button>
  <button type="bouton" class="btns" id="IRbuttonstop" onclick="stopRecording(this);" style="padding-top:11%" disabled><em id="emb"></em></button>

	<a href="<?php 
		$idd=$_SESSION['id'];
		$formbis=$_SESSION['form'];
		
		if(isset($_GET['n'])){
			$lienrec="Demo/recordings/$idd/".$_SESSION['form']."_audio_".$_GET['nnn']."_".($_GET['subct']).".wav";
			$sql = "INSERT INTO enregistrement (Lien,ID_form,ID_Phrase) VALUES ('$lienrec',".$_GET['n'].",".$_GET['nn'].")";
			if(!mysqli_query($link, $sql)){
				header("location: ../../error.php?er=2");
			}
			mysqli_close($link);
		}
		if ($cle!=1){
			$lienrec="Demo/recordings/$idd/".$_SESSION['form']."_audio_".$prompts[$cle-2]['phrase']."_".($subc-1).".wav";
			$_SESSION['sub']++;
			$sql = "INSERT INTO enregistrement (Lien,ID_form,ID_Phrase) VALUES ('$lienrec',".$_SESSION['form'].",".($prompts[$cle-2]['Id']).")";
			if(!mysqli_query($link, $sql)){
				header("location: ../../error.php?er=2");
			}
			mysqli_close($link);
		}
       if($cle < count($prompts)){echo 'nv_index.php?next='.$cle.'&maj=0'; }
       else {echo '../vue/Thanks.php?next='.$cle;}
       ?> "
              title="Suivant" id="Next"> <img src="../images/next.png"> </a>
   

 

  <div class = "liste" style="margin-bottom: 3%">
  <h2>Votre enregistrement</h2>
  <ul id="recordingslist">Votre enregistrement s'affichera ici !</ul>
  </div>
  					<div style="margin-bottom: 2%">
						<span>
						<a href="<?php
							if($cle < count($prompts)){echo 'nv_index.php?n='.$_SESSION['form'].'&nn='.$prompts[$cle-1]['Id'].'&nnn='.$prompts[$cle-1]['phrase'].'&maj=1&subct='.$subc; }
							else {echo '../vue/Thanks.php?n='.$_SESSION['form'].'&nn='.$prompts[$cle-1]['Id'].'&nnn='.$prompts[$cle-1]['phrase'];}
						?>" style="color:#2E64FE">
						Essayer une autre catégorie
						</a>  -  <a href="<?php echo '../vue/Thanks.php?n=1&next='.$cle;?>" style="color:red">
						Interrompre l'enregistrement
						</a>
						</span>
					</div>

 
  <pre id="log"></pre>  
  
</div>

      </div>
    </div>
  </div>
      
     
    <script >
  function __log(e, data) {
    //log.innerHTML += "\n" + e + " " + (data || '');
  }

  var audio_context;
  var recorder;

  function startUserMedia(stream) {
    var input = audio_context.createMediaStreamSource(stream);
    __log('Media stream created.');

    // Uncomment if you want the audio to feedback directly
    //input.connect(audio_context.destination);
    //__log('Input connected to audio context destination.');
    
    recorder = new Recorder(input);
    __log('Recorder initialised.');
  }

  function startRecording(button) {
    recorder && recorder.record();
    button.disabled = true;
	var elmt = document.getElementById("ema");
	elmt.style.backgroundPosition = "-135px -5px";
	
	var elmt2 = document.getElementById("emb");
	elmt2.style.backgroundPosition = "-5px -5px";
    button.nextElementSibling.disabled = false;
    __log('Recording...');
	document.getElementById('IRbuttonplay').setAttribute("class","btnp1");

  }

  function stopRecording(button) {
    recorder && recorder.stop();
    button.disabled = true;
	var elmt = document.getElementById("ema");
	elmt.style.backgroundPosition = "-5px -5px";
	var elmt2 = document.getElementById("emb");
	elmt2.style.backgroundPosition = "-135px -5px";
    button.previousElementSibling.disabled = false;
    __log('Stopped recording.');
	
	var myNode = document.getElementById("recordingslist");
	while (myNode.firstChild) {
    myNode.removeChild(myNode.firstChild);
	document.getElementById('IRbuttonplay').setAttribute("class","btnp");
	}

    
    // create WAV download link using audio data blob
   // createDownloadLink();
    exportWAV();
	recorder.clear();
  }
	
   function exportWAV(){
	     recorder.exportWAV(function (blob) {
    var url = (window.URL || window.webkitURL).createObjectURL(blob);
	
	 var audio = document.createElement('audio');
    audio.src = url;
    audio.controls = true;
	audio.style.marginLeft = 'auto';
	audio.style.marginRight = 'auto'; 
    var hf = document.createElement('a');
    hf.href = url;
    hf.download = new Date().toISOString() + '.wav';
	recordingslist.appendChild(audio);
    upload2(blob);   
            
});
	   }
	   
/*function upload(blob) {
  var xhr=new XMLHttpRequest();
  xhr.onload=function(e) {
      if(this.readyState === 4) {
          __log("Server returned: ",e.target.responseText);
      }
  };
  var fd=new FormData();
  fd.append("filename.wav",blob);
  xhr.open("POST","/recordings/save_fileMob.php",true);
  xhr.send(fd);
  //document.location.href="/recordings/save_fileMob.php";
}*/

function upload2(blob){
	var fileType = 'audio'; // or "audio"
var fileName = '<?php echo $formbis."_audio_".$phrase."_".($subc);?>.wav';  // or "wav"

var formData = new FormData();
formData.append(fileType + '-filename', fileName);
formData.append(fileType + '-blob', blob);

xhr('../recordings/save.php', formData, function (fName) {
   //window.open(location.href + fName);
});


function xhr(url, data, callback) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            callback(location.href + request.responseText);
        }
    };
    request.open('POST', url);
    request.send(data);
}
	}


   /*function createDownloadLink() {
    recorder && recorder.exportWAV(function(blob) {
      var url = (window.URL || window.webkitURL).createObjectURL(blob);
  
      var li = document.createElement('li');
      var au = document.createElement('audio');
      var hf = document.createElement('a');
      
      au.controls = true;
      au.src = url;
      hf.href = url;
      hf.download = new Date().toISOString() + '.wav';
      hf.innerHTML = hf.download;
      li.appendChild(au);
      li.appendChild(hf);
      recordingslist.appendChild(li);
	
  
    });
  }
*/
  window.onload = function init() {
    try {
      // webkit shim
      window.AudioContext = window.AudioContext || window.webkitAudioContext;
      navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||
                  navigator.mozGetUserMedia || navigator.msGetUserMedia;
      window.URL = window.URL || window.webkitURL;
      
      audio_context = new AudioContext;
      __log('Audio context set up.');
      __log('navigator.getUserMedia ' + (navigator.getUserMedia ? 'available.' : 'not present!'));
    } catch (e) {
      alert('No web audio support in this browser!');
    }
    
    navigator.getUserMedia({audio: true}, startUserMedia, function(e) {
      __log('No live audio input: ' + e);
    });
  };

  </script>
      
      

  <script src="../Scripts/recorder.js"></script>
  
</body>
</html>
