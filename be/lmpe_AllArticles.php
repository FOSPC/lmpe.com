<?php
session_start();
	require_once("Backend/module/Connexion.php");
	require_once("Backend/module/model/admin.php");
	require_once("Backend/module/Session.php");
	require_once("Backend/module/model/article.php");

$session = new Session();

$article=new Article();

$result=$article->GetAllArticle();
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
              

          <!--content-->
          <div class="w3-card-5" style="width:100%">
            <div class="w3-container blue-grey-d2"><br/><br/><br/><br/>
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
            
<?php include_once 'view/footer.inc';?>
 <!-- fin footer--------------------------------------------------------------------------------------------------------->
</div><!--fin Conteneur-->
    
</body>      
    </html>