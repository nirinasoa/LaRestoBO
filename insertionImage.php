<?php
	require('connexionmysql.php');
	require('model.php');
	$image=$_POST['images'];
	$menu=$_POST['menu'];
	$desc=$_POST['desc'];
	$titre=$_POST['titre'];
	$concatImage="img/".$image;
	
	$connexion=Mysql_connection();
	echo $concatImage;
	echo "menu".$menu."</br>";
	echo $desc;
	echo $titre;
	if(sizeof($image)=='' || $titre==''|| $desc==''){
		header('Location: form-advance.php?erreur=1');
	} 
	else{
		insert_imageContenus($desc,$titre,$concatImage,$menu,$connexion);
		header('Location: form-advance.php?erreur=2');
	}
	

?>