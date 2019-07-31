<?php
namespace App\Backend\Modules\Member;
 
use \AddictFram\BackController;
use \AddictFram\HTTPRequest;
use \AddictFram\httpResponse;
use \Entity\Member;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\MemberFormBuilder;
use \FormBuilder\EditFormBuilder;
use \AddictFram\FormHandler;
 
class memberController extends BackController
{
	public function executeSubscribe(HTTPRequest $request)
	{
	  $pseudo = $request->postData('pseudo');
	  $mail = $request->postData('mail');
	  $manager = $this->managers->getManagerOf('Member');	
	  $hash_validation = md5(uniqid(rand(), true));	

	  // Si le formulaire a été envoyé.
	  if ($request->method() == 'POST')
	  {

	  	if(isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0)
	  	{
		  	$content_dir = "img/upload/"; // dossier où sera déplacé le fichier
		  	 
	  	    $tmp_file = $_FILES['avatar']['tmp_name'];
	  	 
	  	    if( !is_uploaded_file($tmp_file) )
	  	    {
	  	        exit("Le fichier est introuvable");
	  	    }
	  	 
	  	    // on copie le fichier dans le dossier de destination
	  	    $name_file = $pseudo ."-" . $_FILES['avatar']['name'];
	  	 
	  	    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
	  	    {
	  	        exit("Impossible de copier le fichier dans $content_dir");
	  	    }
		  	else
		  	{
		  	    echo "Le fichier est enregistré";
			}

			$member = new Member([
				'pseudo' => $request->postData('pseudo'),
				'mail' => $request->postData('mail'),
				'password' => $request->postData('password'),
				'avatar' => $name_file,
				'hash_validation' => $hash_validation,
				'tmdbSession' => $tmdbSession,
			]);
	  	} else 
	  	{
	  		$member = new Member([
	  			'pseudo' => $request->postData('pseudo'),
	  			'mail' => $request->postData('mail'),
	  			'password' => $request->postData('password'),
	  			'avatar' => 'avatar-404.jpg',
	  			'hash_validation' => $hash_validation,
	  			'tmdbSession' => $tmdbSession,
	  		]);
	  	}
	  }
	  else
	  {
	    $member = new Member;
	  }

	  $formBuilder = new MemberFormBuilder($member);
	  $formBuilder->build();
	  
	  $form = $formBuilder->form();
	 
	  if ($manager->get('pseudo',$pseudo) == Null) {
	  	if ($manager->get('mail',$mail) == Null) {
	  		$formHandler = new FormHandler($form, $manager, $request);
	  		
	  		if ($formHandler->process())
	  		{
	  		  $this->app->user()->setFlash('Votre demande d\'inscription à bien été prise en compte');

	  		  if(!empty($tmdbSession))
	  		  {
	  		  	$this->app->httpResponse()->redirect('https://www.themoviedb.org/authenticate/'.$tmdbSession.'?redirect_to=127.0.0.1/approved=true');
	  		  }
	  		  else
	  		  {
	  		  	$this->app->httpResponse()->redirect('/');
	  		  } 
	  		}
	  	} else {
	  		$this->app->user()->setFlash('Cette adresse mail est déjà utilisée');
	  	}
	  } else {
	  	  $this->app->user()->setFlash('Ce pseudo existe déjà');
	  }
	  
	  $this->page->addVar('member', $member);
	  $this->page->addVar('form', $form->createView());
	  // On ajoute une définition pour le titre.
	  $this->page->addVar('title', 'Page du formulaire d\'inscription');
	}

	public function executeConnexion (HTTPRequest $request) {
		
		$pseudo = $request->postData('pseudo');
		$password = $request->postData('password');
		$manager = $this->managers->getManagerOf('Member');	
		$member = $manager->get('pseudo',$pseudo);
		$id = $member['id'];

		if ($request->method() == 'POST')
		{
			if ($member)
			{
				if (password_verify($password, $member['password'])) 
				{
					if(empty($_SESSION)) 
					{
						$this->app->user()->setAttribute('id',$member['id']);
						$this->app->user()->setAttribute('pseudo',$member['pseudo']);
						$this->app->user()->setAttribute('mail',$member['mail']);
						$this->app->user()->setAttribute('phone',$member['phone']);
						$this->app->user()->setAttribute('profession',$member['profession']);
						$this->app->user()->setAttribute('genre',$member['genre']);
						$this->app->user()->setAttribute('name',$member['name']);
						$this->app->user()->setAttribute('avatar',$member['avatar']);
					}

					if(!empty($_POST['autoLogin'])) {
						$this->app->httpResponse()->setCookie('login', $id, time()+ (10 * 365 * 24 * 60 * 60));
					} else {
						if(isset($_COOKIE['login'])) {
							$this->app->httpResponse()->setCookie('login', '');
						}
					}

					$this->app->user()->setAuthenticated(true);
					$this->app->user()->setFlash('Bonjour ' . $_SESSION['pseudo'] . ' !');
					$this->app->httpResponse()->redirect('/');
				} 
				else 
				{
					$this->app->user()->setFlash('Le mot de passe est incorrect');
				}
			} 
			else
			{
				$this->app->user()->setFlash('Ce pseudonyme n\'existe pas');
			} 
		} 
	}

