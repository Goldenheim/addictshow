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

    <br>

    <div class='scrolltop'>
        <div class='scroll icon'><i class="fa fa-arrow-circle-up"></i></div>
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
        <?php if ($user->isAuthenticated())
        {
        ?>
          <li class="list-inline-item">
            <h5 class="mb-1">Vous êtes actuellement connecté en tant que <strong><?php echo $_SESSION['pseudo']; ?></strong></h5>
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