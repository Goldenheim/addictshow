<!-- Page Header -->
<header>
    <div class="blue">
      <section class="pt-5 pb-5 mt-0 align-items-center d-flex" id="fullHeader" style="background-image: url('img/tvshow_banner.jpg');">
        
         <div class="container-fluid">
            <div class="row  justify-content-center align-items-center d-flex text-center h-100">
              <div class="col-12 col-md-8  h-50 ">
                  <a href="/" style="text-decoration: none;"><h1 class="display-2  text-light mb-2 mt-5"><strong>ADDICTSHOW</strong></h1></a>
                  <p class="lead  text-light mb-5">Retrouvez toutes les informations disponibles sur vos séries préférées</p>
                  <p class="mb5">
                      <form method="post" action="search.php" class="form-inline">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Rechercher une série" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Rechercher</button>
                      </form>
                  </p>  
                  <div class="btn-container-wrapper p-relative d-block  zindex-1">
                    <a id="smoothClic" class="btn btn-link btn-lg mt-md-3 mb-4 align-self-center text-light" href="#wrap">
                        <i class="fa fa-angle-down fa-4x text-light"></i>
                      </a>   
                  </div>   
              </div> 
            </div>
          </div>
      </section>
    </div>
</header>
<body>
  <div class="thetop"></div>  
    <div class="pos-f-t">
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
    <div id="smoothAnchor"></div>
<div class="cardContainer" class="container-fluid">
    <h1 class="text-center mb-3 text-white">Les séries les plus populaires en ce moment:</h1>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div  id="movieCards" class="carousel-inner row w-100 mx-auto">
      <?php
      foreach ($listShow['results'] as $show)
      {
      ?>
        <div class="carousel-item col-md-4">
           <div id="<?= $show['id']; ?>" class="movie-card">
              <div class="movie-header" style="background: url('https://image.tmdb.org/t/p/w500<?= $show['backdrop_path']; ?>');">
                 <div class="header-icon-container">
                    <a href="#"><i class="material-icons header-icon"></i></a>
                 </div>
              </div>
              <div class="movie-content">
                 <div class="movie-content-header">
                    <a href="movie-<?= $show['id']; ?>.html">
                       <h3 class="movie-title"><?= $show['name']; ?></h3>
                    </a>
                    <div class="imax-logo"></div>
                 </div>
                 <div class="movie-info">
                    <div class="info-section"><label>Date de sortie</label><span><?= $show['first_air_date']; ?></span></div>
                    <div class="info-section"><label>nb. votes</label><span><?= $show['vote_count']; ?></span></div>
                    <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?= $show['vote_average']; ?></span></div>
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