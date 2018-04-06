<?php
	require('connexionmysql.php');
	require('model.php');

	$nom=$_POST['nom'];
	$mdp=$_POST['mdp'];
	$email=$_POST['email'];
	echo $nom;
	echo $mdp;
	echo $email;

	
	$connexion=Mysql_connection();
  if(sizeof($nom)=='' || $mdp==''|| $email==''){
		header('Location: login.php?erreur=1');
	} 
	else{
		$rep=insert_Utilsateur($nom,$email,$mdp,$connexion);
		echo $rep;
		header('Location: index.php');
	}

	

?>