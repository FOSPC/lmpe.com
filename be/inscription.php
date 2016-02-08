<?php
session_start();
	require_once("Backend/module/Connexion.php");
	require_once("Backend/module/model/admin.php");
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
    <?php 
     if (isset($_GET['c']))
     {
     	if ($_GET['c']=='failed')
     	{
     		echo "
					<div class='alert alert-danger'>
						<strong>Failed !</strong> Vous ne pouvez pas s'inscrire pour le moment.
					</div> 
				";
     	}
      }
     	if (isset($_GET['mail']) && $_GET['mail']=="duplicated" )
     	{
     		echo "
					<div class='alert alert-danger'>
						<strong>Failed !</strong> Un autre utilisateur enregistre avec le meme email.
					</div>
				";
     	}
    
    ?>
   
     <?php include_once 'view/inscriptionForm.inc';?>  
     </div><!--fin form --><br/>  
  </div><!--fin du 1ere col 6 -->
</div><!--fin contact-->
         
            
<?php include_once 'view/footer.inc';?>
</div><!--fin Conteneur-->

</body>      
</html>
<?php }?>