<!--footer--------------------------------------------------------------------------------------------------------->
<div class="w3-container" id="footer">
  <div id="band_newsletter">        
    <form role="form" method="post" action="Backend/actions/subscribe/SaveEmail.php">
        <div class="form-group-md">
           <h6 class="text-center text-info">inscrivez-vous pour recevoir nos nouvelles publications</h6>
           <div class="row">
             <label class="sr-only" for="email">address email:</label>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                 <input type="email" required placeholder="Saisir Votre Email ici " class="form-control" id="email" name="email"/>
                 <br/>
                  <button type="submit" data-toggle="modal" class="btn btn-success btn-md">S'abonner</button>
                </div>           
                <div class="col-sm-4"></div>
            </div>          
         </div>
     </form>
   </div><!--fin de la band newsletter-->
                    
                    
                    
    <div class="row">
       <div class="col-lg-12">
         <div id="band_info">
                 <br/>
                 <p class="text-center" style="color:#FFF">
                   Ligue Marocaine pour la protection de l'enfance Marrakech
                 </p>
                 
                 <h6 class="text-center" style="color:#999">
                  Centre Commerciale d'Issil Lot. Agdal Marrakech ,Maroc
                 </h6>
                 
                 <h6 class="text-center" style="color:#FFF">
                 contact@lmpe-marrakech.com
                 </h6>
                 
                 <h6 class="text-center" style="color:#999">
                 +212 524 30 74 00
                 </h6>
                 
                 <h6 class="text-center" style="color:#999">
                 +212 661 17 74 63
                 </h6>
                 
                 <h6 class="text-center " style="color:#FFF">
                   suivez nous Sur les réseaux sociale <br/><br/>
                    <a href="#"><span ><img src="img/go.png" alt="socialeMediaIcons"></span>  </a>
                    <a href="#"><span ><img src="img/fb.png" alt="socialeMediaIcons"></span>  </a>
                    <a href="#"><span ><img src="img/tw.png" alt="socialeMediaIcons"></span>  </a>
                 </h6>
                 <br/>
                 <h6 class="text-center" id="up_btn">
                    <a href="#up"><img src="img/btn_down.png" alt="alez vres le hot"/></a>
                 </h6>                             
         </div><!--fin de la band_info -->      
       </div> <!--fin de col-->
    </div><!--fon du ligne (row)-->
  </div> 
 <!-- fin footer--------------------------------------------------------------------------------------------------------->

            
            
            
            
            
            
<!--definition des modales content-->

  <!--modale (nous aider)-->
      <div class="w3-modal" id="helpmodal">
        <div class="w3-modal-dialog">
        <!-- Modal content-->
            <div class="w3-modal-content w3-card-1">
              <header class="w3-container green-d3"> 
                 <a href="#" class="w3-closebtn">&times;</a>
                 <h2>Aider les petites enfants</h2>
              </header>
              <div class="w3-container green-d1">
                <p class="text-center">
                   Vous pouvez effectuer un virement sur le compte bancaire de la ligue :<br/>
                    RIB: SWIFT <br/>
                    N°: BCMAMAMC -007 450 0000 00 030 7041238 65<br/>
                    Attijari Wafabank agence colisée- Marrakech
                </p>
              </div>
              <footer class="w3-container green-d3 ">
                 <p>LMPE MARRAKECH</p>
              </footer>
            </div>
        </div>             
      </div>
                 
  <!--modale (a propos de nous)-->
     <div class="w3-modal" id="aboutmodal" role="dialog">
       <div class="w3-modal-dialog">
       <!-- Modal content-->
          <div class="w3-modal-content">
             <header class="w3-container teal-d3"> 
                <a href="#" class="w3-closebtn">&times;</a>
                <h4 class="modal-title text-center">
                 <img src="img/logoC.png" alt="logo lmpe" class="img-responsive" style="margin:0 auto;"/>
                </h4>
              </header>
              <div class="w3-container teal-d1">
                 <p class="text-center">
                   La Ligue Marocaine pour la Protection de l'Enfance est une association reconnue d'utilité publique par                   dahir viziriel du 28 avril 1954. Le bureau régional de Marrakech a ouvert ses portes en 1987 et poursuit                   sa mission qui consiste à assurer la protection de l'enfance en situation précaire et particulièrement                   celle des enfants abandonnés.

                   L'activité principale de notre association est de prendre en charge dans les meilleures conditions                   possibles les bébés et enfants abandonnés (âgés de 1 jour à 5 ans) en attendant de leur trouver une                   famille kafile. (en savoir +). 32 nurses et 6 assistantes médicales se relaient pour assurer le suivi de                   nos enfants 24 sur 24 heures.
                 </p>
               </div>
               <footer class="w3-container teal-d3">
                 <p>LMPE MARRAKECH</p>
               </footer>
           </div>
         </div>
       </div>
              
   <!-- modale  (newsletter button_Push)-->
      <div class="container">
      <!-- Modal -->
        <div class="w3-modal" id="sub" role="dialog">
            <div class="w3-modal-dialog">
            <!-- Modal content-->
              <div class="w3-modal-content">
                  <header class="w3-container teal-d3"> 
                     <a href="#" class="w3-closebtn">&times;</a>
                     <h2>LMPE Newsletter</h2>
                  </header>
                  <div class="w3-container teal-d1">
                      <p>Merci pour votre inscription.</p>
                  </div>
                  <footer class="w3-container teal-d3">
                       <p class="text-center">LMPE</p>
                   </footer>
               </div>
             </div>
         </div>
      </div>