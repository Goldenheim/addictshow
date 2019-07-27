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
<!-- Page Header -->
<header>
    <div class="dark">
     <div class="pt-5 pb-5 mt-0 d-flex" id="fullHeaderMovie" style="background-image: url('https://image.tmdb.org/t/p/w1280<?php echo $movie["poster_path"]; ?> ');">
     </div>
     <div  id="blur" class="container-fluid">
        <div class="row  justify-content-center align-items-start d-flex text-center">
          <div class="col-12 col-md-8  h-50">
              <div class="d-flex justify-content-center align-items-center mt-3">
                <h1 class="display-3 font-weight-bold text-light"><strong><?php echo $movie['name']; ?></strong></h1>
                <?php foreach (array_slice($movie['networks'], 0, 1) as $network)
                {
                  echo '<img class="ml-2 network" src="https://image.tmdb.org/t/p/w300' . $network['logo_path'] . '">';
                }?> 
              </div>
              <p class="lead text-light mb-5">Genre(s):
              <?php
              	foreach ($movie['genres'] as $genre) 
              	{
              		$genres = $genre['name'];
              		echo ' '. $genres;
              	} 
              ?>  
              </p>   
          </div>       
        </div>
        <div class="container movieContent">
        	<div class="row col-12 col-md-12">
        		<img src="https://image.tmdb.org/t/p/w500<?php echo $movie['poster_path']; ?>" class="col-lg-7 col-md-12 poster"/>
        		<div id="infosContent" class="col-lg-5 col-md-12">
              <div id="favorite_show">
                <button type="submit"><i class="far fa-heart"></i></button>
              </div>
              <div class="container-rating">
                <div class="feedback">
                  <div class="rating">
                    <input type="radio" name="rating" id="rating-5">
                    <label for="rating-5"></label>
                    <input type="radio" name="rating" id="rating-4">
                    <label for="rating-4"></label>
                    <input type="radio" name="rating" id="rating-3">
                    <label for="rating-3"></label>
                    <input type="radio" name="rating" id="rating-2">
                    <label for="rating-2"></label>
                    <input type="radio" name="rating" id="rating-1">
                    <label for="rating-1"></label>
                    <div class="emoji-wrapper">
                      <div class="emoji">
                        <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                        <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534"/>
                        <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff"/>
                        <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347"/>
                        <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63"/>
                        <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff"/>
                        <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347"/>
                        <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63"/>
                        <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347"/>
                      </svg>
                        <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                        <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347"/>
                        <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534"/>
                        <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff"/>
                        <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347"/>
                        <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff"/>
                        <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534"/>
                        <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff"/>
                        <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347"/>
                        <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff"/>
                      </svg>
                        <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                        <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347"/>
                        <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff"/>
                        <circle cx="340" cy="260.4" r="36.2" fill="#3e4347"/>
                        <g fill="#fff">
                          <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10"/>
                          <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z"/>
                        </g>
                        <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347"/>
                        <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff"/>
                      </svg>
                        <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                  <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347"/>
                  <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                  <g fill="#fff">
                    <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z"/>
                    <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81"/>
                  </g>
                  <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                  <g fill="#fff">
                    <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1"/>
                    <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81"/>
                  </g>
                  <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                  <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff"/>
                </svg>
                        <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                        <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                        <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f"/>
                        <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                        <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                        <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f"/>
                        <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                        <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347"/>
                        <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b"/>
                      </svg>
                        <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <g fill="#ffd93b">
                          <circle cx="256" cy="256" r="256"/>
                          <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z"/>
                        </g>
                        <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4"/>
                        <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea"/>
                        <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88"/>
                        <g fill="#38c0dc">
                          <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z"/>
                        </g>
                        <g fill="#d23f77">
                          <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z"/>
                        </g>
                        <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347"/>
                        <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b"/>
                        <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2"/>
                      </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        			<div>
        				<div class="movie-info similar">
        				   <div class="info-section"><label>Date de sortie</label><span><?php echo $movie['first_air_date']; ?></span></div>
        				   <div class="info-section"><label>nb. votes</label><span><?php echo $movie['vote_count']; ?></span></div>
        				   <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?php echo $movie['vote_average']; ?></span></div>
        				</div>
        				<p class="text-white text-light"><a href="<?php echo $movie['homepage']; ?>"><p class="text-light text-white">Site officiel</p></a></p>
        				<p class="text-white text-light">Nombre de saison(s): <?php echo $movie['number_of_seasons']; ?></p>
        				<p class="text-white text-light">Nombre d'épisodes sortis: <?php echo $movie['number_of_episodes']; ?></p>
        				<p class="text-white text-light resume">Résumé: <?php echo $movie['overview']; ?></p>
        				<p class="text-white text-light">Statut: 
        					<?php
        						if($movie['in_production'])
        						{
        							echo "en cours de production";
        						} 
        						else 
        						{
        							echo "terminée";
        						}
        					?>
        				</p>
        			</div>
					<span id="profiles" class="card-primary mt-3 mb-3">
					<?php foreach ($movie['created_by'] as $author)
					{
						if ($author['profile_path']) {
							echo '<span class="text-white text-center"><img class="profile" src="https://image.tmdb.org/t/p/w200' . $author['profile_path'] . '"><br>'. $author['name'] .'</span>';
						}
					}?>	
					</span>
        		</div>
        	</div>
        </div>
        <br>
      </div>
    </div>
