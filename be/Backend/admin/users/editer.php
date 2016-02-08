<?php
    session_start();
	require_once("../../module/Connexion.php"); 
	require_once("../../module/model/admin.php");
	require_once("../../module/model/user.php");
	require_once("../../module/Session.php");

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
					<div class='alert alert-danger'>
						<strong>Failed !</strong> Erreur dans la base de donnees.
					</div>
											     ";
              	}
              }
              ?>
           <table class="w3-table w3-bordered w3-striped w3-border w3-card-2" >
           
                <thead>	
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date naissance</th>
                        <th>E-mail</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                
                
                <tbody style="color:#000;">
                    <?php 
                    $user=new User();
                    $result=$user->getAllUser();
                    while ($data=$result->fetch())
                    {
                    ?>
                	<?php 
                	echo '
				          <tr >
	                    	<td>'.$data['nom_user'].'</td>
	                        <td>'.$data['prenom_user'].'</td>
	                        <td>'.$data['datenaissance_user'].'</td>
	                        <td>'.$data['email_user'].'</td>
	                        <td><a href="../../actions/users/deleteUser?id='.$data['code_user'].'" class="btn-sm btn-danger">Supprimer</a></td>
	                    </tr>
		          	';
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