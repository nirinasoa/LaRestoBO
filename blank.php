<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contat client</title>

    <!-- BOOTSTRAP STYLES-->
   <?php include('header.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Contacter vos client</h1>
                        <h1 class="page-subhead-line"></h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-info">
                        <div class="panel-heading">
                           Champ de formulaire pour une paragraphe
                        </div>
                        <div class="panel-body">
                          <h4>Chocolaterie</h4>
						  	<?php if(isset($_GET['succes']) && $_GET['succes']==1){ ?>
				<p style="color:#6495ED;"> 
				  Votre message a été bien envoyé
				</p>
			<?php } ?>		
			<?php if(isset($_GET['erreur']) && $_GET['erreur']==1){ ?>
				<p style="color:crimson;"> 
				    Erreur!! message refusé
				</p>
			<?php } ?>
                            <hr />
                           <form role="form" action="contact1.php" method="post" >
                                       
                                           <div class="form-group">
                                            <label>Sujet du mail</label>
                                            <input class="form-control" name="sujet" type="text"></textarea>
                                        </div>
										 <div class="form-group">
                                            <label>Destinataire</label>
                                            <input class="form-control"  name="destinataire" type="email"></textarea>
                                        </div>
										 <div class="form-group">
                                            <label>Expediteur</label>
                                            <input class="form-control"  name="expediteur" value="yael@itu.local" type="email"></textarea>
                                        </div>
										
                                            <div class="form-group">
                                            <label>Commentaire</label>
                                            <textarea name="message" class="form-control" rows="10"></textarea>
                                        </div>
										
										
                                  
                                 
                                        <button type="submit" class="btn btn-success">Envoyer  </button>
                                        <button type="reset"" class="btn btn-danger">Annuler  </button>

                                    </form>
                           
                            
                          
                            <br />
                            
<!--
         



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
