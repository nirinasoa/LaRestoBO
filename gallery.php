<!DOCTYPE html>
<?php
	require('connexionmysql.php');
	require('model.php');
	$connexion=Mysql_connection();

	$findPatisserie=find_table("concatenation", "where categorie='vaisselle'", $connexion);
	$findTablette=find_table("concatenation", "where categorie='Accessoires'", $connexion);

?>	
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galerie</title>

    <!-- BOOTSTRAP STYLES-->
		<?php include('header.php') ?>
   

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Galerie</h1>
                        <h1 class="page-subhead-line">Voici notre produit</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div id="port-folio">
                      <div class="row " >
                          <ul id="filters" >
						<li><span class="filter active" data-filter="landscape nature awesome">Tous</span></li>
						<li><span class="filter active">/</span></li>
						<li><span class="filter" data-filter="landscape"> vaisselle</span></li>
						<li><span class="filter">/</span></li>
						<li><span class="filter" data-filter="nature">Accessoires</span></li>
						
						
					</ul>
               
                <div class="col-md-4 ">

                    <div class="portfolio-item landscape mix_all" data-cat="landscape" >
                     <?php foreach($findPatisserie AS $pa){ ?>

                        <img src="<?php echo $pa->image ?>" class="img-responsive " alt="" />
                        <div class="overlay">
                            <p>
                                <?php echo $pa->description ?>
                            </p>
                            <a class="preview btn btn-info" title="<?php echo $pa->description ?>" href="<?php echo $pa->image ?>"><i class="fa fa-plus fa-2x"></i></a>

                        </div>
						<?php } ?>
                    </div>
                </div>
                <div class="col-md-4 ">

                    <div class="portfolio-item nature mix_all" data-cat="nature" >
                     <?php foreach($findTablette AS $c){ ?>

                        <img src="<?php echo $c->image ?>" class="img-responsive " alt="" />
                        <div class="overlay">
                          <p>
                             
                               
                                <?php echo $c->description ?>
                            </p>
                            <a class="preview btn btn-info" title="<?php echo $c->description ?>" href="<?php echo $c->image ?>"><i class="fa fa-plus fa-2x"></i></a>

                        </div>
							<?php } ?>
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
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/jquery.mixitup.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
     <!-- CUSTOM Gallery Call SCRIPTS -->
    <script src="assets/js/galleryCustom.js"></script>
</body>
</html>