	public function executeLogout(HTTPRequest $request)
	{ 
	  $this->app->user()->logOut();
	  // Suppression des cookies de connexion automatique
	  $this->app->httpResponse()->setCookie('login', Null, time() - 360);
	  $this->app->user()->setFlash('Vous vous êtes bien déconnecté');
	  $this->app->httpResponse()->redirect('/');
	}

	public function executeProfil (HTTPRequest $request) {
		$this->page->addVar('title', 'Profil');
		$json = file_get_contents("https://api.themoviedb.org/3/genre/tv/list?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
		$parsee = json_decode($json, true); 

		$manager = $this->managers->getManagerOf('Comments');
		$managerMember = $this->managers->getManagerOf('Member');

		$auteur = $manager->author($_SESSION['id']);
		$this->page->addVar('auteur', $auteur);	
		$this->page->addVar('genre', $parsee);	
		$this->page->addVar('count', $manager->authorCount($_SESSION['id']));
		$this->page->addVar('rateAvg', $managerMember->getRateAvg($_SESSION['id']));		
	}

	public function executeComments (HTTPRequest $request) {
		$this->page->addVar('title', 'Tous les commentaires de ' . $_SESSION['pseudo']);
		$manager = $this->managers->getManagerOf('Comments');
		$auteur = $manager->author($_SESSION['id']);
		$this->page->addVar('comments', $auteur);	
	}

	public function executeDelete (HTTPRequest $request) {
		$memberId = $request->getData('id');
		
		$this->managers->getManagerOf('Member')->delete($memberId);
		$this->app->user()->logOut();
		// Suppression des cookies de connexion automatique
		$this->app->httpResponse()->setCookie('login', Null, time() - 360);
		$this->app->user()->setFlash('Le profil a bien été supprimé');
		$this->app->httpResponse()->redirect('/');
	}

	public function executeEdit (HTTPRequest $request) {

		  $jsonSearch = file_get_contents("https://api.themoviedb.org/3/genre/tv/list?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
		  $parseeSearch = json_decode($jsonSearch, true);
		  $this->page->addVar('search', $parseeSearch);
		  $pseudo = $request->postData('pseudo');
		  $name = $request->postData('name');
		  $mail = $request->postData('mail');
		  $phone = $request->postData('phone');
		  $profession = $request->postData('profession');
		  $genre = $request->postData('fav_genre');
		  $manager = $this->managers->getManagerOf('Member');	

		  // Si le formulaire a été envoyé.
		  if ($request->method() == 'POST')
		  {

	  	  	if(isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0)
	  	  	{
	  	  		$memberBd = $manager->get('id', $_SESSION['id']);
	  	  		if(!empty($memberBd['avatar']))
	  	  		{
	  	  			unlink("img/upload/" . $memberBd['avatar']);
	  	  		}

	  		  	$content_dir = "img/upload/"; // dossier où sera déplacé le fichier
	  		  	 
	  	  	    $tmp_file = $_FILES['avatar']['tmp_name'];
	  	  	 
	  	  	    if( !is_uploaded_file($tmp_file) )
	  	  	    {
	  	  	        exit("Le fichier est introuvable");
	  	  	    }

	  	  	    $path = $_FILES['avatar']['name'];
	  	  	    $ext = pathinfo($path, PATHINFO_EXTENSION);
	  	  	 
	  	  	    // on copie le fichier dans le dossier de destination
	  	  	    $name_file = $_SESSION['pseudo'] . "." . $_SESSION['id'] . "." . $ext;
	  	  	 
	  	  	    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
	  	  	    {
	  	  	        exit("Impossible de copier le fichier dans $content_dir");
	  	  	    }
		  	  		$member = new Member([
			  		'pseudo' => $pseudo,
			  		'name' => $name,
			  		'phone' => $phone,
			  		'mail' => $mail,
			  		'profession' => $profession,
			  		'avatar' => $name_file,
			  		'genre' => $genre,
			  		]);
	  	  	} else
	  	  	{
	  	  		$member = new Member([
		  		'pseudo' => $pseudo,
		  		'name' => $name,
		  		'phone' => $phone,
		  		'mail' => $mail,
		  		'profession' => $profession,
		  		'genre' => $genre,
		  		]);
	  	  	}

		  	if ($request->getExists('id'))
		  	{
		  	  $member->setId($request->getData('id'));
		  	}
		  }
		  else
		  {
		    $member = new Member;
		  }

		  $formBuilder = new EditFormBuilder($member);
		  $formBuilder->build();
		  
		  $form = $formBuilder->form();
		 
		  if (($manager->get('pseudo',$pseudo) == Null) || $pseudo == $_SESSION['pseudo']) {
		  	if ($manager->get('mail',$mail) == Null || $mail == $_SESSION['mail']) {
		  		$formHandler = new FormHandler($form, $manager, $request);
		  		 
		  		  if ($formHandler->process())
			  	  		{
			  	  		    $member = $manager->get('id',$_SESSION['id']);
			  	  		    $this->app->user()->setAttribute('id',$member['id']);
	  						$this->app->user()->setAttribute('pseudo',$member['pseudo']);
	  						$this->app->user()->setAttribute('mail',$member['mail']);
	  						$this->app->user()->setAttribute('phone',$member['phone']);
	  						$this->app->user()->setAttribute('profession',$member['profession']);
	  						$this->app->user()->setAttribute('genre',$member['genre']);
	  						$this->app->user()->setAttribute('name',$member['name']);
	  						if(isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0)
	  	  					{
	  							$this->app->user()->setAttribute('avatar',$member['avatar']);
	  						}
			  	  		  	$this->app->httpResponse()->addHeader("Refresh:0; url=profil.php");
			  	  		}
		  	} else {
		  		$this->app->user()->setFlash('Cette adresse mail est déjà utilisée');
		  	}
		  } else {
		  	  $this->app->user()->setFlash('Ce pseudo existe déjà');
		  }
		  
		  $this->page->addVar('form', $form->createView());
		  // On ajoute une définition pour le titre.
		  $this->page->addVar('title', 'Édition du profil');
	}

	public function executeFavourite (HTTPRequest $request) {
		$id = $request->getData('id');	
		$movie = $request->getData('movie');
		$manager = $this->managers->getManagerOf('Member');
		$manager->addfav($id, $movie);
		$this->app->user()->setFlash('Ajouté à vos favoris !');
		$this->app->httpResponse()->redirect('movie-' . $movie .'.html');	
	}

	public function executeGetFav (HTTPRequest $request) {
		$id = $_SESSION['id'];
		$manager = $this->managers->getManagerOf('Member');
		$favourites = $manager->getFav($id);
		$fav = array();

		foreach ($favourites as $favourite) {
			$id = $favourite['show_id'];
			$json = file_get_contents("https://api.themoviedb.org/3/tv/$id?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
			$parsee = json_decode($json, true);
			array_push($fav, $parsee);
		}
		$this->page->addVar('favourites', $fav);
	}

	public function executeDeleteFav (HTTPRequest $request) {
		$showId = $request->getData('id');
		
		$this->managers->getManagerOf('Member')->deleteFav($showId);
		$this->app->user()->setFlash('Vos favoris ont bien été mis à jour');
		$this->app->httpResponse()->addHeader("Refresh:0; url=favoris.html");
	}

	public function executeDiscover (HTTPRequest $request) {
		$manager = $this->managers->getManagerOf('Member');
		$member = $manager->get('id',$_SESSION['id']);
		$favId = $manager->getRandomFav($_SESSION['id']);
		$genreId = $member['genre'];

		$json = file_get_contents("https://api.themoviedb.org/3/discover/tv?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR&sort_by=popularity.desc&page=1&timezone=France%2FPARIS&with_genres=$genreId&include_null_first_air_dates=false");
		$parsee = json_decode($json, true); 
		$jsonGenre = file_get_contents("https://api.themoviedb.org/3/genre/tv/list?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
		$parseeGenre = json_decode($jsonGenre, true);
		foreach ($parseeGenre['genres'] as $genres) {
			if ($genres['id'] == $genreId) {
				$genre = $genres['name'];
			}
		}
		$jsonTitle = file_get_contents("https://api.themoviedb.org/3/tv/$favId?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR");
		$parseeTitle = json_decode($jsonTitle, true); 
		$jsonFav = file_get_contents("https://api.themoviedb.org/3/tv/$favId/recommendations?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR&page=1");
		$parseeFav = json_decode($jsonFav, true); 

		$this->page->addVar('title', 'Découvertes selon vos goûts');
		$this->page->addVar('search', $parsee);
		$this->page->addVar('genre', $genre);
		$this->page->addVar('similar', $parseeFav);
		$this->page->addVar('titleFav', $parseeTitle);
	}

	public function executeDeleteComment(HTTPRequest $request)
	{
	  $this->managers->getManagerOf('Comments')->delete($request->getData('id'));
	
	  $this->app->user()->setFlash('Le commentaire a bien été supprimé !');
	
	  $this->app->httpResponse()->redirect('/');
	}

	public function executeUpdateComment(HTTPRequest $request)
	{
	  $this->page->addVar('title', 'Modification d\'un commentaire');
	
	  if ($request->method() == 'POST')
	  {
	    $comment = new Comment([
	      'id' => $request->getData('id'),
	      'contenu' => htmlspecialchars($request->postData('contenu'))
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
	    
	    $this->app->httpResponse()->redirect('/');
	  }
	
	  $this->page->addVar('form', $form->createView());
	}
}