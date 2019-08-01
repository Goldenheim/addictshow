<div class="background-profil d-flex justify-content-center align-items-center">
	<h1 class="profil-head w-100 text-center text-uppercase p-4"><strong>Profil de <span class="text-profil"><?php  echo $_SESSION['pseudo']; ?></span></strong></h1>
</div>
<div class="emp-profile col-lg-10">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="/img/upload/<?php echo $_SESSION['avatar']; ?>" alt=""/>
                </div>
            </div>
            <div class="col-md-6 d-flex profile-tab">
                <div class="profile-head">
                            <h5>
                                <?php echo $_SESSION['pseudo']; ?>
                            </h5>
                            <h6>
                            	<?php
                               if(isset($_SESSION['profession'])) 
                               {
                               	echo $_SESSION['profession'];
                               } else {
                               	echo 'Profession non renseignée';
                               }?>
                            </h6>
                            <p class="proile-rating">Moyenne de vos notations : <?php if(!empty($rateAvg)) {
                                          echo $rateAvg . '/5';
                                        } else {
                                          echo 'Vous n\'avez pas encore noter de série';
                                        }?></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vos derniers commentaires</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex profile-btn-container">
            	<div class="d-inline-flex flex-column profile-btn">
            		<a class="btn btn-primary my-2 my-sm-2" href="edit-<?php echo $_SESSION['id']; ?>.html" ><small>Éditer le profil</small></a>
            		<a class="btn btn-danger my-2 my-sm-0" href="profil-delete-<?php echo $_SESSION['id']; ?>.html" ><small>Supprimer le profil</small></a>
            	</div>
            </div>
        </div>
        <div class="d-flex profile-content">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>LIENS</p>
                    <a class="d-inline p-0 nav-link" href="/">Accueil</a><br/>
                    <a class="d-inline p-0 nav-link" href="favoris.html">Liste de vos favoris</a><br/>
                    <a class="d-inline p-0 nav-link" href="discover.php">Découvertes</a><br/>
                    <a class="d-inline p-0 nav-link" href="">Vos notes</a><br/>
                    <p>OPTIONS</p>
                    <a class="d-inline p-0 nav-link" href="comments.php">Commentaires</a><br/>
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
                                        	echo '0' . $_SESSION['phone'];
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Genre de série favori</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php foreach ($genre['genres'] as $fav) {                                      
                                            if($fav['id'] == $_SESSION['genre']) {
                                            	echo $fav['name'];
                                            } 
                                   		}?></p>
                                    </div>
                                </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <?php
                        if (!empty($auteur)) 
                        {
                        ?>
                          <div class="row">
                              <div class="col-md-12">
                                  <p>Vous avez posté <?php echo $count ?> commentaires en tout</p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>Vos 5 derniers commentaires publiés : </label>
                              </div>
                              <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Contenu</th>
                                    <th scope="col">Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach (array_splice($auteur, 0, 5) as $com) 
                                  {
                                  ?>
                                    <tr>
                                      <td><a class="nav-link" href="/movie-<?php echo $com['movie']; ?>.html#comment-<?php echo $com['id']; ?>"><?php echo $com['contenu']; ?></a></td>
                                      <td><?php echo $com['date']->format('d/m/Y'); ?></td>
                                    </tr>
                                  <?php 
                                  }
                                  ?>
                                  </tbody>
                              </table>
                          </div> 
                        <?php 
                        } else
                        { 
                      ?>    
                        <p class="text-info">Vous n'avez pas de commentaires postés sur <span class="font-weight-bold text-uppercase mt-3 mb-4"><strong class="text-dark"><span class="title">ADDICT</span>SHOW</strong></span></p>
                      <?php    
                        } 
                      ?> 
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div> 