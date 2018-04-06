<?php
	require('connexionmysql.php');
	require('model.php');
	$paragraphe=$_POST['paragraphe'];
	$idmenu=$_POST['idmenu'];

	
	$connexion=Mysql_connection();

	echo $paragraphe;
	echo $idmenu;
	if(sizeof($paragraphe)==''){
		header('Location: form-advance.php?erreur=4');
	} 
	else{
		insert_paragrapheContenus($paragraphe,$idmenu,$connexion);
		header('Location: form-advance.php?erreur=3');
	}
	
	
?>