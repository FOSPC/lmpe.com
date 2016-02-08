      	 <nav class="navbar navbar-inverse" id="menu">
               <div class="container-fluid">
                <div class="navbar-header" id="phoneTabletBar">
                 <!-- data-toggle="collapse"-->               
                  <button type="button"class="navbar-toggle green-d3 btn-sm" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>        
                  </button>
                
                  <a  class="navbar-brand" href="index"> <img id="logoo" alt="LMPE LOGO" src="img/menuLogo.png"/>LMPE</a>
                </div><!--fin navbar header-->
                         
                 <div class="collapse navbar-collapse" id="myNavbar">
                         
                  <!--la premier list UL***********************-->
                    <ul class="nav navbar-nav">
                       <li class="active"><a href="index"><span class="glyphicon-home glyphicon"></span> Acueil</a></li>
                                          <li><a href="contact">Contact</a></li>
                                          <li><a href="#helpmodal" class="red-d2"  >Nos Aider</a></li>
                                          <li><a href="#aboutmodal">Apropos De Nous</a></li>
                                          
                        <!--liste down drop-->
                         <li class="dropdown">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="#">Plus <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                      <li><a href="lmpe_AllArticles">toutes les articles</a></li>
                                      
                               </ul>
                         </li><!-- fin liste down drop-->

                    </ul><!--fin de la premier list UL et debut de la 2eme list UL-->
                                       <?php
   			if($session->checkSession("email")==true)
   			{
	   				$user = $session->getSessionInfoUser();
	   				$emailuser=$session->getSession("email");
	   				$commentActive="";
	   				$commentMark="";
			   		$inscriptionState='
			   			<li class="dropdown">
			   		     <a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$user.'<span class="caret"></span></a>
			   			 <ul class="dropdown-menu">
			   				<li>
			   				  <a href="Backend/actions/session/userlogout/logout.php">
			   				    <span class="glyphicon glyphicon-log-out"></span>
			   				    Deconnexion
			   				  </a>
			   				</li>
			   			 </ul>
			   			</li>
			   			';	
   			}
   			else 
   			{
   				$commentActive="disabled";
   				$commentMark="Ce connecté / s’inscrire : pour commente sur cette article";
			   				$inscriptionState='
					<li><a href="inscription"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
			        <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Connecxion</a></li>
					';			
   			}
   	?>
                 
                 
                    <ul class="nav navbar-nav navbar-right">
                       <?php 
                    echo $inscriptionState;
                    ?>  
                      <li id="recherche_form">
                      
                       <div id="recherche" class="form-group-sm">
                          <form role="form">       
                            <input type="text" class="form-control" id="text_rech">
                              <button id="btn_rech" type="submit" class="btn btn-sm btn-success">
                                 <span class="glyphicon glyphicon-search"></span>
                              </button>
                          </form>
                       </div><!--fin recherche form-->            
                      </li><!--fin de la liste recherche-->
                    </ul><!--fin de la 2eme list UL-->     
                  </div><!--fin de myNavbar-->
               </div><!--fin du fluid container-->             
             </nav><!--fin nav--> 