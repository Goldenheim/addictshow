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

  <div class="container-fluid d-flex flex-wrap justify-content-center">
    <?php foreach ($search['results'] as $genre) 
    {
    ?>
      <div class="card m-3 col-lg-5">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 card-title d-flex flex-column justify-content-between align-items-start">
              <a class="stretched-link" href="/movie-<?php echo $genre['id']; ?>.html"><h4><?php echo $genre['name']; ?></h4></a>
              <span class="p-0 d-inline-block text-truncate"><?php echo $genre['overview']; ?></span>
              <div class="card-text  align-self-stretch">
                <div class="movie-info">
                   <div class="info-section"><label>Date de sortie</label><span><?php echo $genre['first_air_date']; ?></span></div>
                   <div class="info-section"><label>nb. votes</label><span><?php echo $genre['vote_count']; ?></span></div>
                   <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?php echo $genre['vote_average']; ?></span></div>
                </div> 
              </div> 
            </div>
            <img class="col-lg-4 avatar-new" src="https://image.tmdb.org/t/p/w300<?php echo $genre['poster_path']; ?>">
          </div>     
        </div>
      </div>
    <?php
    }
    ?>
  </div>