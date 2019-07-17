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
        <form class="inline-group" method="get" action="/admin/index.php">
          <button class="btn btn-primary my-2 my-sm-0" type="subscribe">Inscription</button>
          <button class="btn btn-primary my-2 my-sm-0" type="connexion">Connexion</button>
        </form>
      </nav>
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
          <div class="jumbotron">
            <h1 class="display-4"><em>Jumbotron Component</em></h1>
            <p class="lead">There are links on this page on GitHub and Blogspot.</p>
            <hr class="my-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Press <strong>button</strong> below to show links in Modal window.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <p class="lead">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Show Modal Component with Links
              </button>
            </p>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal Component title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <a href="https://sergeiki.github.io/bs0/" class="badge badge-danger">Visit this Bootstrap 4 Examples page on GitHub</a>
                    <a href="http://sergeiki.blogspot.com/2017/12/bootstrap-v4-layout-content-components-utilities-examples.html" class="badge badge-warning">Visit this Bootstrap 4 Examples blog on Blogspot</a>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
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

  