<div class="thetop"></div>  
<div class="pos-f">
  <nav class="navbar navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="/" class="nav-link"><span class="mx-auto p-2"><strong class="text-light">ADDICTSHOW</strong></span></a>
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
      <a class="btn btn-primary my-2 my-sm-0" href="subscribe.php">Inscription</a>
      <a class="btn btn-primary my-2 my-sm-0" href="connexion.php">Connexion</a>
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

<?php if (!empty($favourites)) {
  ?>
  <div class="container media text-white mx-auto p-3 mb-3">
    <div class="media-body col-lg-10">
      <h4>Faire une recherche</h4>
      <p>Filtrer les résultats en fonction du favori que vous voulez retrouver:</p>  
      <input class="form-control" id="search" type="text" placeholder="Chercher...">
    </div>
  </div>
  <section class="mb-3 mt-3 d-flex flex-wrap justify-content-center">
  <?php foreach ($favourites as $favourite)
  {
  ?>
    <div class="card m-1 col-lg-5">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 card-title d-flex flex-column justify-content-between align-items-start">
            <a class="p-0 nav-link" href="/movie-<?php echo $favourite['id']; ?>.html"><h4><?php echo $favourite['name']; ?></h4></a>
            <a href="/favourite-delete-<?php echo $favourite['id']; ?>.html" class="btn btn-danger">Supprimer des favoris</a>
            <div class="card-text  align-self-stretch">
              <div class="movie-info">
                 <div class="info-section"><label>Date de sortie</label><span><?php echo $favourite['first_air_date']; ?></span></div>
                 <div class="info-section"><label>nb. votes</label><span><?php echo $favourite['vote_count']; ?></span></div>
                 <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?php echo $favourite['vote_average']; ?></span></div>
              </div> 
            </div> 
          </div>
          <img class="col-lg-4 p-0" src="https://image.tmdb.org/t/p/w300<?php echo $favourite['poster_path']; ?>">
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