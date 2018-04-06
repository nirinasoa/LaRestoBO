<?php
	require('connexionmysql.php');
	require('model.php');
	$connexion=Mysql_connection();
	
	$findMenus=find_table("categorie", "", $connexion);
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insertion de nouveau produit</title>

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
                             <div class="inner-text">
                                LaResto
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
                                <a   href="form.php"><i class="fa fa-desktop "></i>Produit </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="login.php"><i class="fa fa-sign-in "></i>Cre&eacute;er un compte</a>
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
                        <h1 class="page-head-line">Insertion de nouveau produit </h1>
                        <h2 class="page-subhead-line">Tous les administrateurs de ce cite ont  accès aux bases de données.Cliquer sur 
							<br/>
						</h2>
						<a href="table.php">voir les donn&eacute;es</a>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-6">
                       <div class="panel panel-info">
                        <div class="panel-heading">
                           Champ d'insertion de nouveau article
                        </div>
                        <div class="panel-body">
                  <?php if(isset($_GET['erreur']) && $_GET['erreur']==2){ ?>
										<p class="text-info"> 
												Insertion réussie!!!
										</p>
									<?php } ?>
					  
               
					
					 <form role="form" action="insertionArticle.php" method="post" >
                 
					<div class="form-group">
                           <label>Séléctionner le categorie de votre vaisselle</label>
                           <select name="categorie" class="form-control">
								 <?php foreach($findMenus AS $p){ ?>
									<option value="<?php echo $p->id ?>"><?php echo $p->nom ?></option>
								<?php } ?>
                            </select>
                    </div>
					<div class="form-group">
                           <label>Quel est son sous catégorie?ou titre?</label>
                           <input name="scategorie" class="form-control" type="text">
						   
                    </div>
				 <button type="submit" class="btn btn-info">Valider </button>
                 <button type="reset" class="btn btn-danger">Annuler </button>

                </form>
				<br />
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
