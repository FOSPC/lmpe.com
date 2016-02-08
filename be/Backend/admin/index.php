<?php
    session_start();
	require_once("../module/Connexion.php"); 
	require_once("../module/model/admin.php");
	require_once("../module/Session.php");

	$session = new Session();
	
	
?>



<!doctype html>
<html>
		<head>
            <meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
            <link href="../css-js/style.css" type="text/css" rel="stylesheet"/>
            <link rel="stylesheet" href="../css-js/w3.css" type="text/css"/>
            <link rel="stylesheet" href="../css-js/bootstrap.min.css" type="text/css"/>
			<script src="../css-js/jquery.min.js" type="text/javascript"></script>
            <script src="../css-js/bootstrap.min.js" type="text/javascript"></script>
		</head>
        
        
        <body><br/><br/>
          
        <?php
   			if($session->checkSession("email")==true)
   			{
   				$admin = $session->getSessionInfo();
   				$emailadmin=$session->getSession("email");
   		?>
        
        	<div id="jumbo1" >
        	<?php 
        		echo "
					<div class='alert alert-success text-center'>
			            <h3>Bienvenue: ".$admin."</h3>
						<strong>Vous etes connecter entant que:</strong>".$emailadmin.".
					</div>
				";
        	?>
            </div><br/>
            
            
            <div id="jumbo2" class="container-fluid">
              <img id="logo"  class="img-responsive center-block" alt="LOGO LMPE.MA" src="../img/logo.png" title="logo lmpe"/>
        
              <hr/>
              
              <div class="btn-group center-block">
              	<div class="row">
                	<div class="col-sm-12">
                	
                	
                    	
                        
                        <a href="article/index" style="text-decoration:none;">
                           <div class="btn-default btn-lg text-center" style="width:80%; margin-left:auto; margin-right:auto; margin-bottom:10px;">
                             Gestion des Article
                           </div>
                        </a>
                        
                        <a href="categorie/index" style="text-decoration:none;">
	                        <div class="btn-default btn-lg text-center" style="width:80%; margin-left:auto; margin-right:auto; margin-bottom:10px;">
	                          Gestion des Categories
	                        </div>
                        </a>
                        
                             <!-- gère les opération possible selon l'autorite de l'admin  -->
                       <?php 
                       		$admin=new Admin();
                       		$result=$admin->getAdminAutorite($emailadmin);
                       		
                       		if ($result=="CMD")
                       		{
                       			echo'
				            		<a href="sous_admin/index" style="text-decoration:none;">
				                    	   <div class="btn-default btn-lg text-center" style="width:80%; margin-left:auto; margin-right:auto; margin-bottom:10px;">
				                    	     Gestion des Administrateurs
				                    	   </div>
				                    </a>
			                        
			                        <a href="users/editer" style="text-decoration:none;">
				                        <div class="btn-default btn-lg text-center" style="width:80%; margin-left:auto; margin-right:auto; margin-bottom:10px;">
				                          Gestion des Utilisateurs
				                        </div>
			                        </a>
            						';
                       		}
                       ?> 

                         <a href="../actions/session/logOut" style="text-decoration:none;">
                            <div class="btn-danger btn-lg text-center" style="width:80%; margin-left:auto; margin-right:auto; margin-bottom:10px;">
                             Deconexion
                            </div>
                         </a>
                    </div>
                </div>
              </div>
            </div>
            
         <?php 
   			}else{
   				include_once("../forms/admin_login/login.inc"); 
   			}
   		?>	
        </body>
        
        <footer>
          
        </footer>


</html>