<div class="container media border mx-auto p-3">
  <div class="media-body">
  	<h4>Faire une recherche</h4>
  	<p>Filtrer les résultats en fonction du titre du chapitre ou encore de la date de publication que vous voulez retrouver:</p>  
  	<input class="form-control" id="search" type="text" placeholder="Chercher...">
  </div>
</div>

<section class="col-lg-12 col-xs-10 table-responsive mx-auto">
	<div class="row">
		<p class="mx-auto">Il y a actuellement <?= $nombreNews ?> articles publiés sur le site:</p>
	</div>

	<div class="row">
		<table class="table table-striped table-condensed">
			<thead class="thead-dark">
				<tr><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
			</thead>
		<?php
		foreach ($listeNews as $news)
		{
		  echo '<tr><td>'. $news['auteur']. '</td><td><a href="news-update-'. $news['id']. '.html">'. $news['titre']. '</a></td><td>le '. $news['dateAjout']->format('d/m/Y à H\hi'). '</td><td>'. ($news['dateAjout'] == $news['dateModif'] ? '-' : 'le '.$news['dateModif']->format('d/m/Y à H\hi')). '</td><td><a href="news-update-'. $news['id']. '.html"><i class="fas fa-edit"></i></a> <a href="/news-', $news['id'],'.html"><i class="fas fa-eye"></i></a> <a href="news-delete-'. $news['id']. '.html"><i class="fas fa-trash"></i></a></td></tr>'. "\n";
		}
		?>
		</table>
	</div>
</section>