<?php
    session_start();
	require_once("../../module/Connexion.php"); 
	require_once("../../module/model/admin.php");
	require_once("../../module/Session.php");
	require_once("../../module/model/categorie.php");

	$session = new Session();
	
	# preparation des variables
	$btnName="Eregistrer";
	$actionUrl="../../actions/categorie/addCategorie.php";
	$nomCateg="";
	$disCateg="";
	
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
            
            
            <div class="container-fluid" id="jumbo2" >
              <img id="logo"  class="img-responsive center-block" alt="LOGO LMPE.MA" src="../../img/logo.png" title="logo lmpe"/>
              <hr/>         
              <?php 
              if (isset($_GET['c']))
              {
              		
              	
	              if ($_GET['c']=="modify")
	              {
	              	if (isset($_GET['id']))
	              	{
	              		$categ=new Categorie();
	              		$result=$categ->getAllCategorie($_GET['id']);
	              		$data=$result->fetch();
	              		$btnName="Modifier";
	              		$actionUrl="../../actions/categorie/modifyCategorie.php";
	              		$nomCateg=$data['nom_categorie'];
	              		$disCateg=$data['discription_categorie'];
	              	}	
	              	
	              }
	              
	              
	              	if ($_GET['c']=="failed")
	              	{
	              		echo "
						<div class='alert alert-danger'>
							<strong>Failed !</strong> Erreur dans la base de donnees.
						</div>
						";
	              	}
	              	if ($_GET['c']=="success")
	              	{
	              		echo "             	
						<div class='alert alert-success'>
							<strong>Great :)</strong> Loperation terminer avec success.
						</div>
						";
	              	}
              }
              ?>
              
              <form role="form" name="fcateg" action="<?php echo $actionUrl;?>" method="post">
                <div class="form-group" id="insc">
                	<label class="control-label">Nom du Categorie:</label>
                    <input type="text" required class="form-control" name="nom_categorie" value="<?php echo $nomCateg;?>"/>
                </div>
                
                <div class="form-group" id="insc">
                	<label class="control-label">Discription du categorie:</label>
                    <textarea class="form-control" rows="3" cols="100" required name="discription_categorie"><?php echo $disCateg;?></textarea>
                </div>

                <div id="btn_g" style="width=50%; margin=auto;">
                  	<button type="submit" class="btn btn-sm btn-success center-block form-control"><?php echo $btnName?></button> 
                  	<br/>
                    <button type="reset" class="btn btn-sm btn-primary center-block form-control">Retablir </button>
                    <br/>
                    <hr/>
                     <a href="../index" class="btn btn-sm btn-default center-block form-control">Vers La page Principale </a>
                    <a href="editer" class="btn btn-sm btn-default center-block form-control">Editer le categories </a><br/>
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
        