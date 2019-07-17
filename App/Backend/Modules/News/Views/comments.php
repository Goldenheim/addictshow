<div class="container media border mx-auto p-3">
  <div class="media-body">
  	<h4>Faire une recherche</h4>
  	<p>Filtrer les résultats en fonction de l'auteur ou encore du contenu du commentaire que vous voulez retrouver:</p>  
  	<input class="form-control" id="search" type="text" placeholder="Chercher...">
  </div>
</div>

<section class="col-lg-12 col-xs-10 table-responsive">
	<div class="row">
		<p class="mx-auto">Liste de tous les commentaires:</p>
	</div>

	<div class="row">
		<table class="table table-sm table-hover table-borderless table-condensed">
			
		  <thead class="thead-dark">
		  <tr><th>Auteur</th><th colspan="2">Contenu</th><th>Date</th><th>Article(s)</th><th>Action</th></tr></thead>
			<?php
			foreach ($comments as $comment)
			{
			  echo '<tr><td>' . $comment['auteur'] . '</td><td colspan="2"><a href="/news-' . $comment['news'],'.html#comment-' . $comment['id'],'">' . $comment['contenu'] . '</a></td><td>' . $comment['date'] . '</td><td><a href="/news-' . $comment['news'],'.html">' . $comment['titre'] . '</a></td><td><a href="comment-update-' . $comment['id'] . '.html"><i class="fas fa-edit"></i></a> <a href="comment-delete-' . $comment['id'] . '.html"><i class="fas fa-trash"></i></a></td></tr>', "\n";
			}
			?>
		</table>
	</div>
</section>