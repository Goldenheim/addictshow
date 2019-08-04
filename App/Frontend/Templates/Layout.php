<!DOCTYPE html>
<html class="fadeMe" lang="fr">
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
    <link rel="stylesheet" type="text/css" href="/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/css/cards.css">
</head> 
<body>
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
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4">membres</h5>

            <ul class="list-unstyled">
              <li>
                <a href="subscribe.php">Inscription</a>
              </li>
              <li>
                <a href="member/connexion.php">Connexion</a>
              </li>
              <li>
                <a href="member/profil.php">Profil</a>
              </li>
              <li>
                <a href="logout.html">Déconnexion</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <hr class="clearfix w-100 d-md-none">

          <!-- Grid column -->
          <div class="col-md-2 mx-auto">

            <!-- Links -->
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4">top</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Stranger things</a>
              </li>
              <li>
                <a href="#!">Game of thrones</a>
              </li>
              <li>
                <a href="#!">Mindhunter</a>
              </li>
              <li>
                <a href="#!">Orange is the new black</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <hr class="clearfix w-100 d-md-none">

          <!-- Grid column -->
          <div class="col-md-2 mx-auto">

            <!-- Links -->
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Nouveau</h5>

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
            <h5 class="mb-1">Vous êtes actuellement connecté en tant que <a class="d-inline p-0 nav-link" href="member/profil.php"><strong><?php echo $_SESSION['pseudo']; ?></strong></a></h5>
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
        | <i class="icon-calendar"></i> <?php setlocale(LC_TIME, 'fra_fra'); echo utf8_encode(strftime('%A %d %B %Y, %H:%M')); ?>
        | <i class="icon-comment"></i> <a href="#">3 Commentaires postés</a>
      </p>
    </footer>
    <!-- Footer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="/js/pagination.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/form.js"></script>
    <script>
      /* loading scripts */
        loadingScripts();
        /* used to load scripts for specific page */
        function loadingScripts() {
            /* getting url of current page */
            let url = window.location.pathname;
            if (url == "/subscribe.php") { /* checking whether the current page is home page or not */
                let script = document.createElement('script');
                script.src = "/js/script.js";
                document.body.appendChild(script);
            }
        }
    </script>
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
</body>
</html>