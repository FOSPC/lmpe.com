<?php
session_start();
	require_once("Backend/module/Connexion.php");
	require_once("Backend/module/model/admin.php");
	require_once("Backend/module/Session.php");
	require_once("Backend/module/model/article.php");

$session = new Session();

$article=new Article();

$result=$article->GetNewArticle();

#$result=$article->GetAllArticle(null,3);


$Artslider=$article->GetAllArticle(null,6);
$lastid=$article->getLastIdArticle();
$arti=$article->GetAllArticle(null,1);
$ActiveArticleInSlider=$arti->fetch();

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
              

              <!--slider-->
               <div id="sliderHolder" class="container" >
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">          
                    <!-- Wrapper for slides -->
                    
                   <div class="carousel-inner blue-grey-d4" role="listbox">
                   
                   <!-- la premier slideItem (Active) -->
                   <?php 
							$txt=$ActiveArticleInSlider['content_article'];
						     $caption=substr($txt,0,21);
									 echo'<div class="item active">
						                    <img src="Backend/uploadedFiles/'.$ActiveArticleInSlider['image_article'].'" alt="img" >
						                    <div class="carousel-caption blue-grey-d4 text-center">'.$ActiveArticleInSlider['soustitre_article'].'
											<br/>'.$caption.'
											</div>
						                  </div>';
					?>
                   
                   
                   
                   
                   
                    <?php 
						while ($Slide=$Artslider->fetch())
						{ 
					?>
					<?php 
									 $txt=$Slide['content_article'];
									 $caption=substr($txt,0,21);
									 echo'<div class="item">
						                    <img src="Backend/uploadedFiles/'.$Slide['image_article'].'" alt="img" >
						                    <div class="carousel-caption blue-grey-d4 text-center">'.$Slide['soustitre_article'].'
											<br/>'.$caption.'
											</div>
						                  </div>';
					?>
                  
	            
                  
                   <?php 
						 }
				   ?> 
                    </div>
                   
                   
                   
                   
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
             <!--fin slider-->     
               
            
          <!--content-->
          <div class="w3-card-5" style="width:100%">
            <header class="w3-container blue-grey-d3">
              <h1 class="text-center ">Les Nouvelles Articles</h1>
            </header> 

            <div class="w3-container blue-grey-d2"><br/>
              <div class="row">
              
              
              
      <?php 
          while ($data=$result->fetch())
           {
      ?>
           	
      <?php 
        $txt=$data['content_article'];
        $caption=substr($txt,0,21);
        echo'
			<div class="col-lg-4 col-md-4 col-sm-4">
                <div class="w3-third blue-grey-d3 " id="article">
                    <div class="w3-card-2 w3-margin-4">
                    	<img src="Backend/uploadedFiles/'.$data['image_article'].'" style="width:100%; height:250px;" alt="Image de larticle">
                    		<div class="w3-padding">
                    			<h4>'.$data['titre_article'].'</h4>
                    			<p>'.$caption.'... <a href="article?id='.$data['code_article'].'" class="btn btn-sm btn-primary">Continue la lecture</a></p>
                    		</div>
                     </div>
                 </div> 
            </div>
         ';
       ?>
       <?php 
           }
       ?>   
             </div><br/><br/><br/>
           </div>
           
          </div>        
            <!--fin content-->
            
      <!--footer-->        
<?php include_once 'view/footer.inc';?>
</div><!--fin Conteneur-->
   
</body>      
    </html>