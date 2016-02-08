<?php 
session_start();
require_once("../../module/Connexion.php");
require_once("../../module/model/admin.php");
require_once("../../module/Session.php");
require_once("../../module/model/categorie.php");

		# nbr un variable qui contient le nombre des fichier uploader
		if (isset($_GET['nbr']))
		{
			$nbr=$_GET['nbr'];
		}
		else 
		{
			# la valeur par défaut
			$nbr=0;
		}
		
		# (erreur repport) si il existe
		if (isset($_GET['info']))
		{
			$inf=$_GET['info'];
		}
		else 
		{
			$inf="";
		}

		$categ=new Categorie();
		$result=$categ->getAllCategorie();
		$session = new Session();
		
		     	# preparation des variables pour un fichier multi-action(add- modifier)
				$btnname="Enregistrer";
				$titre="";
				$soustitre="";
				$content="";
				$action="../../actions/article/addArticle.php";
				$hidden="";
				
				if (isset($_GET['id']))
				{
					$id=$_GET['id'];
					require_once("../../module/model/article.php");
					$article=new Article();
					$data=$article->GetAllArticle($id)->fetch();
					$btnname="Modifier";
					$titre=$data['titre_article'];
					$soustitre=$data['soustitre_article'];
					$content=$data['content_article'];
					$action="../../actions/article/modifyArticle.php";
					$hidden="<input type='hidden' value='$id' name='id'/>";
				}		
?>

<?php
   	if($session->checkSession("email")==true)
   	{
   		$user = $session->getSessionInfo();
   		$emailUser=$session->getSession("email");
?>
        
         <div id="jumbo2" >
       <?php 
        	echo "
				<div class='alert alert-success text-center'>
			        <h3>Bienvenue: ".$user."</h3>
					<strong>Vous etes connecter entant que:</strong>".$emailUser.".
				</div>
				";
       ?>
            </div><br/>
            <div class="container-fluid " id="jumbo2" >
              <img id="logo"  class="img-responsive center-block" alt="LOGO LMPE.MA" src="../../img/logo.png" title="logo lmpe"/>
              <hr/>
              <!-- tester si il ya un erreur/success -->
              <?php 
        			if (isset($_GET['c']))
        			{
        				if ($_GET['c']=='failed')
        				{
        					echo "
									<div class='alert alert-danger text-center'>
										<strong>Erreur : </strong> impossible d'executer l'operation , ".$nbr." files Uploaded
									</div><br/>
								";
        				
        				}
        				
        				if ($_GET['c']=='success')
        				{
        					echo "
									<div class='alert alert-success text-center'>
										<strong>Loperation terminer avec success</strong> , ".$nbr." files Uploaded
									</div>
								";
        				}
        		
        				
        			}
        	  ?>
              
              <form class="form-group" role="form" action="<?php echo $action;?>" method="post" enctype="multipart/form-data" >    
                <div class="form-group" id="insc">
                	<label class="control-label">Categorie:</label>    
                        <select class=" form-control" name="categ"  id="categ">
                        <option>Choisir la categorie de l'article...</option>
                        <!-- debut de la boucle -->
                        <?php 
                        	while ($data=$result->fetch())
                        	{
                        ?>
                        <!-- partie dynamique -->
                        <?php 
                        echo "<option>".$data['nom_categorie']."</option>";
                        ?>
                        <!-- fin de la boucle -->
                        <?php 
                             }
                        ?>
                        </select>
                </div>
                   <!-- les information de l'admin et la date de publication va être saisie automaiquement dans l'action-->
                   
              
              
                <div class="form-group" id="insc">
                	<label class="control-label">Titre:</label>
                    <input type="text" required class="form-control" name="titre" id="titre" value="<?php echo $titre;?>"/>
                </div>
                
                <div class="form-group" id="insc">
                	<label class="control-label">Sous Titre:</label>
                    <input type="text" required class="form-control" name="soustitre" id="soustitre" value="<?php echo $soustitre;?>"/>
                </div>
                
                  <!-- input qui contient le code de l'admin pour le rapport (admin-article) -->
                  <?php echo $hidden; ?>
                  
                  
                <hr/>
                <div class="form-group" id="insc">
                 <label class="control-label">Sujet De l'article:</label>
                 <textarea class="form-control"  style="align-content:center" rows="10" cols="100" name="content" id="content"><?php echo $content;?></textarea>
                </div>
                <hr/>

                <div class="form-group" id="insc">
                	<label class="control-label">Ajouter une Image (Important):</label><br/>
                     <span class="btn btn-default">
                      <input type="file" name="image" id="image" accept="image/*">
                     </span>
                    
                </div>
                <div class="form-group" id="insc">
                	<label class="control-label">Ajouter un video(optional):</label><br/>
                    <span class="btn btn-default">
                      <input type="file" name="video" id="video" accept="video/*">
                     </span>
                    
                </div>
                <div class="form-group" id="insc">
                	<label class="control-label">Ajouter un support (optional):</label><br/>
                    <span class="btn btn-default">
                      <input type="file" name="support" id="support" accept="application/pdf|application/msword">
                     </span>
                   
                </div>

                <div id="btn_g" style="width:50%; margin:auto;">
                  	<button onclick="getSelected()" type="submit" class="btn btn-sm btn-success center-block form-control"><?php echo $btnname; ?></button> 
                  	<br/>
                  	
                  	
                  	<script>	                  	
				           function getSelected()
				            {
				        	   var select = document.getElementById('categ');
				        	   var x= select.value;
				                if (x=="Choisir la categorie de l'article...")
				                {
				                	alert("Choisir la categorie de l'article  SVP!");
				                }
				            }
	                    </script> 
                  	
                  	
                  	
                  	
                  	
                  	
                    <button type="reset" class="btn btn-sm btn-primary center-block form-control">Retablir </button>
                    <br/>
                    <hr/>
                     <a href="../index" class="btn btn-sm btn-default center-block form-control">Vers La page Principale </a>
                    <a href="editer" class="btn btn-sm btn-default center-block form-control">Editer des article </a><br/>
                  </div> 
                 
              </form>
             </div>
       
            <?php 
   			}
   			else
   			{
   				include_once("../../forms/admin_login/login.inc"); 
   			}
   		    ?>	

