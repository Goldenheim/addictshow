<?php if (!empty($favourites)) {
  ?>
  <div class="container media text-white mx-auto p-3 mb-3">
    <div class="media-body col-lg-10">
      <h4>Faire une recherche</h4>
      <p>Filtrer les résultats en fonction du favori que vous voulez retrouver:</p>  
      <input class="form-control" id="search" type="text" placeholder="Chercher...">
    </div>
  </div>
  <section class="mb-3 mt-3 d-flex flex-wrap justify-content-center">
  <?php foreach ($favourites as $favourite)
  {
  ?>
    <div class="card m-1 col-lg-5">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 card-title d-flex flex-column justify-content-between align-items-start">
            <a class="p-0 nav-link" href="/movie-<?php echo $favourite['id']; ?>.html"><h4><?php echo $favourite['name']; ?></h4></a>
            <a href="/favourite-delete-<?php echo $favourite['id']; ?>.html" class="btn btn-danger">Supprimer des favoris</a>
            <div class="card-text  align-self-stretch">
              <div class="movie-info">
                 <div class="info-section"><label>Date de sortie</label><span><?php echo $favourite['first_air_date']; ?></span></div>
                 <div class="info-section"><label>nb. votes</label><span><?php echo $favourite['vote_count']; ?></span></div>
                 <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?php echo $favourite['vote_average']; ?></span></div>
              </div> 
            </div> 
          </div>
          <img class="col-lg-4 p-0" src="https://image.tmdb.org/t/p/w300<?php echo $favourite['poster_path']; ?>">
        </div>     
      </div>
    </div>
  <?php
  }
  ?>
  </section>
<?php  
} else 
{
?>
  <p class="mb-3 mt-3 text-center text-light">Vous n'avez pas encore de favoris dans votre liste</p>
<?php
}
?>