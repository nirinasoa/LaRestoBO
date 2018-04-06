<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <h1 style="font-family:comic sans MS;">Robert-Inscription</h1><img src="assets/img/logo2.png"  width="100px"/>
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" method="post" action="creercompte.php">
                                    <hr />
                                    <h5>Créer un compte</h5>
                                       <br />
									   <?php if(isset($_GET['erreur']) && $_GET['erreur']==1){ ?>
				<p style="color:crimson;"> 
				   Veuillez remplir les champs!!!
				</p>
			<?php } ?>		
									   
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input  name="nom" type="text" class="form-control" placeholder="Identifiant " />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-sign-in"  ></i></span>
                                            <input  name="email" type="email" class="form-control"  placeholder="votre email..." />
                                        </div>
										   <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input  name="mdp" type="password" class="form-control"  placeholder="" />
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Se souvenir de moi
                                            </label>

                                        </div>
                                     
                                    <button type="submit" class="btn btn-info">Cr&eacute;er mon compte</button>
                                  
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
