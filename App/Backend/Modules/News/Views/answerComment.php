<h2>Répondre à un commentaire</h2>
<hr><br>
<section class="jumbotron text-center">
	<div class="container">
		<p class="jumbotron-heading">En réponse au commentaire de <?= $comment['auteur'] ?>, posté le <?= $comment['date'] ?>:</p>
		<blockquote>" <?= $comment['contenu']?> "</blockquote>
	</div>
</section>
<hr><br>
<form class="form" action="" method="post">
  
  	<textarea name="answer"></textarea>
    <br>
    <div class="container">
    	<div class="row">
    		<p class="mx-auto">
    			<input class="btn btn-primary" type="submit" value="Répondre" />
    			<input class="btn btn-primary" type="button" onclick="window.location.replace('/admin/')" value="Annuler" />
    		</p>
    	</div>
    </div>
  </p>
</form>