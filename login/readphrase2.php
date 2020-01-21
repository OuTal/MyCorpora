<?php
session_start();
include 'dbcon.php';
include 'admin_login.php';
if(!isset($_SESSION['username'])){header("location:index.php");}
?>
<!DOCTYPE>
<html >

<head profile="http://www.w3.org/1999/xhtml/vocab">
    	<title>Parcours des Phrases</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="http://rbayliss.net/sites/all/themes/rob/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="shortlink" href="/node/19" />
<link rel="canonical" href="/jquery-dropdown-table-filter" />
<meta name="Generator" content="Drupal 7 (http://drupal.org)" />
<meta name="google-site-verification" content="-krX_z5zccFzE-QUncQXnYZi3NzJtxJR8vuvZhdQ3k4" />

<link type="text/css" rel="stylesheet" href="http://rbayliss.net/sites/default/files/css/css_f4kDeWsEm9tMDfAaICjLOUEdN4ECv40PyHS4qjaQAzs.css" media="all" />
<link type="text/css" rel="stylesheet" href="http://rbayliss.net/sites/default/files/css/css_J5MQC5KLbjC2oQy6f6IP2wKkwOodT17isORPy4K_p84.css" media="screen" />
<link type="text/css" rel="stylesheet" href="http://rbayliss.net/sites/default/files/css/css_Gaa1lXZqFXa2IuM-dkxDrLH5R_xfpmSu3nm8N61gEUg.css" media="all" />
<link type="text/css" rel="stylesheet" href="http://rbayliss.net/sites/default/files/css/css_WWy1786hoxRj6oedGDDFgFjssQgj0JsD_25yciWTxtE.css" media="all" />
<link type="text/css" rel="stylesheet" href="http://rbayliss.net/sites/default/files/css/css_1f5WAiERfGz-1iA5UfSxonxNQJftUT9fThPjJKxHBXM.css" media="all" />
<link type="text/css" rel="stylesheet" href="http://rbayliss.net/sites/default/files/css/css_j4C3594je-e9TFHhMtxytIt8m2Wiz-VCxSS5D1MO8Oo.css" media="print" />
  <script type="text/javascript" src="http://rbayliss.net/sites/default/files/js/js_vDrW3Ry_4gtSYaLsh77lWhWjIC6ml2QNkcfvfP5CVFs.js"></script>
<script type="text/javascript" src="http://rbayliss.net/sites/default/files/js/js_xnaB0jBYrGI0G159tJmr4dCKw1naro5R-LaIgsgzruY.js"></script>
<script type="text/javascript" src="http://rbayliss.net/sites/default/files/js/js_yZYI52CYqKUA7iHsJ3TPDOAs6c3E4t3eNYj6CxvUbI8.js"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery(document).ready(function () {
  jQuery('#table_format').ddTableFilter();
});
//--><!]]>
</script>
<script type="text/javascript" src="http://rbayliss.net/sites/default/files/js/js_I8yX6RYPZb7AtMcDUA3QKDZqVkvEn35ED11_1i7vVpc.js"></script>
<script type="text/javascript">
(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,"script","http://rbayliss.net/sites/default/files/googleanalytics/analytics.js?p7e8ii","ga");
    ga("create", "UA-12611986-2", {"cookieDomain":"auto"});
    ga("send", "pageview");
</script>
<script>
	function del(id){
		if(confirm("Etes-vous surs de vouloir supprimer la phrase n°"+id+"?")){window.open("supprimer.php?Id_phrase="+id);}
	}
</script>

<script type="text/javascript" src="http://rbayliss.net/sites/default/files/js/js_tzEGTRyjbSNo4GS4Eh6_ZJb5BgaDvQF9UshkdxwThp0.js"></script>

</head>
<body class="html not-front not-logged-in no-sidebars page-node page-node- page-node-19 node-type-story section-jquery-dropdown-table-filter" >
		<?php
		$link = dbcon();
 
// Check connection
if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
}
?>
    <table id="table_format" style="margin-left: auto; margin-right: auto;"><tbody>
    <tr>
       <th class='skip-filter'>Phrases</th>
        <th>Categorie</th>
        <th>Region</th> 
        <th>Modifier</th> 
        <th>Afficher</th> 
        <th>Supprimer</th> 
    </tr>
    
       <?php
						$query = "SELECT * FROM phrases,categorie, regions where phrases.ID_cat=categorie.ID_cat 
                        and phrases.ID_region=regions.ID_region";

						$res = mysqli_query($link,$query);

						
						while ($row = mysqli_fetch_assoc($res))
						{
                            echo "<tr>";
							echo "<td style='border: 1px solid black; padding: 5px;'> ".$row['phrase']."</td>";
                            echo "<td style='border: 1px solid black; padding: 5px;'> ".$row['cat']."</td>";
                            echo "<td style='border: 1px solid black; padding: 5px;'> ".$row['Nom_region']."</td>";
                            echo '<td style="border: 1px solid black; padding: 5px;">
                                <a href="update.php?Id_phrase='.$row["Id"].'" target="_blank"><img src="images/update.png"></a>
                            </td>';
                            echo '<td style="border: 1px solid black; padding: 5px;">
                                <a href="readp.php?Phrase='.$row["Id"].'" target="_blank"><img src="images/play.png"></a>
                            </td>';
                            echo '<td style="border: 1px solid black; padding: 5px;">
                                <a onclick="del('.$row["Id"].')" style="cursor:pointer" target="_blank"><img src="images/delete_nv.png"></a>
                            </td>';
                            echo'</tr>';
                            echo "<tr>";
						}

                        
						 ?>
        
    
    </tbody>
</table>
 

  </body>
</html>
