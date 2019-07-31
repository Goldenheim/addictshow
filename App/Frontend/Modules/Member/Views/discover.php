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
<div class="cardContainer h-auto mb-5">
    <div id="smoothAnchor" class="mt-5"></div>
    <h3 class="lead text-center mb-3 text-white"><hr>Parce que vous aimez le genre <?php echo $genre ?><hr></h3>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div  id="movieCards" class="carousel-inner row w-100 mx-auto">
      <?php
      foreach (array_slice($search['results'], 0, 20) as $show)
      {
      ?>
        <div class="carousel-item col-md-4">
           <div id="<?php echo $show['id']; ?>" class="movie-card">
              <div class="movie-header" style="background: url('https://image.tmdb.org/t/p/w500<?php echo $show['backdrop_path']; ?>');">
              </div>
              <div class="movie-content">
                 <div class="movie-content-header">
                    <a class="p-0 nav-link" href="movie-<?php echo $show['id']; ?>.html">
                       <h3 class="movie-title"><?php echo $show['name']; ?></h3>
                    </a>
                    <div class="imax-logo"></div>
                 </div>
                 <div class="movie-info">
                    <div class="info-section"><label>Date de sortie</label><span><?php echo $show['first_air_date']; ?></span></div>
                    <div class="info-section"><label>nb. votes</label><span><?php echo $show['vote_count']; ?></span></div>
                    <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?php echo $show['vote_average']; ?></span></div>
                 </div>
              </div>
           </div>
        </div>
      <?php
      }
      ?>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<?php if (!empty($similar)) {
  ?>
  <h3 class="lead text-center mb-3 text-white"><hr>Similaire à <?php echo $titleFav['name'] ?><hr></h3>
  <section class="pt-3 pb-3 mt-3 d-flex flex-wrap justify-content-center bg-success">
  <?php foreach (array_splice($similar['results'], 0,10) as $recommandation)
  {
  ?>
    <div class="card m-1 col-lg-5">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 card-title d-flex flex-column justify-content-between align-items-start">
            <a class="p-0 nav-link" href="/movie-<?php echo $recommandation['id']; ?>.html"><h4><?php echo $recommandation['name']; ?></h4></a>
            <div class="card-text  align-self-stretch">
              <div class="movie-info">
                 <div class="info-section"><label>Date de sortie</label><span><?php echo $recommandation['first_air_date']; ?></span></div>
                 <div class="info-section"><label>nb. votes</label><span><?php echo $recommandation['vote_count']; ?></span></div>
                 <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?php echo $recommandation['vote_average']; ?></span></div>
              </div> 
            </div> 
          </div>
          <img class="col-lg-4 p-0" src="https://image.tmdb.org/t/p/w300<?php echo $recommandation['poster_path']; ?>">
        </div>     
      </div>
    </div>
  <?php
  }
  ?>
  </section>
<?php  
} else 
{
?>
  <p class="mb-3 mt-3 text-center text-light">Vous n'avez pas encore de favoris dans votre liste</p>
<?php
}
?>