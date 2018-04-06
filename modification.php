<?php
	require('connexionmysql.php');
	require('model.php');
	$connexion=Mysql_connection();
	
	$findMenus=find_table("categorie", "", $connexion);
	$id= $_GET['id'];

	$findArticle=find_table("concatenation", " where id=".$id, $connexion);
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insertion</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ROBERT</a>
            </div>

            <div class="header-right">

              
                <a href="login.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                Robert
                            <br />
                                <small> </small>
                            </div>
                        </div>

                    </li>


                  
                 
                   
                    <li>
                        <a href="table.php"><i class="fa fa-flash "></i>Liste des produits </a>
                        
                    </li>
                     <li>
                        <a class="active-menu-top" href="#"><i class="fa fa-bicycle "></i>Insertion <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level collapse in">
                           
                             <li>
                                <a   href="form.php"><i class="fa fa-desktop "></i>Image </a>
                            </li>
                             <li>
                                <a class="active-menu" href="form-advance.php"><i class="fa fa-code "></i>Paragraphe</a>
                            </li>
                             
                           
                        </ul>
                    </li>
                     <li>
                        <a href="gallery.php"><i class="fa fa-photo "></i>Galerie</a>
                    </li>
                     
                    <li>
                        <a href="login.php"><i class="fa fa-sign-in "></i>Cre&eacute;er un pe</a>
                    </li>
                  
                   
                    <li>
                        <a  href="blank.php"><i class="fa fa-square-o "></i>A propos</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Formulaire d'insertion <img src="assets/img/pure-noir.png" width="100px"/></h1>
                        <h1 class="page-subhead-line">Tous les administrateurs de ce cite ont  accès aux bases de données.Cliquer sur 
							<br/><a href="table.php">voir les donn&eacute;es</a>
						</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-6">
                       <div class="panel panel-info">
                        <div class="panel-heading">
                           Champ d'insertion d'image
                        </div>
                        <div class="panel-body">
                  <?php if(isset($_GET['erreur']) && $_GET['erreur']==2){ ?>
										<p class="text-info"> 
												Insertion réussie!!!
										</p>
									<?php } ?>
					  
               
					
					 <form role="form" action="validationModification.php" method="post" enctype="multipart/form-data" >
                   <!-- <div class="form-group">
                        <label class="control-label col-lg-4">Séléctionner une image à insérer</label>
						<?php //if(isset($_GET['erreur']) && $_GET['erreur']==1){ ?>
										<p style="color:red;"> 
										Veuillez remplir les champs
										</p>
									<?php // } ?>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">Selectionner une image</span><span class="fileupload-exists">Change</span><input name="images" type="file"></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
						
						
						 
                    </div>-->
					<div class="form-group">
					<?php  foreach ($findArticle as $p){ ?>
					   <img src="<?php echo $p->image ?>" width=100 alt="<?php echo $p->image ?>"/>
					    <?php  }?>
						Modifier l'image
						<input type="file" name="fileToUpload" id="fileToUpload">
						</div>
					<div class="form-group">
                         <?php  foreach ($findArticle as $p){ ?>
						   <input name="scategorie" value="<?php echo $p->nom ?>" class="form-control" type="text">
						 <input name="idscategorie" value="<?php echo $p->idscategorie ?>" class="form-control" type="hidden">
						
						 <?php  }?>
                            
                    </div>
					<div class="form-group">
                        <label>Description de cet aliment </label>
						  <?php  foreach ($findArticle as $p){ ?>
						   <input name="description" value="<?php echo $p->description ?>" class="form-control" type="text">
						
						 <?php  }?>
						  <input name="id" value="<?php echo $id ?>" class="form-control" type="hidden">
						
                      
					 </div>
					 <div class="form-group">
                        <label>Prix en Ar </label>
                       <?php  foreach ($findArticle as $p){ ?>
						   <input name="prix" value="<?php echo $p->prix ?>" class="form-control" type="number">
						
						 <?php  }?>
						
					 </div>
					  
					
					 <input  class="btn btn-file btn-info" value="Modifier" type="submit">

                      <button type="reset" class="btn btn-danger">Annuler </button>					 
					</form>
					
					
                    <div class="alert alert-warning"><strong> </strong>.</div>
                    </div>
                           </div>
                        
                        </div>
             
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2017 Robert by R.Y.N 
    </div>
    <!-- /. FOOTER  -->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/js/bootstrap-fileupload.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
