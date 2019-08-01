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
                                  <a href="member/profil.php" class="btn btn-primary btn-block btn-sm">Compte</a>
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
                                  <a href="member/logout.html" class="btn btn-danger btn-block">Déconnexion</a>
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
      <a class="btn btn-primary my-2 my-sm-0" href="subscribe.php">Inscription</a>
      <a class="btn btn-primary my-2 my-sm-0" href="member/connexion.php">Connexion</a>
      <?php
      }
      ?>
    </form>
  </nav>
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-3">
      <div class="jumbotron">
        <h1 class="lead form-inline"><em>Faire une recherche</em></h1>
        <form method="post" action="search.php" class="form-inline">
          <input class="form-control mr-sm-2" name="search" type="search" placeholder="Rechercher une série" aria-label="Search">
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
        <hr class="my-4">
      </div>
    </div>
  </div>
</div>
<header>
<div class="dark">
	<div class="pt-5 pb-5 mt-0 d-flex" id="fullHeaderSeason" style="background-image: url('https://image.tmdb.org/t/p/original<?php echo $season['poster_path']; ?>');">
	 </div>
	<div id="blur" class="container-fluid blur-season">
		<div class="mt-1 justify-content-center d-flex text-center">
		  <div class="col-12 col-md-8 h-50">
		      <h1 class="display-3 text-light mb-2 mt-5"><strong><?php echo $season['name']; ?></strong></h1>
		  </div>       
		</div>
		<div class="container movieContent">
				<div class="row col-12 col-md-12">
		    		<img src="https://image.tmdb.org/t/p/original<?php echo $season['poster_path']; ?>" class="col-lg-2 col-md-12 poster"/>
					<div id="infosContent" class="col-lg-10 col-md-12">
						<div class="overview-overflow">
							<p class="text-white text-light resume"><?php if($season['overview'] == Null) { ?> Il n'y pas encore de résumé disponbile pour cette saison <?php } else { ?> Résumé: <?php echo $season['overview']; } ?></p>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
<h2 class="display-5 mt-3 mb-3 text-center text-white">Toutes les épisodes de la <?php echo $season['name']; ?>:</h2>
<div class="p-3 d-flex flex-row flex-wrap justify-content-around mb-3" style="background-color: white;">
	<?php
		foreach ($season['episodes'] as $episode) 
		{
	?>
			<div id="episodeCard" class="d-flex flex-row justify-content-between align-items-center col-lg-10 mb-2">
        <?php if ($episode['still_path'] == Null) 
        {
        ?>  
          <img src="img/episode-404.png">
        <?php  
        } else 
        {
        ?>  
          <img src="https://image.tmdb.org/t/p/w300<?php echo $episode['still_path']; ?>">
        <?php
        }
        ?>
				<div class="movie-infos mx-3 d-flex flex-column justify-content-between">
					<div class="d-flex flex-row justify-content-between">
						<a class="p-0 nav-link" href="episode-<?php echo $seasonId; ?>-<?php echo $season['season_number']; ?>-<?php echo $episode['episode_number']; ?>.html" class="streched link"><h3 class="display-5 text-white"><?php echo $episode['name']; ?></h3></a>
						<p class="lead text-white">Épisode <?php echo $episode['episode_number']; ?></p>
					</div>
					<div>
						<p class="text-white"><?php if($episode['overview'] == Null) { ?> Il n'y pas encore de résumé disponbile pour cet épisode<?php } else { ?> Résumé: <?php echo $episode['overview']; } ?></p>
						<p class="float-right text-white">Date de sortie: <?php echo $episode['air_date']; ?></p>
					</div>
					<div class="movie-infos d-flex justify-content-between">
						<div class="info-section text-white"><label class="text-white">nb. votes:</label><span class="lead"><?php echo $episode['vote_count']; ?></span></div>
						<div class="info-section text-white"><label class="text-white">Note:</label><span><i class="fas fa-star"></i> <?php echo $episode['vote_average']; ?></span></div>
					</div>
				</div>
			</div>
	<?php
		}
	?>	
</div>