<?php
	function dbcon(){
		$link = mysqli_connect("fdb21.awardspace.net", "2716621_dbmycorpora", "Corpora@321", "2716621_dbmycorpora");
        mysqli_set_charset($link,"utf8");
		return $link;
	}
?>