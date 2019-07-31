<?php
namespace FormBuilder;

use \AddictFram\FormBuilder;
use \AddictFram\StringField;
use \AddictFram\TextField;
use \AddictFram\MaxLengthValidator;
use \AddictFram\NotNullValidator;

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