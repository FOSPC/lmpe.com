  <form role="forme" class="form-group" action="Backend/actions/users/inscUser.php" method="post">
        <div class="form-group">
			<label for="name" class="control-label">Nom : </label>
			<input class="form-control" type="text" name="nom" required placeholder="votre nom..."/>
		</div>
        
        <div class="form-group">
			<label for="name" class="control-label">Prenom : </label>
			<input class="form-control" name="prenom" type="text" required placeholder="votre prenom..."/>
		</div>
        
         <div class="form-group">
			<label for="email" class="control-label">Date Naissance : </label>
			<input type="date"  name="bd" class="form-control" required/>
		</div>
        
        <div class="form-group">
			<label for="email" class="control-label">Adress email : </label>
			<input type="email" name="email" class="form-control" required placeholder="votre email..."/>
		</div>
        
        <div class="form-group">
			<label for="email" class="control-label">Password : </label>
			<input type="password" name="password" class="form-control" required placeholder="votre mot de passe..."/>
		</div>
        
        <div class=" form-inline">
           <button type="submit" class="btn btn-success">Continue</button>
           <button type="reset" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span></button>
        </div>
           
       </form>