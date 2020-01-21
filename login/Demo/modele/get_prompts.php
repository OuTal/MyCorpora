<?php
function get_prompt($offset, $limit)
{
$offset = (int) $offset;
$limit = (int) $limit;
if($_SESSION['cat']==1 or $_SESSION['cat']==4){
	$req ="SELECT Id, COUNT(phrase) as nb, phrase,phrase_ar FROM phrases,enregistrement WHERE phrases.Id=enregistrement.ID_Phrase AND phrases.ID_cat= ".$_SESSION['cat']." GROUP BY phrases.Id ORDER BY nb ASC LIMIT ".$offset.", ".$limit;
}else{
	$req = "SELECT Id, COUNT(phrase) as nb, phrase,phrase_ar FROM phrases,enregistrement WHERE phrases.Id=enregistrement.ID_Phrase AND phrases.ID_cat= ".$_SESSION['cat']." AND ID_region = ".$_SESSION['ID_reg']." GROUP BY phrases.Id ORDER BY nb ASC LIMIT ".$offset.", ".$limit;
}
$link=dbcon();
$result=mysqli_query($link,$req);
$i=0;
while ($row = mysqli_fetch_assoc($result)) {
       $prompts[$i]=$row;
	   $i++;
   }return $prompts;
}
?>