</header>
<div class="card last-air-episode">
  <div class="p-0 card-body">
    <div class="row mx-auto">
      <img class="backdrop-show" src="https://image.tmdb.org/t/p/w500<?php echo $movie['backdrop_path']; ?>">
      <div class="col-lg-3 card-title d-flex flex-column justify-content-between align-items-start m-2 p-2">
        <small>Dernier épisode diffusé à ce jour</small>
        <a class="stretched-link" href="/episode-<?php echo $movie['id']; ?>-<?php echo $movie['last_episode_to_air']['season_number']; ?>-<?php echo $movie['last_episode_to_air']['episode_number']; ?>.html"><h4><?php echo $movie['last_episode_to_air']['name']; ?></h4></a>
        <p class="p-0"><?php echo $movie['last_episode_to_air']['overview']; ?></p>
        <div class="card-text  align-self-stretch">
          <div class="movie-info">
             <div class="info-section"><label>Date de sortie</label><span><?php echo $movie['last_episode_to_air']['air_date']; ?></span></div>
             <div class="info-section"><label>nb. votes</label><span><?php echo $movie['last_episode_to_air']['vote_count']; ?></span></div>
             <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?php echo $movie['last_episode_to_air']['vote_average']; ?></span></div>
          </div> 
        </div> 
      </div>
      <img class="col-lg-4 p-2" src="https://image.tmdb.org/t/p/w300<?php echo $movie['last_episode_to_air']['still_path']; ?>">
    </div>     
  </div>
</div>
<h2 class="display-5 mt-3 mb-3 text-center text-white">Toutes les saisons de <?php echo $movie['name']; ?>:</h2>
<div id="seasonContent" class="p-3 container-fluid d-flex flex-row flex-wrap justify-content-center">
<?php
	foreach ($movie['seasons'] as $seasons) 
	{
		if($seasons['name'] != 'Specials')
			{	
?>
			<div id="seasonCard" class="p-2 card col-lg-3">
				<a href="season-<?php echo $movie['id']; ?>-<?php echo $seasons['season_number']; ?>.html">
					<h3 class="lead text-center"><?php echo $seasons['name']; ?></h3>
				</a>
				<?php 
				if($seasons['poster_path'] != null) 
				{
				?>
					<img src="https://image.tmdb.org/t/p/w300<?php echo $seasons['poster_path']; ?>">
				<?php
				} else
				{
				?>
					<img src="img/season-404.png">
				<?php	
				}
				?>
				<span class="mt-1">Date de sortie: <?php echo $seasons['air_date']; ?></span>
				<p>Nombre d'épisodes: <?php echo $seasons['episode_count']; ?></p>
			</div>
<?php	
			}	
	}
