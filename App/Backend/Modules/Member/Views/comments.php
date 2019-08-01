<div class="emp-profile col-lg-10">
	<div class="container media border mx-auto p-3 mb-3">
	  <div class="media-body">
	  	<h4>Faire une recherche</h4>
	  	<p>Filtrer les résultats en fonction du contenu du commentaire que vous voulez retrouver:</p>  
	  	<input class="form-control" id="search" type="text" placeholder="Chercher...">
	  </div>
	</div>

	<section class="col-lg-12 col-xs-10 table-responsive">
		<div class="row">
			<p class="mx-auto">Liste de tous les commentaires:</p>
		</div>

		<div class="row">
			<table class="table table-sm table-borderless table-condensed">
				
			  <thead class="thead-dark">
			  <tr><th>Contenu</th><th>Date</th><th>Action</th></tr></thead>
				<?php
				foreach ($comments as $comment)
				{
				  echo '<tr><td><a class="nav-link" href="movie-' . $comment['movie'] . '.html#comment-' . $comment['id'] . '">' . $comment['contenu'] . '</a></td><td>' . $comment['date']->format('d/m/Y'). '</td><td><a href="comment-update-' . $comment['id'] . '.html"><i class="fas fa-edit"></i></a> <a href="comment-delete-' . $comment['id'] . '.html"><i class="fas fa-trash"></i></a></td></tr>', "\n";
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
		          echo ' <a href="/member/comments/page='.$i.'.html">'.$i.'</a> ';
		     }
		}
		echo ' ]</p></div>' ?>
	</section>
</div>