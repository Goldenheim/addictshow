<div class="thetop"></div>  
  <div class="pos-f">
    <nav class="navbar navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
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
                                    <img id="login-avatar" src="img/upload/<?php echo $_SESSION['avatar']; ?>">
                                </p>
                            </div>
                            <div class="col-lg-8">
                                <p class="text-left"><strong><?php echo $_SESSION['pseudo']; ?></strong></p>
                                <p class="text-left">
                                    <a href="#" class="btn btn-primary btn-block btn-sm">Compte</a>
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
                                    <a href="/admin/logout.html" class="btn btn-danger btn-block">Déconnexion</a>
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
<header>
<div class="dark">
	<div class="pt-5 pb-5 mt-0 d-flex" id="fullHeaderSeason" style="background-image: url('https://image.tmdb.org/t/p/original<?= $season['poster_path']; ?>');">
	 </div>
	<div id="blur" class="container-fluid">
		<div class="mt-1 justify-content-center d-flex text-center">
		  <div class="col-12 col-md-8 h-50">
		      <h1 class="display-3 text-light mb-2 mt-5"><strong><?php echo $season['name']; ?></strong></h1>
		  </div>       
		</div>
		<div class="container movieContent">
			<div class="row col-12 col-md-12">
				<div class="row col-12 col-md-12">
		    		<img src="https://image.tmdb.org/t/p/original<?= $season['poster_path']; ?>" class="col-lg-2 col-md-12 poster"/>
					<div id="infosContent" class="col-lg-10 col-md-12">
						<div>
							<p class="text-white text-light resume">Résumé: <?php echo $season['overview']; ?></p>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
<h2 class="display-5 mt-3 mb-3 text-center text-white">Toutes les épisodes de la <?php echo $season['name']; ?>:</h2>
<div id="seasonContent" class="container-fluid d-flex flex-row flex-wrap justify-content-center">
	<?php
		foreach ($season['episodes'] as $episode) 
		{
	?>
			<div id="episodeCard" class="d-flex flex-row justify-content-center align-items-center col-lg-10 mb-2">
				<img src="https://image.tmdb.org/t/p/w300<?php echo $episode['still_path']; ?>">
				<div class="movie-infos mx-3 d-flex flex-column justify-content-between">
					<div class="d-flex flex-row justify-content-between">
						<h3 class="display-5 text-white"><?php echo $episode['name']; ?></h3>
						<p class="lead text-white">Épisode <?php echo $episode['episode_number']; ?></p>
					</div>
					<div>
						<p class="text-white"><?php echo $episode['overview']; ?></p>
						<p class="float-right text-white">Date de sortie: <?php echo $episode['air_date']; ?></p>
					</div>
					<div class="movie-infos d-flex justify-content-between">
						<div class="info-section text-white"><label class="text-white">nb. votes:</label><span class="lead"><?= $episode['vote_count']; ?></span></div>
						<div class="info-section text-white"><label class="text-white">Note:</label><span><i class="fas fa-star"></i> <?= $episode['vote_average']; ?></span></div>
					</div>
				</div>
			</div>
	<?php
		}
	?>	
</div>