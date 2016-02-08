          
          
          
            <div  class="container-fluid jumbotron teal-d3" style="width:60%; margine:auto;">
              <img id="logo"  class="img-responsive center-block" alt="LOGO LMPE.MA" src="../img/logo.png" title="logo lmpe"/>
              <hr/>
              <!-- -------------------------------------------------------------- -->
								<?php 
								        if (isset($_GET['c']))
								        {
								          if ($_GET['c']=="failed")
								          {
								            echo "		
										            <script type='text/javascript'>			
													 alert('Votre password or email non correct !! ');
													</script>
																  		
													<div class='alert alert-danger'>
													  <strong>Failed Login!</strong> email or password are not correct
													</div>
											     ";						
								           }  
								              			
								         }
								              
								?>
              <!-- ----------------------------------------------------------------- -->
              
              <form role="form" action="../actions/admins/loginAdmin.php" method="post">
                  <div class="form-group">
                    <label for="email">Address email:</label>
                    <input name="email" type="email" class="form-control" id="email" required>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input name="pwd" type="password" class="form-control" id="pwd" required>
                  </div>
                  
                  <button type="submit" class="btn btn-success center-block">Connexion</button>
               </form>
              
             
            </div>
      