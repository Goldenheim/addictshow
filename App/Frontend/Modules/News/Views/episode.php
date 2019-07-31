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
                                  <a href="admin/profil.php" class="btn btn-primary btn-block btn-sm">Compte</a>
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
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb text-center">
      <li class="breadcrumb-item"><a href="/">Accueil</a></li>
      <li class="breadcrumb-item"><a href="movie-<?php echo $_GET['id']; ?>.html"><?php echo $showTitle; ?></a></li>
      <li class="breadcrumb-item"><a href="season-<?php echo $_GET['id']; ?>-<?php echo $_GET['season']; ?>.html">Saison <?php echo $_GET['season']; ?></a></li>
      <li class="breadcrumb-item active" aria-current="page">Épisode <?php echo $_GET['episode']; ?></li>
    </ol>
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
<section class="filmoja-theater-area section_70">
   <div class="container">
    <div class="col-md-5">
       <div class="theater-left">
          <div class="theater-box">
             <div class="theater-text">
                <h3><?php echo $episode['name']; ?></h3>
                <a href="season-<?php echo $_GET['id']; ?>-<?php echo $episode['season_number']; ?>.html"><h4>Saison <?php echo $episode['season_number'] ?></h4></a>
                <p><?php echo $episode['overview'] ?></p>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-7">
       <div class="theater-slider slider-for">
          <div class="single-theater">
             <img src="https://image.tmdb.org/t/p/w500/<?php echo $episode['still_path']; ?>" alt="theater thumb">
             <?php foreach (array_slice($video['results'], 0, 1) as $video) 
             {
                 if($video != Null)
               {
               ?>
                 <a class="play-video" href="https://www.youtube.com/watch?v=<?php echo $video['key']; ?>">
                 <i class="fa fa-play"></i></a>
               <?php
               }
             }
             ?>
          </div>
       </div>
    </div>
   </div>
</section>
<h3 class="mt-1 text-white text-center">Casting: </h3>
<div id="cast">
    <div class="cast-fluid">
      <div class="cast-container cast-episode d-flex justify-content-center align-items-start wrap mb-3">
       <?php
       foreach ($cast['cast'] as $actor) 
       {
       ?> 
         <div class="cast-card text-center m-2">
           <img id="avatar-cast" src="https://image.tmdb.org/t/p/original/<?php echo $actor['profile_path']; ?>" class="img-fluid">
           <p><?php echo $actor['character']; ?></p>
           <p class="text-light"><?php if($actor['gender'] == 2) { ?> Acteur: <?php } else { ?> Actrice: <?php }; echo $actor['name']; ?></p>
         </div>
       <?php  
       }
       ?>
      </div>
    </div>
  </div> 
</div>

<h3 class="text-white text-center">Gallerie</h3>
<div class="pt-3 pb-3 gallery mb-3 d-flex wrap justify-content-evenly">
    <?php
    foreach ($image['stills'] as $img) 
    {
    ?> 
    <div class="m-2 col-lg-2 col-sm-12 thumb">
        <a href="https://image.tmdb.org/t/p/w1280/<?php echo $img['file_path']; ?>" class="fancybox" rel="ligthbox">
            <img  src="https://image.tmdb.org/t/p/w400/<?php echo $img['file_path']; ?>" class="zoom img-fluid "  alt="">
        </a>
    </div>
    <?php  
    }
    ?>
</div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb text-center">
    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
    <li class="breadcrumb-item"><a href="movie-<?php echo $_GET['id']; ?>.html"><?php echo $showTitle; ?></a></li>
    <li class="breadcrumb-item"><a href="season-<?php echo $_GET['id']; ?>-<?php echo $_GET['season']; ?>.html">Saison <?php echo $_GET['season']; ?></a></li>
    <li class="breadcrumb-item active" aria-current="page">Épisode <?php echo $_GET['episode']; ?></li>
  </ol>
</nav>