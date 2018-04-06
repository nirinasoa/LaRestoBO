<?php
	require('connexionmysql.php');
	require('model.php');
	$id=$_GET['id'];
	
	$connexion=Mysql_connection();

	
      delete_valeur("article",$id,$connexion);
		header('Location: table.php');


	
?>