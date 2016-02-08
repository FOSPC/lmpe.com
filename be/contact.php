<?php
session_start();
	require_once("Backend/module/Connexion.php");
	require_once("Backend/module/model/admin.php");
	require_once("Backend/module/Session.php");
	

$session = new Session();


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
<div  id="contact" class="row blue-grey-d2">
<br/><br/><br/>
  <div class="col-lg-6">
    <div class="row jumbotron blue-grey-d3" id="form"> 
											    <?php 
											     if (isset($_GET['mailsent'])){
    	                                         echo "
													<div class='alert alert-success'>
													  <strong>Operation Terminé</strong> Nous avons reçu votre Message
													</div>
											     ";
											    } 
											    ?>
     <?php include_once 'view/contactform.inc';?> 
     </div><!--fin form -->  
  </div><!--fin du 1ere col 6 -->
  
  <div class="col-lg-6">
    <div class="w3-card-2 w3-margin-right">
       <div class="w3-container w3-card-1 indigo">
          <h3 class="text-center">Notre Position dans la carte</h3>
	   </div>
       <ul class="w3-ul">
         <div id="googleMap">
          map block
         </div>
        </ul>
   
	  <div class="w3-container w3-padding indigo-d3 w3-large">
		<h6 class="text-center">LMPE MARRAKECH </h6>
	  </div>
   </div>
  </div><!--fin du 2eme col 6 -->
</div><!--fin contact-->
<?php include_once 'view/footer.inc';?>
 <!-- fin footer--------------------------------------------------------------------------------------------------------->
</div><!--fin Conteneur-->
</body>      
</html>