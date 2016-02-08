<?php

	session_start();
	require_once("Backend/module/Connexion.php");
	require_once("Backend/module/model/article.php");
	require_once("Backend/module/model/commentaire.php");
	require_once("Backend/module/model/user.php");
	require_once("Backend/module/Session.php");
	$session = new Session();
	$article=new  Article();
	$comment=new Commentaire();
	
	$user = $session->getSessionInfoUser();
	$emailuser=$session->getSession("email");
	
	if(isset($_GET['id']))
	{
		$dataArticle=$article->GetAllArticle($_GET['id'])->fetch();
		$dataComent=$comment->getAllCommentforArticle($_GET['id']);
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
         
         
           <!-- menu -->
           <div id="top">
     		 <?php include_once 'view/Menu.inc';?>            
           </div><!--fin top-->   
           <!--indicateur du button go up -->
           <span id="up"></span>
              
              
<!--Content-->       
						<div class="row " id="articleContent"><br/><br/>
						    <div class="col-lg-12 col-sm-12 col-md-12" >
						         <div  id="articlebody" style="width:80%; margin:0 auto;">
                              <?php
				               # article text
				               echo '
								  <br/><br/> <table class="w3-table w3-card-2 blue-grey-d2" >
						                <thead>
						                    <tr >
						                       <th > <br/><h3 class="text-center">'.$dataArticle['titre_article'].'</h3></th>
						                    </tr>
						                </thead>
		              		
						                <tbody>
							               <tr >
							                  <td>  
		              		                      <h4 class="text-center">'.$dataArticle['soustitre_article'].'</h4> 
							               	  </td>
							               </tr>
							                  ';

							               if ($dataArticle['image_article']!="")
							               {
							               	echo '
										         <tr>
										            <td>
														<img src="Backend/uploadedFiles/'.$dataArticle['image_article'].'" alt="image de larticle" class="img-responsive center-block" style="margine:auto; width:65%; height:350px;"/>
									                    <br/>
										            </td>
										         <tr/>
									             ';
							               }
							               echo '
												<tr>
													<td>
													   <p >'.$dataArticle['content_article'].'</p>
												   </td>
												<tr/>
					             			';
				               
								               if ($dataArticle['mediatheque_article']!="")
								               {
								               	echo '
									    		         <tr>
												            <td>
																<video class="center-block" width="600" controls>
																	<source src="Backend/uploadedFiles/'.$dataArticle['mediatheque_article'].'" type="video/mp4">
																	Your browser does not support HTML5 video player.
																</video>
									   			                <br/><hr/>
														   </td>
												         <tr/>
											            ';
								               }
				                  				echo'  </tbody></table>';
								               # support
								               if ($dataArticle['support_article']<>"")
								               {
								               	echo '
				            		                       <br/><hr/>
															
								 							  <a class="btn btn-primary btn-sm center-block" href="Backend/uploadedFiles/'.$dataArticle['support_article'].'" style="width:35%; margin:auto;">
				            		                            <spane class="glyphicon glyphicon-save"></spane> Telecharger Le Support
				            	                           	  </a>
															
						                                  ';
								               }
				               
			                                 ?>
											         </div><!--fin articlebody-->
											    </div><!--fin col--><br/>
              
    <div class="row jumbotron blue-grey-d3" id="comment_form" style="width:80%; margin:0 auto;">
      <div class="col-lg-12 ">
      <hr/>
          <div id="form">
          <?php 
          $action='Backend/actions/commentaire/addComment.php?idArticle='.$_GET['id'].'&&UserMail='.$emailuser;
          ?>
                <form role="form" method="post" action="<?php echo $action; ?>">
                     <div class="form-group">
                           <label for="comment">commentaire:</label>
                           <textarea class="form-control" rows="5" id="comment" name="com" <?php echo $commentActive;?>><?php echo $commentMark;?></textarea>
                           <button type="submit" class="btn btn-default" <?php echo $commentActive;?>>Commenté</button>
                     </div>
               </form> 
          </div><!--fin form-->
            <?php 
     if (isset($_GET['c']))
     {
     	if ($_GET['c']=='failed')
     	{
     		echo "
					<div class='alert alert-danger'>
						<strong>Failed !</strong> Vous ne pouvez pas cree une commentaire pour le moment.
					</div> 
				";
     	}
      }
     	
    ?>
       </div>
     
    </div><!--fin du ligne --><br/>
  
    <div class="jumbotron blue-grey-d3" id="comment_container" style="width:80%; margin:0 auto; position:inherit">
        <div class="row">
             <div class="col-lg-4 col-sm-4 col-md-4" id="user" style="width:80%; margin:0 auto;">
			      <?php 
					              		
				 while ($data=$dataComent->fetch())	
				 {
			    ?>
			    <!-- partie dynamique -->
				<?php               		
					#get the user name
					 $user=new User();
					 $username=$user->getUserNameById($data['code_user']);
					 $usercomment=$data["text_com"];
					              		
					              		echo '
					                      <span class="glyphicon glyphicon-user"></span><strong> '.$username.' |</strong> '.$usercomment.' <br/><hr/><br/> ';
					              		
				?>
				<?php
			        }                        	
				?>
             </div> 
        </div><!--fin du comment 1-->

                    
    </div><!--fin du block  --><br/>
</div>

<?php include_once 'view/footer.inc';?>
     </div>     
</body>      
</html>
<?php 
	}
	else
	{
		header("location:Backend/layout/Intrusion/url.inc");
	}
		
?>