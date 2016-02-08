<?php
    session_start();
	require_once '../../module/Connexion.php';
    require_once '../../module/model/admin.php';
	require_once "../../module/Session.php";
	require_once '../../module/model/categorie.php';
	

	$session = new Session();
	
	$categorie=new Categorie();
	 
	$result=$categorie->getAllCategorie();
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
              
           <table class="w3-table w3-bordered w3-striped w3-border w3-card-2" >
           
                <thead>	
                    <tr>
                        <th>Nom du categorie</th>
                        <th>| Discription du categorie</th>
                        <th>| Operation</th>
                    </tr>
                </thead>
                
                
                <tbody style="color:#000;">
                             <?php 
			                   while ($data=$result->fetch()) {
			        	     ?>	
			        	     		    
			        	     <?php 				    
			                	echo'<tr>';
			                    echo'<td>'.$data["nom_categorie"].'</td>';
			                    echo'<td>'.$data["discription_categorie"].'</td>';
			                    $id=$data['code_categorie'];
			                    echo'
			            		<td>
			            		<a href="../../actions/categorie/deleteCategorie.php?c='.$id.'" class="btn-sm btn-danger">Supprimer</a>
			                    |
			                    <a href="../../actions/categorie/modifyCategorie.php?c='.$id.'" class="btn-sm btn-danger">Modifier</a>
			            		</td>';
			                    echo'</tr>';

			                 ?>	
			                 <?php
			                  }
			                 ?>
                </tbody>
           </table>
 
           <br/>
             <a href="../index" class="btn btn-sm btn-default center-block form-control">Vers La page Principale </a><br/>
             </div>
             <?php 
	   			}
	   			else
	   			{
	   				include_once("../../forms/admin_login/login.inc"); 
	   			}
   		     ?>	
        </body>
</html>
        
   