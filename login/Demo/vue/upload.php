<?php
	include '../../dbcon.php';
    if(isset($_POST['save_audio']) && $_POST['save_audio']=="Upload File"){
        $dir='uploads/';
        $audio_path=$dir.basename($_FILES['audioFile']['name']);
        if(move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path)){
            echo 'uploaded successfully';
            saveAudio($audio_path);
            displayAudio();
        }
    }

    function displayAudio(){
        $conn=dbcon();
        
        if(!$conn){
            header("location: ../../error.php?er=1");
        }
        
        $query="Select * from enregistrement";
        
        $r=mysqli_query($conn,$query);
        
        while($row=mysqli_fetch_array($r)){
            echo $row['Lien'];
            echo '<a href="play.php?name='.$row['Lien'].'">'.$row['Lien'].'</a>';
            echo'<br>';
        }
        mysqli_close($conn);
    }

    function saveAudio($fileName){
        
        $conn=dbcon();
        
        if(!$conn){
            header("location: ../../error.php?er=1");
        }
        
        $query="insert into enregistrement(Lien)values('{$fileName}')";
        
        mysqli_query($conn,$query);
        
        if(mysqli_affected_rows($conn)>0){
            echo "audio file path saved in database ";
        }
        
        mysqli_close($conn);
    }
?>