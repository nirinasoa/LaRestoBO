<?php 
	require('connexionmysql.php');
	require('model.php');
	$connexion=Mysql_connection();
	
   $idcategorie=$_POST["data"];
	$souscategorie=find_table("souscategorie", " where idcategorie=".$idcategorie, $connexion);
	

?>
 <label>Séléctionner ses sous-catégorie</label>
											   <select id="souscategorie" name="souscategorie" class="form-control" >
													<option value="tous">tous</option>
													 <?php foreach($souscategorie AS $p){ ?>
														<option value="<?php echo $p->id ?>"><?php echo $p->nom ?></option>
													<?php } ?>
												</select>