<?php
namespace FormBuilder;

use \JFBlog\FormBuilder;
use \JFBlog\StringField;
use \JFBlog\MaxLengthValidator;
use \JFBlog\NotNullValidator;

class MemberFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Pseudo',
        'name' => 'pseudo',
        'type' => 'text',
        'maxLength' => 20,
        'validators' => [
          new MaxLengthValidator('Le pseudo spécifié est trop long (20 caractères maximum)', 20),
          new NotNullValidator('Merci de spécifier le pseudo'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Adresse email',
        'name' => 'mail',
        'type' => 'email',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('L\'adresse mail spécifiée est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier une adresse mail'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Mot de passe',
        'name' => 'password',
        'type' => 'password',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le mot de passe spécifié est invalide (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier un mot de passe'),
        ],
       ]));
  }
}