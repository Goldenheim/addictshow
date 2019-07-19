<?php
namespace App\Frontend\Modules\Member;
 
use \JFBlog\BackController;
use \JFBlog\HTTPRequest;
use \Entity\Member;
use \FormBuilder\MemberFormBuilder;
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
	  	if(isset($_FILES['avatar']))
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
	  	}

	  	$member = new Member([
	  		'pseudo' => $request->postData('pseudo'),
	  		'mail' => $request->postData('mail'),
	  		'password' => $request->postData('password'),
	  		'avatar' => $name_file,
	  		'hash_validation' => $hash_validation
	  	]);
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
	  		
	  		  $this->app->httpResponse()->redirect('/');
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

		if ($request->method() == 'POST')
		{
			if ($member)
			{
				if (password_verify($password, $member['password'])) 
				{
					$_SESSION['id']     = $member['id'];
					$_SESSION['pseudo'] = $member['pseudo'];
					$_SESSION['mail']  = $member['mail'];
					$_SESSION['avatar']  = $member['avatar'];


					$this->app->user()->setAuthenticated(true);
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

	public function executeProfil (HTTPRequest $request) {
		
	}
}