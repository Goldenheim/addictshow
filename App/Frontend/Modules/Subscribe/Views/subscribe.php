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
      <a class="btn btn-primary my-2 my-sm-0" href="member/connexion.php" >Connexion</a>
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
<div id="seasonContent">
	<div>
		<div class="container-fluid p-4">
		  <div class="row">
		    <h2 class="display-5 mx-auto text-white">Formulaire d'inscription</h2>
		  </div>
		  <hr>
		</div>
		<form method="POST" action="" enctype="multipart/form-data" role="form" class="col-lg-3 mx-auto">
			<?php echo $form; ?>   
			<div align="center">    
        <input type="submit" name="forminscription" id="subscribeBtn" value="Envoyer" class="btn btn-primary btn-rounded">
        <input class="btn btn-primary" type="button" onclick="window.location.replace('/')" value="Annuler" />
			</div>
		</form>
		<br>
	</div>
</div>