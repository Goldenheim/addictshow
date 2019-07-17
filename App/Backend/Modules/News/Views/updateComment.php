<div class="container-fluid">
	<h2>Modifier un commentaire</h2>
</div>
<form action="" method="post">
  <p>
    <?= $form ?>
    
    <div class="row">
		<p class="mx-auto">
			<input class="btn btn-primary" type="submit" value="Modifier" />
			<input class="btn btn-primary" type="button" onclick="window.location.replace('/admin/')" value="Annuler" />
		</p>
	</div>
  </p>
</form>