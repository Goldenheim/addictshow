<div class="container media border mx-auto p-3">
  <div class="media-body">
  	<h4>Faire une recherche</h4>
  	<p>Filtrer les résultats en fonction de l'auteur ou encore de l'article concerné que vous voulez retrouver:</p>  
  	<input class="form-control" id="search" type="text" placeholder="Chercher...">
  </div>
</div>

<section class="col-lg-12 col-xs-10 table-responsive mx-auto">
	<div class="container">
		<?php
		if ($listeReport != Null) {	
		?> 
			<div class="row">
				<p class="mx-auto"><?= $nombreReport ?> commentaire(s) ont été signalé(s) :</p>
			</div>
			<div class="row">
				<table class="table table-sm table-hover table-borderless table-condensed">
				  <thead class="thead-light">
				  <tr><th>Auteur</th><th>Contenu</th><th>Article(s)</th><th>Action</th></tr>
				</thead>

				<?php
				foreach ($listeReport as $report)
				{
				  echo '<tr><td>' . $report['auteur'] . '</td><td><a href="/news-'. $report['news'] . '.html#comment-' . $report['id'] .'">' . $report['contenu'] . '</a></td><td><a href="/news-'. $report['news'] . '.html">'. $report['titre']. '</a></td><td><a href="comment-update-' . $report['id'] . '.html"><i class="fas fa-edit"></i></a> <a href="comment-delete-' . $report['id'] . '.html"><i class="fas fa-trash"></i></a></td></tr>'. "\n";
				}
				?>
				</table>
			</div>
		<?php
		}
		?>
	</div>
</section>