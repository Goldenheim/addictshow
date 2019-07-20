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
        'label' => 'Pseudo*',
        'name' => 'pseudo',
        'type' => 'text',
        'placeHolder' => 'Entrez votre pseudo',
        'maxLength' => 20,
        'validators' => [
          new MaxLengthValidator('Le pseudo spécifié est trop long (20 caractères maximum)', 20),
          new NotNullValidator('Merci de spécifier le pseudo'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Adresse email*',
        'name' => 'mail',
        'type' => 'email',
        'placeHolder' => 'Entrez votre adresse mail',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('L\'adresse mail spécifiée est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier une adresse mail'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Confirmation de votre adresse email*',
        'name' => 'mail_confirm',
        'type' => 'email',
        'placeHolder' => 'Confirmez votre adresse mail',
        'maxLength' => 100,
       ]))
       ->add(new StringField([
        'label' => 'Mot de passe*',
        'name' => 'password',
        'type' => 'password',
        'placeHolder' => 'Entrez votre mdp',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le mot de passe spécifié est invalide (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier un mot de passe'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Confirmation de votre mot de passe*',
        'name' => 'password_confirm',
        'type' => 'password',
        'placeHolder' => 'Confirmez votre mdp',
        'maxLength' => 100,
       ]))
       ->add(new StringField([
        'label' => 'Envoyer une photo de profil',
        'name' => 'avatar',
        'accept' =>'image/*',
        'type' => 'file',
       ]));
  }
}