<?php
	require('connexionmysql.php');
	require('model.php');
	$connexion=Mysql_connection();
	
	$findMenus=find_table("categorie", "", $connexion);
	$souscategorie=find_table("souscategorie", "", $connexion);
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recherche</title>

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
	<script type="javascript" src="dependanceliste.js"></script>
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
                                Location
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
                           Champ de recherche multicritère
                        </div>
                        <div class="panel-body">
                  <?php if(isset($_GET['erreur']) && $_GET['erreur']==2){ ?>
										<p class="text-info"> 
												Insertion réussie!!!
										</p>
									<?php } ?>
					  
               
					
				 <form role="form" action="verificationrecherche.php" method="post" >
                 					  <div class="form-group">
												<label>Date 1 </label>
												<input name="date1" class="form-control" type="date">
										</div>
										 <div class="form-group">
												<label>Date 2 </label>
												<input name="date2" class="form-control" type="date">
										</div>
										 <div class="form-group">
												<label>Nom de l'article </label>
												<input name="nom" class="form-control" type="text">
										</div>
										<div class="form-group">
											   <label>Séléctionner le categorie de votre vaisselle</label>
											   <select  id="categorie" onchange="getSouscategorie()" name="categorie" class="form-control">
											   	<option value="tous">tous</option>
													 <?php foreach($findMenus AS $p){ ?>
														<option value="<?php echo $p->id ?>"><?php echo $p->nom ?></option>
													<?php } ?>
												</select>
										</div>
										<div  id="ajaxx"class="form-group">
									
											   <label>Séléctionner ses sous-catégorie</label>
											   <select id="souscategorie" name="souscategorie" class="form-control" >
													<option value="tous">tous</option>
													 <?php foreach($souscategorie AS $p){ ?>
														<option value="<?php echo $p->nom ?>"><?php echo $p->nom ?></option>
													<?php } ?>
												</select>
										</div>
					                    <div class="form-group">
												<label>Prix 1 </label>
												<input name="prix1" class="form-control" type="number">
										</div>
										 <div class="form-group">
												<label>Prix 2 </label>
												<input name="prix2" class="form-control" type="number">
										</div>
				
					
                                  
                                 
                                        <button type="submit" class="btn btn-info">Rechercher </button>
                                        <button onclick="this.form.reset()" class="btn btn-danger">Annuler </button>

                                    </form>
                           
                            
                          
                            <br />
                            
<!--
                            <h3>Badges</h3>
                            <hr />
                            <a href="#">Inbox <span class="badge">42</span></a>
                            <br /><br />
                            <ul class="nav nav-pills">
      <li class="active"><a href="#">Home <span class="badge">42</span></a></li>
      <li><a href="#">Profile</a></li>
      <li><a href="#">Messages <span class="badge">3</span></a></li>
    </ul>
    <br>
    <ul class="nav nav-pills nav-stacked" style="max-width: 260px;">
      <li class="active">
        <a href="#">
          <span class="badge pull-right">42</span>
          Home
        </a>
      </li>
      <li><a href="#">Profile</a></li>
      <li>
        <a href="#">
          <span class="badge pull-right">3</span>
          Messages
        </a>
      </li>
    </ul>
    <br>
    <button class="btn btn-primary" type="button">
      Messages <span class="badge">4</span>
    </button>-->



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
	<script type="text/javascript" >
	    function getSouscategorie(){
			 var d=document.getElementById("categorie").value;
			 $.ajax({
				 url:"ajax.php",
				 type:'post',
				 dataType:'html',
				 data: {
					 data:d
				 },
				 success : function(response,status){
					  document.getElementById("ajaxx").innerHTML=response;
				 }
			 });
			
		}
	   
	</script>


</body>
</html>
