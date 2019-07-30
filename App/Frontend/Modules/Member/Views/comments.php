<div class="thetop"></div>  
<div class="pos-f">
  <nav class="navbar navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="/" class=""><span class="mx-auto p-2"><strong class="text-light">ADDICTSHOW</strong></span></a>
    <form class="inline-group" method="get" action="">
      <?php if ($user->isAuthenticated())
      {
      ?>
        <div class="btn-group">
          <a class="dropdown" data-toggle="dropdown" href=""><img id="avatar-nav" src="img/upload/<?php echo $_SESSION['avatar']; ?>"></a>
          <ul class="dropdown-menu dropdown-menu-right">
              <li>
                  <div class="navbar-login">
                      <div class="row">
                          <div class="col-lg-4">
                              <p class="text-center">
                                  <?php if ($_SESSION['avatar'] == 'Array') 
                                  {
                                  ?>  
                                    <img id="login-avatar" src="img/img_404.png">
                                  <?php  
                                  } else 
                                  {
                                  ?>  
                                    <img id="login-avatar" src="img/upload/<?php echo $_SESSION['avatar']; ?>">
                                  <?php
                                  }
                                  ?>
                              </p>
                          </div>
                          <div class="col-lg-8">
                              <p class="text-left"><strong><?php echo $_SESSION['pseudo']; ?></strong></p>
                              <p class="text-left">
                                  <a href="profil.php" class="btn btn-primary btn-block btn-sm">Compte</a>
                              </p>
                          </div>
                      </div>
                  </div>
              </li>
              <li class="divider"></li>
              <li>
                  <div class="navbar-login navbar-login-session">
                      <div class="row">
                          <div class="col-lg-12">
                              <p>
                                  <a href="logout.html" class="btn btn-danger btn-block">Déconnexion</a>
                              </p>
                          </div>
                      </div>
                  </div>
              </li>
          </ul>            
        </div>
      <?php  
      } else 
      {
      ?> 
      <a class="btn btn-primary my-2 my-sm-0" href="subscribe.php" >Inscription</a>
      <a class="btn btn-primary my-2 my-sm-0" href="connexion.php" >Connexion</a>
      <?php
      }
      ?>
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
<div class="emp-profile col-lg-10">
	<div class="container media border mx-auto p-3 mb-3">
	  <div class="media-body">
	  	<h4>Faire une recherche</h4>
	  	<p>Filtrer les résultats en fonction du contenu du commentaire que vous voulez retrouver:</p>  
	  	<input class="form-control" id="search" type="text" placeholder="Chercher...">
	  </div>
	</div>

	<section class="col-lg-12 col-xs-10 table-responsive">
		<div class="row">
			<p class="mx-auto">Liste de tous les commentaires:</p>
		</div>

		<div class="row">
			<table class="table table-sm table-borderless table-condensed">
				
			  <thead class="thead-dark">
			  <tr><th>Contenu</th><th>Date</th><th>Action</th></tr></thead>
				<?php
				foreach ($comments as $comment)
				{
				  echo '<tr><td><a class="nav-link" href="movie-' . $comment['movie'] . '.html#comment-' . $comment['id'] . '">' . $comment['contenu'] . '</a></td><td>' . $comment['date']->format('d/m/Y'). '</td><td><a href="comment-update-' . $comment['id'] . '.html"><i class="fas fa-edit"></i></a> <a href="comment-delete-' . $comment['id'] . '.html"><i class="fas fa-trash"></i></a></td></tr>', "\n";
				}
				?>
			</table>
		</div>
	</section>
</div>