<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : 'AddictShow' ?></title>
    <link rel="shortcut icon" type="image/ico" href="img/tvshow.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="À partir de quand serez-vous accro ?">
    <meta name="author" content="Cédric HEIM">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/cards.css">
</head> 
 
  <body>
      <?php if ($user->isAuthenticated()) { ?>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand" href="/"><i class="fas fa-undo-alt"></i> Retour au blog</a>
          <?php if (isset($nombreReport) && $nombreReport != 0)
                 echo '<i class="fas fa-comment-alt notify"><a data-toggle="modal" href="#infos"><span  class="badge badge-danger badge-notify">' . $nombreReport . '</span></a></i>' ?>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/admin/"><i class="fas fa-home"></i> Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/news-insert.html">Ajouter un article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/logout.html"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <?php } else { ?>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
          <div class="container">
            <a class="navbar-brand lead text-white" href="/">Retour au site</a>
            </div>
          </div>
        </nav>
        <header id="fullHeader" class="login">
          <div class="overlay"></div>
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-10 mx-auto">
                <div class="site-heading">
                  <h1>Connexion</h1>
                  <span class="subheading">Espace personnel</span>
                </div>
              </div>
            </div>
          </div>
        </header>
      <?php } ?>
 
      <div id="login-form" class="col-lg-12 col-md-10 mx-auto">
        <section id="main">
          <br>
          <?= $content ?>
          <div class="modal" id="infos">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                    <?php if ($user->hasFlash()) echo '<p id="modal">', $user->getFlash(), '<button type="button" class="close" data-dismiss="modal">x</button></p>'; ?> 
                </div>
              </div>
            </div>
          </div>  
          <div class="modal" id="badge">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                      <?php echo '<a class="nav-link mx-auto" href="report.html" id="badge">' . $nombreReport .' commentaire(s) signalé(s)</a>'; ?> 
                    </div>
                </div>
              </div>
            </div>
          </div>         
        </section>
      </div>

      <!-- Footer -->
          <footer class="page-footer font-small stylish-color-dark pt-4">

            <!-- Footer Links -->
            <div class="container text-center text-md-left">

              <!-- Grid row -->
              <div class="row">

                <!-- Grid column -->
                <div class="col-md-4 mx-auto">

                  <!-- Content -->
                  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Footer Content</h5>
                  <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                    consectetur
                    adipisicing elit.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                  <!-- Links -->
                  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                  <ul class="list-unstyled">
                    <li>
                      <a href="#!">Link 1</a>
                    </li>
                    <li>
                      <a href="#!">Link 2</a>
                    </li>
                    <li>
                      <a href="#!">Link 3</a>
                    </li>
                    <li>
                      <a href="#!">Link 4</a>
                    </li>
                  </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                  <!-- Links -->
                  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                  <ul class="list-unstyled">
                    <li>
                      <a href="#!">Link 1</a>
                    </li>
                    <li>
                      <a href="#!">Link 2</a>
                    </li>
                    <li>
                      <a href="#!">Link 3</a>
                    </li>
                    <li>
                      <a href="#!">Link 4</a>
                    </li>
                  </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                  <!-- Links -->
                  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                  <ul class="list-unstyled">
                    <li>
                      <a href="#!">Link 1</a>
                    </li>
                    <li>
                      <a href="#!">Link 2</a>
                    </li>
                    <li>
                      <a href="#!">Link 3</a>
                    </li>
                    <li>
                      <a href="#!">Link 4</a>
                    </li>
                  </ul>

                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <hr>

            <!-- Call to action -->
            <ul class="list-unstyled list-inline text-center py-2">
              <li class="list-inline-item">
                <h5 class="mb-1">Créer un compte</h5>
              </li>
              <li class="list-inline-item">
                <a href="#!" class="btn btn-primary btn-rounded">Inscrivez-vous !</a>
              </li>
            </ul>
            <!-- Call to action -->

            <hr>

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
              <li class="list-inline-item">
                <a class="btn-floating btn-fb mx-1">
                  <i class="fab fa-facebook-f"> </i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1">
                  <i class="fab fa-twitter"> </i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-gplus mx-1">
                  <i class="fab fa-google-plus-g"> </i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1">
                  <i class="fab fa-linkedin-in"> </i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-dribbble mx-1">
                  <i class="fab fa-dribbble"> </i>
                </a>
              </li>
            </ul>
            <!-- Social buttons -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2019 Copyright:
              <a href="https://www.cedricheim.fr"> cedricheim.fr</a>
            </div>
              <p class="text-center">Tags: 
                <a href="#"><span class="label label-info">Snipp</span></a> 
              <a href="#"><span class="label label-info">Bootstrap</span></a> 
              <a href="#"><span class="label label-info">UI</span></a> 
              <a href="#"><span class="label label-info">growth</span></a>
              | <i class="icon-user"></i> <a href="#">Admin</a> 
              | <i class="icon-calendar"></i> Sept 16, 2019 à 16:20
              | <i class="icon-comment"></i> <a href="#">3 Commentaires</a>
                | <i class="icon-share"></i> <a href="#">39 Partages</a>
            </p>
          </footer>
          <!-- Footer -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
          <script src="/js/bootstrap.min.js"></script>
          <script src="/js/pagination.js"></script>
          <script>
            function scrollTo(target) {
                if (target.length) {
                    $("html, body")
                        .stop()
                        .animate({
                            scrollTop: target.offset()
                                .top
                        }, 1500);
                }
            };
            $("#smoothClic").click( e =>  {
              scrollTo($("#smoothAnchor"));
            });
          </script>
          <script>
            let flash = $("#modal");
            if (flash.text() != "") {
              $('.modal').modal('show');
            };

            $("#movieCards div:eq(0)").addClass("active");
          </script>
      </body>
      </html>