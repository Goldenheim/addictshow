<div class="container media border mx-auto p-3">
  <div class="media-body">
  	<h4>Faire une recherche</h4>
  	<p>Filtrer les résultats en fonction de l'auteur ou encore de l'article concerné que vous voulez retrouver:</p>  
  	<input class="form-control" id="search" type="text" placeholder="Chercher...">
  </div>
</div>

<?php
foreach ($listeAnswers as $answer)
{
 	if ($answer['answer'] != null) 
 	{
		echo '<br><div class="card bg-light text-danger mx-5"><div class="card-body"><div class="float-right"><a href="/news-'. $answer['news'],'.html#comment-'. $answer['id'].'"><i class="fas fa-eye"></i></a> <a href="Answer-delete-' . $answer['id'] . '.html"><i class="fas fa-trash-alt"></i></a></div>'.nl2br($answer['answer']).'</div><div class="card bg-dark text-white m-3"><div class="card-header"><blockquote>En réponse à un commentaire de ' . $answer['auteur'] . ':  </blockquote></div><div class="card-body">'.$answer['contenu'].'</div></div></div>';
	}
}	     
?>   	