<div class="cardContainer h-auto mb-5">
    <div id="smoothAnchor" class="mt-5"></div>
    <h3 class="lead text-center mb-3 text-white"><hr>Parce que vous aimez le genre <?php echo $genre ?><hr></h3>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div  id="movieCards" class="carousel-inner row w-100 mx-auto">
      <?php
      foreach (array_slice($search['results'], 0, 20) as $show)
      {
      ?>
        <div class="carousel-item col-md-4">
           <div id="<?php echo $show['id']; ?>" class="movie-card">
              <div class="movie-header" style="background: url('https://image.tmdb.org/t/p/w500<?php echo $show['backdrop_path']; ?>');">
              </div>
              <div class="movie-content">
                 <div class="movie-content-header">
                    <a class="p-0 nav-link" href="movie-<?php echo $show['id']; ?>.html">
                       <h3 class="movie-title"><?php echo $show['name']; ?></h3>
                    </a>
                    <div class="imax-logo"></div>
                 </div>
                 <div class="movie-info">
                    <div class="info-section"><label>Date de sortie</label><span><?php echo $show['first_air_date']; ?></span></div>
                    <div class="info-section"><label>nb. votes</label><span><?php echo $show['vote_count']; ?></span></div>
                    <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?php echo $show['vote_average']; ?></span></div>
                 </div>
              </div>
           </div>
        </div>
      <?php
      }
      ?>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<?php if (!empty($similar)) {
  ?>
  <h3 class="lead text-center mb-3 text-white"><hr>Similaire à <?php echo $titleFav['name'] ?><hr></h3>
  <section class="pt-3 pb-3 mt-3 d-flex flex-wrap justify-content-center bg-success">
  <?php foreach (array_splice($similar['results'], 0,10) as $recommandation)
  {
  ?>
    <div class="card m-1 col-lg-5">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 card-title d-flex flex-column justify-content-between align-items-start">
            <a class="p-0 nav-link" href="/movie-<?php echo $recommandation['id']; ?>.html"><h4><?php echo $recommandation['name']; ?></h4></a>
            <div class="card-text  align-self-stretch">
              <div class="movie-info">
                 <div class="info-section"><label>Date de sortie</label><span><?php echo $recommandation['first_air_date']; ?></span></div>
                 <div class="info-section"><label>nb. votes</label><span><?php echo $recommandation['vote_count']; ?></span></div>
                 <div class="info-section"><label>Note</label><span><i class="fas fa-star"></i> <?php echo $recommandation['vote_average']; ?></span></div>
              </div> 
            </div> 
          </div>
          <img class="col-lg-4 p-0" src="https://image.tmdb.org/t/p/w300<?php echo $recommandation['poster_path']; ?>">
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