<?php
	function uploadImage($target_dir){

	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} 
	else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } 
	else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	return  basename( $_FILES["fileToUpload"]["name"]);
}





function prixpromo($prix,$pourcentage){
	$reponse=$prix-($prix*$pourcentage/100);
	return $reponse;
	
	
}

	///// PARTIE FIND	///////////////////////////////////////////////////////////////////////////////////////////////////////
	function find_table($nomtable,$condition,$connexion){
		$requete_prepare_1=$connexion->query("SELECT * FROM ".$nomtable." ".$condition.""); // on prépare notre requête
		// echo "SELECT * FROM ".$nomtable." ".$condition."";
		$requete_prepare_1->setFetchMode(PDO::FETCH_OBJ);
		$tableau=array();
		while($lignes=$requete_prepare_1->fetch()){
			$tableau[]=$lignes;
		}
		return $tableau;
	}
	//Find_produitsvendus
		function find_produitsvendus($condition,$connexion){
		$requete_prepare_1=$connexion->query("select p.id as idp,a.idGenre,a.id,a.nombre,a.image,a.titre,p.nombres,a.prix,a.prix*p.nombres as total from produitsvendus p join utilisateur u on u.id=p.idutilisateur join article a on a.id=p.idproduits where  p.idutilisateur=".$condition.""); // on prépare notre requête
		$requete_prepare_1->setFetchMode(PDO::FETCH_OBJ);
		$tableau=array();
		while($lignes=$requete_prepare_1->fetch()){
			$tableau[]=$lignes;
		}
		return $tableau;
	}
	
		//Find_TOTALproduitsvendus
		function find_totalProduitsvendus($condition,$connexion){
		$requete_prepare_1=$connexion->query("select sum(a.prix*p.nombres) as total,sum(p.nombres) as qte,sum(a.prix) as prix from produitsvendus p join utilisateur u on u.id=p.idutilisateur join article a on a.id=p.idproduits where  p.idutilisateur=".$condition.""); // on prépare notre requête
		$requete_prepare_1->setFetchMode(PDO::FETCH_OBJ);
		$tableau=array();
		while($lignes=$requete_prepare_1->fetch()){
			$tableau[]=$lignes;
		}
		return $tableau;
	}
	///// PARTIE DELETE	///////////////////////////////////////////////////////////////////////////////////////////////////////
	function delete_valeur($nomtable,$id,$connexion){
		$requete_prepare_1=$connexion->query("delete FROM ".$nomtable." where id=".$id.""); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	

	
	
	
	///// PARTIE UPDATE	///////////////////////////////////////////////////////////////////////////////////////////////////////
	//Update valeurs en string
	function update_valeurlettre($nomtable,$nomcolonne,$nouvellevaleur,$id,$connexion){
		$requete_prepare_1=$connexion->query("Update ".$nomtable." set ".$nomcolonne."='".$nouvellevaleur."' where id=".$id.""); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	//Update valeurs en int 
	function update_valeurchiffre($nomtable,$nomcolonne,$nouvellevaleur,$id,$connexion){
		// echo  "Update ".$nomtable." set ".$nomcolonne."=".$nouvellevaleur." where id=".$id."";
		$requete_prepare_1=$connexion->query("Update ".$nomtable." set ".$nomcolonne."=".$nouvellevaleur." where id=".$id.""); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	

	/////// TABLE genre ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_genre($types,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into genre(types) values('".$types."')"); // on prépare notre requête
		$requete_prepare_1->execute();
	}

	
	/////// TABLE typeArticle ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_typearticle($types,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into typeArticle(types) values('".$types."')"); // on prépare notre requête
		$requete_prepare_1->execute();
	}

	
	/////// TABLE marque ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_marque($nomMarque,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into marque(nomMarque) values('".$nomMarque."')"); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	
	
	/////// TABLE article ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
		function insert_souscategorie($idcategorie,$nom,$connexion){
		// ouverture d'une connexion ...
		// echo "Insert into article(idsouscategorie,image,prix,daty,description) values('".$idsouscategorie."','".$image."',".$prix.",now(),'".$description."')";
		$requete_prepare_1=$connexion->query("Insert into souscategorie(idcategorie,nom) values(".$idcategorie.",'".$nom."')"); // on prépare notre requête
		
	}
	function insert_article($idsouscategorie,$image,$prix,$description,$connexion){
		// ouverture d'une connexion ...
		echo "Insert into article(idsouscategorie,image,prix,daty,description) values('".$idsouscategorie."','".$image."',".$prix.",now(),'".$description."')";
		$requete_prepare_1=$connexion->query("Insert into article(idsouscategorie,image,prix,daty,description) values('".$idsouscategorie."','".$image."',".$prix.",now(),'".$description."')"); // on prépare notre requête
		
	}
	
	//Prendre un id
	function find_idarticle($titre,$connexion){
		$requete_prepare_1=$connexion->query("SELECT id n FROM article WHERE titre='".$titre."'"); // on prépare notre requête
		$ligne=$requete_prepare_1->fetch();
		$nombre=$ligne['n'];
		return $nombre;	
	}
	
	/////// TABLE utilisateur ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_Utilsateur($nom,$email,$motdepasse,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->exec("insert into utilisateur(nom,prenom,login,motdepasse,typeUtilisateur,contact,adresse) values('".$nom."','".$nom."','".$nom."',sha1('".$motdepasse."'),1,'0331234567','".$email."');"); // on prépare notre requête
	
	}
	function insert_contact($expediteur,$destinateur,$objet,$message,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->exec("Insert into contact(expediteur,destinateur,objet,email) values('".$expediteur."','".$destinateur."','".$objet."','".$email."')");// on prépare notre requête
	
	}
	
	// Verification si l'utilisateur est dans la liste des utilisateurs 
	function verification_utilisateur($login, $password, $connexion){
		$requete_prepare_1=$connexion->query("SELECT * FROM utilisateur WHERE nom='".$login."' and motdepasse=sha1('".$password."')"); // on prépare notre requête
		$requete_prepare_1->setFetchMode(PDO::FETCH_OBJ);
		$tableau=array();
		while($lignes=$requete_prepare_1->fetch()){
			$tableau[]=$lignes;
		}
		return $tableau;
	}
	
	
	
	/////// TABLE imageContenus ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_paiement($idfacture,$iddetailsmodepaiement,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into paiement(idfacture,iddetailsmodepaiement)  values(".$idfacture.",".$iddetailsmodepaiement.")"); // on prépare notre requête
	
	}
	function insert_paragrapheContenus($paragraphe,$idmenus,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into paragrapheContenus(paragraphe,idmenus)  values('".$paragraphe."',".$idmenus.")"); // on prépare notre requête
	   
	}
	

	function supprimer_doublonsArticle($connexion){
		$requete_prepare_1=$connexion->query("DELEtE  produitsvendus from produitsvendus LEFt OUtER JOIN (SELECt MIN(id) as id, idproduits, nombres, idutilisateur FROM produitsvendus GROUP BY idproduits, nombres, idutilisateur ) as produitsvendus1  ON produitsvendus.id = produitsvendus1.id WHERE produitsvendus1.id IS NULL"); // on prépare notre requête
		$requete_prepare_1->execute();
	}

	
	
	function insert_panier($idUtilisateur,$idArticle,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into Panier(idUtilisateur,idArticle,daty) values(".$idUtilisateur.",".$idArticle.",now())"); // on prépare notre requête
		$requete_prepare_1->execute();
	}
	
	/////// TABLE Facture ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_facture($idutilisateur,$prixtotal,$modepaiement,$numerodecompte,$lieu,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->exec("Insert into facture(idutilisateur,prixtotal,modepaiement,numerodecompte,lieu,daty) values(".$idutilisateur.",".$prixtotal.",".$modepaiement.",'".$numerodecompte."','".$lieu."',now())"); // on prépare notre requête
	
	}
	
	
	/////// TABLE Vente ///////////////////////////////////////////////////////////////////////////////////////////////
	//Insert
	function insert_vente($idUtilisateur,$idarticle,$prixarticle,$connexion){
		// ouverture d'une connexion ...
		$requete_prepare_1=$connexion->query("Insert into vente(idUtilisateur,idarticle,prixarticle,daty) values(".$idUtilisateur.",".$idarticle.",".$prixarticle.",now())"); // on prépare notre requête
		$requete_prepare_1->execute();
	}	
?>