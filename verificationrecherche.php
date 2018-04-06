
<!DOCTYPE html>
<?php
	require('connexionmysql.php');
	require('model.php');
	$connexion=Mysql_connection();
	$date1=$_POST['date1'];
	$date2=$_POST['date2'];
	$nom=$_POST['nom'];
	$categorie=$_POST['categorie'];
	$souscategorie=$_POST['souscategorie'];
	$prix1=$_POST['prix1'];
	$prix2=$_POST['prix2'];
	/*echo $date1; 
	echo $date2; 
	echo $nom; 
	echo $categorie; 
	echo $souscategorie; 
	echo $prix1; 
	echo $prix2*/
	
	
	if(strcmp($categorie,"")!=0 ){
			$findimage=find_table("concatenation", " where  idcategorie=".$categorie."", $connexion);

		//	$findimage=find_table("concatenation", "  where   description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." ", $connexion);
	}
	if(strcmp($souscategorie,"tous")==0 ){
			$findimage=find_table("concatenation", " where  idcategorie=".$categorie."", $connexion);

		//	$findimage=find_table("concatenation", "  where   description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." ", $connexion);
	}
	else{
			$findimage=find_table("concatenation", " where  idscategorie=".$souscategorie."", $connexion);

		//	$findimage=find_table("concatenation", "  where   description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." ", $connexion);
	}
	//strcmp($nom,"")!=0//tsy mitovy
	if($date2=='' && strcmp($date1,"")!=0 && strcmp($prix1,"")!=0  && strcmp($prix2,"")!=0  && strcmp($nom,"")!=0){
					$findimage=find_table("concatenation", "  where  daty <='".$date1."' and description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." and prix<=".$prix2."", $connexion);
	}
	if($date1==''  && strcmp($date2,"")!=0 && strcmp($prix1,"")!=0  && strcmp($prix2,"")!=0  && strcmp($nom,"")!=0){
					$findimage=find_table("concatenation", "  where  daty >='".$date2."' and description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." and prix<=".$prix2."", $connexion);
	}
	
	if($prix2==''  && strcmp($date1,"")!=0 && strcmp($prix1,"")!=0  && strcmp($date2,"")!=0  && strcmp($nom,"")!=0){
					$findimage=find_table("concatenation", "  where  daty >='".$date1."' and daty <='".$date2."' and description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix<=".$prix1." ", $connexion);
	}

	if($prix1==''  && strcmp($date1,"")!=0 && strcmp($prix2,"")!=0  && strcmp($date2,"")!=0  && strcmp($nom,"")!=0){
					$findimage=find_table("concatenation", "  where   daty >='".$date1."' and  daty <='".$date2."' and description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix2." ", $connexion);
	}	
   
	
	if($categorie=='tous' && strcmp($date1,"")!=0 && strcmp($date2,"")!=0 && strcmp($prix1,"")!=0 && strcmp($prix2,"")!=0   ){

			$findimage=find_table("concatenation", "  where  daty>='".$date1."' and daty <='".$date2."' and description like '".$nom."'  and prix>=".$prix1." and prix<=".$prix2."", $connexion);
	}
	
	if($date1=='' && $date2=='' && $prix1=='' &&$nom=='' && strcmp($prix2,"")!=0 ){
			$findimage=find_table("concatenation", " where  prix>=".$prix2."", $connexion);
	}
	if($date1=='' && $date2=='' && $prix2==''  && strcmp($nom,"")!=0 && strcmp($prix2,"")!=0 ){
			$findimage=find_table("concatenation", " where description like '".$nom."' and   prix>=".$prix2."", $connexion);

		//	$findimage=find_table("concatenation", "  where   description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." ", $connexion);
	}
	
	if($date1=='' && $date2=='' && $prix2=='' &&$nom=='' && strcmp($prix1,"")!=0 ){
			$findimage=find_table("concatenation", " where  prix<=".$prix1."", $connexion);

		//	$findimage=find_table("concatenation", "  where   description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." ", $connexion);
	}
	if($date1=='' && $date2=='' && $prix2==''  && strcmp($nom,"")!=0 && strcmp($prix1,"")!=0 ){
			$findimage=find_table("concatenation", " where description like '".$nom."' and   prix<=".$prix1."", $connexion);

		//	$findimage=find_table("concatenation", "  where   description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." ", $connexion);
	}
	if($date1=='' && $prix2=='' && $prix1=='' && $nom=='' && strcmp($date2,"")!=0 ){
			$findimage=find_table("concatenation", " where  daty>='".$date2."'", $connexion);
	}
	if($date1=='' && $prix2=='' && $prix1=='' && strcmp($nom,"")!=0 && strcmp($date2,"")!=0 ){
			$findimage=find_table("concatenation", " where   description like '".$nom."'and daty>='".$date2."'", $connexion);
	}

	if($date2=='' && $prix2=='' && $prix1=='' && $nom=='' && strcmp($date1,"")!=0 ){
			$findimage=find_table("concatenation", " where  daty<='".$date1."'", $connexion);
	}
	if($date2=='' && $prix2=='' && $prix1=='' && strcmp($nom,"")!=0 && strcmp($date1,"")!=0 ){
			$findimage=find_table("concatenation", " where  description like '".$nom."' and  daty<='".$date1."'", $connexion);
	
	}
	if(strcmp($date1,"")!=0 && strcmp($date2,"")!=0 && strcmp($prix1,"")!=0 && strcmp($prix2,"")!=0 && strcmp($nom,"")!=0 ){
		 $findimage=find_table("concatenation", "  where  daty>='".$date1."' and daty <='".$date2."' and description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." and prix<=".$prix2."", $connexion);

	}
	
	// if(strcmp($date1,"")==0 && strcmp($date2,"")==0 && strcmp($prix1,"")==0 && strcmp($prix2,"")==0 && strcmp($nom,"")==0 ){
		 // $findimage=find_table("concatenation", "".$prix2."", $connexion);
		
	// }
	


	
	else{
		$findimage;

	 //	$findimage=find_table("concatenation", "  where  daty>='".$date1."' and daty <='".$date2."' and description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." and prix<=".$prix2."", $connexion);
	 	//$findimage=find_table("concatenation", "  where  daty>='".$date1."' and daty <='".$date2."' and description like '".$nom."' and categorie='".$categorie."' and nom='".$souscategorie."' and prix>=".$prix1." and prix<=".$prix2."", $connexion);
    }
?>	
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chocolaterie</title>

    <!-- BOOTSTRAP STYLES-->
	<?php include('header.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="page-head-line">Les données enregistrées<img src="assets/img/Coco-caramel.png" width="100px"/></h1>
						  <h1 class="page-subhead-line">Ce site appartient seulement aux gérants de notre société <a href="form-advance.php"> <button class="btn btn-info">Insérer un nouveau produit</button></a> </h1>

                    </div>
					  <div class="col-md-6">
					<form action="recherche.php" method="post">
							<input class="form-control" type="text" placeholder="rechercher"/>
							<input   class="btn btn-info" type="submit" value="search"/>
						</form>
						<a href="recherchemulticritere.php"  class="btn btn-info" >Recherche multicritère</a>
                       </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-info">
					
                        <div class="panel-heading">
						<?php  
						    if($date1>$date2){ ?>
		             <h3 style="font-family:comic sans MS;color:crimson;">recherche invalide entre la date minimum et maximum</h3>
	             <?php }?>
				 	<?php  
						    if($prix1>$prix2){ ?>
		             <h3 style="font-family:comic sans MS;color:crimson;">recherche invalide entre le prix minimum et maximum</h3>
	             <?php }?>
                            Liste des images et ses descriptions de chaque menus:
							
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped ">
								<caption style="color:blue;">
									<?php if(isset($_GET['erreur']) && $_GET['erreur']==1){ ?>
									suppression effectuée!!!
									
									<?php } ?>
										<?php if(isset($_GET['erreur']) && $_GET['erreur']==7){ ?>
			
				   Modification reussie!!!
				
			<?php } ?>	
		
									<?php if(isset($_GET['erreur']) && $_GET['erreur']==1){ ?>
									Modification de paragraphe effectuée!!!
									
									<?php } ?>
								</caption>
                                    <thead>
                                        <tr>
									
												 <th> </th>
												 <th> categorie</th>
											     <th>Sous categorie</th>
											     <th>Description</th>
												 <th>Prix</th>
												 <th>Date</th>
												 <th></th>
                                       
                                         
                                            
                                            <th></th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
											 <?php foreach($findimage AS $p){ ?>
                                        <tr>
											
											
										    <td><img  width=50 src="<?php echo $p->image ?>"/></td>
										    <td><?php echo $p->categorie ?></td>
										    <td><?php echo $p->nom ?></td>
                                            <td><?php echo $p->description ?></td>
                                            <td><?php echo $p->prix ?>Ar</td>
                                            <td><?php echo $p->daty ?></td>
											  <td><a href="delete.php?id=<?php echo $p->id ?>"><button class="btn btn-danger">Supprimer</button></a></td>
                                            <td><a href="modification.php?id=<?php echo $p->id ?>"><button class="btn btn-success">Modifier</button></a></td>
                                           
                                           
                                         </tr>
                                      
                                       	 <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
         
            </div>
                <!-- /. ROW  -->
         
                <!-- /. ROW  -->
          
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2017 Chocolaterie Robet by R.Y.N</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
