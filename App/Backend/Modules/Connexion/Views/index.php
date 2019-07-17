<div class="container-fluid">
  <div class="row">
    <h2 class="display-5 mx-auto text-white">Veuillez-vous identifier</h2>
  </div>
</div>

<form class="col-lg-3 text-white mx-auto" action="" method="post" >

  
  <div class="form-group">
  	<label for="login" class="lead control-label">Pseudo:</label>
  	<input type="text" name="login" class="form-control" id="login" placeholder="Entrez votre pseudo" />
  </div>

  
  <div class="form-group">
  	<label for="password" class="lead control-label">Mot de passe: </label>
  	<input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" />
  </div>	 

  <div class="form-group">
    <!-- Default checked -->
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="autoLogin" checked>
      <label class="custom-control-label" for="autoLogin">Connexion automatique</label>
    </div>
  </div>   

  <div class="row">
  	<button class="btn btn-primary my-2 my-sm-0 mx-auto" type="submit">Connexion</button>
  </div>
</form>
<br>