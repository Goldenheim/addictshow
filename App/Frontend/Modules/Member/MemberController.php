<?php
namespace App\Frontend\Modules\Member;
 
use \JFBlog\BackController;
use \JFBlog\HTTPRequest;
use \Entity\Member;
use \FormBuilder\MemberFormBuilder;
use \JFBlog\FormHandler;
 
class memberController extends BackController
{
	public function executeSubscribe(HTTPRequest $request)
	{
	  // Si le formulaire a été envoyé.
	  if ($request->method() == 'POST')
	  {
	  	$member = new Member([
	  		'pseudo' => $request->getData('pseudo'),
	  		'mail' => $request->postData('mail'),
	  		'password' => $request->postData('password')
	  	]);
	  }
	  else
	  {
	    $member = new Member;
	  }

	  $formBuilder = new MemberFormBuilder($member);
	  $formBuilder->build();
	  
	  $form = $formBuilder->form();
	  
	  $formHandler = new FormHandler($form, $this->managers->getManagerOf('Member'), $request);
	  
	  if ($formHandler->process())
	  {
	    $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
	  
	    $this->app->httpResponse()->redirect('/');
	  }
	  
	  $this->page->addVar('member', $member);
	  $this->page->addVar('form', $form->createView());
	  // On ajoute une définition pour le titre.
	  $this->page->addVar('title', 'Page du formulaire d\'inscription');
	}
}