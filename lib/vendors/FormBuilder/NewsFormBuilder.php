<?php
namespace FormBuilder;

use \AddictFram\FormBuilder;
use \AddictFram\StringField;
use \AddictFram\TextField;
use \AddictFram\MaxLengthValidator;
use \AddictFram\NotNullValidator;

class NewsFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Auteur',
        'name' => 'auteur',
        'maxLength' => 20,
        'validators' => [
          new MaxLengthValidator('L\'auteur spécifié est trop long (20 caractères maximum)', 20),
          new NotNullValidator('Merci de spécifier l\'auteur de l\'article'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Titre',
        'name' => 'titre',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier le titre de l\'article'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Contenu',
        'name' => 'contenu',
        'rows' => 20,
        'cols' => 60,
        'validators' => [
          new NotNullValidator('Merci de spécifier le contenu de l\'article'),
        ],
       ]));
  }
}