

<?php
session_start();
require_once("Backend/module/Connexion.php");
require_once("Backend/module/Session.php");

$session = new Session();

if($session->checkSession("email")==true)
{
   header("location:index.php");
}
else
{
?>
<!doctype html>

    <html>
    <!--Head********************************************************************************-->
        <head>
			 <?php include_once 'view/header.inc';?>
		</head>
    <!--fin head********************************************************************************-->
    
        
    <!--body********************************************************************************-->
        <body> 
         <div id="conteneur" class="container-fluid">
           <div id="top">
           	 <?php include_once 'view/Menu.inc';?> 
           </div><!--fin top-->   
<!--indicateur du button go up --><span id="up"></span>
              
              
<!--content --> 
<div  id="contact" class="row blue-grey-d1">
<br/><br/><br/>
  <div class="col-lg-12">
    <div class="row jumbotron blue-grey-d3" id="insc_form"> 
    <img class="center-block" id="logo" alt="logo lmpe" src="Backend/img/logo.png"/>
    <hr/>
    <?php 
     if (isset($_GET['c']))
     {
     	if ($_GET['c']=='failed')
     	{
     		echo "
					<div class='alert alert-danger'>
						<strong>Failed !</strong> Mot de passe ou l'email incorrect.
					</div>
				";
     	}
     	
     	if ($_GET['c']=='success')
     	{
     		echo "
					<div class='alert alert-success'>
						<strong>Inscription Terminer!</strong> voulez-vous ce connecter SVP!
					</div>
				";
     	}
     }
     
    ?>
       <?php include_once 'view/LoginForm.inc';?>
     </div><!--fin form --><br/>  
  </div><!--fin du 1ere col 6 -->
</div><!--fin contact-->
            
            
<?php include_once 'view/footer.inc';?>
 <!-- fin footer--------------------------------------------------------------------------------------------------------->
</div><!--fin Conteneur-->
</body>      
</html>
<?php }?>