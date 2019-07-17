<?php
namespace App\Frontend\Modules\Member;
 
use \JFBlog\BackController;
use \JFBlog\HTTPRequest;
use \Entity\Member;
use \FormBuilder\CommentFormBuilder;
use \JFBlog\FormHandler;
 
class memberController extends BackController
{
	public function executeSubscribe(HTTPRequest $request)
	{
	  // On ajoute une définition pour le titre.
	  $this->page->addVar('title', 'Page du formulaire d\'inscription');
	}
}