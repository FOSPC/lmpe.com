<?php

session_start();
require_once("../../module/Connexion.php");
require_once("../../module/model/admin.php");
require_once("../../module/model/article.php");
require_once("../../module/model/commentaire.php");
require_once("../../module/model/user.php");
require_once("../../module/Session.php");
$session = new Session();



   	if($session->checkSession("email")==true && isset($_GET['id']))
   	{
   		$admin = $session->getSessionInfo();
   		$emailadmin=$session->getSession("email");
   		
   		# preparation des donnees
   		$article=new  Article();
   		$dataArticle=$article->GetAllArticle($_GET['id'])->fetch();
   		
   		
   		$comment=new Commentaire();
   		$dataComent=$comment->getAllCommentforArticle($_GET['id']);
   		

?>
<!doctype html>

    <html>
    <!--Head********************************************************************************-->
         <head>
            <meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
            <link href="../../css-js/style.css" type="text/css" rel="stylesheet"/>
            <link rel="stylesheet" href="../../css-js/w3.css" type="text/css"/>
            <link rel="stylesheet" href="../../css-js/bootstrap.min.css" type="text/css"/>
			<script src="../../css-js/jquery.min.js" type="text/javascript"></script>
            <script src="../../css-js/bootstrap.min.js" type="text/javascript"></script>
		</head>
    <!--fin head********************************************************************************-->
    
        
    <!--body********************************************************************************-->
        <body>


            <div id="jumbo2" >
            <!-- header -->
		       <?php 
		        	echo "
						<div class='alert alert-success text-center'>
					        <h3>Bienvenue: ".$admin."</h3>
							<strong>Vous etes connecter entant que:</strong>".$emailadmin.".
						</div>
						";
		       ?>
            </div><br/>

            <div id="sousDiv" class="container-fluid " id="jumbo2">
              <img id="logo"  class="img-responsive center-block" alt="LOGO LMPE.MA" src="../../img/logo.png" title="logo lmpe"/>
              <hr/>
              
              <!--tester si il ya une opération échoué -->
              <?php 
        		if (isset($_GET['c']))
        		{
        			if ($_GET['c']=="failed")
        			{
        				echo "
								<div class='alert alert-danger text-center'>
									<strong>Impossible d'executer l'operation:</strong> probleme dans la base de donnees
								</div>
							";
        			}
        		}
        			
        	  ?>
              

                      <!-- article -->
		              <div  class="container-fluid jumbotron teal-d1 text-center">

			               <?php 

				               if ($dataArticle['image_article']!="")
				               {
				               	echo '
											  <img src="../../uploadedFiles/'.$dataArticle['image_article'].'" alt="image de larticle" class="img-responsive center-block" style="margine:auto; width:80%;"/>
		                                        <br/><hr/>
		                                  ';
				               }
				               if ($dataArticle['mediatheque_article']!="")
				               {
				               		echo '
											<video width="400" controls>
											  <source src="../../uploadedFiles/'.$dataArticle['mediatheque_article'].'" type="video/mp4">
											  Your browser does not support HTML5 video.
											</video>
   			                             	<br/><hr/>
		                                  ';
				               }  
				               
				               # article text
				               
				               echo '
								   <table class="w3-table w3-card-2" >
						                <thead>
						                    <tr>
						                        <th class="text-center">Titre: <strong>'.$dataArticle['titre_article'].'</strong></th>
						                    </tr>
						                </thead>
		              		
						                <tbody>
							               <tr >
							                  <td>  
		              		                      <h4 class="text-center">'.$dataArticle['soustitre_article'].'</h4> 
		              		                      '.str_ireplace(".", ".<br/>", $dataArticle['content_article']).'
							               	  </td>
							               </tr>
							                    </tbody>
			                                   </table>';
				               # support
				               if ($dataArticle['support_article']<>"")
				               {
				               	echo '
            		                       <br/><hr/>
											
				 							  <a class="btn btn-primary btn-sm" href="../../uploadedFiles/'.$dataArticle['support_article'].'">
            		                            <spane class="glyphicon glyphicon-save"></spane> Telecharger Le Support
            	                           	  </a>
											
		                                  ';
				               }
				               
			               ?>
		              </div>
		              
		              <!-- article info -->
		              <div class="container-fluid jumbotron teal-d2 text-center">
		                     <h4>Information Sur L'article</h4>
							<?php 
								echo "
										<div class='alert alert-success text-center'>
											<strong>Auteur (Admin qui a cree cette article ): </strong> Nom: ".$admin." , Email: ".$emailadmin.".
										</div>
										";
								echo "
										<div class='alert alert-success text-center'>
											<strong>Categorie: </strong>".$dataArticle['categorie'].".
										</div>
										";
							?>
		              </div>
		              
		              <!-- comments -->
		              <div class="container-fluid jumbotron white">
		                
		              		<?php 
		              		
		              		echo '
								   <table class="w3-table w3-bordered w3-striped w3-border w3-card-2" >
						                <thead>
						                    <tr>
						                        <th>Commentaire</th>
						                        <th>| Operation</th>
						                    </tr>
						                </thead>
						                <tbody style="color:#000;">';

		              		    while ($data=$dataComent->fetch())	
		              		    {
		              		?>
		              		<!-- partie dynamique -->
		              		<?php 
		              		
		              		#get the user name
		              		$user=new User();
		              		$username=$user->getUserNameById($data['code_user']);
		              		$usercomment=$data["text_com"];
		              		
		              		echo '
                	                        <tr >
	                                            <td>
							                        <div class="container">  
														<strong><spane class="glyphicon glyphicon-user"></spane> '.$username.': </strong> '.$usercomment.'
													</div>			
		                                       </td>
			                                   <td>
		                                           <a href="../../actions/commentaire/deleteCommentaire?code='.$data['code_com'].'&&id='.$dataArticle['code_article'].'" class="btn-sm btn-danger">Supprimer</a>
		                                       </td>
                                            </tr>
		                    ';
		              		
		              		?>
		              		<?php
                             	}
                             	echo '       </tbody>
                                   </table>';
		              		?>
		              	
			             
		              </div>
		                          <br/><hr/>
								 <a style="margine:auto; width:40%;" href="../index" class="btn btn-sm btn-default center-block form-control">Vers La page Principale </a>
								  <a style="margine:auto; width:40%;" href="editer" class="btn btn-sm btn-default center-block form-control">Editer autre articles </a><br/>
            </div>
            <?php 
   			}
   			else
   			{
   				include_once("../../forms/admin_login/login.inc"); 
   			}
   		    ?>	
   		     </body>
    <!--body********************************************************************************-->    
        
    </html>
   		    
      