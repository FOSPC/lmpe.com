       <form role="forme" class="form-group" action="Backend/actions/SendContactMail/sendMail.php" method="post">
        <div class="form-group">
			<label for="name" class="control-label">Nom : </label>
			<input class="form-control" type="text" required placeholder="votre nom ici..." name="nom"/>
		</div>
        <div class="form-group">
			<label for="email" class="control-label">Adress email : </label>
			<input type="email" class="form-control" required placeholder="votre email ici..." name="email"/>
		</div>
        <div class=" form-group">
          <label for="message" class="control-label">Message : </label>
         <textarea class="form-control" required rows="5" id="message" placeholder="votre message ici..." name="message"></textarea>
        </div>
            <button type="submit" class="btn btn-success">envoyer le message</button>
       </form> 