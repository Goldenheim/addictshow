<div class="pos-f-t">
  <nav class="navbar navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="inline-group" method="get" action="/">
      <button class="btn btn-primary my-2 my-sm-0" type="subscribe">Inscription</button>
      <button class="btn btn-primary my-2 my-sm-0" onclick="window.location.href='admin/index.php'" type="connexion">Connexion</button>
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
		<form method="POST" action="" role="form" class="col-lg-3 text-white mx-auto">
			<?php echo $form; 
			/*<div class="form-group">
			         <label for="pseudo">Pseudo :</label>
			         <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" class="form-control"/>
			</div>
			<div class="form-group">    
			         <label for="mail">Adresse de courriel :</label>
			         <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" class="form-control">
			</div>
			<div class="form-group">     
			         <label for="mail2">Confirmation de l'adresse de courriel :</label>
			         <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" class="form-control"/>
			</div>
			<div class="form-group">    
			         <label for="mdp">Mot de passe :</label>
			         <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" class="form-control"/>
			</div>
			<div class="form-group">   
			         <label for="mdp2">Confirmation du mot de passe :</label>
			         <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" class="form-control"/>
			</div> */ ?>   
			<div align="center">    
			        <input type="submit" name="forminscription" value="Envoyer" class="btn btn-primary btn-rounded">
			        <input class="btn btn-primary" type="button" onclick="window.location.replace('/')" value="Annuler" />
			</div>
		</form>
		<br>
	</div>
</div>