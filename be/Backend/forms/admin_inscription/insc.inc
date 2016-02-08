<?php
    session_start();
	require_once("../../module/Connexion.php"); 
	require_once("../../module/model/admin.php");
	require_once("../../module/Session.php");

	$session = new Session();
?>
<br/><br/>
        
        <script>
	            function getSelected()
	            {
	                var elt = document.f1.getElementById('auto');
	
	                if (elt.selectedIndex == 0)
	                {
	                	alert("Choisir le type d'administration SVP!");
	                }
	            }

        </script> 
        
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
              	
              	if ($_GET['c']=="failedmail")
              	{
              		echo "
					<div class='alert alert-danger'>
						<strong>Failed Saving!</strong> L'email que vous saisir et deja existe!
					</div>
											     ";
              	}
              	if ($_GET['c']=="success")
              	{
              		echo "             	
					<div class='alert alert-success'>
						<strong>Great :)</strong> un nouveau admin a ete inscrit avec success.
					</div>
					";
              	}
              	
              	 
              }
              
              
              ?>
              <form name="f1" role="form" action="../../actions/admins/addAdmin.php"  method="post">
              
                <div class="form-group" id="insc">
                	<label class="control-label">Nom:</label>
                    <input name="name" type="text" required class="form-control"/>
                </div>
                
                <div class="form-group" id="insc">
                	<label class="control-label">Prenom:</label>
                    <input name="lname" type="text" required class="form-control"/>
                </div>
                
                <div class="form-group" id="insc">
                	<label class="control-label">Date naissance:</label>
                    <input name="bd" type="date" required class="form-control"/>
                </div>
                
              
                
                <div class="form-group" id="insc">
                	<label class="control-label">E-mail:</label>
                    <input name="email" id="email" type="email" required class="form-control"/>
                </div>
            
                
                <div class="form-group" id="insc">
                	<label class="control-label">Password:</label>
                    <input name="password" type="text" required class="form-control"/>
                </div>
            
                
                <div class="form-group" id="insc">
                	<label class="control-label">Autorite:</label>
                    
                    <select class=" form-control" name="autorite" id="autorite">
                    <option>Choisir le type d'administration...</option>
                    <option>CMD</option>
                    <option>C</option>
                    </select>
                </div>
                  
                <div id="btn_g" style="width=50%; margin=auto;">
                  	<button onclick="getSelected()" type="submit" class="btn btn-sm btn-success center-block form-control" >Enregistrer </button> 
                  	<br/>
                     	<script>	                  	
				           function getSelected()
				            {
				        	   var select = document.getElementById('autorite');
				        	   var x= select.value;
				                if (x=="Choisir le type d'administration...")
				                {
				                	alert("Choisir le type d'administration SVP!");
				                }
				            }
	                    </script> 
	                    
                    <button type="reset" class="btn btn-sm btn-primary center-block form-control">Retablir </button>
                    <br/>
                    <hr/>
                    <a href="../index" class="btn btn-sm btn-default center-block form-control">Vers La page Principale </a>
                    <a href="editer" class="btn btn-sm btn-default center-block form-control">Editer les inscription des Admin </a><br/>
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
        
           
            
            
  