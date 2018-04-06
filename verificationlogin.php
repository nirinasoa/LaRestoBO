<?php
	require('connexionmysql.php');
	require('model.php');
	$Login=$_POST['nom'];
	$MotDePasse=$_POST['password'];
	$connexion=Mysql_connection();
	//echo $Login;
	//echo $MotDePasse;
	
	$CompteDansBase=verification_utilisateur($Login, $MotDePasse, $connexion);

	if(sizeof($CompteDansBase)==0){
		header('Location: index.php?erreur=1');
	} 
	else{
		header('Location: table.php');
	}
?>
