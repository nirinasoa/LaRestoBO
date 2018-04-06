<?php
	require('connexionmysql.php');
	require('model.php');

	$id=$_POST['id'];
	$menu=$_POST['menu'];
	$paragraphe=$_POST['paragraphe'];
    echo $id;
    echo $menu;
    echo $paragraphe;
	
	$connexion=Mysql_connection();

	update_valeurlettre("paragrapheContenus","paragraphe",$paragraphe,$id,$connexion);
	update_valeurlettre("paragrapheContenus","idmenus",$menu,$id,$connexion);

	// if(sizeof($image)=='' || $titre==''|| $desc==''){
		header('Location: table.php?erreur=8');
	/*} 
	else{
		insert_imageContenus($desc,$titre,$concatImage,$menu,$connexion);
		header('Location: form-advance.php?erreur=2');
	}*/
	

?>