<?php
namespace App\Backend\Modules\News;
 
use \JFBlog\BackController;
use \JFBlog\HTTPRequest;
use \Entity\News;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\NewsFormBuilder;
use \JFBlog\FormHandler;
 
class NewsController extends BackController
{
  public function executeDelete(HTTPRequest $request)
  {
    $newsId = $request->getData('id');
 
    $this->managers->getManagerOf('News')->delete($newsId);
    $this->managers->getManagerOf('Comments')->deleteFromNews($newsId);
 
    $this->app->user()->setFlash('La news a bien été supprimée !');
 
    $this->app->httpResponse()->redirect('.');
  }
 
  public function executeDeleteComment(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->delete($request->getData('id'));
 
    $this->app->user()->setFlash('Le commentaire a bien été supprimé !');
 
    $this->app->httpResponse()->redirect('.');
  }

  public function executeDeleteAnswer(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->deleteAnswer($request->getData('id'));
 
    $this->app->user()->setFlash('Votre réponse a bien été supprimé !');
 
    $this->app->httpResponse()->redirect('.');
  }

  public function executeArticles(HTTPRequest $request) 
  {
    $this->page->addVar('title', 'Tous les articles');

    $manager = $this->managers->getManagerOf('News');

    $this->page->addVar('nombreNews', $manager->count());
    $this->page->addVar('listeNews', $manager->getAllList());
  }
 
  public function executeComments(HTTPRequest $request) 
  {
    $this->page->addVar('title', 'Liste de tous les commentaires');

    $manager = $this->managers->getManagerOf('Comments');
    $comments = $manager->getList();

    foreach ($comments as $com) {
      $temp = strip_tags($com->contenu());
      $com->setContenu($temp);
    }

    $this->page->addVar('comments', $comments);
  }

  public function executeReport(HTTPRequest $request) 
  {
    $this->page->addVar('title', 'Tous les commentaires signalés');

    $manager = $this->managers->getManagerOf('Comments');

    $this->page->addVar('nombreReport', $manager->reportCount());
    $this->page->addVar('listeReport', $manager->getreportList());
  }

  public function executeAnswers(HTTPRequest $request) 
  {
    $this->page->addVar('title', 'Les réponses aux commentaires');

    $manager = $this->managers->getManagerOf('Comments');

    $this->page->addVar('listeAnswers', $manager->getAnswers());
  }

  public function executeIndex(HTTPRequest $request)
  {
    $show_per_page = $this->app->config()->get('pages');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
    $this->page->addVar('title', 'Administration du blog');
 
    $manager = $this->managers->getManagerOf('News');
 
    $this->page->addVar('nombreNews', $manager->count());

    $total = $manager->count();
    $nombreDePages=ceil($total/$show_per_page);

    if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
    {
         $pageActuelle=intval($_GET['page']);
     
         if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
         {
              $pageActuelle=$nombreDePages;
         }
    }
    else // Sinon
    {
         $pageActuelle=1; // La page actuelle est la n°1 
    }   

    $premiereEntree=($pageActuelle-1)*$show_per_page; // On calcul la première entrée à lire
     
    // La requête sql pour récupérer les messages de la page actuelle.
    
    $this->page->addVar('pageActuelle', $pageActuelle);
    $this->page->addVar('Pages', $nombreDePages);
    $this->page->addVar('listeNews', $manager->getList($premiereEntree, $show_per_page));

    $managerComment = $this->managers->getManagerOf('Comments');

    $lastCom = $managerComment->getList(0,5);

    foreach ($lastCom as $com) {
      $com1 = strip_tags($com->contenu());
      $com->setContenu($com1);
      if (strlen($com->contenu()) > $nombreCaracteres)
      {
        $debut = substr($com->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . ' [...]';
        
        $com->setContenu($debut);
      }
    }
    
    $this->page->addVar('nombreReport', $managerComment->reportCount());
    $this->page->addVar('listeReport', $managerComment->getReportList());
    $this->page->addVar('lastCom', $lastCom);
  }
 
  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Ajout d\'un article');
  }
 
  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Modification d\'une news');
  }
 
  public function executeAnswerComment(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Répondre à un commentaire');
    $comment = $this->managers->getManagerOf('Comments')->get($request->getData('id'));
    if (isset($_POST["answer"])) 
    {
      $answer = $request->postdata('answer');
      $this->managers->getManagerOf('Comments')->answer($comment, $answer);
      $this->app->user()->setFlash('Votre réponse à bien été publié');     
      $this->app->httpResponse()->redirect('/admin/');
    }

    $temp = strip_tags($comment->contenu());
    $comment->setContenu($temp);
    $this->page->addVar('comment', $comment);
  }

  public function executeUpdateComment(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Modification d\'un commentaire');
 
    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'id' => $request->getData('id'),
        'auteur' => $request->postData('auteur'),
        'contenu' => $request->postData('contenu')
      ]);
    }
    else
    {
      $comment = $this->managers->getManagerOf('Comments')->get($request->getData('id'));
    }
 
    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);
 
    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été modifié');
      
      $this->app->httpResponse()->redirect('/admin/');
    }
 
    $this->page->addVar('form', $form->createView());
  }
 
  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $news = new News([
        'auteur' => $request->postData('auteur'),
        'titre' => $request->postData('titre'),
        'contenu' => $request->postData('contenu')
      ]);
 
      if ($request->getExists('id'))
      {
        $news->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la news est transmis si on veut la modifier
      if ($request->getExists('id'))
      {
        $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
      }
      else
      {
        $news = new News;
      }
    }
 
    $formBuilder = new NewsFormBuilder($news);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('News'), $request);
 
    if ($formHandler->process())
    {
      $this->app->user()->setFlash($news->isNew() ? 'L\'article a bien été ajouté !' : 'L\'article a bien été modifié ');
 
      $this->app->httpResponse()->redirect('/admin/');
    }
 
    $this->page->addVar('form', $form->createView());
  }
}