<?php
namespace FormBuilder;

use \JFBlog\FormBuilder;
use \JFBlog\StringField;
use \JFBlog\TextField;
use \JFBlog\MaxLengthValidator;
use \JFBlog\NotNullValidator;

class CommentFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new TextField([
        'label' => 'Contenu',
        'name' => 'contenu',
        'rows' => 7,
        'cols' => 50,
        'validators' => [
          new NotNullValidator('Merci de spécifier votre commentaire'),
        ],
       ]));
  }
}