<div class="container">
	<?php
	if ($listeReport != Null) 
	{
	?>
		<div class="toast mx-auto" data-autohide="false">
		  <div class="toast-header">
		    <strong class="mr-auto text-primary">Notification(s)</strong>
		    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
		  </div>
		  <div class="toast-body">
		    <a href="report.html">Il y a <?php echo $nombreReport ?> commentaires signalés</a>
		  </div>
		</div>
	<?php
	}
	?>
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
		<?php
		echo '<div class="row"><p class="mx-auto">Page(s) : [ '; //Pour l'affichage, on centre la liste des pages
		for($i=1; $i<=$Pages; $i++) //On fait notre boucle
		{
		     //On va faire notre condition
		     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
		     {
		         echo $i; 
		     }	
		     else //Sinon...
		     {
		          echo ' <a href="/admin/page='.$i.'.html">'.$i.'</a> ';
		     }
		}
		echo ' ]</p></div>' ?>
		</section>
		<section class="container">
			<div class="row">
				<section class="col-lg-6 col-xs-10 table-responsive">
					<div class="row">
						<p class="mx-auto">Liste des 5 derniers commentaires:</p>
					</div>

					<div class="row">
						<table class="table table-sm table-striped table-condensed">
							
						  <thead class="thead-dark">
						  <tr><th>Auteur</th><th colspan="2">Contenu</th><th>Date</th><th>Article(s)</th><th>Action</th></tr></thead>

						<?php
						foreach ($lastCom as $com)
						{
						  echo '<tr><td>', $com['auteur'], '</td><td colspan="2"><a href="/news-', $com['news'],'.html#comment-', $com['id'],'">', $com['contenu'] , '</a></td><td>', $com['date'], '</td><td><a href="/news-', $com['news'],'.html">', $com['titre'], '</a></td><td><a href="comment-update-', $com['id'],'.html"><i class="fas fa-edit"></i></a> <a href="comment-delete-', $com['id'], '.html"><i class="fas fa-trash"></i></a></td></tr>', "\n";
						}
						?>

						</table>
					</div>	
				</section>
				<section class="offset-lg-1 col-lg-5 col-xs-10 table-responsive">
					<div class="row">
						<div class="container">
						  <h2 class="text-center">Options</h2>
						  <p>Retrouvez toutes les <strong>options</strong> concernant les articles et les commentaires publiés sur le blog</p>
						  <div id="accordion">
						    <div class="card">
						      <div class="card-header">
						        <a class="card-link" data-toggle="collapse" href="#collapseOne">
						          Articles
						        </a>
						      </div>
						      <div id="collapseOne" class="collapse" data-parent="#accordion">
						        <div class="card-body">
						          <nav class="navbar">

						            <!-- Links -->
						            <ul class="navbar-nav">
						              <li class="nav-item">
						                <a class="nav-link" href="articles.html">Tous les articles</a>
						              </li>
						              <li class="nav-item">
						                <a class="nav-link" href="/admin/news-insert.html">Ajouter un article</a>
						              </li>
						            </ul>

						          </nav>
						        </div>
						      </div>
						    </div>
						    <div class="card">
						      <div class="card-header">
						        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
						        Commentaires
						      </a>
						      </div>
						      <div id="collapseTwo" class="collapse" data-parent="#accordion">
						        <div class="card-body">
						          <nav class="navbar">

  						            <!-- Links -->
  						            <ul class="navbar-nav">
  						              <li class="nav-item">
  						                <a class="nav-link" href="comments.html">Tous les commentaires</a>
  						              </li>
  						              <li class="nav-item">
  						                <a class="nav-link" href="report.html">Commentaire(s) signalé(s)</a>
  						              </li>
  						            </ul>

  						          </nav>
						        </div>
						      </div>
						    </div>
						    <div class="card">
						      <div class="card-header">
						        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
						          Réponses
						        </a>
						      </div>
						      <div id="collapseThree" class="collapse" data-parent="#accordion">
						        <div class="card-body">
						          <nav class="navbar">

						            <!-- Links -->
						            <ul class="navbar-nav">
						              <li class="nav-item">
						                <a class="nav-link" href="answers.html">Toutes les réponses</a>
						              </li>
						            </ul>

						          </nav>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>	
					</div>
					<?php
					if ($listeReport != Null) {	
					?> 
						<div class="row">
							<p class="mx-auto"><?= $nombreReport ?> commentaire(s) ont été signalé(s) :</p>
						</div>
						<div class="row">
							<table class="table table-sm table-danger table-hover table-borderless table-condensed">
							  <thead class="thead-dark">
							  <tr><th>Auteur</th><th>Contenu</th><th>Article(s)</th><th>Action</th></tr>
							</thead>

							<?php
							foreach ($listeReport as $report)
							{
							  echo '<tr><td>'. $report['auteur']. '</td><td><a href="/news-'. $report['news'],'.html#comment-'. $report['id'].'">'. $report['contenu']. '</a></td><td><a href="/news-'. $report['news'],'.html">'. $report['titre']. '</a></td><td><a href="comment-update-'. $report['id'].'.html"><i class="fas fa-edit"></i></a> <a href="comment-delete-'. $report['id']. '.html"><i class="fas fa-trash"></i></a></td></tr>'. "\n";
							}
							?>

							</table>
						</div>
					<?php
					}
					?>
				</section>	
			</div>
		</section>
	</div>	
