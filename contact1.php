<?php
	require('model.php');
require('connexionmysql.php');
	$connexion=Mysql_connection();
	
	
	$dest=$_POST['destinataire'];;
	// $dest=$_POST['destinataire'];
	
	$sujet=$_POST['sujet'];

	$message1=$_POST['message'];

		$destinataire = $dest;
		// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il
		$expediteur =$_POST['expediteur'];
		//$copie = 'adresse@fai.com';
		//$copie_cachee = 'adresse@fai.com';
		$objet = $sujet; // Objet du message
		$headers = 'MIME-Version: 1.0' . "\n"; // Version MIME
		$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type
		$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
		$headers .= 'From: "Nom expediteur"<'.$expediteur.'>'."\n"; // Expediteur
		$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
		//$headers .= 'Cc: '.$copie."\n"; // Copie Cc
		//$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc
		
		$message = '<div style="width: 100%; text-align: center; font-weight: bold">'.$message1.'</div>';
		if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
		{
			header('Location: blank.php?succes=1');
		}
		else // Non envoyé
		{
			header('Location: blank.php?erreur=1');
		}
	
		
?>