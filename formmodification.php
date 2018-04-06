<?php
	require('connexionmysql.php');
	require('model.php');
	$connexion=Mysql_connection();
	$id=$_GET['id'];
	$menu=$_GET['menu'];
	$findimage=find_table("imageContenus", " where id=".$id, $connexion);
	$findparagraphe=find_table("paragrapheContenus", " where id=".$id, $connexion);
	$findMenus=find_table("menus", " ", $connexion);
?>	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modification</title>

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
                        <h1 class="page-head-line">Formulaire de modification <img src="assets/img/pure-noir.png" width="100px"/></h1>
                        <h1 class="page-subhead-line">Tous les administrateurs de ce cite ont  accès aux bases de données.Cliquer sur 
						<a href="table.php">voir les donn&eacute;es</a>
						</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-6">
                       <div class="panel panel-info">
                        <div class="panel-heading">
                           Champ de modification d'image
                        </div>
                        <div class="panel-body">
                  <?php if(isset($_GET['erreur']) && $_GET['erreur']==2){ ?>
										<p class="text-info"> 
												modification réussie!!!
										</p>
									<?php } ?>
					  
               
					
					 <form role="form" action="modification.php" method="post" >
					 <?php foreach($findimage AS $p){ ?>
                    <div class="form-group">
				
                        <label class="control-label col-lg-4">Séléctionner une image à modifier</label>
						
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/<?php echo $p->image ?>" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">Selectionner une image</span><span class="fileupload-exists">Changer</span><input name="images" type="file"></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Effacer</a>
                                </div>
                            </div>
                        </div>
						 
                    </div>
					<div class="form-group">
                           <label>Se trouve dans</label>
						   <input name="sary" class="form-control" type="hidden" value="<?php echo $p->image ?>">
						   <input name="id" class="form-control" type="hidden" value="<?php echo $id ?>">
						   <input class="form-control" type="text" value="<?php echo $menu ?>">
					       <label>A modifier dans</label>
                           <select name="menu" class="form-control">
								 <?php foreach($findMenus AS $m){ ?>
									<option value="<?php echo $m->id ?>"><?php echo $m->titremenus ?></option>
								<?php } ?>
                            </select>
                    </div>
					<div class="form-group">
                        <label>Ajout ou modification de le description de l'image</label>
                        <textarea name="desc"class="form-control" rows="10"><?php echo $p->description ?></textarea>
                     </div>
					 <div class="form-group">
                        <label>Titre de votre image </label>
                        <input name="titre" class="form-control" type="text" value="<?php echo $p->titre ?>">
					 </div>
					 <input  class="btn btn-file btn-info" value="Terminer la modification" type="submit">	
					 <?php } ?>		
					</form>
                    <div class="alert alert-warning"><strong> </strong>.</div>
                    </div>
                           </div>
                         <div class="panel panel-default">
                        <div class="panel-heading">
                           For More Customization
                        </div>
                        <div class="panel-body">
                            <h4 class="alert alert-info" style="line-height:50px;">
                            For more customization for this template or its components please visit official bootstrap website i.e getbootstrap.com or <a href="http://getbootstrap.com/components/" target="_blank" >click here</a> 
                           </h4>
                                 </div>
                             </div>
                        </div>
                    <div class="col-md-6">
                        <div class="panel panel-info">
                        <div class="panel-heading">
                           Champ de formulaire pour une paragraphe
                        </div>
                        <div class="panel-body">
                          <h4>Chocolaterie</h4>
						  	<?php if(isset($_GET['erreur']) && $_GET['erreur']==4){ ?>
										<p style="color:red;"> 
										Veuillez remplir les champs
										</p>
									<?php } ?>
									  	<?php if(isset($_GET['erreur']) && $_GET['erreur']==3){ ?>
										<p style="color:#6495ED;"> 
										Insertion reussie!!!
										</p>
									<?php } ?>
                            <hr />
                           <form role="form" action="modificationParagraphe.php" method="post" >
                                        <?php foreach($findparagraphe AS $pr){ ?>

                                            <div class="form-group">
                                            <label>Modifier ou ajouter vos paragraphes</label>
                                            <textarea name="paragraphe" class="form-control" rows="30"><?php echo $pr->paragraphe ?></textarea>
                                        </div>
										<div class="form-group">
										   <label>Emplaçement actuel: </label>
										<input  class="form-control" type="text" value="<?php echo $menu ?>"/>
										<input  name="id" class="form-control" type="hidden" value="<?php echo $id ?>"/>
                           <label>A remplacer dans:</label>
                           <select name="menu" class="form-control">
								 <?php foreach($findMenus AS $p){ ?>
									<option value="<?php echo $p->id ?>"><?php echo $p->titremenus ?></option>
								<?php } ?>
                            </select>
                    </div>
                                  
                                 
                                        <button type="submit" class="btn btn-info">Terminer la modification </button>
                                	<?php } ?>
                                    </form>
                           
                            
                          
                            <br />
                            <ul class="pager">
  <li class="previous disabled"><a href="#">&larr; Older</a></li>
  <li class="next"><a href="#">Newer &rarr;</a></li>
</ul>
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
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
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