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
<div class="emp-profile col-lg-10">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="img/upload/<?php echo $_SESSION['avatar']; ?>" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Changer la photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $_SESSION['pseudo']; ?>
                                    </h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">À propos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vos séries préférées</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row col-md-2">
                    	<div class="d-inline-flex flex-column">
                    		<a class="btn btn-primary my-2 my-sm-2" href="edit-<?php echo $_SESSION['id']; ?>.html" ><small>Éditer le profil</small></a>
                    		<a class="btn btn-danger my-2 my-sm-0" href="profil-delete-<?php echo $_SESSION['id']; ?>.html" ><small>Supprimer le profil</small></a>
                    	</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>LIENS</p>
                            <a href="/">Accueil</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>OPTIONS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Identifiant</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['id']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if(isset($_SESSION['name'])) {
                                                	echo $_SESSION['name'];
                                                } else {
                                                	echo 'non renseigné';
                                                }?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Adresse email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['mail']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Télephone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if(isset($_SESSION['phone'])) {
                                                	echo $_SESSION['phone'];
                                                } else {
                                                	echo 'non renseigné';
                                                }?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if(isset($_SESSION['profession'])) {
                                                	echo $_SESSION['profession'];
                                                } else {
                                                	echo 'non renseigné';
                                                }?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Derniers commentaires publiés : </label>
                                            </div>
                                            
                                                <?php foreach ($auteur as $com) 
                                                {
                                                ?>
	                                                <div class="col-md-10" id="<?php echo $com['id']; ?>">
	                                                	<a href="movie-<?php echo $com['movie']; ?>.html#comment-<?php echo $com['id']; ?>"><?php echo $com['contenu']; ?></a><small> publié le <?php echo $com['date']->format('d/m/Y'); ?></small>
	                                                </div>
                                                <?php	
                                                }
                                                ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Biographie</label><br/>
                                        <p>Votre description en details</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>

        