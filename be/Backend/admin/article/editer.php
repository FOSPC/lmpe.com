<?php
    session_start();
	require_once("../../module/Connexion.php"); 
	require_once("../../module/model/admin.php");
	require_once("../../module/Session.php");
	require_once("../../module/model/article.php");
	
	$article=new Article();
	$result=$article->GetAllArticle();
	$session = new Session();
?>
<!doctype html>
<html>
		<head>
            <meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
            <link href="../../css-js/style.css" type="text/css" rel="stylesheet"/>
            <link rel="stylesheet" href="../../css-js/w3.css" type="text/css"/>
            <link rel="stylesheet" href="../../css-js/bootstrap.min.css" type="text/css"/>
			<script src="../../css-js/jquery.min.js" type="text/javascript"></script>
            <script src="../../css-js/bootstrap.min.js" type="text/javascript"></script>
		</head>
        
        
        <body ><br/><br/>
        
        
        
        <?php
   			if($session->checkSession("email")==true)
   			{
   				$admin = $session->getSessionInfo();
   				$emailadmin=$session->getSession("email");
   		?>
        
        	<div id="jumbo2" >
        	<?php 
        		echo "
					<div class='alert alert-success text-center'>
			            <h3>Bienvenue: ".$admin."</h3>
						<strong>Vous etes connecter entant que:</strong>".$emailadmin.".
					</div>
				";
        	?>
            </div><br/>
            
            
            <div class="container-fluid " id="jumbo2" >
              <img id="logo"  class="img-responsive center-block" alt="LOGO LMPE.MA" src="../../img/logo.png" title="logo lmpe"/>
              <hr/>
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
           <table class="w3-table w3-bordered w3-striped w3-border w3-card-2" >
           
                <thead>	
                    <tr>
                        <th>Titre</th>
                        <th>| Sous Titre</th>
                        <th>| Content Caption</th>
                        <th>| Date Publication</th>
                        <th>| Operation              -</th>
                    </tr>
                </thead>
                
                
                <tbody style="color:#000;">
                	
                    	<?php 
                    	while ($data=$result->fetch())
                    	{
                    	?>
                    	<?php 
                    			echo"<tr >";
                    			echo"<td>".$data['titre_article']."</td>";
                    			echo"<td>".$data['soustitre_article']."</td>";
                                $txt=$data['content_article'];
                                
                                
                    			$caption=substr($txt,0,21);
                    			echo"<td>".$caption."...</td>";
                    			echo"<td>".$data['datepub_article']."</td>";
                    			echo '<td>
	                    			  <a href="../../actions/article/deleteArticle?id='.$data['code_article'].'" class="btn-sm btn-danger">Supprimer</a>
	                    			  |
	                    			  <a href="../../actions/article/modifyArticle?id='.$data['code_article'].'"" class="btn-sm btn-danger">Modifier</a>
									  |
									 <a href="articleVisualisation?id='.$data['code_article'].'"" class="btn btn-primary btn-sm">
										<span class="glyphicon glyphicon-eye-open"></span>
									 </a>
	                    			  </td>
				                   ';
                    			echo"</tr>";	
                    	?>
                    	<?php 
                    	}
                    	?>
                    
                </tbody>
           </table>
                      <br/>
                     <a href="../index" class="btn btn-sm btn-default center-block form-control">Vers La page Principale </a><br/>
                     </div>
        </body>
            <?php 
   			}
   			else
   			{
   				include_once("../../forms/admin_login/login.inc"); 
   			}
   		    ?>	

</html>