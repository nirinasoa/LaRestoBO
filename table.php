<!DOCTYPE html>
<?php
	require('connexionmysql.php');
	require('model.php');
	$connexion=Mysql_connection();

	 	$findimage=find_table("concatenation", "", $connexion);
?>	
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LaResto-information sur la restaurant,Déjeuner,Petit déjeuner,Diner</title>
     <meta name="keywords" content="LaResto, restaurant ,dinner,déjeuner,petit déjeuner,burger,poulet frite"> 
    <meta name="description" content="LaResto est un restaurant de luxe ayant beaucoup de choix au dinêr,petit déjeuner et le déjeuner tels que les hamburger,poulet frite,..."> 
   
    <!-- BOOTSTRAP STYLES-->
	<?php include('header.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="page-head-line">LaResto</h1>
						  <h2 class="page-subhead-line">Bienvenue dans notre site </h2> <a href="form-advance.php"> <button class="btn btn-info">Insérer un nouveau produit</button></a>
							<a href="recherchemulticritere.php"  class="btn btn-info" >Recherche multicritère</a>
                      <!-- <img src="../images/M5921C0IZ-G11@12.jpg"/>-->
                    </div>
					  <div class="col-md-6">
					
                </div>
				  <div class="col-md-6">
						 </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
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
											
											<td><img  width=50 src="<?php echo $p->image ?>"  alt="<?php echo $p->nom ?>" /></td>
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
        &copy; 2018 LaResto by R.Y.N</a>
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
