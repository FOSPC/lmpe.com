<form role="forme" class="form-group" method="post" action="Backend/actions/users/loginUser.php">
        <div class="form-group">
			<label for="email" class="control-label">Adress email : </label>
			<input type="email" name="email" class="form-control" required placeholder="votre email..."/>
		</div>
        <div class="form-group">
			<label for="email" class="control-label">Password : </label>
			<input type="password" name="password" class="form-control" required placeholder="votre mot de passe..."/>
		</div>
        <button id="btnLogin" type="submit" class="btn btn-primary center-block">Login</button>
       </form>  