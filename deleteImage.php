<?php
	require('connexionmysql.php');
	require('model.php');
	$id=$_GET['id'];
	
	$connexion=Mysql_connection();
	echo $concatImage;
	
      delete_valeur("imageContenus",$id,$connexion);
		header('Location: table.php?erreur=1');


	
?>