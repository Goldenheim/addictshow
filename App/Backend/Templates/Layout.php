<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : 'AddictShow' ?></title>
    <link rel="shortcut icon" type="image/ico" href="/img/tvshow.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="À partir de quand serez-vous accro ?">
    <meta name="author" content="Cédric HEIM">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/cards.css">
</head> 
<body>
  <div class="thetop"></div>  
  <div class="pos-f">
    <nav class="navbar navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a href="/" class="nav-link p-0"><span class="mx-auto p-2"><strong class="text-light">ADDICTSHOW</strong></span></a>
      <form class="inline-group" method="get" action="">
        <?php if ($user->isAuthenticated())
        {
        ?>
          <div class="btn-group">
            <a class="dropdown" data-toggle="dropdown" href=""><img id="avatar-nav" src="/img/upload/<?php echo $_SESSION['avatar']; ?>"></a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <div class="navbar-login">
                        <div class="row">
                            <div class="col-lg-4">
                                <p class="text-center">
                                    <?php if ($_SESSION['avatar'] == 'Array') 
                                    {
                                    ?>  
                                      <img id="login-avatar" src="/img/img_404.png">
                                    <?php  
                                    } else 
                                    {
                                    ?>  
                                      <img id="login-avatar" src="/img/upload/<?php echo $_SESSION['avatar']; ?>">
                                    <?php
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="col-lg-8">
                                <p class="text-left"><strong><?php echo $_SESSION['pseudo']; ?></strong></p>
                                <p class="text-left">
                                    <a href="/member/profil.php" class="btn btn-primary btn-block btn-sm">Compte</a>
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
                                    <a href="/member/logout.html" class="btn btn-danger btn-block">Déconnexion</a>
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
        <a class="btn btn-primary my-2 my-sm-0" href="/subscribe.php">Inscription</a>
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
  <!-- Main Content -->
  <div id="content-wrap">
        <section id="main">      
          <?= $content ?>
          <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-blue" id="exampleModalLongTitle">Notifications</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php if ($user->hasFlash()) echo '<p id="modal">' . $user->getFlash() . '</p>'; ?> 
                  </div>
                </div>
              </div>
            </div> 
        </section>
      </div>

    <div class='scrolltop'>
        <div class='scroll icon'><i class="fa fa-arrow-circle-up"></i></div>
    </div>  

    <!-- Footer -->
    <footer class="page-footer font-small stylish-color-dark pt-4">

      <!-- Footer Links -->
      <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="container">

          <!-- Grid column -->
          <div class="col-md-4 mx-auto">

            <!-- Content -->
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4"><strong><span class="title">ADDICT</span>SHOW</strong></h5>
            <p>Retrouver toutes les informations que vous recherchez à travers une base de données officielle regroupant plus de 84000 séries</p>

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
        <?php if ($user->isAuthenticated())
        {
        ?>
          <li class="list-inline-item">
            <h5 class="mb-1">Vous êtes actuellement connecté en tant que <a class="d-inline p-0 nav-link" href="profil.php"><strong><?php echo $_SESSION['pseudo']; ?></strong></a></h5>
          </li>
        <?php  
        } else 
        {
        ?> 
        <li class="list-inline-item">
          <h5 class="mb-1">Créer un compte</h5>
        </li>
        <li class="list-inline-item">
          <a href="/subscribe.php" class="btn btn-primary btn-rounded">Inscrivez-vous !</a>
        </li>
        <?php
        }
        ?>
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
        <p class="text-center">Liens: 
          <a href="#"><span class="label label-info">mentions légales</span></a> 
        | <i class="icon-user"></i> <a href="#">Admin</a> 
        | <i class="icon-calendar"></i> <?php setlocale(LC_TIME, 'fra_fra'); echo strftime('%A %d %B %Y, %H:%M'); ?>
        | <i class="icon-comment"></i> <a href="#">3 Commentaires postés</a>
      </p>
    </footer>
    <!-- Footer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/form.js"></script>
    <script src="/js/script.js"></script>
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
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
    <script>
      $(document).ready(function(){
        $("#search").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
    <script></script>
</body>
</html>