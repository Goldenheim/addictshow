<div class="thetop"></div>  
  <div class="pos-f">
    <nav class="navbar navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <form class="inline-group" method="get" action="">
        <a class="btn btn-primary my-2 my-sm-0" href="subscribe.php" >Inscription</a>
        <a class="btn btn-primary my-2 my-sm-0" href="connexion.php" >Connexion</a>
      </form>
    </nav>
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="bg-dark p-3">
        <div class="jumbotron">
          <h1 class="display-5 form-inline"><em>Faire une recherche</em></h1>
          <form method="post" action="search.php" class="form-inline">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Rechercher une série" aria-label="Search">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Rechercher</button>
          </form>
          <hr class="my-4">
        </div>
      </div>
    </div>
  </div>
<div class="container-fluid mt-4">
  <div class="row">
    <h2 class="display-5 mx-auto text-white">Veuillez-vous identifier</h2>
  </div>
</div>

<form class="col-lg-3 text-white mx-auto" action="" method="post" >

  
  <div class="form-group">
  	<label for="pseudo" class="lead control-label">Pseudo:</label>
  	<input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Entrez votre pseudo" />
  </div>

  
  <div class="form-group">
  	<label for="password" class="lead control-label">Mot de passe: </label>
  	<input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" />
  </div>	 

  <div class="form-group">
    <!-- Default checked -->
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" name="autoLogin" id="autoLogin" checked>
      <label class="custom-control-label" for="autoLogin">Connexion automatique</label>
    </div>
  </div>   

  <div class="row">
  	<button class="btn btn-primary my-2 my-sm-0 mx-auto" type="submit">Connexion</button>
  </div>
</form>
<hr>
<div class="container-fluid">
  <div class="row mt-3 mb-3">
    <a href="/subscribe.php" class="btn btn-primary btn-rounded mx-auto">Vous n'êtes pas encore inscris ?</a>
  </div>
</div>