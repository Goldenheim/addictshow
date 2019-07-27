<?php
namespace App\Frontend\Modules\Member;
 
use \JFBlog\BackController;
use \JFBlog\HTTPRequest;
use \JFBlog\httpResponse;
use \Entity\Member;
use \FormBuilder\MemberFormBuilder;
use \FormBuilder\EditFormBuilder;
use \JFBlog\FormHandler;
use \JFBlog\Image;
 
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
	  	if(!empty($_POST['tmdbAccess'])) {
	  		$json = file_get_contents("https://api.themoviedb.org/3/authentication/token/new?api_key=22b5d3d2b10babbb4291177132454423");
	  			  	$parsee = json_decode($json, true);
	  			  	$tmdbSession = $parsee['request_token'];
	  	} 

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

		$auteur = $this->managers->getManagerOf('Comments')->author($_SESSION['pseudo']);
		$this->page->addVar('auteur', $auteur);	
		$this->page->addVar('genre', $parsee);	
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
		  	$member = new Member([
		  		'pseudo' => $pseudo,
		  		'name' => $name,
		  		'phone' => $phone,
		  		'mail' => $mail,
		  		'profession' => $profession,
		  		'genre' => $genre,
		  	]);

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
			  	  		    $this->app->user()->setFlash('Votre profil a bien été édité');
			  	  		    $member = $manager->get('id',$_SESSION['id']);
			  	  		    $this->app->user()->setAttribute('id',$member['id']);
	  						$this->app->user()->setAttribute('pseudo',$member['pseudo']);
	  						$this->app->user()->setAttribute('mail',$member['mail']);
	  						$this->app->user()->setAttribute('phone',$member['phone']);
	  						$this->app->user()->setAttribute('profession',$member['profession']);
	  						$this->app->user()->setAttribute('genre',$member['genre']);
	  						$this->app->user()->setAttribute('name',$member['name']);
	  						$this->app->user()->setAttribute('avatar',$member['avatar']);
			  	  		  	$this->app->httpResponse()->redirect('profil.php');
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
}