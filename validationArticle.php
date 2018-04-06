<?php
// $image=$_POST['images'];
$scategorie=$_POST['scategorie'];
$prix=$_POST['prix'];
$description=$_POST['description'];
	require('connexionmysql.php');
	require('model.php');
	$connexion=Mysql_connection();
	
	
	// $gg= uploadImage("../LaRestoY/assets/images/");
	$image= uploadImage("../images/");
	// echo $gg;

	// $concat='assets/images/'.$image;
// echo $concat;
	// echo $scategorie;
	// echo $prix;
	// echo $description;
	
	
	/*$target_dir = "assets/images/";
	$target_dir1 = "../../LaRestoY/assets/images";
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
}*/

// $image= basename( $_FILES["fileToUpload"]["name"]);
	$concat='../images/'.$image;
	echo $concat;
	$findcategorie=find_table("souscategorie", " order by id desc limit 1 ", $connexion);
	 foreach ($findcategorie as $compt){
					$idscategorie=$compt->id;
					// echo 'idscategorie='.$idscategorie;
					
				} 
				// echo $concat;
	
insert_article($idscategorie,$concat,$prix,$description,$connexion);
 header('Location: table.php');

?>