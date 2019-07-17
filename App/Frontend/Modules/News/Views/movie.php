<div class="thetop"></div>  
<div class="pos-f">
	<nav class="navbar navbar-dark">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <form class="inline-group" method="get" action="">
	    <a class="btn btn-primary my-2 my-sm-0" href="subscribe.php" >Inscription</a>
	    <a class="btn btn-primary my-2 my-sm-0" href="/admin/index.php" >Connexion</a>
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
     <div class="pt-5 pb-5 mt-0 d-flex" id="fullHeaderMovie" style="background-image: url('https://image.tmdb.org/t/p/w1280<?= $movie["poster_path"]; ?> ');">
     </div>
     <div  id="blur" class="container-fluid">
        <div class="row  justify-content-center align-items-start d-flex text-center">
          <div class="col-12 col-md-8  h-50">
              <a href="/" style="text-decoration: none;"><h1 class="display-3 text-light mb-2 mt-5"><strong><?php echo $movie['name']; ?></strong></h1></a>
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
        		<img src="https://image.tmdb.org/t/p/w500<?= $movie['poster_path']; ?>" class="col-lg-7 col-md-12 poster"/>
        		<div id="infosContent" class="col-lg-5 col-md-12"><br>
        			<div>
        				<div class="movie-info similar">
        				   <div class="info-section"><label>Date de sortie</label><span><?= $movie['first_air_date']; ?></span></div>
        				   <div class="info-section"><label>nb. votes</label><span><?= $movie['vote_count']; ?></span></div>
        				   <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?= $movie['vote_average']; ?></span></div>
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
	              	<?php foreach ($movie['networks'] as $network)
					{
						echo '<img class="network" src="https://image.tmdb.org/t/p/w500' . $network['logo_path'] . '">';
					}?>	
					<span id="profiles" class="card-primary">
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
<h2 class="display-5 mt-3 mb-3 text-center text-white">Toutes les saisons de <?php echo $movie['name']; ?>:</h2>
<div id="seasonContent" class="container-fluid d-flex flex-row flex-wrap justify-content-center">
<?php
	foreach ($movie['seasons'] as $seasons) 
	{
		if($seasons['name'] != 'Specials')
			{	
?>
			<div id="seasonCard" class="p-2 card col-lg-3">
				<a href="season-<?= $movie['id']; ?>-<?= $seasons['season_number']; ?>.html">
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
					<img src="img/img_404.png">
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
<div class="cardContainer container-fluid">
    <h2 class="display-5 text-light mt-3 mb-3 text-center">Les séries similaires à <?php echo $movie['name']; ?>:</h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div  id="movieCards" class="carousel-inner row w-100 mx-auto">
      <?php
      foreach ($similar['results'] as $show)
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
<div class="container">
	<div class="row">
		<h2 class="display-5 text-light text-white">Commentaires:</h2>
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
	foreach ($comments as $comment)
	{
	?>
	<div class="col-lg-11 mx-auto media comment border p-3 m-3">
		<div class="media-body">
				<fieldset>
				  <legend class="" style="margin: 0!important;">
				    <span class="offset-lg-6 col-lg-2 small text-white">Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?></span>
				    	<div class="btn-group float-right"> 
				    	  <button class="btn btn-info">Action(s)</button>
			  			  <button class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
				    	  <ul class="dropdown-menu">
				    	  	<?php if ($user->isAuthenticated()) { ?> 
				    	    <li class="nav-item"><a class="nav-link" href="admin/comment-update-<?= $comment['id'] ?>.html"><i class="fas fa-edit"> Modifier</i></a></li>
				    	    <li class="nav-item"><a class="nav-link" href="admin/comment-delete-<?= $comment['id'] ?>.html"><i class="fas fa-trash"> Supprimer</i></a></li>
				    	    <?php if ($comment['answer'] != null) { ?>
				    	    		<li class="nav-item"><a class="nav-link" href="admin/Answer-delete-<?= $comment['id'] ?>.html"><i class="fas fa-eraser"> Supp. la réponse</i></a></li>
				    	    	<?php
				    	    	} else 
				    	    	{ ?>
			    	    			<li class="nav-item"><a class="nav-link" href="admin/comment-answer-<?= $comment['id'] ?>.html"><i class="fas fa-feather-alt"> Répondre</i></a></li>
				    	    <?php
				    	    } } else { ?>
				    	    		<li class="nav-item"><a class="nav-link" data-toggle="tooltip" title="signaler le commentaire" href="/comment-report-<?= $comment['id'] ?>.html"><i class="fas fa-flag"> Signaler</i></a></li>
				    	    <?php 
				    			} ?>
				    	  </ul>
				    	</div> 
				  </legend>
				  <hr>
				   <div class="container-fluid">
			   		   <?php
			   		   if ($comment['report'] == 2) 
			   		   	{ 
			   	   			echo '<p id="comment-'.$comment['id'].'">'.nl2br($comment['contenu']).'<div style="text-align:right;"><small> Édité par J.Forteroche</small><hr></div></p>'; ?>
			   		   		
			   			<?php 
			   			} else 
			   			{
			   		   	echo '<p class="lead text-white text-light" id="comment-'.$comment['id'].'">'.nl2br($comment['contenu']).'</P>';
			   		 	}
			   		 	if ($comment['answer'] != null) 
			   		 	{
			   	    		echo '<br><div><i class="fas fa-comment-dots"></i> Réponse de l\'admin:</div><div class="card bg-danger text-white"><div class="card-body">'.nl2br($comment['answer']).'</div></div>';
			   	    	}	     
			   		 ?>   	
				   </div>	   
				   <br>
				</fieldset>
		</div>
	</div>
	<?php
	}
}
?>

<div class="container">
	<div class="row">
		<a class="mx-auto" href="commenter-<?= $movie['id'] ?>.html"><button class="btn btn-info">Ajouter un commentaire</button></a>
	</div>
</div>
</div>