?>
</div>
<?php
if($similar['results'] != Null)
{
?>
<div class="cardContainer container-fluid">
    <h2 class="display-5 text-light mt-3 mb-3 text-center">Les séries similaires à <?php echo $movie['name']; ?>:</h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div  id="movieCards" class="carousel-inner row w-100 mx-auto">
      <?php
      foreach ($similar['results'] as $show)
      {
      ?>
        <div class="carousel-item col-md-4">
           <div id="<?php echo $show['id']; ?>" class="movie-card">
              <div class="movie-header" style="background: url('https://image.tmdb.org/t/p/w500<?php echo $show['backdrop_path']; ?>');">
                 <div class="header-icon-container">
                    <a href="#"><i class="material-icons header-icon"></i></a>
                 </div>
              </div>
              <div class="movie-content">
                 <div class="movie-content-header">
                    <a href="movie-<?php echo $show['id']; ?>.html">
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
<?php
}
?>

<div class="container">
	<div class="row mt-3">
		<h2 class="display-5 text-light text-white">Commentaires:</h2>
	</div>
</div>
<div class="container">
    <div class="row">
    <?php if ($user->isAuthenticated())
    {
    ?>
        <a class="mx-auto" href="commenter-<?php echo $movie['id'] ?>.html"><button class="btn btn-info">Ajouter un commentaire</button></a>
    <?php
    } 
    else
    {
    ?>
      <a class="btn btn-outline-success text-white" href="connexion.php">Connectez-vous pour poster un commentaire</a>
    <?php  
    }  
    ?>
  </div>
</div>
<?php 
if (empty($comments))
{
?>
<br>
<div class="container mt-2">
	<div class="row">
		<p class="text-white mx-auto">Aucun commentaire n'a encore été posté pour cet article</p>	
	</div>
</div>
<?php
}
else 
{
?>

<!-- Grid row -->
<div id="comment-container" class="mt-3 mb-3 d-flex justify-content-center">

  <!-- Grid column -->
  <div class="col-lg-12 col-xl-8">
<?php  
  foreach ($comments as $comment)
  {
  ?>
      <div class="media d-block d-md-flex">
        <?php
        if ($comment['avatar'] == Null) 
        {
        ?>
        <img class="d-flex rounded-circle comment-avatar z-depth-1-half mb-3 mx-auto" src="img/upload/avatar-404.jpg" alt="Avatar">
        <?php
        } else 
        {
        ?>
        <img class="d-flex rounded-circle comment-avatar z-depth-1-half mb-3 mx-auto" src="img/upload/<?php echo $comment["avatar"]; ?>" alt="Avatar">
        <?php 
        }
        ?>
        <div class="media-body text-center text-md-left ml-md-3 ml-0">
          <h5 class="mt-0 font-weight-bold blue-text"><span class="small">Posté par <strong><?php echo htmlspecialchars($comment['auteur']) ?></strong> le <?php echo $comment['date']->format('d/m/Y à H\hi') ?>
                <div class="btn-group float-right"> 
                  <button class="btn btn-info">Action(s)</button>
                  <button class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <?php if ($user->isAuthenticated() && ($_SESSION['pseudo'] == $comment['auteur'])) { ?> 
                    <li class="nav-item"><a class="nav-link" href="admin/comment-update-<?php echo $comment['id'] ?>.html"><i class="fas fa-edit"> Modifier</i></a></li>
                    <li class="nav-item"><a class="nav-link" href="admin/comment-delete-<?php echo $comment['id'] ?>.html"><i class="fas fa-trash"> Supprimer</i></a></li>
                    <?php if ($comment['answer'] != null) { ?>
                        <li class="nav-item"><a class="nav-link" href="admin/Answer-delete-<?php echo $comment['id'] ?>.html"><i class="fas fa-eraser"> Supp. la réponse</i></a></li>
                      <?php
                      } else 
                      { ?>
                        <li class="nav-item"><a class="nav-link" href="admin/comment-answer-<?php echo $comment['id'] ?>.html"><i class="fas fa-feather-alt"> Répondre</i></a></li>
                    <?php
                    } } else { ?>
                        <li class="nav-item"><a class="nav-link" data-toggle="tooltip" title="signaler le commentaire" href="/comment-report-<?php echo $comment['id'] ?>.html"><i class="fas fa-flag"> Signaler</i></a></li>
                    <?php 
                    } ?>
                  </ul>
                </div> 
                <hr>
                 <div class="container-fluid">
                     <?php
                     if ($comment['report'] == 2) 
                      { 
                        echo '<p id="comment-'.$comment['id'].'">'.nl2br($comment['contenu']).'<div style="text-align:right;"><small> Édité par J.Forteroche</small><hr></div></p>'; ?>
                        
                    <?php 
                    } else 
                    {
                      echo '<p class="lead text-black" id="comment-'.$comment['id'].'">'.nl2br($comment['contenu']).'</P>';
                    }
                    if ($comment['answer'] != null) 
                    {
                        echo '<br><div><i class="fas fa-comment-dots"></i> Réponse de l\'admin:</div><div class="card bg-danger text-white"><div class="card-body">'.nl2br($comment['answer']).'</div></div>';
                      }      
                   ?>     
                 </div>    
                 <br>
        </div>
      </div>
  <?php
  }
}
?>
  </div>
  <!-- Grid column -->
</div>
<!-- Grid row -->

<!-- Reviews --> 

<!-- Grid row -->
<div class="mt-3 mb-3 d-flex justify-content-center">
  <!-- Grid column -->
  <div class="col-lg-12">
    <?php  
    if(!empty($reviews['results']))
    {
    ?>
    <div class="container">
      <div class="row mt-3">
        <h2 class="display-5 text-light text-white">Avis des internautes:</h2>
      </div>
    </div>
    <?php
     foreach ($reviews['results'] as $review)
      {
      ?>
       <div class="m-3 p-3 card">
         <h4><?php echo $review['author']; ?></h4>
         <p><?php echo $review['content']; ?></p>
       </div>
      <?php
      } 
    }
    ?>
  </div>
  <!-- Grid column -->
</div>
<!-- Grid row -->