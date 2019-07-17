<div class="thetop"></div>  
<div class="pos-f-t">
  <nav class="navbar navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="inline-group">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Inscription</button>
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Connexion</button>
    </form>
  </nav>
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <div class="jumbotron">
        <h1 class="display-4"><em>Jumbotron Component</em></h1>
        <p class="lead">There are links on this page on GitHub and Blogspot.</p>
        <hr class="my-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Press <strong>button</strong> below to show links in Modal window.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <p class="lead">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Show Modal Component with Links
          </button>
        </p>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal Component title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <a href="https://sergeiki.github.io/bs0/" class="badge badge-danger">Visit this Bootstrap 4 Examples page on GitHub</a>
                <a href="http://sergeiki.blogspot.com/2017/12/bootstrap-v4-layout-content-components-utilities-examples.html" class="badge badge-warning">Visit this Bootstrap 4 Examples blog on Blogspot</a>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 

var_dump($search);

foreach ($search['results'] as $show) {
	echo '<div class="media">' . $show["name"] . '</div>';
}