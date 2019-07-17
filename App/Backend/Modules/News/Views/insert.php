<div class="container-fluid">
	<h2>Ajouter un Article</h2>
</div>
<form class="form" action="" method="post">
    <?= $form ?>
	<div class="row">
		<p class="mx-auto">
			<input class="btn btn-primary" type="submit" value="Ajouter" />
			<input class="btn btn-primary" type="button" onclick="window.location.replace('/admin/')" value="Annuler" />
		</p>
	</div>
</form>