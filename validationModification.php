<?php
	require('connexionmysql.php');
	require('model.php');
	// $image=$_POST['images'];
	$id=$_POST['id'];
	$description=$_POST['description'];
	$prix=$_POST['prix'];
	$idscategorie=$_POST['idscategorie'];
	$scategorie=$_POST['scategorie'];
	
	
	
	$connexion=Mysql_connection();
	/*if($image==''){
		$concatImage=$sary;
		echo $concatImage;
	}
	else{
		$concatImage="img/".$image;
		echo $concatImage;
	}*/
	
	update_valeurlettre("article","description",$description,$id,$connexion);
	update_valeurchiffre("article","prix",$prix,$id,$connexion);
	update_valeurlettre("souscategorie","nom",$scategorie,$idscategorie,$connexion);
	/*update_valeurlettre("imageContenus","titre",$titre,$id,$connexion);
	update_valeurlettre("imageContenus","idmenus",$menu,$id,$connexion);
	*/
	// if(sizeof($image)=='' || $titre==''|| $desc==''){
		header('Location: table.php?erreur=7');
	/*} 
	else{
		insert_imageContenus($desc,$titre,$concatImage,$menu,$connexion);
		header('Location: form-advance.php?erreur=2');
	}*/
	

?>