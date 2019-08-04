<?php
namespace App\Frontend\Modules\Show;
 
use \AddictFram\BackController;
use \AddictFram\HTTPRequest;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \AddictFram\FormHandler;
 
class ShowController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    if (isset($_COOKIE['login']) && $_COOKIE['login'] != Null) {
      $manager = $this->managers->getManagerOf('Member'); 
      $member = $manager->get('id', $_COOKIE['login']);
      $this->app->user()->setAttribute('id',$member['id']);
      $this->app->user()->setAttribute('pseudo',$member['pseudo']);
      $this->app->user()->setAttribute('mail',$member['mail']);
      $this->app->user()->setAttribute('genre',$member['genre']);
      $this->app->user()->setAttribute('avatar',$member['avatar']);
      $this->app->user()->setAttribute('name',$member['name']);
      $this->app->user()->setAttribute('profession',$member['profession']);
      $this->app->user()->setAttribute('phone',$member['phone']);
      $this->app->user()->setAuthenticated(true);
    }

    $api = $this->app->config()->get('apiKey');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
    $year = date("Y");
    $month = date("n");
 
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Page d\'accueil: AddictShow');
 
    $json = file_get_contents("https://api.themoviedb.org/3/discover/tv?api_key=$api&language=fr-FR&sort_by=popularity.desc&air_date.gte=2019&page=1&timezone=France%2FPARIS&include_null_first_air_dates=false");
    $parsee = json_decode($json, true);
    $jsonNew = file_get_contents("https://api.themoviedb.org/3/discover/tv?api_key=$api&language=fr-FR&sort_by=first_air_date.desc&first_air_date.gte=$year-$month-01&first_air_date.lte=$year-$month-31&page=1&timezone=France%2FPARIS&with_networks=213&include_null_first_air_dates=false");
    $parseeNew = json_decode($jsonNew, true);
    $jsonCharacter = file_get_contents("https://api.themoviedb.org/3/person/popular?api_key=$api&language=fr-FR&page=1");
    $parseeCharacter = json_decode($jsonCharacter, true);
    $jsonSearch = file_get_contents("https://api.themoviedb.org/3/genre/tv/list?api_key=$api&language=fr-FR");
    $parseeSearch = json_decode($jsonSearch, true);

    $lastCom = $this->managers->getManagerOf('Comments')->getList(0, 5);

    foreach ($lastCom as $com)
    {
      if (strlen($com->contenu()) > $nombreCaracteres)
      {
        $debut = substr($com->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . ' [...]';
 
        $com->setContenu($debut);
      }
    }

    // On ajoute la variable $listeNews à la vue.
    $this->page->addVar('listShow', $parsee);
    $this->page->addVar('new', $parseeNew);
    $this->page->addVar('lastCom', $lastCom);
    $this->page->addVar('character', $parseeCharacter);
    $this->page->addVar('search', $parseeSearch);
  }
 
  public function executeSearch(HTTPRequest $request)
  {
    if (isset($_POST["search"]) && $_POST["search"] != null) 
    { 
      $title = $_POST["search"];
      $search = $_POST["search"]; 
      $searchEncode = urlencode($_POST["search"]);

      $json = file_get_contents("https://api.themoviedb.org/3/search/tv?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR&query=$searchEncode");
      $parsee = json_decode($json, true); 
    }
    else
    {
      $this->app->httpResponse()->redirect404();
    }
 
    $this->page->addVar('search', $parsee);
    $this->page->addVar('title', $title);
  }

  public function executeGenre(HTTPRequest $request)
  {
    if (isset($_POST["search"]) && $_POST["search"] != null) 
    { 
      $id = $_POST["search"];

      $json = file_get_contents("https://api.themoviedb.org/3/discover/tv?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR&sort_by=popularity.desc&page=1&timezone=France%2FPARIS&with_genres=$id&include_null_first_air_dates=false");
      $parsee = json_decode($json, true); 
    }
    else
    {
      $this->app->httpResponse()->redirect404();
    }
 
    $this->page->addVar('title', 'Recherche par genre');
    $this->page->addVar('search', $parsee);
  }

  public function executeMovie(HTTPRequest $request)
  {
    $id = $request->getData('id');
    $manager = $this->managers->getManagerOf('Member');
    if ($this->app->user()->isAuthenticated())
    {
      $memberId = $_SESSION['id'];
      $favourites = $manager->getFav($memberId);
      $fav = array();

      foreach ($favourites as $favourite) {
        $showId = $favourite['show_id'];
        $json = file_get_contents("https://api.themoviedb.org/3/tv/$showId?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
        $parsee = json_decode($json, true);
        if ($parsee['id'] == $request->getData('id')) {
          array_push($fav, $parsee);
        }
      }
      $this->page->addVar('favourites', $fav);
    }

    if(isset($_GET['id']))
    {
      $searchEncode = urlencode($_GET['id']);

      $json = file_get_contents("https://api.themoviedb.org/3/tv/$searchEncode?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
      $parsee = json_decode($json, true);
      $this->page->addVar('movie', $parsee);
      $jsonSimilar = file_get_contents("https://api.themoviedb.org/3/tv/$searchEncode/similar?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR&page=1");
      $parseeSimilar = json_decode($jsonSimilar, true);
      $this->page->addVar('similar', $parseeSimilar);
      $jsonReviews = file_get_contents("https://api.themoviedb.org/3/tv/$searchEncode/reviews?api_key=22b5d3d2b10babbb4291177132454423&language=en-US&page=1");
      $parseeReviews = json_decode($jsonReviews, true);
      $this->page->addVar('reviews', $parseeReviews);
    } else {
      $this->app->httpResponse()->redirect404();
    }

    $title = $parsee['name'];
    if (isset($_POST['rating']))
    {
      $id = $request->getData('id');
      $member = $_SESSION['id'];
      $currentRate = $manager->getRate($id);
      if (empty($currentRate))
      {
        $rate = $_POST['rating'];
        $manager->addRate($member, $id, $rate);
        $this->app->user()->setFlash('Votre note à bien été enregistrée');
      }
      else
      {
        $this->app->user()->setFlash('Vous avez déjà donné une note à cette série');
      }  
    }

    $currentRate = $manager->getRate($id);
    if (!empty($currentRate))
    {
      $this->page->addVar('currentRate', $currentRate['rate']);
    }
 
    $this->page->addVar('title', $title);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf(urlencode($_GET['id'])));
  }

  public function executeSeason(HTTPRequest $request)
  {
    if(isset($_GET['id']) && isset($_GET['number']))
    {
      $idSeason = $_GET['id'];
      $numberSeason = $_GET['number'];

      $json = file_get_contents("https://api.themoviedb.org/3/tv/$idSeason/season/$numberSeason?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
      $parsee = json_decode($json, true);
      $jsonTitle = file_get_contents("https://api.themoviedb.org/3/tv/$idSeason?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
      $parseeTitle = json_decode($jsonTitle, true);
    }
    else
    {
      $this->app->httpResponse()->redirect404();
    }

    $this->page->addVar('showTitle', $parseeTitle['name']);
    $this->page->addVar('seasonId', $idSeason);
    $this->page->addVar('season', $parsee);
  }

  public function executeEpisode(HTTPRequest $request)
  {
    if(!empty($_GET['id']) && !empty($_GET['season']) && !empty($_GET['episode']))
    {
      $idSeason = $_GET['id'];
      $numberSeason = $_GET['season'];
      $numberEpisode = $_GET['episode'];

      $json = file_get_contents("https://api.themoviedb.org/3/tv/$idSeason/season/$numberSeason/episode/$numberEpisode?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
      $parsee = json_decode($json, true);
      $name = file_get_contents("https://api.themoviedb.org/3/tv/$idSeason?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
      $parseeName = json_decode($name, true);
      $jsonCast = file_get_contents("https://api.themoviedb.org/3/tv/$idSeason/season/$numberSeason/episode/$numberEpisode/credits?api_key=22b5d3d2b10babbb4291177132454423");
      $cast = json_decode($jsonCast, true);
      $jsonVideo = file_get_contents("https://api.themoviedb.org/3/tv/$idSeason/season/$numberSeason/episode/$numberEpisode/videos?api_key=22b5d3d2b10babbb4291177132454423&language=en-US");
      $parseeVideo = json_decode($jsonVideo, true);
      $jsonImg = file_get_contents("https://api.themoviedb.org/3/tv/$idSeason/season/$numberSeason/episode/$numberEpisode/images?api_key=22b5d3d2b10babbb4291177132454423");
      $parseeImg = json_decode($jsonImg, true);
    }
    else
    {
      $this->app->httpResponse()->redirect404();
    }

    $this->page->addVar('showTitle', $parseeName['name']);
    $this->page->addVar('video', $parseeVideo);
    $this->page->addVar('episode', $parsee);
    $this->page->addVar('cast', $cast);
    $this->page->addVar('image', $parseeImg);
    $this->page->addVar('title','Épisode ' . $parsee['episode_number'] . ' de la saison ' . $parsee['season_number'] . ' de ' . $parseeName['name']);
  }
 
  public function executeInsertComment(HTTPRequest $request)
  {
    $id = $request->getData('movie');
    $manager = $this->managers->getManagerOf('Member');
    $member = $manager->get('id', $request->postData('id'));
    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'movie' => $request->getData('movie'),
        'auteur' => $member['pseudo'],
        'member_id' => $_SESSION['id'],
        'contenu' => $request->postData('contenu'),
      ]);
    }
    else
    {
      $comment = new Comment;
    }
 
    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);
 
    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
 
      $this->app->httpResponse()->redirect('movie-'.$request->getData('movie').'.html');
    }
    
    $this->page->addVar('id', $id);
    $this->page->addVar('comment', $comment);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un commentaire');
  }

  public function executeReportComment(HTTPRequest $request) {
    $manager = $this->managers->getManagerOf('Comments');
    $comment = $manager->get($request->getData('id'));

    if ($comment['report'] == 1) {
      $this->app->user()->setFlash('Le commentaire a déjà été signalé');
    } else if ($comment['report'] == 2) 
    {
      $this->app->user()->setFlash('Ce commentaire a déjà été édité par l\'administrateur');
    } 
    else 
    {
      $manager->report($comment['id']);
      $this->app->user()->setFlash('Le commentaire a bien été signalé');
    }    

    $this->app->httpResponse()->redirect('movie-'. $comment['movie'] .'.html');
  }
}