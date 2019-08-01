<div id="seasonContent">
	<div class="blue">
		<div class="container-fluid p-4">
		  <div class="row">
		    <h2 class="display-5 mx-auto text-white">Édition du profil</h2>
		  </div>
		  <hr>
		</div>
		<form method="POST" action="" enctype="multipart/form-data" role="form" class="col-lg-3 mx-auto">
			<div class="form-group">
        <label class="display-5" for="fav_genre">Votre genre de série favori:</label><br>
        <select class="custom-select form-control" id="fav_genre" name="fav_genre">
          <?php foreach ($search['genres'] as $genre) 
            {
            ?>
            <option value="<?php echo $genre['id']; ?>"><?php echo $genre['name']; ?></option>
            <?php
            }
            ?>
        </select>  
      </div>
      <?php echo $form; ?> 
			<div id="editForm" class="text-center mb-5">    
		        <input type="submit" id="editProfil" name="editProfil" value="Envoyer" class="btn btn-primary">
		        <input class="btn btn-primary" type="button" onclick="window.location.replace('profil.php')" value="Annuler">
			</div>
		</form>
		<br>
	</div>
</div>