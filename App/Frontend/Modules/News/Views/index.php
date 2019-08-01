<!-- Page Header -->
<header>
    <div class="blue">
      <section class="pt-5 pb-5 mt-0 align-items-center d-flex" id="fullHeader" style="background-image: url('img/tvshow_banner.jpg');">
        
         <div class="container-fluid">
            <div class="row  justify-content-center align-items-center d-flex text-center h-100">
              <div class="col-12 col-md-8  h-50">
                  <h1 class="fadeInLeft animated display-2 font-weight-bold text-light mb-2 mt-5"><strong><span class="title">ADDICT</span>SHOW</strong></h1>
                  <p class="fadeInUpBig animated lead text-light mb-5">Retrouvez toutes les informations disponibles sur vos séries préférées</p>
                  <form method="post" action="search.php" class="form-inline">
                    <input class="form-control mr-sm-2" id="search" name="search" type="search" placeholder="Rechercher une série" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Rechercher</button>
                  </form>
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
<div class="cardContainer mb-5" class="container-fluid">
    <div id="smoothAnchor" class="mt-5"></div>
    <h3 class="text-center mb-3 text-white">Les 10 séries les plus populaires en ce moment:</h3>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div  id="movieCards" class="carousel-inner row w-100 mx-auto">
      <?php
      foreach (array_slice($listShow['results'], 0, 10) as $show)
      {
      ?>
        <div class="carousel-item col-md-4">
           <div id="<?php echo $show['id']; ?>" class="movie-card">
              <div class="movie-header" style="background: url('https://image.tmdb.org/t/p/w500<?php echo $show['backdrop_path']; ?>');">
                 <div class="header-icon-container">
                  <a class="p-0 nav-link" href="movie-<?php echo $show['id']; ?>.html">
                    <i class="fas fa-search-plus header-icon"></i>
                  </a>
                 </div>
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

<div class="container mb-3">
  <div id="netflix" class="pl-0 col-lg-6">
  <h3 class="text-center mb-3 text-white">les 5 dernières sorties de <?php setlocale(LC_TIME, 'fra_fra'); echo strftime('%B %Y'); ?> sur Netflix:</h3>
  <div class="netflix-container">
    <?php foreach (array_slice($new['results'], 0, 5) as $new) 
    {
    ?>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 card-title d-flex flex-column justify-content-between align-items-start">
              <a class="p-0 nav-link stretched-link" href="/movie-<?php echo $new['id']; ?>.html"><h4><span class="badge badge-danger">Nouveau</span> <?php echo $new['name']; ?></h4></a>
              <p class="p-0"><?php echo $new['overview']; ?></p>
              <div class="card-text  align-self-stretch">
                <div class="movie-info">
                   <div class="info-section"><label>Date de sortie</label><span><?php echo $new['first_air_date']; ?></span></div>
                   <div class="info-section"><label>nb. votes</label><span><?php echo $new['vote_count']; ?></span></div>
                   <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?php echo $new['vote_average']; ?></span></div>
                </div> 
              </div> 
            </div>
            <img class="col-lg-4 avatar-new" src="https://image.tmdb.org/t/p/w300<?php echo $new['poster_path']; ?>">
          </div>     
        </div>
      </div>
    <?php
    }
    ?>
  </div>
  </div>
  <div id="index-features" class="col-lg-6">
    <div class="mt-3 container-fluid">
      <h4 class="lead">Faire une recherche par genre:</h4>
        <form method="post" action="genre.php">
          <select class="custom-select col-lg-9" id="search" name="search">
            <?php foreach ($search['genres'] as $genre) 
              {
              ?>
              <option value="<?php echo $genre['id']; ?>"><?php echo $genre['name']; ?></option>
              <?php
              }
              ?>
          </select>
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Rechercher</button>
      </form>
    </div>
    <div class="mt-3 container-fluid">
      <h4 class="lead">Les derniers commentaires postés: </h4>
      <ul class="list-group">
        <?php foreach ($lastCom as $com) 
        {
        ?>
        <li class="list-group-item">
        <small>Par <strong><?php echo $com['auteur']; ?></strong>, posté le <?php echo $com['date']; ?></small>
        <p><a class="p-0 nav-link stretched-link" href="movie-<?php echo $com['movie']; ?>.html#comment-<?php echo $com['id']; ?>"><?php echo $com['contenu']; ?></a></p>
        </li>
        <?php
        }
        ?>
      </ul>
    </div>
    <div class="mt-3 container-fluid">
      <h4 class="lead">Les acteurs et actrices en vogue: </h4>
        <div class="cast-container d-flex justify-content-center align-items-start wrap mb-3">
          <?php
           foreach (array_slice($character['results'],0, 12) as $character) 
           {
           ?> 
             <div class="cast-card text-center m-2">
               <img id="avatar-cast" src="https://image.tmdb.org/t/p/w300/<?php echo $character['profile_path']; ?>" class="img-fluid">
               <p><?php echo $character['name']; ?></p>
             </div>
           <?php  
           }
           ?>
       </div>
    </div>
  </div>
</div>