<?php
namespace App\Frontend\Modules\News;
 
use \JFBlog\BackController;
use \JFBlog\HTTPRequest;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \JFBlog\FormHandler;
 
class NewsController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    if (isset($_COOKIE['login']) && $_COOKIE['login'] != Null) {
      $manager = $this->managers->getManagerOf('Member'); 
      $member = $manager->get('pseudo', $_COOKIE['login']);
      $_SESSION['id']     = $member['id'];
      $_SESSION['pseudo'] = $member['pseudo'];
      $_SESSION['mail']  = $member['mail'];
      $_SESSION['avatar']  = $member['avatar'];
      $this->app->user()->setAuthenticated(true);
    }

    $api = $this->app->config()->get('apiKey');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
 
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Page d\'accueil: AddictShow');
 
    $json = file_get_contents("https://api.themoviedb.org/3/discover/tv?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR&sort_by=popularity.desc&air_date.gte=2019&page=1&timezone=France%2FPARIS&include_null_first_air_dates=false");
    $parsee = json_decode($json, true);

    // On ajoute la variable $listeNews à la vue.
    $this->page->addVar('listShow', $parsee);
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

  public function executeMovie(HTTPRequest $request)
  {
    $id = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));

    if(isset($_GET['id']))
    {
      $searchEncode = urlencode($_GET['id']);

      $json = file_get_contents("https://api.themoviedb.org/3/tv/$searchEncode?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
      $jsonSimilar = file_get_contents("https://api.themoviedb.org/3/tv/1399/similar?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR&page=1");
      $parsee = json_decode($json, true);
      $parseeSimilar = json_decode($jsonSimilar, true);
    } else {
      $this->app->httpResponse()->redirect404();
    }

    $title = $parsee['name'];
 
    $this->page->addVar('movie', $parsee);
    $this->page->addVar('similar', $parseeSimilar);
    $this->page->addVar('title', $title);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf(urlencode($_GET['id'])));
  }

   public function executeSeason(HTTPRequest $request)
  {
    $id = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
    $number = $this->managers->getManagerOf('News')->getUnique($request->getData('number'));

    if(isset($_GET['id']) && isset($_GET['number']))
    {
      $idSeason = $_GET['id'];
      $numberSeason = $_GET['number'];

      $json = file_get_contents("https://api.themoviedb.org/3/tv/$idSeason/season/$numberSeason?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
      $parsee = json_decode($json, true);
      $jsonVideo = file_get_contents("https://api.themoviedb.org/3/tv/$idSeason/season/$numberSeason/videos?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
      $parseeVideo = json_decode($json, true);
    }
    else
    {
      $this->app->httpResponse()->redirect404();
    }

    $this->page->addVar('season', $parsee);
    $this->page->addVar('video', $parseeVideo);
  }
 
  public function executeInsertComment(HTTPRequest $request)
  {
    $id = $request->getData('movie');
    $manager = $this->managers->getManagerOf('member');
    $member = $manager->get('id', $request->postData('id'));
    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'movie' => $request->getData('movie'),
        'auteur' => $member['pseudo'],
        'contenu' => $request->postData('contenu')
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