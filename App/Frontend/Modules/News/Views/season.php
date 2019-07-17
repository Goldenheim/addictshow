<div class="thetop"></div>  
<div class="pos-f">
	<nav class="navbar navbar-dark">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <form class="inline-group">
	    <button class="btn btn-primary my-2 my-sm-0" type="submit">Inscription</button>
	    <button class="btn btn-primary my-2 my-sm-0" type="submit">Connexion</button>
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
<header>
<div class="dark">
	<div class="pt-5 pb-5 mt-0 d-flex" id="fullHeaderSeason" style="background-image: url('https://image.tmdb.org/t/p/original<?= $season['poster_path']; ?>');">
	 </div>
	<div id="blur" class="container-fluid">
		<div class="mt-1 justify-content-center d-flex text-center">
		  <div class="col-12 col-md-8 h-50">
		      <h1 class="display-3 text-light mb-2 mt-5"><strong><?php echo $season['name']; ?></strong></h1>
		  </div>       
		</div>
		<div class="container movieContent">
			<div class="row col-12 col-md-12">
				<div class="row col-12 col-md-12">
		    		<img src="https://image.tmdb.org/t/p/original<?= $season['poster_path']; ?>" class="col-lg-2 col-md-12 poster"/>
					<div id="infosContent" class="col-lg-10 col-md-12">
						<div>
							<p class="text-white text-light resume">Résumé: <?php echo $season['overview']; ?></p>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
<h2 class="display-5 mt-3 mb-3 text-center text-white">Toutes les épisodes de la <?php echo $season['name']; ?>:</h2>
<div id="seasonContent" class="container-fluid d-flex flex-row flex-wrap justify-content-center">
	<?php
		foreach ($season['episodes'] as $episode) 
		{
	?>
			<div id="episodeCard" class="d-flex flex-row justify-content-center align-items-center col-lg-10 mb-2">
				<img src="https://image.tmdb.org/t/p/w300<?php echo $episode['still_path']; ?>">
				<div class="movie-infos mx-3 d-flex flex-column justify-content-between">
					<div class="d-flex flex-row justify-content-between">
						<h3 class="display-5 text-white"><?php echo $episode['name']; ?></h3>
						<p class="lead text-white">Épisode <?php echo $episode['episode_number']; ?></p>
					</div>
					<div>
						<p class="text-white"><?php echo $episode['overview']; ?></p>
						<p class="float-right text-white">Date de sortie: <?php echo $episode['air_date']; ?></p>
					</div>
					<div class="movie-infos d-flex justify-content-between">
						<div class="info-section text-white"><label class="text-white">nb. votes:</label><span class="lead"><?= $episode['vote_count']; ?></span></div>
						<div class="info-section text-white"><label class="text-white">Note:</label><span><i class="fas fa-star"></i> <?= $episode['vote_average']; ?></span></div>
					</div>
				</div>
			</div>
	<?php
		}
	?>	
</div>