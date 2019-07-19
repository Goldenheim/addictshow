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
<div id="seasonContent">
	<div class="blue">
		<div class="container-fluid p-4">
		  <div class="row">
		    <h2 class="display-5 mx-auto text-white">Formulaire d'inscription</h2>
		  </div>
		  <hr>
		</div>
		<form method="POST" action="" enctype="multipart/form-data" role="form" class="col-lg-3 text-white mx-auto">
			<?php echo $form; ?>   
			<div align="center">    
			        <input type="submit" name="forminscription" value="Envoyer" class="btn btn-primary btn-rounded">
			        <input class="btn btn-primary" type="button" onclick="window.location.replace('/')" value="Annuler" />
			</div>
		</form>
		<br>
	</div>
</div>